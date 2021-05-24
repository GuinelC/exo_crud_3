<?php

   define("PDO_HOST", "localhost"); // le SERVEUR

   define("PDO_DBBASE", "nwdr0168_dev_charlie"); // nom de ma base de donner ! ! 
   define("PDO_USER", "nwdr0168_charlie");
   define("PDO_PW", "vNPH2JUmKC"); // MDP mac

  //  define("PDO_DBBASE", "shop_foot"); // nom de ma base de données
  //  define("PDO_USER", "root"); // MDP
  //  define("PDO_PW", "root"); // MDP 
 
 try{
   $connection = new PDO(
   "mysql:host=" . PDO_HOST . ";".
   "dbname=" . PDO_DBBASE, PDO_USER, PDO_PW,
   array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") );
}
 catch (PDOException $e){
   print "Erreur !: " . $e->getMessage() . "<br/>";
   die();
}

?>