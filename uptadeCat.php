<?php include_once "header.php" ?>

<?php
// $cat_id = 10;
// $cat_name = "saque";
// updateNameCat($cat_id,$category_name)
if (isset($_POST["envoyer"])){
    $category_name = $_POST["category_name"];
    $cat_id = $_POST["category_id"];
    updateNameCat($cat_id,$category_name);

}

$listCat = selectAllCat();
if(isset($_POST["category_id"])){
    $category_id= $_POST["category_id"];
    $nameCat = catName($category_id);
}

?>
<!-- /////////////////// -->
<form method="POST" action="">
<select class="form-control" name="category_id" onChange="submit()" id="" required>
    <option value=""> Choix categories </option>

    <?php foreach ($listCat as $list) { ?>
        <option value="<?php echo $list["category_id"] ?>"
         <?php if (@$_POST["category_id"] == $list["category_id"]) {
         echo "selected";} ?>>
            <?php echo $list["category_name"] ?></option>
    <?php } ?>
</select>
<br>
<br>
<input type="text" name="category_name" value="<?php echo @$nameCat["category_name"] ?>">
<button type="submit" name="envoyer">Envoyer</button>
</form>

<br>
<br>
<br>
<br>
<br>
<br>










<!-- /////////////////// -->

<?php foreach ($listCat as $list) { ?>


    <form method="POST" action="">
        <input type="text" name="category_id" value="<?php echo $list["category_id"] ?>">
        <input type="text" name="category_name" value="<?php echo $list["category_name"] ?>">
        <button name="envoyer">Envoyer</button>
    </form>

<?php } ?>