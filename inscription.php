<?php
session_start();
include('pdo.php');
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <!-- Font Awesome : synth ex linkedin : [<a href=”mon lien linkedin” target=”_blank”> <i class="bi bi-linkedin"></i></a>] -->
  <link rel="stylesheet" href="icons/awesome/css/all.min.css">
  <!-- Fonts Google -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Klee+One:wght@400;600&family=Lato:wght@300&family=Nunito+Sans:ital,wght@0,400;0,500;0,600;0,700;0,900;1,400;1,500;1,700;1,800;1,900&family=Open+Sans:wght@300&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Sriracha&display=swap"
    rel="stylesheet">
    <link href="styles/style.css" rel="stylesheet">
    <link href="styles/body.css" rel="stylesheet">
    <link href="styles/header.css" rel="stylesheet">
    <link href="styles/footer.css" rel="stylesheet">
    <link href="styles/mediaQuerie.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/connexion.css">
    <link rel="stylesheet" href="styles/form.css">
    <link rel="stylesheet" href="styles/article.css">
    <link rel="stylesheet" href="styles/panier.css">
    <link rel="stylesheet" href="styles/paiement.css">
    <link rel="stylesheet" href="styles/profil.css">
    
  <title>ZenDog - Inscription</title>

</head>

<body>
<?php include ('header.php');?>

  <main>
    <section class="container inscription my-4">
      <div class="row gx-3 justify-content-end">
        <form action="inscriptionReq.php" id="formulaire" class="col-xl-6 col-md-6 col-12 formulaire" method="post" onsubmit="return verifierForm()">
          <div class="row champsForm">
            <div class="col-lg-6 col-md-12">
              <label for="prenom" class="form-label">Votre prénom *</label>
              <input type="text" name="prenom" class="form-control  required" id="inputPrenom" placeholder="Votre prénom">
            </div>
            <div class="col-lg-6 col-md-12">
              <label for="nom" class="form-label">Nom *</label>
              <input type="text" name="nom" class="form-control  required" id="inputNom" placeholder="Votre nom">
            </div>
            <div class="col-12">
              <label for="inputAddress" class="form-label">Votre adresse</label>
              <input class="form-control" id="inputAddress" placeholder="bât étage n°,  rue/bld/av">
            </div>
            <div class="col-lg-6 col-md-12">
              <label for="inputZip" class="form-label">Code postal</label>
              <input class="form-control" id="inputZip" placeholder="69001">
            </div>
            <div class="col-lg-6 col-md-12">
              <label for="inputCity" class="form-label">Ville</label>
              <input class="form-control" id="inputCity" placeholder="Lyon Cedex">
            </div>
            <div class="col-12">
              <label for="email" class="form-label">Email *</label>
              <input type="email" name="email" class="form-control required" id="inputEmail" placeholder="exemple@server.com">
            </div>
            <div class="col-12">
              <label for="mdp" class="form-label">Votre mot de passe *</label>
              <div class="mdp d-flex">
                <input type="password" name="mdp" class="form-control required" name="required" id="inputPassword1"
                  placeholder="5 car mini, 1 Maj, 1 car spécial et 1 chiffre">
                <div class="password-icon">
                  <i class="fas fa-solid fa-eye fa-2xl"></i>
                  <i class="fas fa-solid fa-eye-slash fa-2xl"></i>
                </div>
              </div>
            </div>
            <div class="col-12">
              <label for="inputPassword" class="form-label">Confirmer votre mdp *</label>
              <div class="mdp d-flex">
                <input type="password" class="form-control required" id="inputPassword2" placeholder="confirmer le mot de passe">
                <div class="password-icon">
                  <i class="fas fa-solid fa-eye fa-2xl"></i>
                  <i class="fas fa-solid fa-eye-slash fa-2xl"></i>
                </div>
              </div>
            </div>
            <p class="form-label">Les champs indiqués par * sont obligatoires</p>
            <div class="text-center">
							<input type="submit" class="cta" id="submitInscription" value="Envoyer" >
						</div>
          </div>
        </form>
      </div>
    </section>
  </main>

  <?php include ('footer.php');?>

  <!-- script js bootstrap-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
    integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS"
    crossorigin="anonymous"></script>
  <!-- script popper et bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>


  <!-- script js -->
  <script src="script/formulaire.js" type="text/javascript"></script>
  <!-- <script src="script/script.js" type="text/javascript"></script> -->
  <script src="script/eye.js" type="text/javascript"></script>
  <!-- <script src="script/plusMoins.js" type="text/javascript"></script> -->
</body>

</html>