<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Déposer une offre</title>
  <link rel="icon" type="image/png" href="../images/mini-logo.png">
  <script src="https://kit.fontawesome.com/64d58efce2.js"></script>
  <link rel="stylesheet" href="../css/offre.css">
  <script defer src="../js/offre.js"></script>
</head>

<body>
  <div class="ajt-offre">
    <div class="panel">
      <img src="../images/ajouterOffre.svg" class="image" alt="Offre-Image" />
    </div>
    <div class="formulaire">
      <form action="ajouterOffre.php" method="POST" class="form" id="form" enctype="multipart/form-data">
        <h2 class="titre">Ajouter une offre</h2>
        <div class="input-field">
          <i class="fa fa-header"></i>
          <input type="text" name="titre" id="titre" placeholder="Titre de votre offre" autocomplete="off" />
          <i class="fa fa-exclamation-circle"></i>
          <i class="fa fa-check"></i>
        </div>
        <p id="erreurTitre" class="erreur-text"></p>
        <div class="input-field">
          <i class="fa fa-check-square"></i>
          <div class="select">
            <select name="type" id="select" required>
              <option value="vide" disabled>Type de votre offre</option>
              <option value="Bien">Bien</option>
              <option value="Service">Service</option>
            </select>
            <i class="fa fa-arrow-down" id="btn"></i>
          </div>
        </div>
        <p id="erreurSelect" class="erreur-text"></p>
        <div class="input-field">
          <i class="fa fa-check-square"></i>
          <div class="select">
            <select name="categorie" id="selectCat">
              <option value="">Catégorie de votre offre</option>
              <option value="Technologies">Technologies</option>
              <option value="Décoration">Décoration</option>
              <option value="Vêtements">Vêtements</option>
              <option value="Cuisine">Cuisine</option>
              <option value="Sport">Sport</option>
              <option value="Loisirs">Loisirs</option>
              <option value="Vehicules">Vehicules</option>
              <option value="Bébé">Pour Bébé</option>
              <option value="Jeux">Jeux</option>
            </select>
            <i class="fa fa-arrow-down" id="btn"></i>
          </div>
        </div>
        <p id="erreurSelectCat" class="erreur-text"></p>
        <div class="input-field" id="desciption">
          <i class="fa fa-comment-o"></i>
          <textarea class="description-offre" name="description" id="descriptionoffre" autocomplete="off"
            placeholder="Description de votre offre"></textarea>
          <i class="fa fa-exclamation-circle"></i>
          <i class="fa fa-check"></i>
        </div>
        <p id="erreurDescription" class="erreur-text"></p>
        <div class="input-field">
          <i class="fa fa-picture-o"></i>
          <label class="selectionner-image">
            <input type="file" name="image" id="input-image" onchange="copierLocation()" />
            Image
          </label>
          <span id="image-location">Sélectionnez image</span>
          <i class="fa fa-exclamation-circle"></i>
          <i class="fa fa-check"></i>
        </div>
        <p id="erreurImage" class="erreur-text"></p>
        <div class="input-field" id="souhaite">
          <i class="fa fa-handshake-o"></i>
          <textarea name="souhait" id="etatcourrent" placeholder="Souhait">Je n'ai pas un souhait précis</textarea>
          <i class="fa fa-trash" id="icone" onclick="effacerIcone()"></i>
        </div>
        <p id="erreurSouhaite" class="erreur-text"></p>
        <input type="submit" name="submit" class="btn" value="Ajouter l'offre" />
      </form>
    </div>
  </div>
  <a href="troqueur.php" class="icone-quitter"><i class="fa fa-long-arrow-right" id="quitter"></i></a>
</body>

</html>