<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Moddifer votre compte</title>
  <link rel="icon" type="image/png" href="../images/mini-logo.png">
  <script src="https://kit.fontawesome.com/64d58efce2.js"></script>
  <link rel="stylesheet" href="../css/modifierCompte.css">
  <script defer src="../js/modifierCompte.js"></script>
</head>

<?php
  include_once('cbd.php');
  
  session_start();
  
  $loginSession =  $_SESSION['login']; 
  $sql = "SELECT * FROM personne WHERE login_utilisateur ='$loginSession';";

  $resultat = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($resultat);
  $id = $row["id_personne"];
  $_SESSION['id'] = $id; 

  if(isset($_POST["modifier"])){

  $nom = $_POST["nom"];
  $prenom = $_POST["prenom"];
  $email = $_POST["email"];
  $num = $_POST["num"];
  $ville = $_POST["ville"];
  $login = $_POST["login"];
  $pass = $_POST["pass"];
  $pass2 = $_POST["pass2"];
  $pass_Hasher = password_hash($pass,PASSWORD_DEFAULT);

  if($login !== $loginSession ){
  $Login_verification = "SELECT * FROM personne WHERE login_utilisateur = '$login' LIMIT 1 ";
  $resultat= mysqli_query($conn, $Login_verification);
  $utilisateur = mysqli_fetch_assoc($resultat);
    if ($utilisateur){      
      if($utilisateur['login_utilisateur']=== $login){
          $class = "class = \"msg-erreur\"";
          echo "<p ".$class.">Ce login est déjà utilisé par un autre utilisateur !</p>";
          header("Refresh:3;"); 
          }
    }else{ 
      // Verification du mot de passe pour ne se hasher pas deux fois

      $sql = "SELECT mot_de_passe  FROM personne WHERE login_utilisateur = '$login' ;";
      $resultat = mysqli_query($conn, $sql);
      $rw = mysqli_fetch_array($resultat);
      $passBD = $rw["mot_de_passe"];
      if($passBD != $pass){
        $pass = $pass_Hasher;
      }
        $modifier = "UPDATE personne  SET `nom` = '$nom',`prenom` = '$prenom', `email` = '$email', `telephone` = '$num',  `ville` = '$ville', `login_utilisateur` = '$login', `mot_de_passe` = '$pass' WHERE `personne`.`id_personne` = '$id' ;"; 
        $modifier_compte = mysqli_query($conn, $modifier);
      if(!$modifier){
          $class = "class = \"msg-erreur\"";
          echo "<p ".$class.">Une erreur est survenue. Veuillez réessayer une autre fois !</p>";
          header("Refresh:3; url=modifierSonCompte.php");   
          }
      else{
          $_SESSION['login'] = $login; 
          $class = "class = \"msg-succes\"";
          echo "<p ".$class.">Vous avez modifié votre compte avec succès !</p>";
          $profile = $_SESSION['profile'];
          if($profile == "troqueur"){
          header("Refresh:3; url=troqueur.php");
          }
          else{
          header("Refresh:3; url=admin.php");
          }
      }
  }
  }
    else{ 
        $sql = "SELECT mot_de_passe  FROM personne WHERE login_utilisateur = '$login' ;";
        $resultat = mysqli_query($conn, $sql);
        $rw = mysqli_fetch_array($resultat);
        $passBD = $rw["mot_de_passe"];
        if($passBD != $pass){
          $pass = $pass_Hasher;
        }
          $modifier = "UPDATE personne  SET `nom` = '$nom',`prenom` = '$prenom', `email` = '$email', `telephone` = '$num',  `ville` = '$ville', `login_utilisateur` = '$login', `mot_de_passe` = '$pass' WHERE `personne`.`id_personne` = '$id' ;"; 
          $modifier_compte = mysqli_query($conn, $modifier);
          if(!$modifier){
              $class = "class = \"msg-erreur\"";
              echo "<p ".$class.">Une erreur est survenue. Veuillez réessayer une autre fois !</p>";
              header("Refresh:3; url=modifierSonCompte.php");   
              }
        else{
            $_SESSION['login'] = $login; 
            $class = "class = \"msg-succes\"";
            echo "<p ".$class.">Vous avez modifié votre compte avec succès !</p>";
            $profile = $_SESSION['profile'];
            if($profile == "troqueur"){
            header("Refresh:3; url=troqueur.php");
            }
            else{
            header("Refresh:3; url=admin.php");
            }
        }
    }

  }

?>




<body>
  <div class="modifier-compte">
    <div class="panel">
      <img src="../images/modifierCompte.svg" class="image" alt="ModdiferSonCompte-Image" />
    </div>
    <div class="formulaire">
      <div class="formulaire">
        <form action="modifierSonCompte.php" method="POST" class="form" id="form">
          <h2 class="titre">modifier votre compte</h2>
          <div class="input-field" id="divNom">
            <i class="fas fa-user"></i>
            <input type="text" name="nom" id="nom" value="<?php echo $row["nom"] ;?>" placeholder="Nom"
              autocomplete="off" />
            <i class="fa fa-check"></i>
            <i class="fa fa-exclamation-circle"></i>
          </div>
          <p id="erreurNom" class="erreur-text"></p>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" name="prenom" id="prenom" value="<?php echo $row["prenom"] ;?>" placeholder="Prénom"
              autocomplete="off" />
            <i class="fa fa-exclamation-circle"></i>
            <i class="fa fa-check"></i>
          </div>
          <p id="erreurPrenom" class="erreur-text"></p>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="text" name="email" id="email" value="<?php echo $row["email"] ;?>" placeholder="Email"
              autocomplete="off" />
            <i class="fa fa-exclamation-circle"></i>
            <i class="fa fa-check"></i>
          </div>
          <p id="erreurEmail" class="erreur-text"></p>
          <div class="input-field">
            <i class="fa fa-phone"></i>
            <input type="text" name="num" id="num" value="<?php echo "0".$row["telephone"] ;?>"
              placeholder="Numéro de téléphone" autocomplete="off" />
            <i class="fa fa-exclamation-circle"></i>
            <i class="fa fa-check"></i>
          </div>
          <p id="erreurNum" class="erreur-text"></p>
          <div class="input-field">
            <i class="fa fa-building"></i>
            <input type="text" name="ville" id="ville" value="<?php echo $row["ville"] ;?>" placeholder="Ville"
              autocomplete="off" />
            <i class="fa fa-exclamation-circle"></i>
            <i class="fa fa-check"></i>
          </div>
          <p id="erreurVille" class="erreur-text"></p>
          <div class="input-field">
            <i class="fa fa-sign-in"></i>
            <input type="text" name="login" id="login" value="<?php echo $loginSession ;?>" placeholder="Login"
              autocomplete="off" />
            <i class="fa fa-exclamation-circle"></i>
            <i class="fa fa-check"></i>
          </div>
          <p id="erreurLogin" class="erreur-text"></p>
          <div class="input-field" id="divPass">
            <i class="fas fa-lock"></i>
            <input type="password" name="pass" id="password" value="<?php echo $row["mot_de_passe"] ;?>"
              placeholder="Mot de passe" autocomplete="off" />
            <i class="fa fa-exclamation-circle"></i>
            <i class="fa fa-check"></i>
          </div>
          <p id="erreurPass" class="erreur-text"></p>
          <div class="input-field" id="confirme-pass">
            <i class="fas fa-lock"></i>
            <input type="password" name="pass2" id="password2" value="<?php echo $row["mot_de_passe"] ;?>"
              placeholder="Confirmer votre mot de passe" autocomplete="off" />
            <i class="fa fa-exclamation-circle"></i>
            <i class="fa fa-check"></i>
          </div>
          <p id="erreurPass2" class="erreur-text"></p>
          <input type="submit" name="modifier" id="modifier" class="btn" value="Modifier">
        </form>
      </div>

    </div>
  </div>
  <a class="icone-quitter"><i class="fa fa-long-arrow-right" id="quitter" onclick="history.back()"></i></a>
</body>

</html>