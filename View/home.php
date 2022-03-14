<section>
    <div>
    <?php
    foreach ($data as $item) {
    ?>
    <article>
        <div id="frame">
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
        <div>
            <span>Laissez un commentaire :</span>
            <textarea name="comment" id="comment" cols="60" rows="3" placeholder="votre commentaire"></textarea>
        </div>
        <span>Commentaires :</span>
        <?php
        foreach ($item['comm'] as $comment){
        ?>
        <div id="userCom">
            <span><?=$comment->getAuthor()->getPseudo()?></span>
            <p><?=$comment->getContent()?></p>
        </div>
        <?php
        }
        ?>
    </article>

    <?php
     }
    ?>
    </div>
    <aside>
        <div></div>
        <div></div>
        <div></div>
    </aside>
</section>
