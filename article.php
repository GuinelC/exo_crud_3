<?php ob_start(); ?>
<?php include_once "header.php" ?>
<!-- (OB star);mise en tampon - (ob_end_flush(); pour gerer les redirection sur serveur le ligne  -->

<?php
// VARIABLE 
// var_dump($_SESSION["user_id"]);
@$user_id =  @$_SESSION["user_id"];
@$article_id = $_GET["p"]; // Selectionner cette article pour page
@$comment = htmlspecialchars($_POST["comment"]);
@$selectProduct = selectArticleCaddy($user_id, $article_id);
// var_dump($selectProduct);
// die();

// FUNCTION
$setImgArticle = setImgArticle($article_id); // ADD IMG

if (isset($_POST["envoyer"])) {

    $setComUserLog = setComUserLog($comment, $article_id, $user_id);
}

//BTN ADD CARD
if (isset($_POST["ajouter"])) {
    if (isset($_SESSION["user_id"])) { // pour rediriger si user no connect (1)
        if (!$selectProduct) {
            addCart($article_id, $user_id);
        } else {
            $article_quantity = $selectProduct["article_quantity"];
            $article_quantity++; // j'ajoute +1
            updateQuantityArticle($article_quantity, $user_id, $article_id);
        }
    } else {
        header("Location: login.php"); // pour rediriger si user no connect (2)
    }
}
ob_end_flush();
// LISTES
$testcom = comUser($article_id); // LISTE COM PAR uSER
$getArticle = getArticleCatByIdArticle($article_id); // LISTE ARTICLE PAR CAT
?>

<!-- ARTICLE SELECT -->
<div class="container">
    <div class="row article1">

        <div class="img-maillot col-12 col-md-6">
            <img src="img/upload/<?php echo $setImgArticle["img_name"] ?>" class="card img-tooop" alt="...">
        </div>

        <div class="card card-article col-12 col-md-4">
            <div class="card-title"> <?php echo $getArticle["article_name"] ?></div>
            <div class="card-price"> <?php echo $getArticle["article_price"] ?>,00€</div> <br>

            <form action="" method="POST">
                <input type="submit" class="btn btn-info" name="ajouter" value="Ajouter au panier" required>
            </form>
            <br>
            <div class="card-descri1">Description:<br> </div>
            <div class="card-descri2"><?php echo $getArticle["article_descri"] ?> </div>
        </div>
    </div>

    <!-- <input type="text" value="<?php echo $_SESSION["user_name"] ?>"> -->

    <!-- Zone commentaire -->
    <?php if (isset($_SESSION["user_id"])) { ?>

        <div class="commentArea col-12 col-md-12">
            <form action="" method="POST">
                <h4>Vos commentaire:</h4>
                <textarea class="comProduct" name="comment" placeholder="Un avis ?"></textarea>
                <br>
                <input type="submit" class="btn btn-outline-info" value="envoyer" name="envoyer">
            </form>
        </div> <br>

    <?php   }  ?>

    <!-- Zone (si) commentaire  -->
    <?php if ($testcom) { ?>
        <h4> Vos commentaires: </h4>

        <?php foreach ($testcom as $row) { ?>
            <div class="card border-secondary mb-3" style="max-width: 30rem;">
                <div class="card-header"><?php echo $row["user_name"] ?></div>
                <div class="card-body text-secondary">
                    <p class="card-text"><?php echo $row["comment_text"] ?></p>
                </div>
            </div>
        <?php  } ?>
    <?php  } ?>

</div>

<?php include_once "footer.php" ?>