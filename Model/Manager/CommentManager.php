<?php


class CommentManager
{
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
}