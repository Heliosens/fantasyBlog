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
                        <a href="index.php?p=user&o=profile&id=<?=$item->getId()?>"><?=$item->getPseudo()?></a>
                        <?php
                        if(count($item->getRoles()) > 1){ ?>
                        <span>administrateur</span>
                        <?php
                        }
                        else { ?>
                            <span>utilisateur</span>
                            <?php
                        }
                        ?>
                        <a href="index.php?p=user&o=delete&id=<?=$item->getId()?>">suppr</a>
                    </div>
                    <?php
                }
            }
            if($data['type'] === 'articles'){
                foreach ($data['article'] as $item){?>
                    <div class="flex">
                        <a href="index.php?p=home&o=art&id=<?=$item->getId()?>"><?=$item->getTitle()?></a>
                        <span>par <?=$item->getAuthor()->getPseudo()?></span>
                        <a href="index.php?p=article&o=delete&id=<?=$item->getId()?>">suppr</a>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</section>
