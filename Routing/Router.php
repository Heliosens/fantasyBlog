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
    public static function displayArticles()
    {
        $ctrl = new HomeController();
        // to crtl get all articles from manager
        $ctrl->displayAll();
    }

    /**
     *
     */
    public static function connectionForm (){
        $ctrl = new FormController();
        $ctrl->displayForm('connection');
    }

    /**
     *
     */
    public static function userConnection () {
        if(isset($_POST['button'])){
            $ctrl = new FormController();
        }
    }

    public static function registerForm () {
        $ctrl = new FormController();
        $ctrl->displayForm('register');
    }

    public static function userRegister () {
        $ctrl = new FormController();
        $ctrl->checkUserForm();
    }

}