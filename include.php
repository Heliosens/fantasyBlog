<?php

require __DIR__ . '/ConnPDO.php';

require __DIR__ . '/Model/Entity/Article.php';
require __DIR__ . '/Model/Entity/Comment.php';
require __DIR__ . '/Model/Entity/Role.php';
require __DIR__ . '/Model/Entity/User.php';

require __DIR__ . '/Routing/Router.php';

require __DIR__ . '/Controller/Controller.php';

$pdo = new ConnPDO();
$db = $pdo->conn();
