<?php


class HomeController extends Controller
{
    public function displayAll ($param){
        $data = [];
        $articles = ArticleManager::getAllArticles();
        foreach ($articles as $article){
            $id = $article->getId();
            $data[] = ['article' => $article, 'comm' => CommentManager::commentByArtId($id)];
        }
        $this->render('home', $data);
    }
}
