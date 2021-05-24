 <!-- PAYPAL FORM  -->

 <?php include_once "header.php" ?>

 <div class="container">
   <h1>Merci de votre confiance</h1>
 </div>


 <?php
  $user_id = $_GET["user_id"];
  // var_dump($user_id);

  validPayment($user_id);
  ?>