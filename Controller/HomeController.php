<?php


class HomeController extends Controller
{

    /**
     * display all articles
     */
    public function displayAll (){
        $data = [];
        $articles = ArticleManager::getAllArticles();
        foreach ($articles as $article){
            $id = $article->getId();
            $data[] = ['article' => $article, 'comm' => CommentManager::commentByArtId($id)];
        }
        $this->render('home', $data);
    }

    /**
     * display article by id
     * @param $option
     */
    public function displayId($option)
    {
        $article = ArticleManager::getArtById($option);
        $data[] = ['article' => $article, 'comm' => CommentManager::commentByArtId($option)];
        $this->render('home', $data);
    }

    /**
     * disconnection
     */
    public function logout(): void
    {
        if($this->isUserConnected()) {
            $_SESSION['success'] = null;
            $_SESSION['error'] = null;
            $_SESSION['user'] = null;
            $_SESSION['id'] = null;
            $_SESSION['roles'] = null;
            setcookie(session_id(), "", time() - 3600);
            session_destroy();
        }
        header('Location: index.php');
    }

}
