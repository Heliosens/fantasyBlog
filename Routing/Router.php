<?php


class Router
{
    /**
     * make param secure
     * @param string|null $param
     * @return string|null
     */
    public static function clean(?string $param): ?string
    {
        return $param !== null ? strtolower(trim(strip_tags($param))) : null;
    }

    // display articles switch between last, one, or all
    public static function displayArticles($param)
    {
        $ctrl = new ArticleController();
        switch ($param){
            case 'all' :
                // to crtl get all articles from manager
                $ctrl->displayAll();
                break;
            default :
               // (new Controller($this->pdo))->render('home');

        }
    }
}