<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Ajouter une offre</title>
  <link rel="icon" type="image/png" href="../images/mini-logo.png">
</head>
    <style>
        .msg-erreur{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            z-index: 10;
            font-size: 40px;
            font-weight: 700;
            color: #fff;
            background-color: red;
            padding: 50px 80px;
            width: 50%;
            border-radius: 2000px;
            text-align: center;
            box-shadow: 0px 0px 10px 10px rgb(241, 30, 30);
            outline: none;
            border: white 2px solid;
        }


        .msg-succes{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            z-index: 10;
            font-size: 40px;
            font-weight: 700;
            color: #fff;
            background-color: rgb(0, 0, 0);
            padding: 50px 80px;
            width: 50%;
            border-radius: 2000px;
            text-align: center;
            box-shadow: 0px 0px 10px 10px rgba(0, 0, 0, 1);
            outline: none;
            border: white 2px solid;
        }

    </style>
</head>
<body>
   
<?php
    include_once('cbd.php');
    $souhait = mysqli_real_escape_string($conn, $_POST["souhait"]); 
    $titre = $_POST["titre"];
    $type = $_POST["type"];
    $categorie = $_POST["categorie"];
    $description = $_POST["description"]; 
    $fnm = $_FILES["image"]["name"];  
    $dst = "../offres/".$fnm;
    session_start();   
    $id = $_SESSION['id']; 

    $insert = "INSERT INTO `offre` (`besoin`, `id_personne`, `titre`, `image`, `type`, `description`) VALUES ('$souhait', '$id', '$titre', '$dst', '$type', '$description');";
    $ajouter = mysqli_query($conn, $insert);
    if(!$ajouter){
        echo("Error description: " . mysqli_error($ajouter));
        exit;
    }else{
    $sql = "SELECT * FROM offre ORDER BY id_offre DESC LIMIT 1;";
    $resultat = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($resultat);
    $id_offre = $row["id_offre"];
    $insertCat = "INSERT INTO `categorie` (`id_offre`, `nom_cat`) VALUES ('$id_offre', '$categorie');";
    $insertCatQuery = mysqli_query($conn, $insertCat); 
    if(!$insertCatQuery){
        echo("Error description: " . mysqli_error($ajouter));
        exit;
    } 
    else{ 
    move_uploaded_file($_FILES["image"]["tmp_name"],$dst);  
    $class = "class = \"msg-succes\"";
    echo "<p ".$class.">Vous avez déposé votre offre avec succès !</p>";
    $profile = $_SESSION['profile'];
        if($profile == "troqueur"){
        header("Refresh:3; url=troqueur.php");
        }
        else{
        header("Refresh:3; url=admin.php");
        }
    }}   
?>
</body>
</html>