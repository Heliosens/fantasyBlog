<?php

require __DIR__ . '/../include.php';

$page = isset($_GET['p']) ? Router::clean($_GET['p']) : 'home';

$route = new Router();

switch ($page){

    case 'home':
        Router::displayArticles('all');
        break;
    case 'connection' :
        Router::conectionForm();
    default:
        // todo error
}
