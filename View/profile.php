<section>
    <div id="frame">
        <div id="title">
            <h2>Profil <?=$data['user']->getPseudo()?></h2>
        </div>
        <div class="half">
            <h2>Utilisateur</h2>
            <div>
                <p>Email : <?=$data['user']->getEmail()?></p>
                <p>Roles :
                    <?php
                    $roles = $data['user']->getRoles();
                    foreach ($roles as $item){
                        echo '<span>' . $item->getRoleName() . ' </span>';
                    }
                    echo '<pre>';
                    //                            var_dump($data['user']);
                    echo '<br>';
                    //                            var_dump($data['artId']);
                    foreach ($data['artId'] as $article){
//                                var_dump($article->getTitle());
                    }
                    ?>
                </p>
            </div>
            <div>
                <h3>Mes articles</h3>
                <div id="frameList">
                    <?php
                    foreach ($data['artId'] as $art){
                        echo '<p>' . $art->getTitle() . '</p>';
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php
        if($data['admin']){?>
        <div class="half">
            <h2>Administrateur</h2>
            <div>

            </div>
            <div>
                <a id="button" href="index.php?p=article&o=form">Ajouter un article</a>
            </div>
        </div>
            <?php
        }
        ?>
        <a href="index.php">Accueil</a>
    </div>
</section>

<!--
    todo user :
            article list with suppr / update button
            comment list with suppr / update button
    todo admin :
            user list with suppr button / modify role select
            show article with suppr / update button
-->
