var menuBtn = document.querySelector('.menu-btn');
var header = document.querySelector('header');
var menuOpen = false;

menuBtn.addEventListener('click', () => {
  if(!menuOpen) {
    menuBtn.classList.add('open');
    menuOpen = true;

    var msg = document.createElement("a");
    msg.href = 'messageTroqueur.php';
    var text = document.createTextNode("Consulter les messages"); 
    msg.appendChild(text);

    var offre = document.createElement("a");
    offre.href = 'offre.php';
    var text = document.createTextNode("Déposer  une offre"); 
    offre.appendChild(text);

    var gereroffre = document.createElement("a");
    gereroffre.href = 'mesOffres.php';
    var text = document.createTextNode("Mes offres"); 
    gereroffre.appendChild(text);


    var compte = document.createElement("a");
    compte.href = 'modifierSonCompte.php';
    var text = document.createTextNode("Gérer son compte"); 
    compte.appendChild(text);

    var deconn = document.createElement("a");
    deconn.href = 'deconnecter.php';
    var text = document.createTextNode("Se déconnecter"); 
    deconn.appendChild(text);

    var hamburger = document.createElement("div");
    hamburger.classList.add('hamburger');
    header.append(hamburger);
    hamburger.append(msg,offre,gereroffre,compte,deconn);
    document.body.style.overflow = "hidden";

    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
    
  } else {
    menuBtn.classList.remove('open');
    menuOpen = false;
    var div = document.querySelector(".hamburger");
    div.remove();
    document.body.style.overflow = "visible";
  }

});