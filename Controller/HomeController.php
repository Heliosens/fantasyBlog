<?php


class HomeController extends Controller
{
    private static function isUserConnected()
    {
        return isset($_SESSION['user']);
    }

    /**
     *
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
     * disconnection
     */
    public function logout(): void
    {
        if(self::isUserConnected()) {
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
