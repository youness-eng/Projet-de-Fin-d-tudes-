// La validation des champs de contact 


var form = document.getElementById('form');
var message = document.getElementById('Troqueur');
var erreur = [];

form.addEventListener('submit', e => {
	verifierChamp();
    if(erreur.length > 0){
    e.preventDefault();
    }
	
});

function verifierChamp() {
	var messageValeur = message.value;
	
	if(messageValeur == '' || messageValeur == null) {
		champErreur(1);
        afficherErreurs("erreurMessage", "Vous n'avez pas renseigner votre message !!");
	} else{
		champValide(1);
	}
}

function champErreur(x){
    var divClass = document.getElementsByClassName("input-field");
    divClass[x].classList.add("erreur");
    divClass[x].classList.remove("valider");
    erreur.push("erreur");
	var ajouterTextErreur = document.getElementsByClassName("erreur-text")[x].style.display = "block";
}
function champValide(x){
    var divClass = document.getElementsByClassName("input-field");
    divClass[x].classList.add("valider");
    divClass[x].classList.remove("erreur");
    erreur.pop("erreur");
    var supprimerTextErreur = document.getElementsByClassName("erreur-text")[x].style.display = "none";
}
function afficherErreurs(x, erreur){
    var erreur = document.getElementById(x).innerHTML = erreur;
}