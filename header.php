<?php include_once "admin/pdo_admin.php" ?>
<?php include_once "admin/fonction_admin.php" ?>

<?php //error_reporting(E_ALL);
//ini_set("display_errors", 1);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
  <link rel="stylesheet" href="css/style.css">
  <title>boutique e-commerce football</title>
  <meta name="description" content="Bienvenu sur le site de football e-commerce" />
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <!-- <a class="navbar-brand nomlogo" href="index.php"> FOOT CAMP</a> -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <a href="index.php">
      <img class="logofoot" src="img/littlefcwhite.png">
    </a>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mr-auto">
        <!-- (mr-auto) pour margin right -->
        <li class="nav-item testul">
          <a class="nav-link" href="maillot.php"> <i class="fas fa-tshirt"></i> Maillots</a>
        </li>
        <li class="nav-item testul">
          <a class="nav-link" href="chaussure.php"> <i class="fas fa-shoe-prints"></i> Chaussures</a>
        </li>
        <li class="nav-item testul">
          <a class="nav-link" href="ballon.php"> <i class="far fa-futbol"></i> Ballons</a>
        </li>
        <li class="nav-item testul">
          <a class="nav-link" href="contact.php"> <i class="fas fa-file-signature"></i> Contact</a>
        </li>
      </ul>

      <!-- SI USER est différent (!@) alors faire disparaitre... -->
      <?php if (!@$_SESSION["user_role"]) { ?>
        <ul class="navbar-nav ml-auto">
          <!-- (mr) pour margin left -->
          <li class="nav-item">
            <a class="nav-link" href="login.php"><i class="fas fa-power-off"> </i> Sign in</a>
          </li>
        </ul>
      <?php   } else {  ?>

      <!-- SI session connecter faire apparaitre ceci -->
        <ul class="navbar-nav ml-auto">
          <!-- (mr) pour margin left -->
          <li class="nav-item nav-log text-white">Bonjour: <?php echo @$_SESSION["user_name"] ?>
            <a class="nav-link test-btn" href="cart.php"><i class="fas fa-shopping-cart btn-shop2"> </i> <!-- SHOP --> </a>

            <a class="nav-link test-btn" href="logout.php"><i class="fas fa-sign-out-alt logout"></i> </a>
           
          </li>
        </ul>
      <?php   }  ?>
    </div>

  </nav>