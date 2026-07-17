<?php

include_once('cbd.php');
  
  
$param_id = trim($_GET["id"]);
$sql = "SELECT * FROM personne WHERE id_personne  ='$param_id';";
$resultat = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($resultat);
 
session_start();
$_SESSION['id_utilisateur'] = $param_id;

$param_id_offre = trim($_GET["id_offre"]);
$selectionner_Offre = "SELECT * FROM offre WHERE id_offre  ='$param_id_offre';";
$resultat2 = mysqli_query($conn, $selectionner_Offre);
$row2 = mysqli_fetch_array($resultat2);


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contacter <?php echo $row["nom"] ;?></title>
  <link rel="icon" type="image/png" href="../images/mini-logo.png">
  <script src="https://kit.fontawesome.com/64d58efce2.js"></script>
  <link rel="stylesheet" href="../css/contacterAdmin.css">
  <script defer src="../js/contacterTroqueur.js"></script>
</head>

<body>
  <div class="contactez-nous">
    <div class="panel">
      <img src="../images/contacterTroqueur.svg" class="image" alt="Contactez-nous Image" />
    </div>
    <div class="formulaire">
      <form action="envoyerMsgTroqueur.php" method="POST" class="form" id="form">
        <h2 class="titre">Contactez troqueur</h2>
        <div class="input-field">
          <i class="fas fa-user"></i>
          <input type="text" name="nom" id="nom" value="À <?php echo $row["nom"] . " " . $row["prenom"] ;?>" autocomplete="off" readonly/>
          <i class="fa fa-check"></i>
          <i class="fa fa-exclamation-circle"></i>
        </div>
        <p id="erreurEmail" class="erreur-text"></p>
        
        <div class="input-field">
          <i class="fas fa-envelope"></i>
          <input type="text" name="nom" id="offre" value="L'offre : <?php echo $row2["titre"] ;?>" autocomplete="off" readonly/>
          <i class="fa fa-check"></i>
          <i class="fa fa-exclamation-circle"></i>
        </div>
        <p id="erreurEmail" class="erreur-text"></p>
        <div class="input-field" id="message">
          <i class="fa fa-comment-o"></i>
          <textarea class="message-contact" name="message" id="Troqueur" placeholder="message"
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
</body>

</html>