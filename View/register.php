<section>
    <div id="frame" class="half">
        <div id="title">
            <h2>Inscription</h2>
        </div>
        <div id="frameLogo">
            <img src="/Image/choipeau.png" alt="hat logo">
            <form action="index.php?p=user-register" method="post">
                <input type="text" name="pseudo" id="pseudo" placeholder="Pseudo">

                <input type="email" id="email" name="email" placeholder="Email">
                <span>Mot de passe :</span>
                <p>(min 8 car., minuscules, majuscules, car. spéciaux : !+@#$%^&*-)</p>
                <input type="password" name="password" id="password">
                <!--    password repeat   -->
                <input type="password" name="password-bis" id="password-bis" placeholder="vérification du mot de passe">
                <div>
                    <input type="submit" name="button">
                </div>
            </form>
        </div>
    </div>
</section>