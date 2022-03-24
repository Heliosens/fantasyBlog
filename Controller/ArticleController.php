<?php


class ArticleController extends Controller
{

    public function formArticle() {
        $this->render('addArticle');
    }

    public function newArticle(){
        if(isset($_POST['button'])){
            var_dump($_POST);
            $title = $this->cleanEntries('title');
            $content = $this->cleanEntries('content');
            $image = $this->cleanEntries('image-name');
            $user = UserManager::getUserById($_SESSION['id']);

            // todo change img name

            $article = new Article();
            $article
                ->setTitle($title)
                ->setContent($content)
                ->setImage($image)
                ->setAuthor($user)
                ;
        }

        // send to db
        if(ArticleManager::addArticle($article)){
            $_SESSION['success'] = "article enregistré";
            header('Location: index.php');
        }
    }
}
