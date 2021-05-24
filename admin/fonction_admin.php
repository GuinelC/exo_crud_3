<?php
session_start(); // HYPER IMPORTANT !!
include_once "upload_admin.php";

///////////////////////////////////////////////////////////////// UPLOAD IMG /////////////////////////////////////////////////////////////
// AJOUTER PHOTO (donc fonctionne sur le ADD et UPLOAD)
function img_name($target_path, $article_id)
{

    global $connection;

    $sql = "INSERT INTO article_img (img_name, article_id) 
            VALUES (:img_name, :article_id)";

    $sth = $connection->prepare($sql);
    $sth->execute(array(
        ":img_name" => $target_path,
        ":article_id" => $article_id,
    ));
}
//////////////////////////////////////////////////////// PAGE INDEX AVEC  MES ARTICLE ////////////////////////////////////////////////////
// AFFICHER LISTE DE MES ARTICLES ET CAT // BASES DE DONNER
function globalListArticle()
{

    global $connection;

    $sql = "SELECT * FROM article
    INNER JOIN category ON article.category_id = category.category_id
    ORDER BY article.category_id";

    $sqh = $connection->prepare($sql);
    $sqh->execute();
    return $sqh->fetchAll();
}
//////////////////////////////////////////////////////// PAGE INDEX AVEC MES ARTICLE ////////////////////////////////////////////////////
// AFFICHER LISTE DE MES ID ARTICLES  // BASES DE DONNER

function listArticle($category_id)
{

    global $connection;

    $sql = "SELECT * FROM article WHERE category_id = $category_id LIMIT 3";

    $sqh = $connection->prepare($sql);
    $sqh->execute();
    return $sqh->fetchAll();
}
////////////////////////////////////////////////////////// PAGE ARTICLE SEUL /////////////////////////////////////////////////////////////
// AFFICHER LISTE article par catégorie
function fullArticle($category_id)
{

    global $connection;

    $sql = "SELECT * FROM article WHERE category_id = $category_id";

    $sqh = $connection->prepare($sql);
    $sqh->execute();
    return $sqh->fetchAll();
}
///////////////////////////////////////////////////////////// PAGE DE MON ARTICLE SELECT ////////////////////////////////////////////////
// ONE PAGE SUR ARTICLE SELECTIONNER
function getArticleCatByIdArticle($article_id)
{

    global $connection;

    $sql = "SELECT * FROM article
                 INNER JOIN category ON article.category_id = category.category_id
                 WHERE article.article_id = $article_id
                 ORDER BY article.category_id";


    $sqh = $connection->prepare($sql);
    $sqh->execute();
    return $sqh->fetch();
}
///////////////////////////////////////////////////////////// ADMIN LIST CAT  ////////////////////////////////////////////////////////////
// Afficher liste catégorie pour le ADD ARTICLE ADMIN 
// READ category 
function listCat()
{
    global $connection;

    $sql = "SELECT * FROM category ORDER BY category_name";

    $sqh = $connection->prepare($sql);
    $sqh->execute();
    return $sqh->fetchAll();
}

/////////////////////////////////////////////////////////// ADMIN choix ID Article ///////////////////////////////////////////////////////
// Choix Article Par iD categorie
function articleByIdCat($category_id)
{
    global $connection;

    $sql = "SELECT * FROM article WHERE category_id = $category_id";

    $sqh = $connection->prepare($sql);
    $sqh->execute();
    return $sqh->fetchAll();
}
///////////////////////////////////////////////////////////// iD ARTICLE ///////////////////////////////////////////////////////////
// Choix iD ARTICLE
function articleId($article_id)
{
    global $connection;

    $sql = "SELECT * FROM article WHERE article_id = $article_id";

    $sqh = $connection->prepare($sql);
    $sqh->execute();
    return $sqh->fetch(); // je veux juste un seul 
}
///////////////////////////////////////////////////////////// UPDATE ARTICLE BASE DE DONNE ////////////////////////////////////////////////
// MODIFIER ARTICLE

function updateArticle($category_id, $article_name, $article_price, $article_stock, $article_descri, $articleId)
{
    global $connection;

    $sql = "UPDATE article
            SET category_id = ?,article_name = ?, article_price = ?, article_stock = ?, article_descri = ?
            -- qui est ciblé ! 
            WHERE article_id = ?";
    // dans le set le ? va corresponde au $sth et la suite des fonction attention a l'ordre surtout
    $sth = $connection->prepare($sql);
    $sth->execute(array(
        $category_id,
        $article_name,
        $article_price,
        $article_stock,
        $article_descri,
        $articleId
    ));

    // ZONE UPLOAD IMG
    $article_id = $connection->lastInsertId();

    if (isset($_FILES["file"])) {
        upload_img($article_id);
    }
}
////////////////////////////////////////////////////////// AJOUTER ARTICLE BASE DE DONNE  /////////////////////////////////////////////////
// SET ARTICLE
function setArticle($category_id, $article_name, $article_price, $article_stock, $article_descri)
{
    global $connection;

    $sql = "INSERT INTO article (category_id, article_name, article_price, article_stock, article_descri) 
            VALUES (?,?,?,?,?)";

    $sth = $connection->prepare($sql);

    $sth->execute(array(
        $category_id,
        $article_name,
        $article_price,
        $article_stock,
        $article_descri
    ));

    // ZONE UPLOAD IMG
    $article_id = $connection->lastInsertId();

    if (isset($_FILES["file"])) {
        // var_dump($article_id);
        // die();
        upload_img($article_id);
    }
}
///////////////////////////////////////////////////////////// DELETE BASE DE DONNER  //////////////////////////////////////////////////////
// SUPP ARTICLE
// DELETE
function deleteArticle($article_id)
{

    global $connection;

    $sql = " DELETE FROM article
             WHERE article_id = $article_id";

    $sqh = $connection->prepare($sql);
    $sqh->execute();
}
///////////////////////////////////////////////////////////// ADD IMG ARTICLE  //////////////////////////////////////////////////////////
// AJOUTER IMG SUR L'ARTICLE SELECT
function setImgArticle($article_id)
{
    global $connection;

    $sql = "SELECT * FROM article_img WHERE article_id = $article_id";

    $sqh = $connection->prepare($sql);
    $sqh->execute();
    return $sqh->fetch();
}
///////////////////////////////////////////////////////////// PAGE LOGIN  ////////////////////////////////////////////////////////////////
// CONNEXION USER 
function login($mail, $pass)
{
    global $connection;

    $sql = "SELECT * FROM user WHERE user_mail = '$mail' LIMIT 1";

    $sth = $connection->prepare($sql);
    $sth->execute();
    $row = $sth->fetch();

    if ($row == false) {
        return false;
    } elseif (password_verify($pass, $row['user_pass'])) {

        $_SESSION["user_id"] = $row["user_id"];
        $_SESSION["user_name"] = $row["user_name"];
        $_SESSION["user_mail"] = $row["user_mail"];
        $_SESSION["user_pass"] = $row["user_pass"];
        $_SESSION["user_role"] = $row["user_role"];


        if ($_SESSION["user_role"] == 1) {
            header('Location: admin/index_admin.php'); // ADMIN // header = REDIRECTION // ADMIN
        }

        if ($_SESSION["user_role"] == 2) {
            header('Location: index.php');  // USER // header = REDIRECTION // index
        }
    } else {
        // si faux FALSE
        session_destroy();
        header('Location: ./login.php');
    }
}
//////////////////////////////////////////////////////////// PAGE SIGN IN  ///////////////////////////////////////////////////////////////
// INSCRIPTION USER

function addUser($name, $mail, $pass)
{
    global $connection;

    $pash_hash = password_hash($pass, PASSWORD_DEFAULT);

    $sql = "INSERT INTO user (user_name, user_mail, user_pass) 
            VALUES (:user_name, :user_mail, :user_pass)";

    $sth = $connection->prepare($sql);

    $sth->execute(array(
        ':user_name' => $name,
        ':user_mail' => $mail,
        ':user_pass' => $pash_hash,
    ));

    header('Location: ./login.php');  // Une fois inscription terminer -> GO page LOGIN                   
}
///////////////////////////////////////////////////////////// Ajouter COMMENTAIRE B-D  //////////////////////////////////////////////////
// AJOUTER COMMENTAIRE DANS BASE de Donner !! 
// NE PAS OUBLIER METTRE DANS LA BASE DE DONNER LA VALUE SUR (0)!!! 

// INSERT COMMENT ON DATA BASE
function setComUserLog($comment, $article_id, $user_id)
{
    global $connection;

    $sql = "INSERT INTO comment (comment_text, article_id, user_id) 
                         VALUES (:comment_text, :article_id, :user_id)";

    $sth = $connection->prepare($sql);

    $sth->execute(array(
        ':comment_text' => $comment,
        ':article_id' => $article_id,
        ':user_id' => $user_id
    ));
}
//////////////////////////////////////////////////////// Commentaire POUR ID Article /////////////////////////////////////////////////////
// AFFICHER COMMENTAIRE PAR ID_ARTICLE
function comUser($article_id)
{
    global $connection;

    $sql =  "SELECT * FROM comment
             INNER JOIN user ON comment.user_id = user.user_id
             WHERE comment.article_id = $article_id AND comment_activ = 1;                  
             ORDER BY comment.comment_id";

    $sqh = $connection->prepare($sql);
    $sqh->execute();
    return $sqh->fetchAll();
}

///////////////////////////////////////////////////////////// AFFICHER COMMENTAIRE ADMIN //////////////////////////////////////////////////
// AFFICHER COMMENTAIRE SUR SITE 
function getCom($article_id)
{

    global $connection;

    $sql = "SELECT * FROM comment 
                     NATURAL JOIN user
                     WHERE article_id = ? AND comment_activ = 0"; // on selectionne l'article ! 


    $sqh = $connection->prepare($sql);
    $sqh->execute(
        array(
            $article_id
        )
    );
    return $sqh->fetchAll();
}
///////////////////////////////////////////////////////////// ADMIN COMMENT Y/N /////////////////////////////////////////////////////////
// VALIDATION COMMENTAIRE SUR SITE              
function autoriserCom($comment_id)
{

    global $connection;

    $sql = "UPDATE comment
        SET comment_activ = '1'
        WHERE comment_id = $comment_id";

    $sth = $connection->prepare($sql);
    $sth->execute();
}

///////////
function effacerCom($comment_id)
{

    global $connection;

    $sql = "DELETE FROM comment
         WHERE comment_id = $comment_id";

    $sth = $connection->prepare($sql);
    $sth->execute();
}
///////////////////////////////////////////////////////////////// CADDY ///////////////////////////////////////////////////////////////////
// SELECT LA LIGNE CORRESPONDANT A MON ARTICLE DANS LE CADDY, (recup tout les colonne de cette ligne)
function selectArticleCaddy($user_id, $article_id)
{
    global $connection;

    $sql = "SELECT * FROM caddy WHERE user_id = ? AND article_id = ?";

    $sqh = $connection->prepare($sql);
    $sqh->execute(
        array($user_id, $article_id)
    );

    return $sqh->fetch();
}

///////////////////////////////////////////////////////////////// CADDY ///////////////////////////////////////////////////////////////////
// AJOUTER ARTICLE DANS CART B.D.D 
function addCart($article_id, $user_id)
{
    global $connection;

    $sql = "INSERT INTO caddy (article_id, user_id, article_quantity)
             VALUES (:article_id, :user_id, 1)";

    $sth = $connection->prepare($sql);

    $sth->execute(array(
        ':article_id' => $article_id,
        ':user_id' => $user_id,
    ));
}

///////////////////////////////////////////////////////////////// CADDY ///////////////////////////////////////////////////////////////////
// MODIFIER QUANTITY DANS CADDY
function updateQuantityArticle($article_quantity, $user_id, $article_id)
{
    global $connection;

    $sql = "UPDATE caddy
    SET article_quantity = ? -- (?) autre methode de protection
    WHERE user_id = ? AND article_id = ?";

    $sqh = $connection->prepare($sql);
    $sqh->execute(
        array(
            $article_quantity,
            $user_id,
            $article_id,
        )
    );
    return $sqh->fetchAll();
}
///////////////////////////////////////////////////////////////// CADDY ///////////////////////////////////////////////////////////////////
// Afficher la list de produit par USER_ID 
function listcaddy($user_id)
{
    global $connection;

    $sql = "SELECT * FROM caddy
            NATURAL JOIN article WHERE user_id = ? ";

    $sqh = $connection->prepare($sql);
    $sqh->execute(array(
            $user_id,
        )
    );
    return $sqh->fetchAll();
}
///////////////////////////////////////////////////////////////// CADDY ///////////////////////////////////////////////////////////////////
// TOTAL DU CADDY
function totalcaddy($listcaddy, $total)
{
    foreach ($listcaddy as $row) {
        $total += $row["article_quantity"] * $row["article_price"]; // le (+=) additionne chaque ligne 
    }
    return $total;
}
///////////////////////////////////////////////////////////////// CADDY ///////////////////////////////////////////////////////////////////
// SUPP CADDY
function suppcaddy($article_id)
{
    global $connection;

    $sql = "DELETE FROM caddy
            WHERE article_id = ?";

    $sth = $connection->prepare($sql);
    $sth->execute(array(
        $article_id,
    ));
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// VALIDATION PAYMENT
function validPayment($user_id){

    global $connection;

    $sql = "UPDATE caddy
    SET validation = 1
    WHERE user_id = $user_id";

    $sqh = $connection->prepare($sql);
    $sqh->execute();
}











// crypte mdp

// // inscription
// $pass1 = "MotDEPass3";
// $mail1 = "smt@laposte.fr";
// $name = $_POST['name'];
// $pass_hash = password_hash($pass1, PASSWORD_DEFAULT);
// $sql = "INSERT INTO user (user_pass)
//             VALUES (:user_pass)";
// $sth->execute(array(
//     ":user_pass" => $pass_hash,
// ));
// // Loger /////////////////
// $sql = "SELECT * FROM user WHERE user_mail = $mail1 LIMIT 1";
// return $sqh->fetch();
// if (password_verify($pass1, $row['user_pass'])) {
//     echo "Mot de passe correct";
// } else {
//     echo "Mot de passe incorrect";
// }
