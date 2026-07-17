var form = document.getElementById('form');
var nom = document.getElementById('nom');
var prenom = document.getElementById('prenom');
var email = document.getElementById('email');
var password = document.getElementById('password');
var password2 = document.getElementById('password2');
var num = document.getElementById('num');
var ville = document.getElementById('ville');
var login = document.getElementById('login');
var erreur = [];

form.addEventListener('submit', e => {
	verifierChamps();
    if(erreur.length > 0){
    e.preventDefault();
    }
	
});

function verifierChamps() {
	var nomValeur = nom.value.trim();
	var prenomValeur = prenom.value.trim();
	var emailValeur = email.value.trim();
	var passwordValeur = password.value;
	var password2Valeur = password2.value;
	var numValeur = num.value.trim();
  	var villeValeur = ville.value.trim();
  	var loginValeur = login.value.trim();
	
	if(nomValeur === '' || nomValeur == null) {
		champsErreurs(0);
        afficherErreurs("erreurNom", "Vous n'avez pas renseigner votre nom !!");
	} else {
		champsValides(0);
	}
	if(prenomValeur === '' || prenomValeur == null) {
		champsErreurs(1);
        afficherErreurs("erreurPrenom", "Vous n'avez pas renseigner votre prénom !!");
	} else {
		champsValides(1);
	}
	
	if(emailValeur === '' || emailValeur == null) {
		champsErreurs(2);
        afficherErreurs("erreurEmail", "Vous n'avez pas renseigner votre email !!");
	} else if (!verifierEmail(emailValeur)) {
		champsErreurs(2);
        afficherErreurs("erreurEmail","\"" + emailValeur + "\" est une adresse email invalide !!");
	} else {
		champsValides(2);
	}
	
	if(passwordValeur === '' || passwordValeur == null) {
		champsErreurs(3);
        afficherErreurs("erreurPass", "Vous n'avez pas renseigner votre mot de passe !!");
	} else {
		champsValides(3);
	}
	
	if(password2Valeur === '' || password2Valeur == null) {
		champsErreurs(4);
        afficherErreurs("erreurPass2", "Vous n'avez pas renseigner la confirmation de votre mot de passe !!");
	} else if(passwordValeur !== password2Valeur) {
		champsErreurs(4);
        afficherErreurs("erreurPass2", "Les mots de passe ne correspondent pas !!");
	} else{
		champsValides(4);
	}
    if(numValeur === '' || numValeur == null) {
		champsErreurs(5);
        afficherErreurs("erreurNum", "Vous n'avez pas renseigner votre numéro de téléphone !!");
	} else if (numValeur.match(/[^0-9]/)) {
		champsErreurs(5);
        afficherErreurs("erreurNum", "Le numéro ne doit pas contient des lettres !!");
	} else if (!(numValeur.match(/^(06|05|07|212)/))) {
		champsErreurs(5);
        afficherErreurs("erreurNum", "Le numéro de téléphone doit commencer avec: 06, 05, 07 ou 212 !!");
	} else if (numValeur.length != 10) {
		champsErreurs(5);
        afficherErreurs("erreurNum", "Le numéro de téléphone doit avoir 10 chiffres");
	}
     else {
		champsValides(5);
	}
    if(villeValeur === '' || villeValeur == null) {
		champsErreurs(6);
        afficherErreurs("erreurVille", "Vous n'avez pas renseigner votre ville !!");
	} else if (/[^a-zA-Z]/.test(villeValeur)) {
		champsErreurs(6);
        afficherErreurs("erreurVille", "La ville ne doit pas contient des nombres !!");
	} else {
		champsValides(6);
	}
    if(loginValeur === '' || loginValeur == null) {
		champsErreurs(7);
        afficherErreurs("erreurLogin", "Vous n'avez pas renseigner votre Login !!");
	} else {
		champsValides(7);
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
    erreur.pop("erreur" + x);
    erreur.filter(e => e !== "erreur" + x);
    var supprimerTextErreur = document.getElementsByClassName("erreur-text")[x].style.display = "none";
}
function afficherErreurs(x, erreur){
    var erreur = document.getElementById(x).innerHTML = erreur;
}