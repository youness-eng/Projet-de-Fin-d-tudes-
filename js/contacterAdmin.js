// La validation des champs de contact de l'admin


var form = document.getElementById('form');
var email = document.getElementById('email');
var objet = document.getElementById('objet');
var message = document.getElementById('messageAdmin');
var erreur = [];

form.addEventListener('submit', e => {
	verifierChamps();
    if(erreur.length > 0){
    e.preventDefault();
    }
	
});

function verifierChamps() {
	var emailValeur = email.value;
	var objetValeur = objet.value;
	var messageValeur = message.value;
	
	
	if(emailValeur === '' || emailValeur == null) {
		champsErreurs(0);
        afficherErreurs("erreurEmail", "Vous n'avez pas renseigner votre email !!");
	} else if (!verifierEmail(emailValeur)) {
		champsErreurs(0);
        afficherErreurs("erreurEmail","\"" + emailValeur + "\" est une adresse email invalide !!");
	} else {
		champsValides(0);
	}
	
	if(objetValeur === '' || objetValeur == null) {
		champsErreurs(1);
        afficherErreurs("erreurObjet", "Vous n'avez pas renseigner l'objet de votre message !!");
	} else if (/[^a-zA-Z]/.test(objetValeur)) {
		champsErreurs(1);
        afficherErreurs("erreurObjet", "L'objet' doit contient des lettres seulement !!");
	} 
    else {
		champsValides(1);
	}
	
	if(messageValeur == '' || messageValeur == null) {
		champsErreurs(2);
        afficherErreurs("erreurMessage", "Vous n'avez pas renseigner votre message !!");
	} else{
		champsValides(2);
	}
}

function verifierEmail(email) {
	return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
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
    erreur.pop("erreur"+ x);
    erreur.filter(e => e !== "erreur" + x);
    var supprimerTextErreur = document.getElementsByClassName("erreur-text")[x].style.display = "none";
}
function afficherErreurs(x, erreur){
    var erreur = document.getElementById(x).innerHTML = erreur;
}