<?php
session_start();
require __DIR__ . '/../include.php';

$page = isset($_GET['p']) ? Router::clean($_GET['p']) : 'home';

$route = new Router();

switch ($page){
    case 'disconnect':
    case 'home':
        Router::homeCtrl($page);
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
    case 'add-article':
        Router::artCtrl($page);
        break;
    default:
        // todo error
}
