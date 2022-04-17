<section>
    <div id="frame2">
        <div id="title">
            <h2>Profil <?=$data['user']->getPseudo()?></h2>
        </div>

        <div>
            <h2>Utilisateur</h2>
            <!--            current user information          -->
            
            <div class="flex">
                <span>Email : <?=$data['user']->getEmail()?></span>
            </div>
            <div>
                <div class="flex">
                    <span>Rôle :
                <?php
                //  display role of user profile displayed
                echo count($data['user']->getRoles()) > 1 ? 'administrateur</span>' : 'Rôle utilisateur</span>';
                // check if role of current user is admin
                if((in_array('admin', $_SESSION['roles']))){
                    if(count($data['user']->getRoles()) > 1 ){ ?>
                        <a href="index.php?p=user&o=user&id=<?=$data['user']->getId()?>">Supprimer ce rôle</a>
                        <?php
                    }
                    else { ?>
                        <a href="index.php?p=user&o=admin&id=<?=$data['user']->getId()?>"> Définir comme administrateur</a>
                        <?php
                    }
                }
                ?>
                </div>
            </div>
            <?php
            if(count($data['artId']) > 0){ ?>
                <div>
                    <h3>Articles</h3>
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
            <?php
            }
            if(count($data['comm']) > 0){ ?>
            <div>
                <h3>Commentaires</h3>
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
            <?php
              }
            ?>
        </div>
        <div>
            <?php
            if((in_array('admin', $_SESSION['roles']))){ ?>
                <div>
                    <h2>Administrateur</h2>
                    <div class="flex">
                        <a class="button" href="index.php?p=article&o=form">Ajouter un article</a>
                        <a class="button" href="index.php?p=user&o=list">Liste des utilisateurs</a>
                        <a class="button" href="index.php?p=article&o=list">Liste des articles</a>
                        <a class="button" href="index.php?p=user&o=delete&id=<?=$data['user']->getId()?>">supprimer cet utilisateur</a>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</section>
