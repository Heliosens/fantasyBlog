<section  class="col">
    <?php
    foreach ($data as $item) {
    ?>
    <article>
        <div id="frameArt">
            <div id="content">
                <div>
                    <h2><?= $item['article']->getTitle() ?></h2>
                    <p><?= $item['article']->getContent() ?></p>
                </div>
                <div>
                    <img src="/upload/<?= $item['article']->getImage() ?>" alt="article illustration">

                </div>
            </div>
            <div class="flex">
                <span>par : <?= $item['article']->getAuthor()->getPseudo() ?></span>
                <?php
                if(isset($_SESSION['user']) && in_array('admin', $_SESSION['roles']) ||
                    isset($_SESSION['user']) && $_SESSION['user'] === $item['article']->getAuthor()->getPseudo()){
                    ?>
                <div>
                    <a class='button' href="index.php?p=article&o=update&id=<?=$item['article']->getId()?>">modifier</a>
                    <a class='button' href="index.php?p=article&o=delete&id=<?=$item['article']->getId()?>">supprimer</a>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
        <div id="frameCom">
            <?php
            if(isset($_SESSION['user'])) {
            ?><div>
                <span>Laissez un commentaire :</span>
                <form action="/index.php?p=comment&o=add" method="post">
                    <textarea name="comment" id="comment" cols="60" rows="3" placeholder="votre commentaire"></textarea>
                    <input type="hidden" name="artNbr" value="<?= $item['article']->getId() ?>">
                    <div>
                        <input type="submit" name="button">
                    </div>
                </form>
            </div>
            <div>
                <span>Commentaires :</span>
                <?php
                foreach ($item['comm'] as $comment){
                    ?>
                    <div id="userCom">
                        <span><?=$comment->getAuthor()->getPseudo()?> :</span>
                        <p><?=$comment->getContent()?></p>

                        <div>
                            <?php
                            if(Controller::isAdmin() && $_SESSION['user'] !== $comment->getAuthor()->getPseudo()){?>
                            <a href="index?p=comment&o=delete&id= <?=$comment->getId()?> ">supprimer</a>
                            <?php
                            }
                            if($_SESSION['user'] === $comment->getAuthor()->getPseudo() ){?>
                                <a href="index?p=comment&o=delete&id= <?=$comment->getId()?> ">supprimer</a>
                                <a href="index?p=comment&o=update&id= <?=$comment->getId()?> ">modifier</a>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                }
            ?></div><?php
            }
            ?>
        </div>
        <div id="separator">
            <img src="/Image/wave.png" alt="">
        </div>
    </article>
    <?php
     }
    ?>
</section>
