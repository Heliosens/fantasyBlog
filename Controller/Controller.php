<?php


class Controller
{
    /**
     * @param string $page
     * @param array $data
     */
    public function render(string $page, array $data = []){
        require __DIR__ . '/../View/partials/header.php';
        require __DIR__ . '/../View/' . $page . '.php';
        require __DIR__ . '/../View/partials/footer.php';
    }
}
