<!DOCTYPE html>
<html>

<head>
  <title>Rechercher offre</title>
  <link rel="icon" type="image/png" href="../images/mini-logo.png">
  <link rel="stylesheet" href="../css/offres.css">
  <script src="https://kit.fontawesome.com/64d58efce2.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  <link rel="stylesheet" href="../css/header.css">
  <script defer src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <script defer src="../js/offres.js"></script>

</head>

<body>
<?php 
  session_start();
  if(isset($_SESSION['profile'])){
    $profile = $_SESSION['profile'];
        if($profile == "troqueur"){
        $lien = "troqueur.php";
        }
        else{
        $lien = "admin.php";
        }
  }else{
        $lien = "../index.php";
  }
  ?>
  <header id="header" class="header-admin">
    <a href="<?php echo $lien;?>"><img src="../images/logo.png" id="logo" alt="Logo"></a>
    <a class="icone-quitter"><i class="fa fa-long-arrow-right" id="quitter"
        onclick="window.history.go(-1); return false;"></i></a>
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
  <h2 class="titre">Découvrez nos catégories</h2>



  <div class="swiper-container">
    <div class="swiper-wrapper">
      <div class="swiper-slide">
            <div class="card">
              <div class="sliderText">
                <h3>Les technologies</h3>
              </div>
              <div class="contenu">
              <img src="../images/technologies.png" alt="">   
              <a href="rechercherParCat.php?categorie=Technologies">Rechercher</a>
              </div>
            </div>
      </div>
      <div class="swiper-slide">
            <div class="card">
              <div class="sliderText">
                <h3>Produits décoration</h3>
              </div>
              <div class="contenu">
              <img src="../images/accessories.png" alt="">     
              <a href="rechercherParCat.php?categorie=Décoration">Rechercher</a>
              </div>
            </div>
      </div>
      <div class="swiper-slide">
            <div class="card">
              <div class="sliderText">
                <h3>Les Vêtements</h3>
              </div>
              <div class="contenu">
              <img src="../images/vetements.png" alt=""> 
              <a href="rechercherParCat.php?categorie=Vêtements">Rechercher</a>
              </div>
            </div>
      </div>
      <div class="swiper-slide">
            <div class="card">
              <div class="sliderText">
                <h3>Maison et cuisine</h3>
              </div>
              <div class="contenu">
              <img src="../images/cuisine.png" alt=""> 
              <a href="rechercherParCat.php?categorie=Cuisine">Rechercher</a>
              </div>
            </div>
      </div>
      <div class="swiper-slide">
            <div class="card">
              <div class="sliderText">
                <h3>Les articles de sport</h3>
              </div>
              <div class="contenu">
              <img src="../images/gym.png" alt=""> 
              <a href="rechercherParCat.php?categorie=Sport">Rechercher</a>
              </div>
            </div>
      </div>
      <div class="swiper-slide">
            <div class="card">
              <div class="sliderText">
                <h3>Loisirs</h3>
              </div>
              <div class="contenu">
              <img src="../images/hobbies.png" alt=""> 
              <a href="rechercherParCat.php?categorie=Loisirs">Rechercher</a>
              </div>
            </div>
      </div>
      <div class="swiper-slide">
            <div class="card">
              <div class="sliderText">
                <h3>Vehicules</h3>
              </div>
              <div class="contenu">
              <img src="../images/vehicle.png" alt=""> 
                <a href="rechercherParCat.php?categorie=Vehicules">Rechercher</a>
              </div>
            </div>
      </div>
      <div class="swiper-slide">
            <div class="card">
              <div class="sliderText">
                <h3>Pour bébé</h3>
              </div>
              <div class="contenu">
              <img src="../images/bebe.png" alt=""> 
              <a href="rechercherParCat.php?categorie=Bébé">Rechercher</a>
              </div>
            </div>
      </div>
      <div class="swiper-slide">
            <div class="card">
              <div class="sliderText">
                <h3>Jouets et jeux</h3>
              </div>
              <div class="contenu">
              <img src="../images/jeux.png" alt="">               
               <a href="rechercherParCat.php?categorie=Jeux">Rechercher</a>
              </div>
            </div>
      </div>
    </div>
  </div>

  <div class="conteneur">
    <?php
include "cbd.php";

if( isset($_GET['bien'])){
    $sql = "SELECT * FROM offre WHERE type = 'bien'";
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
        <a href="consulterOffre.php?id=<?php echo $data['id_offre'];?> " class="lien-offre">Consulter</a>
        <?php if(isset($_SESSION['profile'])){ ?>
        <a href="contacterTroqueur.php?id=<?php echo $data['id_personne'];?>&id_offre=<?php echo $data['id_offre'];?> "
          class="lien-offre">Contacter</a>
          <?php } ?>
      </div>
    </div>

    <?php
}}else{
      echo '<div class="aucun-offre-rechercher">';
      echo '<div class="aucun-offre"><em>Aucun offre ne correspond au type bien !!</em></div>';
      echo '<img id="img" src="../images/motRechercherInvalide.svg"></div>';
      echo '</div>';

}
}

elseif( isset($_GET['service'])){
  $service = $_GET['service'];
  $sql = "SELECT * FROM offre WHERE type = 'service'";
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
        <a href="consulterOffre.php?id=<?php echo $data['id_offre'];?> " class="lien-offre">Consulter</a>
        <?php if(isset($_SESSION['profile'])){ ?>
        <a href="contacterTroqueur.php?id=<?php echo $data['id_personne'];?>&id_offre=<?php echo $data['id_offre'];?> "
          class="lien-offre">Contacter</a>
          <?php } ?>
      </div>
    </div>

    <?php
}}else{
    echo '<div class="aucun-offre-rechercher">';
    echo '<div class="aucun-offre"><em>Aucun offre ne correspond au type service !!</em></div>';
    echo '<img id="img" src="../images/motRechercherInvalide.svg"></div>';
    echo '</div>';

}
}


elseif( isset($_GET['input']) || !empty($_GET['input'])){
    $rechercher = mysqli_real_escape_string($conn, htmlspecialchars($_GET['input']));
    $sql = "SELECT * FROM offre WHERE titre  LIKE '%$rechercher%' OR besoin LIKE '%$rechercher%' OR description LIKE '%$rechercher%'";
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
        <a href="consulterOffre.php?id=<?php echo $data['id_offre'];?> " class="lien-offre">Consulter</a>
        <?php if(isset($_SESSION['profile'])){ ?>
        <a href="contacterTroqueur.php?id=<?php echo $data['id_personne'];?>&id_offre=<?php echo $data['id_offre'];?> "
          class="lien-offre">Contacter</a>
          <?php } ?>
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
elseif(!isset($_GET['input']) ){
$selectionner = "SELECT * from offre;";
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
        <a href="consulterOffre.php?id=<?php echo $data['id_offre'];?> " class="lien-offre">Consulter</a>
        <?php if(isset($_SESSION['profile'])){ ?>
        <a href="contacterTroqueur.php?id=<?php echo $data['id_personne'];?>&id_offre=<?php echo $data['id_offre'];?> "
          class="lien-offre">Contacter</a>
          <?php } ?>
      </div>
    </div>

    <?php
}}
echo '</div>';
} else{
      echo '<div class="contenu">';
      echo '<div class="aucun-offre"><em>Il n y\'a aucun offre à afficher !!</em></div>';
      echo '<img id="img" src="../images/pasOffres.svg"></div>';
      echo '</div>';
}
     mysqli_close($conn); 
?>

</body>

</html>