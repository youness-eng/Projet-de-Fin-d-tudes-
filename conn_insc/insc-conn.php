<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>S'inscrire & Se connecter</title>
  <link rel="icon" type="image/png" href="../images/mini-logo.png">
  <script src="https://kit.fontawesome.com/64d58efce2.js"></script>
  <link rel="stylesheet" href="../css/insc-conn.css">
  <script defer src="../js/insc-conn.js"></script>
</head>

<body>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">

        <form action="connecter.php" method="POST" class="sign-in-form" id="formConnexion">
          <h2 class="titre">Connexion</h2>
          <div class="input-field input-field-conn">
            <i class="fa fa-sign-in"></i>
            <input type="text" name="login" id="login-conn" placeholder="Login" autocomplete="off" />
            <i class="fa fa-exclamation-circle"></i>
            <i class="fa fa-check"></i>
          </div>
          <p id="erreurLoginConn" class="erreur-text-conn"></p>
          <div class="input-field input-field-conn">
            <i class="fas fa-lock"></i>
            <input type="password" name="pass" id="password-conn" placeholder="Mot de passe" autocomplete="off" />
            <i class="fa fa-exclamation-circle"></i>
            <i class="fa fa-check"></i>
          </div>
          <p id="erreurPassConn" class="erreur-text-conn"></p>
          <input type="submit" name="submit-conn" value="Connecter" class="btn solid" />
        </form>

        <form action="inscrire.php" method="POST" class="sign-up-form" id="formInscription">
          <h2 class="titre">Inscription</h2>
          <div class="input-field input-field-insc" id="divNom">
            <i class="fas fa-user"></i>
            <input type="text" name="nom" id="nom-insc" placeholder="Nom" autocomplete="off" />
            <i class="fa fa-check"></i>
            <i class="fa fa-exclamation-circle"></i>
          </div>
          <p id="erreurNom" class="erreur-text"></p>
          <div class="input-field input-field-insc">
            <i class="fas fa-user"></i>
            <input type="text" name="prenom" id="prenom" placeholder="Prénom" autocomplete="off" />
            <i class="fa fa-exclamation-circle"></i>
            <i class="fa fa-check"></i>
          </div>
          <p id="erreurPrenom" class="erreur-text"></p>
          <div class="input-field input-field-insc">
            <i class="fas fa-envelope"></i>
            <input type="text" name="email" id="email" placeholder="Email" autocomplete="off" />
            <i class="fa fa-exclamation-circle"></i>
            <i class="fa fa-check"></i>
          </div>
          <p id="erreurEmail" class="erreur-text"></p>
          <div class="input-field input-field-insc">
            <i class="fa fa-phone"></i>
            <input type="text" name="num" id="num" placeholder="Numéro de téléphone" autocomplete="off" />
            <i class="fa fa-exclamation-circle"></i>
            <i class="fa fa-check"></i>
          </div>
          <p id="erreurNum" class="erreur-text"></p>
          <div class="input-field input-field-insc">
            <i class="fa fa-building"></i>
            <input type="text" name="ville" id="ville" placeholder="Ville" autocomplete="off" />
            <i class="fa fa-exclamation-circle"></i>
            <i class="fa fa-check"></i>
          </div>
          <p id="erreurVille" class="erreur-text"></p>
          <div class="input-field input-field-insc">
            <i class="fa fa-sign-in"></i>
            <input type="text" name="login" id="login-insc" placeholder="Login" autocomplete="off" />
            <i class="fa fa-exclamation-circle"></i>
            <i class="fa fa-check"></i>
          </div>
          <p id="erreurLogin" class="erreur-text"></p>
          <div class="input-field input-field-insc" id="divPass">
            <i class="fas fa-lock"></i>
            <input type="password" name="pass" id="password" placeholder="Mot de passe" autocomplete="off" />
            <i class="fa fa-exclamation-circle"></i>
            <i class="fa fa-check"></i>
          </div>
          <p id="erreurPass" class="erreur-text"></p>
          <div class="input-field input-field-insc" id="confirme-pass">
            <i class="fas fa-lock"></i>
            <input type="password" name="pass2" id="password2" placeholder="Confirmer votre mot de passe"
              autocomplete="off" />
            <i class="fa fa-exclamation-circle"></i>
            <i class="fa fa-check"></i>
          </div>
          <p id="erreurPass2" class="erreur-text"></p>
          <input type="submit" name="submit-insc" id="insc" class="btn" value="S'inscrire" />
        </form>

      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>Nouveau ici ?</h3>
          <p>
            Si vous n'avez pas de compte,cliquez-ici pour commencer à troquer!
          </p>
          <button class="btn transparent" id="sign-up-btn">
            S'inscrire
          </button>
        </div>
        <img src="../images/login.svg" class="image" alt="Login_Image" />
      </div>
      <div class="panel right-panel" id="inscrivez-vous">
        <div class="content">
          <h3>Un de nous?</h3>
          <p>
            Si vous avez déjà un compte, connectez-vous ici.
          </p>
          <button class="btn transparent" id="sign-in-btn">
            Se connecter
          </button>
        </div>
        <img src="../images/Register.svg" class="image" alt="Registre_Image" />
      </div>
    </div>
  </div>
  <a href="../index.php" class="icone-quitter"><i class="fa fa-long-arrow-right" id="quitter"></i></a>

</body>

</html>