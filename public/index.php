<?php
session_start();
require __DIR__ . '/../include.php';

$page = isset($_GET['p']) ? Router::clean($_GET['p']) : 'home';
$action = isset($_GET['a']) ? Router::clean($_GET['a']) : null;
$param = isset($_GET['f']) ? Router::clean($_GET['f']) : null;

$route = new Router();

switch ($page){
    case 'home':
        Router::displayArticles();
        break;
    case 'form':
        Router::formRoute();
        break;
    case 'user-disconnect':

        break;
    default:
        // todo error
}
