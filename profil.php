<?php
session_start();
include('pdo.php');
// $cl = $_SESSION['userId'];
// var_dump($cl);

$stmt = $pdo->prepare("SELECT cl.*, ad.* FROM clients cl
  LEFT JOIN adresseClients ad ON cl.id = ad.id_client
	WHERE cl.id = :idClient");
$stmt->bindParam(':idClient', $_SESSION['userId'], PDO::PARAM_INT);
$stmt->execute();
$adresse = $stmt -> fetch();
// var_dump($adresse);
$stmt->closeCursor();

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
  <link rel="stylesheet" href="styles/categories.css">
  <link rel="stylesheet" href="styles/ship.css">

  <script src="https://code.jquery.com/jquery-3.7.0.min.js"
    integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

  <title>ZenDog - Profil</title>

</head>

<body>
<?php include ('header.php');?>

	<main>

		<section>
			<div class="container profil my-4 pt-2">
				<h2>Votre profil</h2>
				<div class="d-flex align-items-center m-4">
					<img src="<?=$adresse['avatar']?>" alt="">
					<h3 class="ps-3"><b> <?=$_SESSION['userPrenom']?></b></h3>
					<h3 class="ps-3"><b> <?=$_SESSION['userNom']?></b></h3>
				</div>
				<div class="contact">
					<h4>Mes coordonnées de contact</h4>
					<!-- <div class="ps-3">
					</div> -->
					<p class="ps-3"><b>Adresse de livraison</b></p>
					<p class="ps-3"><?=$adresse['adresseLiv']?> </p>
					<p class="ps-3"><b>Adresse de facturation</b></p>
					<p class="ps-3"><?=$adresse['adresseFact']?></p>

					<p class="ps-3"><b>Adresse mail</b></p>
					<p class="ps-3"><?=$_SESSION['userEmail']?></p>
					<p class="ps-3"><b>Téléphone</b></p>
					<p class="ps-3"><?=$_SESSION['userTel']?></p>
				</div>

				<h4>Mes commandes</h4>
				<table class="commandes ps-3">
					<thead>
						<tr>
							<th>Commande n°</th>
							<th>Date</th>
							<th>Voir la commande</th>
							<th>Total</th>
						</tr>
					</thead>
					<tr>
						<td>1234</td>
						<td>30/09/23</td>
						<td>lien pour commande</td>
						<td>52,23 €</td>
					</tr>
					<tr>
						<td>5678</td>
						<td>25/08/23</td>
						<td>lien pour commande</td>
						<td>70,54 €</td>
					</tr>
					<tr>
						<td>91011</td>
						<td>01/07/23</td>
						<td>lien pour commande</td>
						<td>56,70 €</td>
					</tr>
				</table>

				<h4>Mes factures</h4>
				<div class="factures ps-3">
					<a href="#">Facture n°CB020590 - commande n° 1234</a>
					<a href="#">Facture n°CB019590 - commande n° 5678</a>
					<a href="#">Facture n°CB018590 - commande n° 91011</a>
				</div>

				<h4>Mes points bonus</h4>
				<p class="ptsMoins">Vous n'avez encore pas utilisé de point</p>

				<table class="pts ps-3 pb-4">
					<thead>
						<tr>
							<th>TOTAL</th>
							<th>578</th>
						</tr>
					</thead>
					<tr>
						<td>Commande n°91011</td>
						<td>56</td>
					</tr>
					<tr>
						<td>Commande n°5678</td>
						<td>70</td>
					</tr>
					<tr>
						<td>Commande n°1234</td>
						<td>52</td>
					</tr>
					<tr>
						<td>Points d'inscription Newsletter</td>
						<td>100</td>
					</tr>

					<tr>
						<td>Points de bienvenue (le <?=$_SESSION['userDateI']?>)</td>
						<td>300</td>
					</tr>

				</table>

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
	<!-- <script src="script/script.js" type="text/javascript"></script> -->
	<!-- <script src="script/eye.js" type="text/javascript"></script> -->
	<!-- <script src="script/formulaire.js" type="text/javascript"></script> -->
	<!-- <script src="script/plusMoins.js" type="text/javascript"></script> -->
	<!-- <script src="script/choix.js" type="text/javascript"></script> -->
</body>

</html>