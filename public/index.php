<?php
session_start();

require __DIR__ . '/../include.php';

$page = isset($_GET['p']) ? Router::clean($_GET['p']) : 'home';
$option = isset($_GET['o']) ? Router::clean($_GET['o']) : null;
$id = isset($_GET['id']) ? Router::clean($_GET['id']) : null;

$route = new Router();

switch ($page){
    case 'disconnect':
    case 'home':
        Router::homeCtrl($page, $option);
        break;
    case 'register':
    case 'connection':
        Router::formCtrl('display', $page);
        break;
    case 'user-register':
        Router::formCtrl('register');
        break;
    case 'user-connection':
        Router::formCtrl('connection');
        break;
    case 'profile':
        Router::userCtrl($page);
        break;
    case 'article':
        Router::artCtrl($option);
        break;
    case 'comment':
        Router::comCrtl($option, $id);
        break;
    case 'list':
        Router::userCtrl($page, $option);
        break;
    default:
        // todo error
}
