<?php


class ArticleController extends Controller
{

    /**
     * display new article form
     */
    public function formArticle() {
        if(!$_SESSION['user']){
            header('Location: index.php');
            die();
        }
        $this->render('addArticle');
    }

    /**
     * create article, save in db
     */
    public function newArticle(){

        if(isset($_POST['button'])){
            $title = $this->cleanEntries('title');
            $content = $this->cleanEntries('content');
            $user = UserManager::getUserById($_SESSION['id']);

            $article = new Article();
            $article
                ->setTitle($title)
                ->setContent($content)
                ->setAuthor($user)
                ;

            if(isset($_FILES['artImage']) && $_FILES['artImage']['error'] === 0){
                $maxSize = 3 * 1024 * 1024; // = 3 Mo
                if((int)$_FILES['artImage']['size'] <= $maxSize){
                    $tmp_name = $_FILES['artImage']['tmp_name'];    // image temporary name
                    $infos = pathinfo($tmp_name, PATHINFO_EXTENSION);   // file extension
                    $name = $this->createRandomName() . "." . $infos;
                    $article->setImage($name);
                    move_uploaded_file($tmp_name, 'upload/' . $name);
                }
                else{
                    $_SESSION['error'] = "L'image est trop grande";
                }
            }
            else{
                $_SESSION['error'] = "erreur lors du chargement de l'image";
            }
        }

        // send to db
        if(ArticleManager::addArticle($article)){
            $_SESSION['success'] = "article enregistré";
            header('Location: index.php');
        }
    }

    /**
     * @return string
     */
    function createRandomName (): string {
        try {
            $bytes = random_bytes(15);
        } catch (Exception $e) {
            $bytes = openssl_random_pseudo_bytes(15);
        }
        return bin2hex($bytes);
    }

    /**
     * @param $id
     */
    public function deleteArticle ($id){
        if(ArticleManager::deleteArtById($id)){
            $referer = $_SERVER['HTTP_REFERER'];
            header("Location: $referer");
        }
    }

    /**
     * @param $id
     */
    public function displayForUpdate ($id){
        $this->render('addArticle', [ArticleManager::getArtById($id)]);
    }

    /**
     * @param $id
     */
    public function saveUpdate ($id){
        if(isset($_POST['button'])){
            ArticleManager::updateArticle($id);
            header("Location: /index.php?p=home&o=art&id=$id");
        }
    }

    /**
     *
     */
    public function displayList(){
        $data = [
            'type' => 'articles',
            'article' => ArticleManager::getAllArticles(),
        ];
        $this->render('list', $data);
    }
}
