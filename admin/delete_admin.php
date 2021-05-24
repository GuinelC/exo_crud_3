<?php include_once "header_admin.php"; ?>

<!--------------------- Appel fonction ---------------->
<?php
// choix id cat (cat1)
@$category_id = @$_POST["category_id"];
// choix (cat2)
$listCat = [];
$listCat = listCat();

// choix id cat (cat2)
$articleByIdCat = articleByIdCat($category_id);

// SUPP ARTICLE
    if(isset($_POST["effacer"])){
    $article_id = $_POST["article_id"];
    deleteArticle($article_id);
    unset($_POST);
    }
?>
<!------------------------- // ------------------------>

<div class="container">
    <h2>ADMIN: DELETE Article </h2>

    <!-- Menu catégories 1 -->
    <form action="#" method="POST">
        Veuillez choisir votre 1er catégorie:
        <select class="form-control" name="category_id" onChange="submit()" id="" required>
            <option value=""> Choix categories </option>

            <?php foreach ($listCat as $row) { ?>
                <option value="<?php echo $row["category_id"] ?>" 
                <?php if (@$_POST["category_id"] == $row["category_id"]) {echo "selected";} ?>>
                    <?php echo $row["category_name"] ?></option>
            <?php } ?>
        </select>
    </form>

    <!-- Menu catégorie par Selection 2 -->
    <form action="#" method="POST" enctype="multipart/form-data">

        <input type="hidden" name="category_id" value="<?= @$_POST["category_id"] ?>">

        Veuillez choisir votre article: <select class="form-control" name="article_id" onChange="submit()" id="">
            <option value="" selected> Choix categories </option>

            <?php foreach ($articleByIdCat as $row) { ?>
                <option value="<?php echo $row["article_id"] ?>" 
                <?php if (@$_POST["article_id"] == $row["article_id"]) {echo "selected";} ?>>
                    <?php echo $row["article_name"] ?></option>
            <?php } ?>
        </select>
        <br>

        <!-- DELETE -->
        <button type="submit" name="effacer" value="effacer" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> DELETE</button>
        <!-- <input type="hidden" name="article_id" value="<?php echo $row["article_id"] ?>"> -->
    </form>


    <?php include_once "footer_admin.php"; ?>