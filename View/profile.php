<section>
    <div id="frame">
        <div id="title">
            <h2>Profil <?=$data['user']->getPseudo()?></h2>
        </div>
        <div class="half">
            <h2>Utilisateur</h2>
<!--            user information          -->
            <div>
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
            <div>
                <h3>Mes commentaires</h3>
<!--            current user comment list          -->
                <div class="frameList">
                    <?php
                    foreach ($data['comm'] as $comment){ ?>
                        <div>
                            <span><?=$comment->getArticle()->getTitle()?></span> :
                            <div class="flex">
                                <p>"<?=$comment->getContent()?>"</p>
                                <div>
                                    <a href="index?p=comment&o=delete&id=<?=$comment->getId()?>">suppr</a>
                                    <a href="">mettre à jour</a>
                                </div>
                            </div>

                        </div>
                        <?php
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
                <h3>Mes articles</h3>
                <!--            current user articles list          -->
                <div class="frameList">
                    <?php
                    foreach ($data['artId'] as $art){ ?>
                        <div>
                            <a href="index.php?p=home&o= <?=$art->getId()?>"><?=$art->getTitle()?></a>
                            <a href="">suppr</a>
                            <a href="">mettre à jour</a>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <div>
                <a id="button" href="index.php?p=article&o=form">Ajouter un article</a>
                <a id="button" href="index.php?p=list&o=user">Liste des utilisateurs</a>
                <a id="button" href="index.php?p=list&o=article">Liste des articles</a>
            </div>
        </div>
            <?php
        }
        ?>
        <a id="button" href="index.php">Accueil</a>
    </div>
</section>

<!--
  todo  admin :
            user list with suppr button / modify role select
            article with suppr / update button
        user : update comment
-->
