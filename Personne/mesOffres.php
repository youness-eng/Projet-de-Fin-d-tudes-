<!DOCTYPE html>
<html>

<head>
  <title>Mes offres</title>
  <link rel="icon" type="image/png" href="../images/mini-logo.png">
  <link rel="stylesheet" href="../css/offres.css">
  <link rel="stylesheet" href="../css/header.css">
  <script src="https://kit.fontawesome.com/64d58efce2.js"></script>
  <script src="../js/offres.js"></script>
</head>

<body>
  <?php 
  session_start();
  $profile = $_SESSION['profile'];
      if($profile == "troqueur"){
      $lien = "troqueur.php";
      }
      else{
      $lien = "admin.php";
      }
  ?>
  <header id="header" class="header-admin">
    <a href="<?php echo $lien;?>"><img src="../images/logo.png" id="logo" alt="Logo"></a>
    <a class="icone-quitter"><i class="fa fa-long-arrow-right" id="quitter" onclick="window.history.go(-1); return false;"></i></a>
  </header>
  <div class="rechercher-bar">
    <div>
      <form id="formulaire-type">
          <span id="selectionner-par">Sélectionner par : </span>
          <input type="submit" name="tous" class="submit" value="Tous">
          <input type="submit" name="bien" class="submit" value="Bien">
          <input type="submit" name="service" class="submit" value="Service">
      </form>
    </div>
      <h2 class="titre">Mes offres</h2>
      <div class="aligner">
        <span class="span">Rechercher par mot clé ici</span>
        <div class="form">
          <form id="rechercher-form">
            <input type="text" name="input" class="input" id="rechercher-input" autocomplete="off">
            <button type="reset" class="rechercher" id="rechercher-btn" onclick="expand()"></button>
          </form>
        </div>
      </div>
  </div>
</div>
  <div class="conteneur">
    <?php
        include "cbd.php";
        $id = $_SESSION['id'];
        if( isset($_GET['bien'])){
            $sql = "SELECT * FROM offre WHERE type = 'bien' AND id_personne  = '$id'";
            $resultat_rechercher = mysqli_query($conn,$sql);
            if(mysqli_num_rows($resultat_rechercher) > 0){
            while($data = mysqli_fetch_array($resultat_rechercher))
        {
        ?>
    <div class="offre">
      <div class="img-offre-div">
        <img class="image-offre" src="<?php echo $data['image']; ?>">
      </div>
      <div class="contenu-offre">
        <h2><?php echo $data['titre']; ?></h2>
        <div class="besoin"><span class="label">Souhait :</span><?php echo $data['besoin']; ?></div>
        <div class="type"><span class="label">Type :</span><?php echo $data['type']; ?></div>
        <a href="modifierOffre.php?id=<?php echo $data['id_offre'];?> " class="lien-offre">Modifier</a>
        <a href="supprimerOffre.php?id=<?php echo $data['id_offre'];?> " class="lien-offre" id="supprimer">Supprimer</a>
      </div>
    </div>

    <?php
}}else{
      echo '<div class="aucun-offre-rechercher">';
      echo '<div class="aucun-offre"><em>Vous n\'avez poster aucun offre de type bien !!</em></div>';
      echo '<img id="img" src="../images/motRechercherInvalide.svg"></div>';
      echo '</div>';

}
}

elseif( isset($_GET['service'])){
  $service = $_GET['service'];
  $sql = "SELECT * FROM offre WHERE type = 'service' AND id_personne  = '$id'";
  $resultat_rechercher = mysqli_query($conn,$sql);
  if(mysqli_num_rows($resultat_rechercher) > 0){
  while($data = mysqli_fetch_array($resultat_rechercher))
{
?>
    <div class="offre">
      <div class="img-offre-div">
        <img class="image-offre" src="<?php echo $data['image']; ?>">
      </div>
      <div class="contenu-offre">
        <h2><?php echo $data['titre']; ?></h2>
        <div class="besoin"><span class="label">Souhait :</span><?php echo $data['besoin']; ?></div>
        <div class="type"><span class="label">Type :</span><?php echo $data['type']; ?></div>
        <a href="modifierOffre.php?id=<?php echo $data['id_offre'];?> " class="lien-offre">Modifier</a>
        <a href="supprimerOffre.php?id=<?php echo $data['id_offre'];?> " class="lien-offre" id="supprimer">Supprimer</a>
      </div>
    </div>

    <?php
}}else{
    echo '<div class="aucun-offre-rechercher">';
    echo '<div class="aucun-offre"><em>Vous n\'avez poster aucun offre de type service !!</em></div>';
    echo '<img id="img" src="../images/motRechercherInvalide.svg"></div>';
    echo '</div>';

}
}


elseif( isset($_GET['input']) || !empty($_GET['input'])){
    $rechercher = mysqli_real_escape_string($conn, htmlspecialchars($_GET['input']));
    $sql = "SELECT * FROM offre WHERE id_personne = '$id' AND (titre  LIKE '%$rechercher%' OR besoin LIKE '%$rechercher%')";
    $resultat_rechercher = mysqli_query($conn,$sql);
    if(mysqli_num_rows($resultat_rechercher) > 0){
    while($data = mysqli_fetch_array($resultat_rechercher))
{
?>
    <div class="offre">
      <div class="img-offre-div">
        <img class="image-offre" src="<?php echo $data['image']; ?>">
      </div>
      <div class="contenu-offre">
        <h2><?php echo $data['titre']; ?></h2>
        <div class="besoin"><span class="label">Souhait :</span><?php echo $data['besoin']; ?></div>
        <div class="type"><span class="label">Type :</span><?php echo $data['type']; ?></div>
        <a href="modifierOffre.php?id=<?php echo $data['id_offre'];?> " class="lien-offre">Modifier</a>
        <a href="supprimerOffre.php?id=<?php echo $data['id_offre'];?> " class="lien-offre" id="supprimer">Supprimer</a>
      </div>
    </div>

    <?php
}}else{
      echo '<div class="aucun-offre-rechercher">';
      echo '<div class="aucun-offre"><em>Aucun offre ne correspond au mot recherché !!</em></div>';
      echo '<img id="img" src="../images/motRechercherInvalide.svg"></div>';
      echo '</div>';

}


}
elseif(!isset($_GET['input']) || !isset($_GET['bien']) || !isset($_GET['service']) || isset($_GET['tous']) ){
$selectionner = "SELECT * from offre  WHERE id_personne  = '$id';";
$resultat = mysqli_query($conn,$selectionner);
if(mysqli_num_rows($resultat) > 0){
while($data = mysqli_fetch_array($resultat))
{
?>
    <div class="offre">
      <div class="img-offre-div">
        <img class="image-offre" src="<?php echo $data['image']; ?>">
      </div>
      <div class="contenu-offre">
        <h2><?php echo $data['titre']; ?></h2>
        <div class="besoin"><span class="label">Souhait :</span><?php echo $data['besoin']; ?></div>
        <div class="type"><span class="label">Type :</span><?php echo $data['type']; ?></div>
        <a href="modifierOffre.php?id=<?php echo $data['id_offre'];?> " class="lien-offre">Modifier</a>
        <a href="supprimerOffre.php?id=<?php echo $data['id_offre'];?> " class="lien-offre" id="supprimer">Supprimer</a>
      </div>
    </div>

    <?php
}}
 else{
      echo '<div class="aucun-offre-rechercher">';
      echo '<div class="aucun-offre"><em>Vous n\'avez poster aucun offre !!</em></div>';
      echo '<img id="img" src="../images/pasOffres.svg"></div>';
      echo '</div>';
}
}     mysqli_close($conn); 
?>

</body>

</html>