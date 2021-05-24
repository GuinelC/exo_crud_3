<?php include_once "header.php" ?>

<?php 
// si il y a eu  un post alors newcat !
// si le bouton envoyer est activer ! alors je fais ceci
if (isset($_POST["envoyer"])){
    $category_name = htmlspecialchars($_POST["category_name"]);
    newCat($category_name);
} 
// a partir de html... pour la défence

?>

<!-- UN formlaire des ques j'ai besoin de insert et uptdate (en méthode POST) -->
<form method="POST" action="">
<!-- un input pour rentrer mon text que je souhaite (le type= est important pour ca )  -->
<input type="text" name="category_name">
<!-- pour valider et envoyer mon text il faut appuiyer sur le bouton qui a pour name "envoyer" puis mtn le if (isset va prendre son sens ) -->
<button type="submit" name="envoyer">Envoyer</button>
</form>