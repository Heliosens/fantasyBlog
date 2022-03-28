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
            $referer = $_SERVER['HTTP_REFERER'];
            header("Location: $referer");
        }
    }

    /**
     * @param $id
     */
    public function displayForUpdate($id){
        $data[] = ['comm' => CommentManager::commentById($id)];
        $this->render('update', $data);
    }

    /**
     * @param $id
     */
    public function saveUpdate ($id){
        if(isset($_POST['saveUp'])){
            CommentManager::updateComment($id);
            $artId = ArticleManager::getArticleByComm($id)->getId();
            header("Location: /index.php?p=home&o=art&id=$artId");
        }
    }
}
