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
    if(isset($_POST["submit-insc"])){
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $email = $_POST["email"];
        $num = $_POST["num"];
        $ville = $_POST["ville"];
        $login = $_POST["login"];
        $pass = $_POST["pass"];
        $pass2 = $_POST["pass2"];

        include_once('../personne/cbd.php');

        $Login_verification = "SELECT * FROM personne WHERE login_utilisateur = '$login' LIMIT 1 ";
        $resultat= mysqli_query($conn, $Login_verification);
        $utilisateur = mysqli_fetch_assoc($resultat);
        
        if ($utilisateur){
        
        if($utilisateur['login_utilisateur']=== $login){
            $class = "class = \"msg-erreur\"";
            echo "<p ".$class.">Ce login est déjà utilisé par un autre utilisateur !</p>";
            header("Refresh:3; url=insc-conn.php"); 
            }
            }
            else{
                $hasher_mot_passe = password_hash($pass,PASSWORD_DEFAULT);
                $insert = "INSERT Into personne (nom, prenom, email, telephone, ville, login_utilisateur, mot_de_passe ) values( '$nom','$prenom', '$email', '$num', '$ville', '$login', '$hasher_mot_passe');";
                $inscrire = mysqli_query($conn, $insert);

                if(!$inscrire){
                    $class = "class = \"msg-erreur\"";
                    echo "<p ".$class.">Une erreur est survenue. Veuillez réessayer une autre fois !</p>";
                    header("Refresh:3; url=insc-conn.php");   
                }
                else{
                    $sql = "SELECT id_personne  FROM personne WHERE login_utilisateur = '$login' ;";
                    $resultat = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($resultat);
                    $id = $row["id_personne"];

                    $profile = "INSERT Into profile (nom_profile,id_personne) values ('troqueur','$id');";
                    $ajouterprofile = mysqli_query($conn, $profile);
                    if(!$ajouterprofile){
                        $class = "class = \"msg-erreur\"";
                        echo "<p ".$class.">Une erreur est survenue. Veuillez réessayer une autre fois !</p>";
                        header("Refresh:3; url=insc-conn.php");   
                    }
                    session_start();
                    $_SESSION['login'] = $login; 
                    $_SESSION['id'] = $id; 
                    $_SESSION['profile'] = "troqueur"; 
                    $class = "class = \"msg-succes\"";
                    echo "<p ".$class.">Vous êtes enregistré avec succès !</p>";
                    header("Refresh:4; url=../personne/troqueur.php"); 
                }
        }
    }

         
?>










