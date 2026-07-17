// Ce code est pour le fonctionement du Hamburger et l'ajout et la suprission des liens lors du clique

var menuBtn = document.querySelector('.menu-btn');
var header = document.querySelector('header');
var menuOpen = false;

menuBtn.addEventListener('click', () => {
  if(!menuOpen) {
    menuBtn.classList.add('open');
    menuOpen = true;

    var msg = document.createElement("a");
    msg.href = 'messagesAdmin.php';
    var text = document.createTextNode("Consulter les messages"); 
    msg.appendChild(text);

    var comptes = document.createElement("a");
    comptes.href = 'gerercomptes.php';
    var text = document.createTextNode("Gérer les comptes"); 
    comptes.appendChild(text);

    var offres = document.createElement("a");
    offres.href = 'gererOffres.php';
    var text = document.createTextNode("Gérer les offres"); 
    offres.appendChild(text);
    
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
    hamburger.append(msg,offres,comptes,compte,deconn);
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

// Ajouter le code Jquery pour l'icone de retour on haut. Animation et affichage lors le View Height se depasse 100.

$(document).ready(function(){

  $(window).scroll(function(){
    if($(this).scrollTop()> 200){
      $('.scroll').fadeIn();
    }
    else{
      $('.scroll').fadeOut();
    }
  });

  $('.scroll').click(function(){
    $('html,body').animate({scrollTop: 0}, 1000)
  });

});


