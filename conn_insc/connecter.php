<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S'inscrire & Se connecter</title>
     <link rel="icon" type="image/png" href="../images/mini-logo.png">
    <link rel="stylesheet" href="../css/messagesStyle.css">
</head>
<body>
    
</body>
</html>
<?php

    $login = $_POST["login"];
    $pass = $_POST["pass"];

    include_once('../personne/cbd.php');

         $sql = mysqli_query($conn, "SELECT count(*) as total from personne where login_utilisateur = '".$login."'") or die(mysqli_error($conn));      
         if(!$sql){
             echo"Erreur, Veuillez saisir une autre fois";
             exit();
         }else{
         $rw = mysqli_fetch_array($sql);
         $sql = "SELECT mot_de_passe  FROM personne WHERE login_utilisateur = '$login' ;";
         $resultat = mysqli_query($conn, $sql);
         $row = mysqli_fetch_array($resultat);
         $passBD = $row["mot_de_passe"];
         if(password_verify($pass,$passBD)){
            if($rw['total'] > 0){ 
            $sql = "SELECT id_personne  FROM personne WHERE login_utilisateur = '$login' ;";
            $resultat = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($resultat);
            $id = $row["id_personne"];
            session_start();
            $_SESSION['id'] = $id; 
            $_SESSION['login'] = $login; 
            $profile = "SELECT nom_profile FROM profile WHERE id_personne = '$id' ;";
            $resultat = mysqli_query($conn, $profile);
            $row = mysqli_fetch_array($resultat);
            $nom_profile = $row["nom_profile"];
            $_SESSION['profile'] = $nom_profile;
            if($nom_profile == "troqueur"){
                $class = "class = \"msg-succes\"";
                echo "<p ".$class.">Vous êtes connecté avec succès !</p>";
                header("Refresh:4; url=../personne/troqueur.php");
            }else{
                $class = "class = \"msg-succes\"";
                echo "<p ".$class.">Vous êtes connecté avec succès !</p>";
                header("Refresh:4; url=../personne/admin.php");
            }
         
         }else{
            $class = "class = \"msg-erreur\"";
            echo "<p ".$class.">Login ou mot de passe incorrect veuillez réessayer !</p>";
            header("Refresh:3; url=insc-conn.php"); 
         }
        }else{
            $class = "class = \"msg-erreur\"";
            echo "<p ".$class.">login ou mot de passe incorrect veuillez réessayer !</p>";
            header("Refresh:3; url=insc-conn.php"); 
        }
        }

?>