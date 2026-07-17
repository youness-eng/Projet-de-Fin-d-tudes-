
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Modifier : <?php echo $row["titre"] ;?></title>
  <link rel="icon" type="image/png" href="../images/mini-logo.png">
  <script src="https://kit.fontawesome.com/64d58efce2.js"></script>
  <link rel="stylesheet" href="../css/offre.css">
  <script defer src="../js/offre.js"></script>
</head>

<?php

    include_once('cbd.php');
    if(isset($_POST['submit'])){  
      $id = $_POST["id"];
      $titre = $_POST["titre"];
      $type = $_POST["type"];
      $description = $_POST["description"]; 
      $souhait = mysqli_real_escape_string($conn, $_POST["souhait"]);  
      $locationCourrent = $_POST["locationCourrent"]; 
      $fnm = $_FILES["image"]["name"];  
      $dst = "../offres/".$fnm;  
  
      $sql = "SELECT * FROM offre WHERE id_offre ='$id';";
      $resultat = mysqli_query($conn, $sql);
      $row = mysqli_fetch_array($resultat);
      if( $dst == "../offres/" ){      
        $dst = $locationCourrent;
      }else{
       move_uploaded_file($_FILES["image"]["tmp_name"],$dst);  
      }
      $modifier = "UPDATE offre  SET `besoin` = '$souhait',`titre` = '$titre', `image` = '$dst.', `type` = '$type',  `description` = '$description' WHERE `offre`.`id_offre` = '$id' ;"; 
      $inscrire = mysqli_query($conn, $modifier);
      if(!$modifier){
          $class = "class = \"msg-erreur\"";
          echo "<p ".$class.">Une erreur est survenue. Veuillez réessayer une autre fois !</p>";
          header("Refresh:3; url=mesOffres.php"); 
          exit();  
          }
      else{
          $class = "class = \"msg-succes\"";
          echo "<p ".$class.">Vous avez modifié votre compte avec succès !</p>";
          header("Refresh:2; url=mesOffres.php");
          exit(); 
      }
    }

    
    session_start();
    $id = trim($_GET["id"]); 
    $sql = "SELECT * FROM offre WHERE id_offre ='$id';";
    $resultat = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($resultat);
    $location = $row["image"];
    $_SESSION['location'] = $location;
    if($row["type"] == "Bien" ){
        $selectionner = "Bien";
        $nonSelectionner = "Service";
    }else{
      $selectionner = "Service";
      $nonSelectionner = "Bien";
    }
    
?>


<body>
  <div class="ajt-offre">
    <div class="panel">
      <img src="../images/modifierOffre.svg" class="image" alt="Offre-Image" />
    </div>
    <div class="formulaire">
      <form action="modifierOffre.php" method="POST" class="form" id="form" enctype="multipart/form-data">
        <h2 class="titre">Modifier son offre</h2>
        <input type="text" name="id" class="invisible" value="<?php echo $row["id_offre"] ;?>"/>
        <div class="input-field">
          <i class="fa fa-header"></i>
          <input type="text" name="titre" id="titre" value="<?php echo $row["titre"] ;?>" placeholder="Titre de votre offre" autocomplete="off" />
          <i class="fa fa-exclamation-circle"></i>
          <i class="fa fa-check"></i>
        </div>
        <p id="erreurTitre" class="erreur-text"></p>
        <div class="input-field">
          <i class="fa fa-check-square"></i>
          <div class="select">
            <select name="type" id="select">
              <option value="<?php echo $selectionner ;?>"><?php echo $selectionner ;?></option>
              <option value="<?php echo $nonSelectionner ;?>""><?php echo $nonSelectionner ;?></option>
            </select>
            <i class="fa fa-arrow-down" id="btn"></i>
          </div>
        </div>
        <p id="erreurSelect" class="erreur-text"></p>
        <div class="input-field" id="desciption">
          <i class="fa fa-comment-o"></i>
          <textarea class="description-offre" name="description" id="descriptionoffre" autocomplete="off"
            placeholder="Description de votre offre"><?php echo $row["description"] ;?></textarea>
          <i class="fa fa-exclamation-circle"></i>
          <i class="fa fa-check"></i>
        </div>
        <p id="erreurDescription" class="erreur-text"></p>
        <div class="input-field">
          <i class="fa fa-picture-o"></i>
          <label class="selectionner-image">
            <input type="file" name="image" id="input-image" onchange="copierLocation()" />
            Image
          </label>
          <span id="image-location"><?php echo $row["image"] ;?></span>
          <input class="invisible" name="locationCourrent" value="<?php echo $row["image"] ;?>">
          <i class="fa fa-exclamation-circle"></i>
          <i class="fa fa-check"></i>
        </div>
        <p id="erreurImage" class="erreur-text"></p>
        <div class="input-field" id="souhaite">
          <i class="fa fa-handshake-o"></i>
          <textarea name="souhait" id="etatcourrent" placeholder="Souhait"><?php echo $row["besoin"] ;?></textarea>
          <i class="fa fa-trash" id="icone" onclick="effacerIcone()"></i>
        </div>
        <p id="erreurSouhaite" class="erreur-text"></p>
        <input type="submit" name="submit" class="btn" value="Modifier l'offre" />
      </form>
    </div>
  </div>
  <a class="icone-quitter" onclick="history.back()"><i class="fa fa-long-arrow-right" id="quitter"></i></a>
</body>

</html>