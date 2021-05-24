<?php include_once "header_admin.php"; ?>

<?php
// variable pour choix de mon article (cat2)
$category_id = @$_POST["category_id"];
$article_id = @$_POST["article_id"];
$comment_id = @$_POST["comment_id"];

//--------------------- Appel fonction ---------------->

if (isset($_POST["autoriser"])) {
    autoriserCom($comment_id);
}

if (isset($_POST["effacer"])) {
    effacerCom($comment_id);
}
// je prend ma list de caté... (cat1)
$listCat = listCat();

// je choisi mon article (cat2)
$articleByIdCat = articleByIdCat($category_id);

$getCom = getCom($article_id);

?>
<!--------------------- Appel fonction ---------------->

<div class="container">
    <h1>Gestion Messages</h1>

    <!-- Menu catégories 1 -->
    <form action="#" method="POST">
        Veuillez choisir votre 1er catégorie:
        <select class="form-control" name="category_id" onChange="submit()" id="" required>
            <option value=""> Choix categories </option>

            <!-- choisir dans ma liste mes catégorie as row = une par ligne -->
            <?php foreach ($listCat as $row) { ?>
                <!-- ex: je choisi (ballons) donc category_id = 3 -->
                <option value="<?php echo $row["category_id"] ?>" <?php if (@$_POST["category_id"] == $row["category_id"]) {
                                                                        echo "selected";
                                                                    } ?>>
                    <!-- donc si je selectionne une catégorie, il me considère comme selected -->
                    <?php echo $row["category_name"] ?>
                </option>
                <!-- seulement a ce moment il me sort mon name ! -->
            <?php } ?>
        </select>

        <!-- Menu catégorie par Selection 2 -->
        Veuillez choisir votre article:
        <select class="form-control" name="article_id" onChange="submit()" id="">
            <option value="" selected> Choix Articles </option>

            <?php foreach ($articleByIdCat as $row) { ?>
                <option value="<?php echo $row["article_id"] ?>" <?php if (@$_POST["article_id"] == $row["article_id"]) {
                                                                        echo "selected";
                                                                    } ?>>
                    <?php echo $row["article_name"] ?></option>
            <?php } ?>
        </select>
    </form>

     <br>
    <h3>Gestionnaire de commentaires</h3>
    <hr>
    <!-- Messages USER -->
    <?php foreach ($getCom as $row) { ?>
        <div class="card text-white bg-secondary mb-3" style="max-width: 40rem;">
            <div class="card-header headhaut"><?php echo $row["user_name"] ?></div>
            <div class="card-body">
                <p class="card-text"><?php echo $row["comment_text"] ?></p> <!-- recup le message -->
                <form action="" method="POST">
                    <input class="btn btn-success" type="submit" name="autoriser" value="OK">

                    <input class="btn btn-danger" type="submit" name="effacer" value="effacer">

                    <input type="hidden" name="comment_id" value="<?php echo $row["comment_id"] ?>">
                </form>
            </div>
        </div>
    <?php } ?>

</div>


<?php include_once "footer_admin.php"; ?>