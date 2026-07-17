<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>boite de réception des messages</title>
    <link rel="icon" type="image/png" href="../images/mini-logo.png">
    <script src="https://kit.fontawesome.com/64d58efce2.js"></script>
    <link rel="stylesheet" href="../css/tables.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/messages.css">
    <script defer src="../js/menuTroqueur.js"></script>
</head>

<body>
    <header id="header" class="header-admin">
                    <a href="messageTroqueur.php"><img src="../images/logo.png" id="logo" alt="Logo"></a>
                    <div class="menu-btn">
                        <div class="menu-btn__burger"></div>
                    </div>
    </header>
    
                <?php
                include_once('cbd.php');
                session_start(); 
                $login = $_SESSION['login'];
                $selectionner_id = "SELECT * FROM personne WHERE login_utilisateur = '$login'";
                $id_utilisateur = mysqli_query($conn, $selectionner_id);
                $row2 = mysqli_fetch_array($id_utilisateur);
                $id = $row2['id_personne'] ;
                $sql = "SELECT * FROM message_offre WHERE id_personne = '$id'  ORDER BY date_msg DESC";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0 ){
                        echo '<table class="table">';
                        echo '<legend class="legend">Messages reçus</legend>';
                            echo "<thead>";
                                echo "<tr>";
                                    echo "<th>Destinateur</th>";
                                    echo "<th>Message</th>";
                                    echo "<th>Date</th>";
                                    echo "<th>Action</th>";
                                echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            while($row = mysqli_fetch_array($result)){
                                $_SESSION['id_personne'] = $row['id_destinateur'];
                                $id_destinateur = $row['id_destinateur'];
                                $sql2 = "SELECT * FROM personne WHERE id_personne = '$id_destinateur'";
                                $result3 = mysqli_query($conn, $sql2);
                                $row3 = mysqli_fetch_array($result3);
                                echo "<tr>";
                                    echo "<td>" . $row3['nom']." ". $row3['prenom'] . "</td>";
                                    echo "<td>" . $row['msg'] . "</td>";
                                    echo "<td>" . $row['date_msg'] . "</td>";
                                    echo "<td id=\"liens\">";
                                        echo '<a href="messageTroqueur/lireMessage.php?id='. $row['id_destinateur'] .'&id_msg='. $row['id_msg'] .'" class="lien"><span class="fa fa-eye"></span></a>';
                                        echo '<a href="messageTroqueur/supprimerMessage.php?id='. $row['id_msg'] .'" class="lien"><span class="fa fa-trash"></span></a>';
                                        echo '<a href="messageTroqueur/reppondreMessage.php?id='. $row['id_destinateur'] .'" class="lien"><span class="fa fa-reply"></span></a>';
                                    echo "</td>";
                                    
                                
                            }
                            echo "</tbody>";                            
                        echo "</table>";
                        mysqli_free_result($result);
                    
                }


                $sql = "SELECT * FROM message_offre WHERE id_destinateur = '$id'  ORDER BY date_msg DESC";
                $result = mysqli_query($conn, $sql);
                if ( mysqli_num_rows($result) > 0 ){
                        echo '<table class="table">';
                        echo '<legend class="legend">Messages envoyés</legend>';
                            echo "<thead>";
                                echo "<tr>";
                                    echo "<th>Destinataire</th>";
                                    echo "<th>Message</th>";
                                    echo "<th>Date</th>";
                                    echo "<th>Action</th>";
                                echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            while($row = mysqli_fetch_array($result)){
                                $id_personne = $row['id_personne'];
                                $sql2 = "SELECT * FROM personne WHERE id_personne = '$id_personne'";
                                $result3 = mysqli_query($conn, $sql2);
                                $row3 = mysqli_fetch_array($result3);
                                echo "<tr>";
                                    echo "<td>" . $row3['nom']." ". $row3['prenom'] . "</td>";
                                    echo "<td>" . $row['msg'] . "</td>";
                                    echo "<td>" . $row['date_msg'] . "</td>";
                                    echo "<td id=\"liens\">";
                                        echo '<a href="messageTroqueur/lireMessageEnvoyer.php?id='. $row['id_personne'] .'&id_msg='. $row['id_msg'] .'" class="lien"><span class="fa fa-eye"></span></a>';
                                        echo '<a href="messageTroqueur/supprimerMessage.php?id='. $row['id_msg'] .'" class="lien"><span class="fa fa-trash"></span></a>';
                                        echo '<a href="messageTroqueur/reppondreMessage.php?id='. $row['id_personne'] .'" class="lien"><span class="fa fa-reply"></span></a>';
                                    echo "</td>";                     
                                
                            }
                            echo "</tbody>";                            
                        echo "</table>";
                        mysqli_free_result($result);
                     
                }
                else{
                    echo '<div class="contenu">';
                    echo '<div class="aucun-message"><em>Vous n\'avez aucun message !!</em></div>';
                    echo '<img class="pas-message" src="../images/boiteVide.svg"></div>';
                    echo '</div>';
                }
                mysqli_close($conn);

                ?> 

</body>

</html>