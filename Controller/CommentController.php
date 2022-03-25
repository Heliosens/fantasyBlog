<?php


class CommentController extends Controller
{

    public function newComment()
    {
        $comment = "";
        if(isset($_POST['button'])){
            $content = $this->cleanEntries('comment');
            $user = UserManager::getUserById($_SESSION['id']);
            $article = ArticleManager::getArtById($_POST['artNbr']);
            // id content Article User
            $comment = new Comment();
            $comment->setContent($content)->setAuthor($user)->setArticle($article);
        }

        if(CommentManager::addComment($comment)){
            $_SESSION['succes'] = "commentaire enregistré";
            header('Location: index.php');
        }
    }
}