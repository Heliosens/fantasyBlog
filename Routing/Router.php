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
     * display all articles
     */
    public static function displayArticles()
    {
        $ctrl = new HomeController();
        // to crtl get all articles from manager
        $ctrl->displayAll();
    }

    /**
     * display connection form
     */
    public static function connectionForm (){
        $ctrl = new FormController();
        $ctrl->displayForm('connection');
    }

    /**
     * @param null $action
     */
    public static function formRoute ($action = null){
        $ctrl = new FormController();
        switch ($action) {
            case 'connectionForm':
                $ctrl->displayForm('connection');
                break;
            case 'connect':
                $ctrl->checkConnectionForm();
                break;
            case 'registerForm':
                $ctrl->checkRegisterForm();
                break;
            case 'register':
                $ctrl->displayForm('register');
                break;
        }
    }

}