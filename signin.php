<?php include_once "header.php" ?>

<!--------------------- Appel fonction ---------------->
<?php
if (isset($_POST["inscription"])) { // Si bouton "envoyer" actif (S'INSCRIRE)

    @$name = htmlspecialchars($_POST["name"]); // recup par rapport a mon form dans (name)
    @$mail = htmlspecialchars($_POST["mail"]);
    @$pass = htmlspecialchars($_POST["pass"]);

    @$addUser = addUser($name, $mail, $pass);
}
?>
<!------------------------- // ------------------------>

<div class="container login">
    <form action="" method="POST">

        <div class="">
            <h1>INSCRIPTION</h1>
        </div>
        <br>

        <div class="form-group formlog">
            <div class="testlabel">Votre Nom</div>
            <input type="text" name="name" placeholder="Votre nom" class="form-control" id="exampleInputPassword1" required>
        </div><br>

        <div class="form-group formlog">
            <div class="testlabel">Votre Adresse Mail:</div>
            <input type="text" name="mail" placeholder="Email" class="form-control" id="exampleInputPassword1" required>
        </div><br>

        <div class="form-group formlog">
            <div class="testlabel">Votre mot de passe:</div>
            <input type="password" name="pass" placeholder="Mot de passe" class="form-control" id="exampleInputPassword1" required>
        </div><br>

        <div class="checkbox">
            <label for="checkbox">
                <p>J'accepte la <a href="charte.php">Politique de confidentialité</a> </p>
                <input type="checkbox" value="false" id="check" name="checkbox" aria-checked="false" required>
            </label>
        </div>

        <button type="submit" value="inscription" name="inscription" class="btn sign btn-primary">S'inscrire</button>

    </form>
</div>



<?php include_once "footer.php" ?>