<?php
session_start();
require __DIR__ . '/../include.php';

$page = isset($_GET['p']) ? Router::clean($_GET['p']) : 'home';
$param = isset($_GET['f']) ? Router::clean($_GET['f']) : null;

$route = new Router();

switch ($page){
    case 'home':
        Router::displayArticles();
        break;
    case 'connection':
        Router::connectionForm();
        break;
    case 'register':
        Router::registerForm();
        break;
    case 'user-register':
        Router::userRegister();
        break;
    default:
        // todo error
}
