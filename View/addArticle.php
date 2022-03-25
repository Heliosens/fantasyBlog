<section>
    <div id="formFrame">
        <!--    html form add article    -->
        <form action="/index.php?p=article&o=add" method="post" enctype="multipart/form-data">
            <input type="text" name="title" placeholder="Titre">
            <textarea name="content" id="artContent" cols="30" rows="10" placeholder="votre texte"></textarea>
            <input type="file" name="artImage" id="picture" accept=".jpeg, .jpg, .png">
<!--            <input type="text" name="image-name" placeholder="nom de l'image">-->
            <div>
                <input type="submit" name="button">
            </div>
        </form>
        <?php
            echo '<pre>';
            var_dump($_SESSION);
            var_dump($_FILES);
            echo '</pre>';
        ?>
    </div>
</section>



