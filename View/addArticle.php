<section>
    <div id="frame" class="half">
        <?php
        if(isset($data[0])){?>
        <div id="title">
            <h2>Modifier un article</h2>
        </div>
        <div id="frameLogo">
                <form action="/index.php?p=article&o=up&id=<?=$data[0]->getId()?>" method="post" enctype="multipart/form-data">
                    <input type="text" name="title" value="<?=$data[0]->getTitle()?>">
                    <textarea name="content" id="artContent" cols="30" rows="10"><?=$data[0]->getContent()?></textarea>
                    <div>
                        <label for="picture">Choisissez une image</label>
                        <input type="file" name="artImage" id="picture" accept=".jpeg, .jpg, .png">
                    </div>
                    <?php
                    }
                    else { ?>
            <div id="title">
                <h2>Ajouter un article</h2>
            </div>
            <div id="frameLogo">
                <form action="/index.php?p=article&o=add" method="post" enctype="multipart/form-data">
                    <input type="text" name="title" placeholder="Titre">
                    <textarea name="content" id="artContent" cols="30" rows="10" placeholder="votre texte"></textarea>
                    <div>
                        <label for="picture">Choisissez une image</label>
                        <input type="file" name="artImage" id="picture" accept=".jpeg, .jpg, .png">
                    </div>
                    <?php
                }
                ?>
                <div>
                    <input type="submit" name="button">
                </div>
            </form>
        </div>
    </div>
</section>
