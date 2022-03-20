<?php


class ArticleManager
{
    public static function getAllArticles() : array
    {
        $articles = [];
        $query = DB::conn()->query("
            SELECT * FROM article ORDER BY id DESC");
        if($query){
            $userManager = new UserManager();
            foreach ($query->fetchAll() as $data){
                $articles[] = (new Article())
                    ->setId($data['id'])
                    ->setTitle($data['title'])
                    ->setContent($data['content'])
                    ->setImage($data['image'])
                    ->setAuthor($userManager->getUserById($data['author_fk']))
                    ;
            }
        }
        return $articles;
    }

//    create article from article form
}