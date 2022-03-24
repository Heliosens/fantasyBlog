<?php


class ArticleManager
{
    /**
     * @return array
     */
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


    /**
     * @param Article $article
     * @return bool
     */
    public static function addArticle(Article &$article){
        $stm = DB::conn()->prepare("
            INSERT INTO article (title, content, image, author_fk)
            VALUES (:title, :content, :image, :author)
        ");

        $stm->bindValue(':title', $article->getTitle());
        $stm->bindValue(':content', $article->getContent());
        $stm->bindValue(':image', $article->getImage());
        $stm->bindValue(':author', $article->getAuthor()->getId());

        $result = $stm->execute();
        $article->setId(DB::conn()->lastInsertId());
        return $result;
    }
}
