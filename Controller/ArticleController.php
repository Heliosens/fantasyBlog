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
                    $ext = pathinfo($_FILES['artImage']['name'], PATHINFO_EXTENSION);   // file extension
                    $name = $this->createRandomName() . "." . $ext;
                    $article->setImage($name);
                    move_uploaded_file($tmp_name, 'upload/' . $name);
                }
                else{
                    $_SESSION['error'] = "L'image est trop grande";
                    header("Location: index.php?p=article&o=form");
                }
            }
            else{
                $_SESSION['error'] = "erreur lors du chargement de l'image";
                header("Location: index.php?p=article&o=form");
            }
        }

        // send to db
        if(ArticleManager::addArticle($article)){
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
            $title = $this->cleanEntries('title');
            $content = $this->cleanEntries('content');
            $name = ArticleManager::getArtById($id)->getImage();
            $article = new Article();
            $article
                ->setTitle($title)
                ->setContent($content)
                ;

            if(isset($_FILES['artImage']) && strlen($_FILES['artImage']['name']) > 0) {
                if ($_FILES['artImage']['error'] === 0) {
                    unlink("upload/" . $name);
                    $maxSize = 3 * 1024 * 1024; // = 3 Mo
                    if ((int)$_FILES['artImage']['size'] <= $maxSize) {
                        $ext = pathinfo($_FILES['artImage']['name'], PATHINFO_EXTENSION);   // file extension
                        $name = $this->createRandomName() . "." . $ext;
                        $article->setImage($name);
                        $tmp_name = $_FILES['artImage']['tmp_name'];    // image temporary name
                        move_uploaded_file($tmp_name, 'upload/' . $name);
                    } else {
                        $_SESSION['error'] = "L'image est trop grande";
                        $this->render('addArticle', [ArticleManager::getArtById($id)]);
                        exit();
                    }
                } else {
                    $_SESSION['error'] = "erreur lors du chargement de l'image";
                    $this->render('addArticle', [ArticleManager::getArtById($id)]);
                    exit();
                }
            }
            ArticleManager::updateArticle($id, $name);
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
