<!DOCTYPE html>
<html>

<head>
  <title>Rechercher offre</title>
  <link rel="icon" type="image/png" href="../images/mini-logo.png">
  <link rel="stylesheet" href="../css/offres.css">
  <link rel="stylesheet" href="../css/header.css">
  <script src="https://kit.fontawesome.com/64d58efce2.js"></script>
</head>

<body>
  <header id="header" class="header-admin">
    <a href="aficherOffres.php"><img src="../images/logo.png" id="logo" alt="Logo"></a>
    <a class="icone-quitter"><i class="fa fa-long-arrow-right" id="quitter"
        onclick="window.history.go(-1); return false;"></i></a>
  </header>
  <h2 class="titre">Catégorie <?php echo $_GET["categorie"]?> </h2>
  <div class="conteneur">
<?php
  include_once('cbd.php');
  
  $categorie = trim($_GET["categorie"]);
  $sql = "SELECT * FROM categorie WHERE nom_cat ='$categorie';";
  $resultat_rechercher = mysqli_query($conn,$sql);
  if(mysqli_num_rows($resultat_rechercher) > 0){
  while($data = mysqli_fetch_array($resultat_rechercher)){
  $id_offre = $data['id_offre'];
  $sql = "SELECT * FROM offre WHERE id_offre ='$id_offre';";
  $resultat_rechercher2 = mysqli_query($conn,$sql);
  while($data = mysqli_fetch_array($resultat_rechercher2))
{
?>

  <div class="offre">
    <div class="img-offre-div">
      <img class="image-offre" src="<?php echo $data['image']; ?>">
    </div>
    <div class="contenu-offre">
      <h2><?php echo $data['titre']; ?></h2>
      <div class="besoin"><span class="label">Besoin :</span><?php echo $data['besoin']; ?></div>
      <div class="type"><span class="label">Type :</span><?php echo $data['type']; ?></div>
      <a href="consulterOffre.php?id=<?php echo $data['id_offre'];?> " class="lien-offre">Consulter</a>
      <a href="contacterTroqueur.php?id=<?php echo $data['id_personne'];?>&id_offre=<?php echo $data['id_offre'];?> "
        class="lien-offre">Contacter</a>
    </div>
  </div>

  <?php
}}}else{
    echo '<div class="aucun-offre-rechercher">';
    echo '<div class="aucun-offre"><em>Aucun offre ne correspond a cette catégorie !!</em></div>';
    echo '<img id="img" src="../images/motRechercherInvalide.svg"></div>';
    echo '</div>';

}


?>