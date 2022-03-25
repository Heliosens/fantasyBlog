<?php

require __DIR__ . '/DB.php';

require __DIR__ . '/Model/Entity/Article.php';
require __DIR__ . '/Model/Entity/Comment.php';
require __DIR__ . '/Model/Entity/Role.php';
require __DIR__ . '/Model/Entity/User.php';

require __DIR__ . '/Routing/Router.php';

require __DIR__ . '/Controller/Controller.php';
require __DIR__ . '/Controller/HomeController.php';
require __DIR__ . '/Controller/ArticleController.php';
require __DIR__ . '/Controller/FormController.php';
require __DIR__ . '/Controller/UserController.php';
require __DIR__ . '/Controller/CommentController.php';

require __DIR__ . '/Model/Manager/RolesManager.php';
require __DIR__ . '/Model/Manager/UserManager.php';
require __DIR__ . '/Model/Manager/ArticleManager.php';
require __DIR__ . '/Model/Manager/CommentManager.php';

