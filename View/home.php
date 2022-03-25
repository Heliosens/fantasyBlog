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
            <?php
            if(isset($_SESSION['user'])) {
            ?><div>
                <span>Laissez un commentaire :</span>
                <form action="/index?p=comment&o=add" method="post">
                    <textarea name="comment" id="comment" cols="60" rows="3" placeholder="votre commentaire"></textarea>
                    <div id="hidden">
                        <input type="text" name="artNbr" value="<?= $item['article']->getId() ?>">
                    </div>
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
                    </div>
                    <?php
                }
            ?></div>
                <?php
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
