<?php

foreach ($data as $item){?>
    <section>
        <div id="frame" class="half">
            <div id="title">
                <h2>Modifier un commentaire</h2>
            </div>

            <div id="frameLogo">
                <div>
                    <span>Titre de l'article : <?=$item->getArticle()->getTitle()?></span>
                </div>
                <form action="/index.php?p=comment&o=up&id=<?=$item->getId()?>" method="post">
                    <textarea name="content" id="artContent" cols="30" rows="10"><?=$item->getContent()?></textarea>
                    <div>
                        <input type="submit" name="saveUp">
                    </div>
                </form>
            </div>
    </section>
    <?php
}
?>

