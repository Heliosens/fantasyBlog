<?php


class CommentManager
{
    /**
     * get comment by article
     * @param $art
     * @return array
     */
    public static function commentByArt ($art){
        $comments = [];
        $query = DB::conn()->query("SELECT * FROM comment WHERE article_fk = $art");
        if($query){
            // need user as author
            $userManager = new UserManager();
            foreach ($query->fetchAll() as $data){
                $comments[] = (new Comment())
                    ->setId($data['id'])
                    ->setContent($data['content'])
                    ->setAuthor($userManager::getUserById($data['author_fk']))
                    ;
            }
        }
        return $comments;
    }

    /**
     * get comment by user
     * @param $user
     * @return array
     */
    public static function commentByUser ($user){
        $comments = [];
        $query = DB::conn()->query("SELECT * FROM comment WHERE author_fk = $user");
        if($query){
            // need article
            $artManager = new ArticleManager();
            foreach ($query->fetchAll() as $data){
                $comments[] = (new Comment())
                    ->setId($data['id'])
                    ->setContent($data['content'])
                    ->setArticle($artManager::getArtById($data['article_fk']));
            }
        }
        return $comments;
    }

    /**
     * @param Comment $comment
     * @return bool
     */
    public static function addComment(Comment &$comment) :bool {
        $stm = DB::conn()->prepare("
            INSERT INTO comment (content, author_fk, article_fk)
            VALUES (:content, :author, :article)
            ");

        $stm->bindValue(':content', $comment->getContent());
        $stm->bindValue(':author', $comment->getAuthor()->getId());
        $stm->bindValue(':article', $comment->getArticle()->getId());

        $result = $stm->execute();

        $comment->setId(DB::conn()->lastInsertId());
        return $result;
    }

    public static function supprComment($id){
        $sql = "DELETE FROM comment WHERE id = $id";
        return DB::conn()->exec($sql);
    }
}
