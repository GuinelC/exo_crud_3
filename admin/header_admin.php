<?php ob_start(); ?>

<?php include_once "pdo_admin.php"?>
<?php include_once "fonction_admin.php"?>

<?php if (isset($_POST["destroy"])) {

session_destroy();
header('Location: ../login.php');
}
ob_end_flush();
?> 

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
  <link rel="stylesheet" href="../css/style.css">
  <title>Document</title>
</head>


<!--------------------- Appel fonction ---------------->

<!------------------------- // ------------------------>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <!-- <a class="navbar-brand" name="logo" href="">100% FOOT</a> -->
  <a href="index_admin.php">
    <img class="logo_nav" src="../img/littlefcwhite.png"> 
    </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <!-- <ul class="navbar-nav mr-auto">

      
      <?php if (@$_SESSION["user_role"] != 1) { ?>
        <li class="nav-item">
          <a class="nav-link" href="/exo_crud_3/login.php"><i class="fas fa-power-off"> </i> Login</a>
        </li>
      <?php   }  ?>
    </ul> -->

    <!-- SI session connecter faire apparaitre ceci -->
    <?php 
    // if (@$_SESSION["user_role"] == 1) { ?>
      <ul class="navbar-nav ml-auto">
        <li class="nav-link">Bonjour: <?php echo @$_SESSION["user_name"] ?> </li>

        <li class="nav-item">
          <a class="nav-link test-btn" href="index_admin.php"><i class="fas fa-home"></i> Home </a>
        </li>

        <form action="" method="POST">
          <button class="btn btn-link" type="submit" name="destroy" value="enlever sessions"><i class="fas fa-sign-out-alt logout1"></i>   </button>
        </form>
      <?php  
    //  }  ?>
      </ul>
  </div>
</nav>
