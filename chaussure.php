<?php include_once "header.php" ?>

<img class="bannimg" src="img/bannerchaussures.png">

<div class="container titleindex">
    <h2>BIENVENUE SUR LA PAGE DES CHAUSSURES !</h2>
</div>
<hr>

<div class="container">
    <h3> CHAUSSURES </h3>
    <div class="row list-maillot align-items-center justify-content-between">
        <?php $listShirt = fullArticle(2); ?>
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
    <br>

    <div class="chaussures-descri">
        <h3>Nos Chaussures</h3>
    </div>
    <hr>

    <div class="descri-chaussures">
        <p> Retrouve plus de 2000 chaussures de foot aux prix allant de 12 à 330 euros des plus grandes marques telles Nike, adidas, PUMA New Balance, Mizuno, et ASICS. <br>
            Notre sélection répond à tous les besoins : turf, terrain naturel, terrain gras, terrain synthétique, futsal ou encore foot de rue.<br>
            En plus de cette sélection incroyable, nous sommes le choix numéro 1 pour les collections en édition limitée, telles que les adidas Predator, adidas Nemeziz, Nike Mercurial Vapor ou Superfly, Nike Phantom VNM ou VSN. <br>

            Exclusivités, performance ou style, nous avons tout ce qu'il faut et aux meilleurs prix ! <br>

            Alors rends-toi dès maintenant sur nos catégories Chaussures de foot pour homme et Chaussures de foot pour enfant. <br>
    </div>
</div>

<?php include_once "footer.php" ?>