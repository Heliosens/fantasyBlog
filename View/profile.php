<section>
    <div id="userProfile">
        <div>
            <h2>Profile : <?=$data['user']->getPseudo()?></h2>

            <p>Email : <?=$data['user']->getEmail()?></p>
            <p>Roles :
                <?php
                $roles = $data['user']->getRoles();
                foreach ($roles as $item){
                    echo '<span>' . $item->getRoleName() . ' </span>';
                }
                ?>
            </p>
        </div>
        <nav>
            <ul><?php
                echo '<pre>';
                var_dump($_SESSION);
                echo '<br>';
                var_dump($data['admin']);
                if($data['admin']){?>
                <li><a href="index.php?p=article&o=form">Ajouter un article</a></li>
                <?php
                }
                ?>
                <li><a href="index.php">Accueil</a></li>
            </ul>
        </nav>
    </div>
    <div>

    </div>

<!--    todo user :
            article list with suppr / update button
            comment list with suppr / update button -->
<!--    todo admin :
            user list with suppr button / modify role select
            show article with suppr / update button -->

</section>
<?php
