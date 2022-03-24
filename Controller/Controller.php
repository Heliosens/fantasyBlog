<?php


class Controller
{
    /**
     * @param $param
     * @return string
     */
    public function cleanEntries ($param){
        return trim(strip_tags($_POST[$param]));
    }

    /**
     * @param string $page
     * @param array $data
     */
    public function render(string $page, array $data = []){
        require __DIR__ . '/../View/partials/header.php';
        require __DIR__ . '/../View/' . $page . '.php';
        require __DIR__ . '/../View/partials/footer.php';
    }

    /**
     * @return bool
     */
    public function isUserConnected()
    {
        return isset($_SESSION['user']);
    }

    /**
     * @return bool
     */
    public function isAdmin (){
        return in_array('admin', $_SESSION['roles']);
    }
}
