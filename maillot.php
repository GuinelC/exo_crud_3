<?php include_once "header.php" ?>

<img class="bannimg" src="img/bannermaillot5.png">


<div class="container titleindex">
    <h2>BIENVENUE SUR LA PAGE DES MAILLOTS !</h2>
</div>

<div class="container ">
    <h3> MAILLOTS </h3>
    <div class="row list-maillot align-items-center justify-content-between">
        <?php $listShirt = fullArticle(1); ?>
        <?php foreach ($listShirt as $row) : ?>
            <?php $setImgArticle = setImgArticle($row["article_id"]); ?>
            <div class="col-6 col-md-3">
                <div class="card cardmaillot mx-auto">
                    <img src="img/upload/<?php echo $setImgArticle["img_name"] ?>" class="card img-top" alt="...">
                    <div class="card-body">
                        <div class="card-title-index"><?php echo $row["article_name"] ?></div>
                        <p> <?php echo $row["article_price"] ?>€</p>
                        <a href="article.php?p=<?php echo $setImgArticle["article_id"] ?>" class="btn btn-primary">VOIR ARTICLE</a>
                    </div>
                </div>
            </div>
            <br>
        <?php endforeach ?>
    </div>

    <div class="maillot-descri">
        <h3>Nos Maillots</h3>
    </div>
    <hr>

    <div class="descri-maillot">
        <p>Soutiens ton équipe préférée avec style grâce à notre sélection de tous nouveaux maillots de foot des meilleurs clubs et équipes nationales du monde entier, disponibles en version homme, femme et enfant. <br>
            Nous avons tous les maillots et vêtements officiels domicile, extérieur et troisième tenue des clubs de la Ligue 1. Retrouve également les meilleurs clubs européens.<br>
            Si tu préfères les compétitions internationales, nous avons aussi un large choix de maillots de la nouvelle saison des meilleures équipes nationales, telles que l'Angleterre, la France, l'Allemagne, l'Espagne, l'Italie, les Pays-Bas et le Portugal. Tu seras toujours prêt pour la prochaine grande rencontre...</p>
    </div>


</div>
<?php include_once "footer.php" ?>