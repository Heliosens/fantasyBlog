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
     * @param $param
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
     * to verify connection data
     */
    public static function userConnection () {
        $ctrl = new FormController();
        $ctrl->checkConnectionForm();
    }

    /**
     * display register form
     */
    public static function registerForm () {
        $ctrl = new FormController();
        $ctrl->displayForm('register');
    }

    /**
     * to verify register data
     */
    public static function userRegister () {
        $ctrl = new FormController();
        $ctrl->checkRegisterForm();
    }

    /**
     * disconnection
     */
    public static function disconnect (){
        $ctrl = new HomeController();
        $ctrl->logout();
    }

    public static function profile (){
        $ctrl = new UserController();
        $ctrl->displayProfile();
    }

}