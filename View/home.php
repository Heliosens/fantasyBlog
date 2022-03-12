<section>
    <div>
    <?php
    foreach ($data['articles'] as $article){
        /* @var Article $article */
    ?>
    <article>
        <div id="frame">
            <div id="content">
                <div>
                    <h2><?= $article->getTitle() ?></h2>
                    <p><?= $article->getContent() ?></p>
                </div>
                <div>
                    <img src="/Image/<?= $article->getImage() ?>" alt="">
                </div>
            </div>
            <div>
                <span>par : <?= $article->getAuthor()->getPseudo() ?></span>
            </div>
        </div>

        <div>
            <span>Commentaires</span>
            <textarea name="comment" id="comment" cols="60" rows="3" placeholder="votre commentaire"></textarea>
        </div>

        <div>
            <span></span>
            <p></p>
        </div>
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
