<?php ob_start(); ?> 
<?php include_once "header.php" ?>

<!--------------------- Appel fonction ---------------->
    <?php 
            if (isset($_POST["envoyer"])){ // Si bouton "envoyer" actif (Se Connecter)

             @$mail = htmlspecialchars($_POST["mail"]);
             @$pass = htmlspecialchars($_POST["pass"]);

            @$login = login($mail, $pass);  
            } 
    ?>
    <?php ob_end_flush(); ?>
<!------------------------- // ------------------------>

<div class="container login">
    <form action="" method="POST">

        <div class="">
            <h1>CONNEXION</h1>
        </div>
        <br>

        <div class="form-group formlog">
        <div class="testlabel">Votre Adresse Mail:</div>
            <input type="text" name="mail" placeholder="" class="form-control" id="exampleInputmail"required>
        </div><br>

        <div class="form-group formlog">
        <div class="testlabel">Votre mot de passe:</div>
            <input type="password" name="pass" placeholder="" class="form-control" id="exampleInputPassword1"required>
        </div><br>
        
        <div class="btn-log">
        <button type="submit" value="envoyer" name="envoyer" class="btn log btn-primary">Se Connecter</button> <br> <br>
        <p>Ou</p>
    </form>

    <form action="signin.php">
        <button type="submit" value="inscription" name="inscription" class="btn sign btn-primary">S'inscrire</button>
    </form>
</div>
</div>


<?php include_once "footer.php" ?>
