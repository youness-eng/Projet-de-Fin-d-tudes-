//fonction pour copier la nom du fichier sur la machine de l'utilisateur

function copierLocation(){
    var inputImage = document.getElementById("input-image");
    var imageLocation = document.getElementById("image-location");
  if (inputImage.value) {
    imageLocation.innerHTML = inputImage.value.match(
      /[\/\\]([\w\d\s\.\-\(\)]+)$/
    )[1];
  } else {
    imageLocation.innerHTML = "Sélectionnez image";
  }
};

// Ajouter deux icones qui va ajouter la valeur par defaut ou l'effacer par une seule clique  

function effacerIcone(){
  var iconeCourrent = document.getElementById("icone");
if(iconeCourrent.className == "fa fa-trash"){
  var icone = document.getElementById('icone').className = "fa fa-plus";
  var contenu = document.querySelector("#etatcourrent").value = "";
}
else{
  var icone = document.getElementById('icone').className = "fa fa-trash";
  var contenu = document.querySelector("#etatcourrent").value = "Je n'ai pas un souhait précis";
}}


// Verifier les champs de la deposition d'une offre

var form = document.getElementById('form');
var titre = document.getElementById('titre');
var select = document.getElementById('select');
var selectCat = document.getElementById('selectCat');
var description = document.getElementById('descriptionoffre');
var image= document.getElementById('image-location');
var souhaite = document.getElementById('etatcourrent');
var erreur = [];

form.addEventListener('submit', e => {
	  verifierChamps();
    if(erreur.length > 0){
    e.preventDefault();
    }
});

function verifierChamps() {
      var titreValeur = titre.value;
      var selectValeur = select.value;
      var selectCatValeur = selectCat.value;
      var descriptionValeur = description.value;
      var imageValeur = image.innerHTML;
      var souhaiteValeur = souhaite.value;
      
      if(titreValeur === '' || titreValeur == null) {
        champsErreurs(0);
            afficherErreurs("erreurTitre", "Vous n'avez pas renseigner le titre de votre offre !!");
      } else {
        champsValides(0);
      }
      if(selectValeur === '' || selectValeur == null) {
        champsErreurs(1);
            afficherErreurs("erreurSelect", "Vous n'avez pas spécifier le type de votre offre !!");
            console.log(erreur)
      } else {
        champsValides(1);
      }
      if(selectCatValeur == '' || selectCatValeur == null) {
        champsErreurs(2);
            afficherErreurs("erreurSelectCat", "Vous n'avez pas renseigner la catégorie de votre offre !!");
      } else {
        champsValides(2);
      }
      if(descriptionValeur == '' || descriptionValeur == null) {
        champsErreurs(3);
            afficherErreurs("erreurDescription", "Vous n'avez pas renseigner la description de votre offre !!");
      } else {
        champsValides(3);
      }
      if(imageValeur == "Sélectionnez image") {
        champsErreurs(4);
            afficherErreurs("erreurImage", "Vous n'avez pas renseigner l'image de votre offre !!");
      } else {
        champsValides(4);
      }
      if(souhaiteValeur === '' || souhaiteValeur == null) {
        champsErreurs(5);
            afficherErreurs("erreurSouhaite", "Vous n'avez pas renseigner votre souhaite !!");
      } else {
        champsValides(5);
      }
}
function champsErreurs(x){
  var divClass = document.getElementsByClassName("input-field");
  divClass[x].classList.add("erreur");
  divClass[x].classList.remove("valider");
  erreur.push("erreur" + x);
  var ajouterTextErreur = document.getElementsByClassName("erreur-text")[x].style.display = "block";
}
function champsValides(x){
  var divClass = document.getElementsByClassName("input-field");
  divClass[x].classList.add("valider");
  divClass[x].classList.remove("erreur");
  erreur.pop("erreur" + x);
  var supprimerTextErreur = document.getElementsByClassName("erreur-text")[x].style.display = "none";
}
function afficherErreurs(x, erreur){
  var erreur = document.getElementById(x).innerHTML = erreur;
}

