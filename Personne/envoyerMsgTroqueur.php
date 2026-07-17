<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Envoyer message</title>
  <link rel="icon" type="image/png" href="../images/mini-logo.png">
  <script src="https://kit.fontawesome.com/64d58efce2.js"></script>
  <link rel="stylesheet" href="../css/contacterAdmin.css">
</head>

<?php
if(isset( $_POST["submit"])){
    session_start();
    $id_user = $_SESSION['id_utilisateur'];
    $id = $_SESSION['id']; 
    $message = $_POST["message"];
    include_once('cbd.php');
         $sql = "INSERT Into message_offre (msg, id_personne,id_destinateur) values( '$message','$id_user','$id');";
         $run_query = mysqli_query($conn, $sql);
         if(!$run_query){
          $class = "class = \"msg-erreur\"";
          echo "<p ".$class.">Une erreur est survenue. Veuillez réessayer une autre fois !</p>";
          header("Refresh:4");
         }
         else{
         $class = "class = \"msg-succes\"";
         echo "<p ".$class.">Votre message a été envoyé avec succès!</p>";
         header("Refresh:3; url=aficherOffres.php");
         }
}

?>