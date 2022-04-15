<section>
    <div id="frame2">
        <div id="title">
            <h2>Profil <?=$data['user']->getPseudo()?></h2>
        </div>
        <div>
            <h2>Utilisateur</h2>
            <!--            current user information          -->
            <div>
                <p>Email : <?=$data['user']->getEmail()?></p>
                <div>
                    <?php
                    if(count($data['user']->getRoles()) > 1){ ?>
                        <span>Rôle administrateur</span>
                        <a href="index.php?p=user&o=user&id=<?=$data['user']->getId()?>">Supprimer ce rôle</a>
                    <?php
                    }
                    else { ?>
                        <span>Rôle utilisateur</span>
                        <a href="index.php?p=user&o=admin&id=<?=$data['user']->getId()?>">ajouter le rôle administrateur</a>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <div>
                <h3>Mes articles</h3>
                <!--            current user articles list          -->
                <div class="frameList">
                    <?php
                    foreach ($data['artId'] as $art){ ?>
                        <div class="flex">
                            <a href="index.php?p=home&o=art&id=<?=$art->getId()?>"><?=$art->getTitle()?></a>
                            <div>
                                <a href="index.php?p=article&o=delete&id=<?=$art->getId()?>">suppr</a>
                                <a href="index.php?p=article&o=update&id=<?=$art->getId()?>">mettre à jour</a>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <div>
                <h3>Mes commentaires</h3>
<!--            current user comment list          -->
                <div class="frameList">
                    <?php
                    foreach ($data['comm'] as $comment){ ?>
                    <div>
                        <div class="flex">
                            <a href="index.php?p=home&o=art&id=<?=$comment->getArticle()->getId()?>">
                                <?=$comment->getArticle()->getTitle()?>
                            </a>
                            <div>
                                <a href="index?p=comment&o=delete&id=<?=$comment->getId()?>">suppr</a>
                                <a href="index?p=comment&o=update&id=<?=$comment->getId()?>">mettre à jour</a>
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
        <div>
            <h2>Administrateur</h2>
            <div class="flex">
                <a class="button" href="index.php?p=article&o=form">Ajouter un article</a>
                <a class="button" href="index.php?p=user&o=list">Liste des utilisateurs</a>
                <a class="button" href="index.php?p=article&o=list">Liste des articles</a>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
</section>
