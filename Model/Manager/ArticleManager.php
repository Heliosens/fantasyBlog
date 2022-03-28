<?php


class ArticleManager
{
    /**
     * @return array
     */
    public static function getAllArticles() : array
    {
        $articles = [];
        $query = DB::conn()->query(" SELECT * FROM article ORDER BY id DESC");
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
     * @param int $userId
     * @return array
     */
    public static function getArtList (int $userId) : array
    {
        $articles = [];
        $query = DB::conn()->query(" SELECT * FROM article WHERE author_fk = $userId ORDER BY id DESC");
        if($query){
            foreach ($query->fetchAll() as $data){
                $articles[] = (new Article())
                    ->setId($data['id'])
                    ->setTitle($data['title'])
                    ->setContent($data['content'])
                    ->setImage($data['image'])
                ;
            }
        }
        return $articles;
    }

    /**
     * @param $id
     * @return Article
     */
    public static function getArtById(int $id) : Article
    {
        $article = "";
        $query = DB::conn()->query(" SELECT * FROM article WHERE id = $id");
        if($query){
            $article = $query->fetch();
            $article = (new Article())
                ->setId($article['id'])
                ->setImage($article['image'])
                ->setContent($article['content'])
                ->setTitle($article['title'])
                ->setAuthor(UserManager::getUserById($article['author_fk']) )
            ;
        }
        return $article;
    }

    public static function getArticleByComm($id){
        $article = "";
        $query = DB::conn()->query("
            SELECT * FROM article WHERE id = (SELECT article_fk FROM comment WHERE comment.id = $id)
        ");
        if($query){
            $article = $query->fetch();
            $article = (new Article())
                ->setId($article['id'])
                ->setImage($article['image'])
                ->setContent($article['content'])
                ->setTitle($article['title'])
                ->setAuthor(UserManager::getUserById($article['author_fk']) )
                ;
        }
        return $article;
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

    /**
     * @param $id
     * @return false|int
     */
    public static function deleteArtById ($id){
        $sql = "DELETE FROM article WHERE id = $id";
        return DB::conn()->exec($sql);
    }

    /**
     * @param $id
     * @return bool
     */
    public static function updateArticle ($id){
        $stm = DB::conn()->prepare("
            UPDATE article SET title = :title, content = :content WHERE id = :id
        ");

        $stm->bindValue(':title', $_POST['title']);
        $stm->bindValue(':content', $_POST['content']);
        $stm->bindValue(':id', $id);

        return $stm->execute();
    }
}
