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

                $sql = "SELECT * FROM message_admin ORDER BY date_msg DESC";
                if($result = mysqli_query($conn, $sql)){
                    if(mysqli_num_rows($result) > 0){
                        echo '<table class="table">';
                        echo '<legend class="legend">Messages reçus</legend>';
                            echo "<thead>";
                                echo "<tr>";
                                    echo "<th>Email</th>";
                                    echo "<th>Date</th>";
                                    echo "<th>Objet</th>";
                                    echo "<th>Message</th>";             
                                    echo "<th>Action</th>";
                                echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            while($row = mysqli_fetch_array($result)){
                                echo "<tr>";
                                    echo "<td>" . $row['email'] . "</td>";
                                    echo "<td>" . $row['date_msg'] . "</td>";
                                    echo "<td>" . $row['objet'] . "</td>";
                                    echo "<td>" . $row['msg'] . "</td>";   
                                    echo "<td id=\"liens\">";
                                        echo '<a href="lireMessage.php?id='. $row['id_message'] .'" class="lien"><span class="fa fa-eye"></span></a>';
                                        echo '<a href="supprimerMessage.php?id='. $row['id_message'] .'" class="lien"><span class="fa fa-trash"></span></a>';
                                    echo "</td>";
                                
                            }
                            echo "</tbody>";                            
                        echo "</table>";
                        mysqli_free_result($result);
                    } else{
                        echo '<div class="contenu">';
                        echo '<div class="aucun-message"><em>Vous n\'avez aucun message !!</em></div>';
                        echo '<img class="image" src="../images/boiteVide.svg"></div>';
                        echo '</div>';
                    }
                    mysqli_close($conn);
                }
                ?> 

</body>

</html>