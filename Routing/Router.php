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

    /**
     * @param $param
     */
    public static function homeCtrl ($param){
        $ctrl = new HomeController();
        switch ($param){
            case 'home':
                $ctrl->displayAll();
                break;
            case 'disconnect':
                $ctrl->logout();
                break;
            default :
                $ctrl->displayAll();
        }
    }

    /**
     * @param $param
     * @param null $type
     */
    public static function formCtrl ($param, $type = null){
        $ctrl = new FormController();
        switch ($param){
            case 'display':
                $ctrl->displayForm($type);
                break;
            case 'register':
                $ctrl->checkRegisterForm();
                break;
            case 'connection':
                $ctrl->checkConnectionForm();
                break;
        }
    }

    /**
     * @param $param
     */
    public static function userCtrl ($param){
        $ctrl = new UserController();
        switch ($param){
            case 'profile':
                $ctrl->displayProfile();
                break;
        }
    }

    /**
     * @param $option
     */
    public static function artCtrl ($option){
        $ctrl = new ArticleController();
        switch ($option){
            case 'form':
                $ctrl->formArticle();
                break;
            case 'add':
                $ctrl->newArticle();
                break;
        }
    }

    public static function comCrtl ($option){
        $ctrl = new CommentController();
        switch ($option){
            case 'add':
                $ctrl->newComment();
        }
    }
}