<?php include_once "header.php" ?>

<img class="bannimg" src="img/bannerballonfoot.jpg">

<div class="container titleindex">
    <h2>BIENVENUE SUR LA PAGE DES BALLONS !</h2>
</div>
<hr>

<div class="container">
    <h3> BALLONS </h3>
    <div class="row list-maillot align-items-center justify-content-between">
        <?php $listShirt = fullArticle(3); ?>
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

    <div class="ballons-descri">
        <h3>Nos Ballons</h3>
    </div>
    <hr>

    <div class="descri-ballons">
        <p>Tout passionné de football se doit d’avoir au moins un ballon de football en sa possession. Que ce soit pour jouer au football dans son jardin, avec ses potes dans la rue ou encore sur des vrais terrains de football et en salle. Nous te proposons de retrouver dans cette catégorie tous les ballons de foot possibles et imaginables pour ton plus grand bonheur. Toutes les marques, toutes les tailles, tous les types et toutes les couleurs de ballon.</p>
    </div>

</div>
<?php include_once "footer.php" ?>