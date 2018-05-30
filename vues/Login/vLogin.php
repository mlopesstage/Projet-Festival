<html>
    <head>
        <meta charset="utf-8" />
        <link href="css/cssLogin.css" rel="stylesheet" type="text/css">
        <title>Formulaire d'identification</title>
    </head>

    <div id="form-main">
        <div id="form-div">
            <form class="form" id="blocLogin" action="cLogin.php" method="post">

                <h1>Festival</h1>
                <p class="name">
                    <input name="login" type="text" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input" placeholder="Nom" id="name" />
                </p>

                <p class="password">
                    <input name="pwd" type="password" class="validate[required,custom[email]] feedback-input" id="password" placeholder="Mot de passe" />
                </p>

                <div class="submit">
                    <input type="submit" value="Connexion" class="sign-up-button"/>
                    <div class="ease"></div>
                </div>

                <div class="submit">
                    <input type="reset" value="Annuler" class="sign-up-button"/>
                    <div class="ease"></div>
                </div>
            </form>
        </div>
    </div>
</html>