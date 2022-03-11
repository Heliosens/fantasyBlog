<section>
    <?php
    foreach ($data['articles'] as $article){
        /* @var Article $article */

    ?>
    <div>
        <div id="content">
            <div>
                <div>
                    <h2><?= $article->getTitle() ?></h2>
                    <p><?= $article->getContent() ?></p>
                </div>
                <div>
                    <img src="/Image/<?= $article->getImage() ?>" alt="">
                </div>
            </div>
            <div>
<!--                <span>par : --><?//= $article->getAuthor() ?><!--</span>-->
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
    </div>
    <?php
     }
    ?>
    <aside>
        <div></div>
        <div></div>
        <div></div>
    </aside>
</section>
