<?php
if(isset($_POST["id"]) && !empty($_POST["id"])){
    require_once "cbd.php";
    
    $sql = "DELETE FROM offre WHERE id_offre = ?";
    
    if($stmt = mysqli_prepare($conn, $sql)){

        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        $param_id = trim($_POST["id"]);
        
        if(mysqli_stmt_execute($stmt)){
            header("location: mesOffres.php");
            exit();
        } else{
            header("location: mesOffres.php");        }
    }
     
        mysqli_close($conn);
} else{
    if(empty(trim($_GET["id"]))){
        header("location: mesOffres.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Supprimer Offre</title>
    <link rel="icon" type="image/png" href="../images/mini-logo.png">
    <link rel="stylesheet" href="../css/aficherMessages.css">
    <link rel="stylesheet" href="../css/supprimerMessages.css">

</head>
<body>
    <div class="lire-message">
    <div class="panel">
      <img src="../images/supprimerMessage.svg" class="image" alt="ModdiferSonCompte-Image" />
    </div>
    <div class="hero">
    <h1 class="titre">Supprimer Offre</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
            <div>Êtes-vous sûr de vouloir supprimer cette offre ?</div>

                <button type="submit" id="supp" class="btnSupp">Oui</button>
                <a onclick="history.back()" class="btnAnn">Non</a>
    </form>
      </div>
  </div>

</body>
</html>