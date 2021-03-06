<?php
session_start();

require __DIR__ . '/../include.php';

$param = isset($_GET['p']) ? Router::clean($_GET['p']) : 'home';
$option = isset($_GET['o']) ? Router::clean($_GET['o']) : null;
$id = isset($_GET['id']) ? Router::clean($_GET['id']) : null;

switch ($param){
    case 'home':
        Router::homeCtrl($option, $id);
        break;
    case 'form':
        Router::formCtrl('form', $option);
        break;
    case 'action':
        Router::formCtrl($option);
        break;
    case 'article':
        Router::artCtrl($option, $id);
        break;
    case 'comment':
        Router::comCrtl($option, $id);
        break;
    case 'user':
        Router::userCtrl($option, $id);
        break;
}
