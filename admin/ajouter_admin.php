<?php include_once "header_admin.php"; ?>

<!--------------------- Appel fonction ---------------->
<?php
// choix id cat (cat1)
@$category_id = @$_POST["category_id"];
// choix (cat1)
$listCat = [];
$listCat = listCat();

// choix id cat (cat2)
$articleByIdCat = articleByIdCat($category_id);
//choix id (cat2)
$articleById = [];

// TITRE
$articleId = articleId(@$_POST["article_id"]); 

// ADD ARTICLE
@$article_name = htmlspecialchars($_POST["article_name"]);  
@$article_descri = htmlspecialchars($_POST["article_descri"]); 
@$article_stock =  htmlspecialchars($_POST["article_stock"]); 
@$article_price =  htmlspecialchars($_POST["article_price"]); 

if (@$_POST["ajouter"]) {
setArticle($category_id, $article_name, $article_price, $article_stock, $article_descri);
}
// ADD IMG 


?>
<!------------------------- // ------------------------>

<div class="container">
    <h2>ADMIN: Ajouter Article </h2>

    <!-- Menu catégories 1 -->
    <form action="#" method="POST">
        Veuillez choisir votre 1er catégorie:
        <select class="form-control" name="category_id" onChange="submit()" id="" required>
            <option value=""> Choix categories </option>

            <?php foreach ($listCat as $row) { ?>
                <option value="<?php echo $row["category_id"] ?>" 
                <?php if (@$_POST["category_id"] == $row["category_id"]){echo "selected";} ?> >
                <?php echo $row["category_name"] ?></option>
            <?php } ?>
        </select>
    </form>

     <!-- Menu catégorie par Selection 2 -->
   <form action="#" method="POST" enctype="multipart/form-data">

   <input type="hidden" name="category_id" value="<?= @$_POST["category_id"] ?>">
      
      <!-- INPUT TITRE -->
      Votre Titre:
      <input type="text" class="form-control ds-input" value="" name="article_name" placeholder=""> <br>

      <!-- INPUT price -->
      Votre prix:
      <input type="text" class="form-control ds-input" value="" name="article_price" placeholder=""> <br>

      <!-- INPUT descri -->
      Votre stock:
      <input type="text" class="form-control ds-input" value="" name="article_stock" placeholder=""> <br>

      <!-- TEXT AREA -->
      Votre Article:
      <textarea class="form-control" name="article_descri" cols="30" rows="10"></textarea>
      <br>

      <!-- DL IMG -->
      <input type="file" name="file[]" id="" multiple>
      
      <!-- AJOUTER -->
      <button type="submit" name="ajouter" value="ajouter" class="btn btn-success btn-sm">Ajouter</button>

    </form>


    <?php include_once "footer_admin.php"; ?>