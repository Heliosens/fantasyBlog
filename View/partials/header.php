<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/style.css">
    <title>Fantasy Blog</title>
</head>
<body>
    <header>
        <h1><a href="/index.php?p=home">Créatures fantastiques</a></h1>
        <div id="menu">
            <?php
            if(isset($_SESSION['user'])){
                ?>
                <a href="/index.php?p=form&a=disconnect">Déconnexion</a>
            <?php
            }
            else {
                ?>
                <a href="/index.php?p=form&a=connectionForm">Connexion</a>
                <a href="/index.php?p=form&a=registerForm">Inscription</a>
            <?php
            }
            ?>
        </div>
            <?php
            if(isset($_SESSION['error'])){?>
            <div id="error">
            <?php
                var_dump($_SESSION);
                foreach ($_SESSION['error'] as $ans){
                    echo $ans;
                }
                ?>
            </div><?php
            } ?>
    </header>
