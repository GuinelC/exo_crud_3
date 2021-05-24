<!-- je fais apppel a mon header qui contient deja mon PDO ET MES FONCTIONS -->   
<?php include_once "header.php" ?>
<?php 
       
    $listeProduits = listDesProduits();
    // echo "<pre>";
    // var_dump($listeProduits);
    // "</pre>";
?>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- Liste produits est un tableau, je fait appel a foreach pour parcourir le contenue -->
<?php
foreach($listeProduits as $ligne){ ?>

<h1><?php echo $ligne["article_name"] ?></h1>
<h3><?php echo $ligne["article_price"]?> </h3>

<?php } ?>

<!-- 2 technique ------------------------------------------------------------------------- -->
<?php foreach(listDesProduits() as $row){ ?>

<h1><?php echo $row["article_price"]?> </h1>
<?php } ?>

<!-- ///////////////////////////////////////////////////////////////////////////////////////////////// -->
