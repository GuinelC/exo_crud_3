<?php include_once "header_admin.php"; ?>

<!--------------------- Appel fonction ---------------->
<?php
// choix id cat (cat1)
@$category_id = @$_POST["category_id"];
// choix (cat1)
$listCat = [];
$listCat = listCat();
///////////////////////////////////////////

// choix id cat (cat2)
$articleByIdCat = articleByIdCat($category_id);
//choix id (cat2)
//////////////////////////////////////////

// TITRE
// nom du select
$article_id = @$_POST["article_id"];
// select l'article en question 1 seul 
$articleById = articleId($article_id);

// ADD ARTICLE : xss = htmlspecial....
@$article_name = htmlspecialchars($_POST["article_name"]);
@$article_descri = htmlspecialchars($_POST["article_descri"]);
@$article_stock =  htmlspecialchars($_POST["article_stock"]);
@$article_price =  htmlspecialchars($_POST["article_price"]);

// btn modifier
if (@$_POST["modifier"]) {
    updateArticle($category_id, $article_name, $article_price, $article_stock, $article_descri, $articleId);
    unset($_POST); // supp post auto
}

?>
<!------------------------- // ------------------------>

<div class="container">
    <h2>ADMIN: Modifier Article </h2>

    <!-- Menu catégories 1 -->
    <form action="" method="POST">
        Veuillez choisir votre 1er catégorie:
        <select class="form-control" name="category_id" onChange="submit()" id="" required>
            <option value=""> Choix categories </option>

            <?php foreach ($listCat as $row) { ?>
                <option value="<?php echo $row["category_id"] ?>" <?php if (@$_POST["category_id"] == $row["category_id"]) {
                                                                        echo "selected";
                                                                    } ?>>
                    <?php echo $row["category_name"] ?></option>
            <?php } ?>
        </select>

        <!-- Menu catégorie par Selection 2 -->
        Veuillez choisir votre article: <select class="form-control" name="article_id" onChange="submit()" id="">
            <option value="" selected> Choix categories </option>

            <?php foreach ($articleByIdCat as $row) { ?>
                <option value="<?php echo $row["article_id"] ?>" <?php if (@$_POST["article_id"] == $row["article_id"]) {
                                                                        echo "selected";
                                                                    } ?>>
                    <?php echo $row["article_name"] ?></option>
            <?php } ?>
        </select>
    </form>

    <form action="" method="POST">
        <!-- INPUT TITRE -->
        Votre Titre:
        <input type="text" class="form-control ds-input" value="<?php echo @$articleById["article_name"] ?>" name="article_name" placeholder=""> <br>

        <!-- INPUT price -->
        Votre prix:
        <input type="text" class="form-control ds-input" value="<?php echo @$articleById["article_price"] ?>" name="article_price" placeholder=""> <br>

        <!-- INPUT descri -->
        Votre stock:
        <input type="text" class="form-control ds-input" value="<?php echo @$articleById["article_stock"] ?>" name="article_stock" placeholder=""> <br>

        <!-- TEXT AREA -->
        Votre Article:
        <textarea class="form-control" name="article_descri" cols="30" rows="10"><?php echo @$articleById["article_descri"] ?></textarea>
        <br>

        <!-- DL IMG -->
        <input type="file" name="file[]" id="" multiple>

        <!-- MODIFIER -->
        <button type="submit" name="modifier" value="modifier" class="btn btn-success btn-sm">Modifier</button>
    </form>


    <?php include_once "footer_admin.php"; ?>