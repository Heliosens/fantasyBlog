<section>
    <article>
        <h2>Profile : <?=$data['user']->getPseudo()?></h2>

        <p>Email : <?=$data['user']->getEmail()?></p>
        <p>Roles : <?php
            $roles = $data['user']->getRoles();
                foreach ($roles as $item){
                    echo $item->getRoleName() . '<br>';
                }
            ?>
        </p>
    </article>
</section>
<?php
