<?php


class CommentController extends Controller
{

    /**
     * create comment
     */
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
            header('Location: index.php');
        }
    }

    /**
     * @param $id
     */
    public function deleteComment($id){
        if(CommentManager::supprComment($id)){
            $_SESSION['succes'] = "Commentaire supprimé";
            $referer = $_SERVER['HTTP_REFERER'];
            header("Location: $referer");
        }
    }

    /**
     * @param $id
     */
    public function commentToUpdate($id){
        CommentManager::updateComment($id);
        header('Location: index.php?p=profile&o=update');
        $referer = $_SERVER['HTTP_REFERER'];
        header("Location: $referer");
    }

}
