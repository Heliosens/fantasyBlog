<!--
    list of user : Pseudo, list of comment
    list of article : title, content, author

    comment to update : author, article title, content
-->
<section>
    <div id="frame2">
        <div id="title">
            <h2>Liste des <?=$data['type']?></h2>
        </div>
        <div class="frameList">
            <?php
            if($data['type'] === 'utilisateurs'){
                foreach ($data['user'] as $item){?>
                    <div class="flex">
                        <a href=""><?=$item->getPseudo()?></a>
                        <div>
                            <a href="index.php?p=user&o=delete&id=<?=$item->getId()?>">suppr</a>
                            <a href="index.php?p=user&o=update&id=<?=$item->getId()?>">mettre à jour</a>
                        </div>
                    </div>
                    <?php
                }
            }
            if($data['type'] === 'articles'){
                foreach ($data['article'] as $item){?>
                    <div class="flex">
                        <a href=""><?=$item->getTitle()?></a>
                        <div>
                            <a href="index.php?p=article&o=delete&id=<?=$item->getId()?>">suppr</a>
                            <a href="index.php?p=article&o=update&id=<?=$item->getId()?>">mettre à jour</a>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</section>
