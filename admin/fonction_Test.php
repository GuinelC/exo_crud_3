<?php 

function listDesProduits(){

    // global $connection ( fait appel a une fonction extérieur)
    global $connection;

    $req = "SELECT * FROM article";

    // (prepare) = tu te connect et je fait la demande du $req
    $reponse = $connection->prepare($req);

    // une fois effectuer, on execute la variable
    $reponse->execute();

    // et on attend qui nous retourne le resultat
    return $reponse->fetchAll();
}

////////////////

function newCat($category_name){
    global $connection;

    $req = "INSERT INTO category (category_name)
             VALUES (?)";

    $reponse = $connection->prepare($req);

    $reponse->execute(array(
        $category_name
    ));
    // permet d'éviter de renvoyer un post vide (doubler les posts)
    header("Location: ./newcat.php");
}


////////////////

function updateNameCat($cat_id,$category_name){

    global $connection;

    $req = "UPDATE category SET category_name = ?
            WHERE category_id = $cat_id";

    $reponse = $connection->prepare($req);

    $reponse->execute(array(
    $category_name
));
}

////////////////

function selectAllCat(){

    global $connection;

    $req = "SELECT category_id, category_name FROM category";

    $reponse = $connection->prepare($req);
    $reponse->execute();

    return $reponse->fetchAll();
}


////////////////

function catName($category_id){

    global $connection;

    $req = "SELECT category_id, category_name FROM category
            WHERE category_id= $category_id";

    $reponse = $connection->prepare($req);
    $reponse->execute();

    return $reponse->fetch();

}


