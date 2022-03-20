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
                var_dump($_SESSION);?>
                <a href="/index.php?p=disconnection">Déconnexion</a>
            <?php
            }
            else {
                ?>
                <a href="/index.php?p=connection">Connexion</a>
                <a href="/index.php?p=register">Inscription</a>
            <?php
            }
            ?>
        </div>
    </header>
