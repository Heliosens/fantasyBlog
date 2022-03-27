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
     * @param null $option
     */
    public static function homeCtrl ($param, $option = null){
        $ctrl = new HomeController();
        switch ($param){
            case 'home':
                $option ? $ctrl->displayId($option) : $ctrl->displayAll();
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
     * @param $page
     * @param null $option
     */
    public static function userCtrl ($page, $option = null){
        $ctrl = new UserController();
        switch ($page){
            case 'profile':
                $ctrl->displayProfile();
                break;
            case 'list':
                $ctrl->displayList($option);
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

    /**
     * @param $option
     */
    public static function comCrtl ($option){
        $ctrl = new CommentController();
        switch ($option){
            case 'add':
                $ctrl->newComment();
                break;
        }
    }

}