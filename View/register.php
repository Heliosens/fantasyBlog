<section>
    <div id="formFrame">
        <div id="title">
            <h2>Inscription</h2>
        </div>
        <div id="frameLogo">
            <img src="/Image/choipeau.png" alt="hat logo">
            <form action="index.php?p=user-register" method="post">
                <label for="pseudo">Pseudo</label>
                <input type="text" name="pseudo" id="pseudo">

                <label for="email">Email</label>
                <input type="email" id="email" name="email">

                <label for="password" id="password">Mot de passe</label>
                <input type="password" name="password" id="password">
                <!--    password repeat   -->
                <label for="password-bis" id="password-bis">Mot de passe</label>
                <input type="password" name="password-bis" id="password-bis">
                <div>
                    <input type="submit" name="button">
                </div>
            </form>
        </div>
    </div>
</section>