<?php
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    require_once "cbd.php";

    $sql = "SELECT * FROM message_admin WHERE id_message = ?";

    if($stmt = mysqli_prepare($conn, $sql)){

        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        $param_id = trim($_GET["id"]);
        
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                $objet = $row["objet"];
                $msg = $row["msg"];
                $email = $row["email"];
                $date = $row["date_msg"];
            } else{
                header("location: messagesAdmin.php");
                exit();
            }
            
        } else{
            header("location: messagesAdmin.php");
        }
    }
     
    mysqli_close($conn);
} else{
    header("location: messagesAdmin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Objet : <?php echo $row["objet"]; ?></title>
    <link rel="icon" type="image/png" href="../images/mini-logo.png">
    <script src="https://kit.fontawesome.com/64d58efce2.js"></script>
    <link rel="stylesheet" href="../css/aficherMessages.css">
</head>
<body>

<div class="lire-message">
    <div class="panel">
      <img src="../images/lireMessage.svg" class="image" alt="ModdiferSonCompte-Image" />
    </div>
    <div class="hero">
    <h1 class="titre">Consulter message</h1>
            <div class="contenu">
                <label>Objet :</label>
                <p><?php echo $row["objet"]; ?></p>
            </div>
            <div class="contenu">
                <label>Message :</label>
                <p><?php echo $row["msg"]; ?></p>
            </div>
            <div class="contenu">
                <label>Email :</label>
                <p><?php echo $row["email"]; ?></p>
            </div>
            <div class="contenu">
                <label>Date de message :</label>
                <p><?php echo $row["date_msg"]; ?></p>
            </div>
            <a class="btn" onclick="history.back()">Retour <i class="fa fa-sign-out"></i>
</a>
      </div>
  </div>

</body>
</html>