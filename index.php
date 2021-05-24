<?php include_once "header.php" ?>


<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="./img/om1992.png" class="d-block w-100 " alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Découvrir notre gamme Maillots de foot </h5>
                <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="./img/shoesrose.png" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Découvrir notre gamme Chaussures de foot</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="./img/balloncarou1.png" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Découvrir notre gamme de ballons de foot</h5>
                <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<br>

<div class="container">
    <h2 class="titleindex">BIENVENUE SUR LA BOUTIQUE 100% FOOT !</h2>
</div>

<div class="container logoindextop">
    <img class="bigfcindex" src="img/footcampbigblack.png">
</div>



<!-- <div class="container titleindex">
<img class="logofoot" src="img/littlefcwhite.png"> 
    <h2>BIENVENUE SUR LA BOUTIQUE 100% FOOT !</h2>
</div>
<hr> -->

<div class="container maillot">
    <h3> MAILLOTS </h3>
    <div class="row align-items-center justify-content-between">
        <?php $listShirt = listArticle(1); ?>
        <?php foreach ($listShirt as $row) : ?>
            <?php $setImgArticle = setImgArticle($row["article_id"]); ?>

            <div class="card_gen col-10 col-md-2 mx-auto">
                <div class="card">
                    <img src="img/upload/<?php echo $setImgArticle["img_name"] ?>" class="card img-top" alt="...">
                    <div class="card-body">
                        <h6 class="card-title-index"><?php echo $row["article_name"] ?></h6>
                        <p class="card-text"> <?php echo $row["article_price"] ?>€</p>
                        <a href="article.php?p=<?php echo $row["article_id"] ?>" class="btn btn-primary">VOIR ARTICLE</a>
                    </div>
                </div>
            </div>
            <br>
        <?php endforeach ?>

        <div class="col-xs-12 col-md-5 banniere">
            <div class="testban">
                <a href="maillot.php">
                    <img class="bannimg" alt="maillot" src="img/bannermaillot.png">
                </a>
            </div>
        </div>
    </div>
</div>
<br>

<div class="container chaussures">
    <h3> CHAUSSURES </h3>
    <div class="row align-items-center justify-content-between">
        <?php $listShirt = listArticle(2); ?>
        <?php foreach ($listShirt as $row) : ?>
            <?php $setImgArticle = setImgArticle($row["article_id"]); ?>

            <div class="card_gen col-10 col-md-2 mx-auto">
                <div class="card">
                    <img src="img/upload/<?php echo $setImgArticle["img_name"] ?>" class="card img-top" alt="...">
                    <div class="card-body">
                        <h6 class="card-title-index"><?php echo $row["article_name"] ?></h6>
                        <p class="card-text"> <?php echo $row["article_price"] ?>€</p>
                        <a href="article.php?p=<?php echo $row["article_id"] ?>" class="btn btn-primary">VOIR ARTICLE</a>
                    </div>
                </div>
            </div>
            <br>
        <?php endforeach ?>

        <div class="col-xs-12 col-md-5 banniere">
            <div class="testban">
                <a href="chaussure.php">
                    <img class="bannimg" alt="Chaussures" src="img/chaussuresindex.png">
                </a>
            </div>
        </div>

    </div>
</div>
<br>


<div class="container ballons">
    <h3> BALLONS </h3>
    <div class="row align-items-center justify-content-between">
        <?php $listShirt = listArticle(3); ?>
        <?php foreach ($listShirt as $row) : ?>
            <?php $setImgArticle = setImgArticle($row["article_id"]); ?>

            <div class="card_gen col-10 col-md-2 mx-auto">
                <div class="card">
                    <img src="img/upload/<?php echo $setImgArticle["img_name"] ?>" class="card img-top" alt="...">
                    <div class="card-body">
                        <h6 class="card-title-index"><?php echo $row["article_name"] ?></h6>
                        <p class="card-text"> <?php echo $row["article_price"] ?>€</p>
                        <a href="article.php?p=<?php echo $row["article_id"] ?>" class="btn btn-primary">VOIR ARTICLE</a>
                    </div>
                </div>
            </div>
            <br>
        <?php endforeach ?>
        <div class="col-xs-12 col-md-5 banniere">
            <div class="testban">
                <a href="ballon.php">
                    <img class="bannimg" alt="ballon" src="img/ball.png">
                </a>
            </div>
        </div>

    </div>
</div>
<br>
<br>

<div class="container bas">
    <h1>La plus grande boutique de foot en ligne... </h1>

    <p>Que tu sois à la cherche de chaussures de foot, de vêtements ou d'accessoires, ou que tu souhaites compléter ton look avec des baskets, des vêtements tendance, Pro:Direct a les meilleurs articles des meilleures marques. <br>
        Nous offrons tout ce dont tu as besoin pour améliorer ton jeu, et battre ton adversaire. Dans notre département Football, tu trouveras les meilleures et les toutes dernières chaussures de football de marques telles que Nike, adidas, PUMA et bien d'autres encore. Nous avons également tout ce dont tu auras besoin lors de l'entraînement et pour les jours de match avec des vêtements d'entraînement et les équipements club de toutes les tailles.
    </p>


</div>

<?php include_once "footer.php" ?>