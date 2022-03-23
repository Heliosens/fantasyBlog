<section>
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
                    <img src="/Image/<?= $item['article']->getImage() ?>" alt="">
                </div>
            </div>
            <div>
                <span>par : <?= $item['article']->getAuthor()->getPseudo() ?></span>
            </div>
        </div>
        <div id="frameCom">
            <div>
                <span>Laissez un commentaire :</span>
                <form action="" method="post">
                    <textarea name="comment" id="comment" cols="60" rows="3" placeholder="votre commentaire"></textarea>
                    <div>
                        <input type="submit" name="envoyer">
                    </div>
                </form>
            </div>
            <?php
                if(isset($_SESSION['user'])) {
                    ?>
                    <div>
                        <span>Commentaires :</span>
                        <?php
                        foreach ($item['comm'] as $comment){
                            ?>
                            <div id="userCom">
                                <div>
                                    <span><?=$comment->getAuthor()->getPseudo()?></span>
                                    <p><?=$comment->getContent()?></p>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                <?php
                }
            ?>
        </div>
        <div id="separator">
            <img id="wave" src="/Image/wave.png" alt="">
        </div>
    </article>
    <?php
     }
    ?>
</section>
