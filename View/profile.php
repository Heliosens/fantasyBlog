<section>
    <div id="userProfile">
        <div>
            <h2>Profile : <?=$data['user']->getPseudo()?></h2>

            <p>Email : <?=$data['user']->getEmail()?></p>
            <p>Roles : <?php
                $roles = $data['user']->getRoles();
                foreach ($roles as $item){
                    echo $item->getRoleName() . '<br>';
                }
                ?>
            </p>
        </div>
        <a href="index.php">Accueil</a>
    </div>

<!--    todo user :
            own article list with suppr / update button
            commented article list with suppr / update button -->
<!--    todo admin :
            user list with suppr button / modify role select
            show article with suppr / update button -->

</section>
<?php
