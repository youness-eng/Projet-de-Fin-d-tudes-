<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contactez-nous</title>
  <link rel="icon" type="image/png" href="../images/mini-logo.png">
  <script src="https://kit.fontawesome.com/64d58efce2.js"></script>
  <link rel="stylesheet" href="../css/contacterAdmin.css">
  <script defer src="../js/contacterAdmin.js"></script>
</head>

<body>
  <div class="contactez-nous">
    <div class="panel">
      <img src="../images/contactezNous.svg" class="image" alt="Contactez-nous Image" />
    </div>
    <div class="formulaire">
      <form action="contacterAdmin.php" method="POST" class="form" id="form">
        <h2 class="titre">Contactez-nous</h2>

        <div class="input-field">
          <i class="fas fa-envelope"></i>
          <input type="text" name="email" id="email" placeholder="Email" autocomplete="off" />
          <i class="fa fa-check"></i>
          <i class="fa fa-exclamation-circle"></i>
        </div>
        <p id="erreurEmail" class="erreur-text"></p>
        <div class="input-field">
          <i class="fa fa-header"></i>
          <input type="text" name="objet" id="objet" placeholder="Objet" autocomplete="off" />
          <i class="fa fa-check"></i>
          <i class="fa fa-exclamation-circle"></i>
        </div>
        <p id="erreurObjet" class="erreur-text"></p>
        <div class="input-field" id="message">
          <i class="fa fa-comment-o"></i>
          <textarea class="message-contact" name="message" id="messageAdmin" placeholder="message"
            autocomplete="off"></textarea>
          <i class="fa fa-check"></i>
          <i class="fa fa-exclamation-circle"></i>
        </div>
        <p id="erreurMessage" class="erreur-text"></p>
        <input type="submit" name="submit" class="btn" value="Envoyez message" />
      </form>
    </div>
  </div>
  <a class="icone-quitter"><i class="fa fa-long-arrow-right" id="quitter" onclick="history.back()" ></i></a>
<?php
  
if(isset( $_POST["submit"])){
    $objet = $_POST["objet"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    include_once('cbd.php');
         $sql = "INSERT Into message_admin (objet, msg, email) values( '$objet','$message','$email');";
         $run_query = mysqli_query($conn, $sql);
         if(!$run_query){
          $class = "class = \"msg-erreur\"";
          echo "<p ".$class.">Une erreur est survenue. Veuillez réessayer une autre fois !</p>";
          header("Refresh:4");
         }
         else{
         $class = "class = \"msg-succes\"";
         echo "<p ".$class.">Votre message a été envoyé avec succès!</p>";
         header("Refresh:3");
         }
}
  ?>
</body>

</html>