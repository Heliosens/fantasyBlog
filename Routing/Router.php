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
     * @param null $option
     * @param null $id
     */
    public static function homeCtrl ($option, $id = null){
        $ctrl = new HomeController();
        switch ($option){
            case 'art':
                $ctrl->displayId($id);
                break;
            case 'disconnect':
                $ctrl->logout();
                break;
            default :
                $ctrl->displayAll();
        }
    }

    /**
     * @param $option
     * @param null $type
     */
    public static function formCtrl ($option, $type = null){
        $ctrl = new FormController();
        switch ($option){
            case 'form':
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
     * @param null $id
     */
    public static function comCrtl ($option, $id = null){
        $ctrl = new CommentController();
        switch ($option){
            case 'add':
                $ctrl->newComment();
                break;
            case 'delete':
                $ctrl->deleteComment($id);
                break;
            case 'update':
                $ctrl->displayForUpdate($id);
                break;
        }
    }
}