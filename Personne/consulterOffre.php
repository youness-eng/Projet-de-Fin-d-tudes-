<?php
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    require_once "cbd.php";

    $sql = "SELECT * FROM offre WHERE id_offre = ?";

    if($stmt = mysqli_prepare($conn, $sql)){

        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        $param_id = trim($_GET["id"]);
        
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                $besoin = $row["besoin"];
                $titre = $row["titre"];
                $image = $row["image"];
                $type = $row["type"];
                $description = $row["description"];
                $sql = "SELECT * FROM categorie WHERE id_offre = '$param_id';";
                $resultat = mysqli_query($conn, $sql);
                $row2 = mysqli_fetch_array($resultat);
            } else{
                header("location: aficherOffres.php");
                exit();
            }
            
        } else{
            header("location: aficherOffres.php");
        }
    }
     
    mysqli_close($conn);
} else{
    header("location: aficherOffres.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Offre : <?php echo $row["titre"]; ?></title>
    <link rel="icon" type="image/png" href="../images/mini-logo.png">
    <script src="https://kit.fontawesome.com/64d58efce2.js"></script>
    <link rel="stylesheet" href="../css/aficherUtilisateur.css">
</head>
<body>

<div class="consulter-utilisateur">
    <div class="panel">
      <img src="<?php echo $row["image"]; ?>" class="image" alt="ModdiferSonCompte-Image" />
    </div>
    <div class="hero">
    <h1 class="titre">Consulter offre</h1>
            <div class="contenu">
                <label>Titre : </label>
                <span><?php echo $row["titre"]; ?></span>    
            </div>
            <div class="contenu">
                <label>Description :</label>
                <span><?php echo $row["description"]; ?></span>
            </div>
            <div class="contenu">
                <label>type :</label>
                <span><?php echo $row["type"]; ?></span>
            </div>
            <div class="contenu">
                <label>besoin :</label>
                <span><?php echo $row["besoin"]; ?></span>
            </div>
            <div class="contenu">
                <label>Catégorie :</label>
                <span><?php echo $row2["nom_cat"]; ?></span>
            </div>
            <a class="btn" onclick="history.back()">Retour <i class="fa fa-sign-out"></i>
</a>
      </div>
  </div>

</body>
</html>