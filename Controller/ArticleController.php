<?php


class ArticleController extends Controller
{
    public function displayAll (){
        // use article manage
        $this->render('home', [
            'articles' => ArticleManager::getAllArticles()
        ]);
    }
}