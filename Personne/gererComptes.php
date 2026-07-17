<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>boite de réception des messages</title>
    <link rel="icon" type="image/png" href="../images/mini-logo.png">
    <script src="https://kit.fontawesome.com/64d58efce2.js"></script>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/gererComptes.css">
    <script defer src="../js/menuAdmin.js"></script>
</head>

<body>
    <header id="header" class="header-admin">
                    <a href="admin.php"><img src="../images/logo.png" id="logo" alt="Logo"></a>
                    <div class="menu-btn">
                        <div class="menu-btn__burger"></div>
                    </div>
    </header>
    
                <?php
                include_once('cbd.php');

                $sql = "SELECT * FROM personne ORDER BY Date_inscription DESC";
                if($result = mysqli_query($conn, $sql)){
                    if(mysqli_num_rows($result) > 0){
                        echo '<div class="contenu">';
                        echo '<table class="table">';
                        echo '<legend class="legend">Personnes Inscrits</legend>';
                            echo "<thead>";
                                echo "<tr>";
                                    echo "<th>Nom</th>";
                                    echo "<th>Prénom </th>";
                                    echo "<th>Email</th>";
                                    echo "<th>Numéro de téléphone</th>";
                                    echo "<th>Ville</th>";
                                    echo "<th>Login d'utilisateur</th>";
                                    echo "<th>Date d'inscription</th>";
                                    echo "<th>Action</th>";
                                echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            while($row = mysqli_fetch_array($result)){
                                echo "<tr>";
                                    echo "<td>" . $row['nom'] . "</td>";
                                    echo "<td>" . $row['prenom'] . "</td>";
                                    echo "<td>" . $row['email'] . "</td>";
                                    echo "<td> 0" . $row['telephone'] . "</td>";
                                    echo "<td>" . $row['ville'] . "</td>";
                                    echo "<td>" . $row['login_utilisateur'] . "</td>";                                    echo "<td>" . $row['Date_inscription'] . "</td>";
                                    echo "<td id=\"liens\">";
                                        echo '<a href="gererComptes/consulterUtilisateur.php?id='. $row['id_personne'] .'" class="lien"><span class="fa fa-eye"></span></a>';
                                        echo '<a href="gererComptes/modifierUtilisateur.php?id='. $row['id_personne'] .'" class="lien"><span class="fa fa-pencil"></span></a>';
                                        echo '<a href="gererComptes/supprimerUtilisateur.php?id='. $row['id_personne'] .'" class="lien"><span class="fa fa-trash"></span></a>';
                                    echo "</td>";
                                
                            }
                            echo "</tbody>";                            
                        echo "</table>";
                        echo "</div>";
                        mysqli_free_result($result);
                    } else{
                        echo '<div class="Aucun-message"><em>Aucun utilisateur a inscrit.</em></div>';
                    }
                    mysqli_close($conn);
                }
                ?>



</body>

</html>