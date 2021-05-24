<?php ob_start(); ?>
<?php include_once "header.php" ?>

<?php
// VARIABLE
@$user_id =  @$_SESSION["user_id"]; // recup user
$total = 0;
@$article_id = @$_POST["article_id"];
@$selectProduct = selectArticleCaddy($user_id, $article_id);
$setImgArticle = setImgArticle($article_id);
// FONCTION

if (isset($_POST["plus"])) {
    $article_quantity = $selectProduct["article_quantity"];
    $article_quantity++; // j'ajoute +1
    updateQuantityArticle($article_quantity, $user_id, $article_id);
    header('Location: cart.php');
}
if (isset($_POST["moins"])) {
    $article_quantity = $selectProduct["article_quantity"];
    $article_quantity--; // je supp -1
    if ($article_quantity == 0) {
        suppcaddy($article_id);
        header('Location: cart.php');
    } else {
        updateQuantityArticle($article_quantity, $user_id, $article_id);
        header('Location: cart.php');
    }
}
if (isset($_POST["supp"])) {
    suppcaddy($article_id);
}
@$listcaddy = listcaddy($user_id);   // recup list commande
@$totalcaddy = totalcaddy($listcaddy, $total);
ob_end_flush();
?>

<br>
<div class="container">
    <h2>MON PANIER</h2>
    <hr>
    <div class="row">
        <table class="table fulltab col-12 col-md-9">
            <thead class="thead-dark">
                <tr>
                    <th class="angleG" scope="col">PRODUCT</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">PRICE</th>
                    <th class="angleD ml-auto" scope="col">TOTAL</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listcaddy as $row) : ?>
                    <?php $setImgArticle = setImgArticle($row["article_id"]); ?>
                    <form action="" method="POST">
                        <input type="hidden" value="<?php echo $row["article_id"] ?>" name="article_id">
                        <tr>
                            <td>
                                <div class="row align-items-center colimmgnam">
                                    <div><img src="img/upload/<?php echo $setImgArticle["img_name"] ?>" class="card img-caddy" alt="..."> </div>
                                    <div class="ml-2 name-caddy"><?php echo $row["article_name"] ?></div>
                                </div>
                            </td>

                            <td class="align-middle  colquantite"><button type="submit" name="moins" value="moins" class="btn btn-secondary btn-sm"><i class="fas fa-minus"></i></button>
                                <?php echo $row["article_quantity"] ?>
                                <button type="submit" name="plus" value="plus" class="btn btn-secondary btn-sm"> <i class="fas fa-plus"></i></button>

                            <td class="align-middle"><?php echo $row["article_price"] ?>€</td>

                            <td class="align-middle text-right colsupp"><?php echo $row["article_quantity"] * $row["article_price"] ?>€
                                <button type="submit" name="supp" value="supp" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>

                        </tr>
                    </form>
                <?php endforeach ?>
            </tbody>
        </table>

        <div class="col-12 col-md-3">
            <div class="container contotal">
                <div class="card">
                    <h3 class="card-header">SOUS-TOTAL</h3>
                    <div class="card-body">
                        <h6>PRIX DU PANIER:</h6>
                        <h2><?php echo "$totalcaddy" ?>€</h2>
                        <hr>
                        <div class="btn-paiement">
                            <!-- <button type="button" class="btn btn-success btn-lg">PAIEMENT</button> -->
                            <?php include_once "formPaypal.php" ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include_once "footer.php" ?>