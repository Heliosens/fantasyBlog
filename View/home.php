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
            <div>
                <span>par : <?= $item['article']->getAuthor()->getPseudo() ?></span>
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
                        <?php
                            if(Controller::isAdmin() || $_SESSION['user'] === $comment->getAuthor()->getPseudo() ){?>
                                <a href="index?p=comment&o=delete&id= <?=$comment->getId()?> ">suppr</a>
                        <?php
                            }
                        ?>
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
