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

            // todo change img name

            $article = new Article();
            $article
                ->setTitle($title)
                ->setContent($content)
                ->setAuthor($user)
                ;

            if(isset($_FILES['artImage'])){
                $tmp_name = $_FILES['artImage']['tmp_name'];
                $name = $_FILES['artImage']['name'];
                $article->setImage($name);
                move_uploaded_file($tmp_name, 'upload/' . $name);
            }
        }

        // send to db
        if(ArticleManager::addArticle($article)){
            $_SESSION['success'] = "article enregistré";
            header('Location: index.php');
        }
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

    public function saveUpdate ($id){
        if(isset($_POST['button'])){
            ArticleManager::updateArticle($id);
            header("Location: /index.php?p=home&o=art&id=$id");
        }
    }
}
