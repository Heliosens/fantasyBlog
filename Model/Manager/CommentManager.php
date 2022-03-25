<?php


class CommentManager
{
    /**
     * get comment by article id
     * @param $artId
     * @return array
     */
    public static function commentByArtId ($artId){
        $comments = [];
        $query = DB::conn()->query("SELECT * FROM comment WHERE article_fk = $artId");
        if($query){
            // need user as author
            $userManager = new UserManager();
            foreach ($query->fetchAll() as $data){
                $comments[] = (new Comment())
                    ->setId($data['id'])
                    ->setContent($data['content'])
                    ->setAuthor($userManager->getUserById($data['author_fk']))
                    ;
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
}











