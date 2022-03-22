<?php


class HomeController extends Controller
{
    private static function isUserConnected()
    {
        return isset($_SESSION['user'], $_SESSION['id']);
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
            $_SESSION['user'] = null;
            $_SESSION['id'] = null;
            session_destroy();
            // TODO modifier le cookie de session et mettre une valeur négative.

        }
        header('Location: index.php');
    }
}
