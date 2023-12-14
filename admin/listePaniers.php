<?php
session_start();
include('../pdo.php');

if (!isset($_SESSION['userStatut']) || $_SESSION['userStatut'] != "admin") {
	header('Refresh: 3;../index.php?erreur=accesRefuse');
	exit();
};

$stmt = $pdo->prepare('SELECT pa.id AS id_panier, pa.quantite AS qte, pa.*, p.nom, p.image, cl.nom AS cl_nom, cl.prenom FROM paniers pa 
INNER JOIN produits p ON pa.id_produit=p.id
INNER JOIN clients cl ON pa.id_client=cl.id');
$stmt->execute();
$paniers = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
	<!-- Font Awesome : synth ex linkedin : [<a href=”mon lien linkedin” target=”_blank”> <i class="bi bi-linkedin"></i></a>] -->
	<link rel="stylesheet" href="../icons/awesome/css/all.min.css">
	<!-- Fonts Google -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Klee+One:wght@400;600&family=Lato:wght@300&family=Nunito+Sans:ital,wght@0,400;0,500;0,600;0,700;0,900;1,400;1,500;1,700;1,800;1,900&family=Open+Sans:wght@300&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Sriracha&display=swap" rel="stylesheet">

	<link href="../styles/style.css" rel="stylesheet">
	<link href="../styles/body.css" rel="stylesheet">
	<link href="../styles/header.css" rel="stylesheet">
	<link href="../styles/footer.css" rel="stylesheet">
	<link href="../styles/mediaQuerie.css" rel="stylesheet">
	<link rel="stylesheet" href="../styles/connexion.css">
	<link rel="stylesheet" href="../styles/form.css">
	<link rel="stylesheet" href="../styles/article.css">
	<link rel="stylesheet" href="../styles/panier.css">
	<link rel="stylesheet" href="../styles/paiement.css">
	<link rel="stylesheet" href="../styles/profil.css">
	<link rel="stylesheet" href="../styles/categories.css">
	<link rel="stylesheet" href="../styles/admin.css">

	<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

	<title>Page Administrateur - Liste des paniers</title>

</head>

<body>
	<?php include('header.php'); ?>

	<main>
		<div class="container text-center my-5">
			<h2 class="p-0 text-center pb-3 my-4">Liste des paniers</h2>
			<table class="border m-auto">
				<thead>
					<tr>
						<th class="col-md-2 px-2">Clients</th>
						<th class="col-md-4 px-2">Produits</th>
						<th class="col-md-1 px-2">Quantité</th>
						<th class="col-md-1 px-2">Taille</th>
						<th class="col-md-1 px-2">Coupon</th>
						<th class="col-md-1 px-2">Total</th>
						<th class="col-md-2 px-2">Etat du panier</th>
					</tr>
				</thead>
				<tbody class="text-center">
					<?php foreach ($paniers as $panier) : ?>
						<tr>
							<th class="col-md-2 px-2"><?= $panier['prenom'] ?> <?= $panier['cl_nom'] ?> Commande passée le <?= $panier['dateCreation'] ?></th>
							<td class="col-md-4 px-2">
								<div class="row justify-content-between align-items-center">
										<img class="col-md-2" src="../<?= $panier['image'] ?>">
									<div class="col-md-9">
										<?= $panier['nom'] ?>
									</div>
								</div>
							</td>
							<td class="col-md-1 px-2"><?= $panier['qte'] ?></td>
							<td class="col-md-1 px-2"><?= $panier['taille'] ?></td>

							<?php
							if (!empty($panier['couponVal'])) { ?>
								<td class="col-md-1 px-2"><?= $panier['couponVal'] ?></td>
							<?php } else { ?>
								<td class="col-md-1 px-2">NON</td>
							<?php } ?>

							<td class="col-md-1 px-2"><?= $panier['montant'] ?></td>
							<td class="col-md-2 px-2">
								<small><?= $panier['statut'] ?></small>
								<?php if ($panier['statut'] != "Terminé") : ?>
									<div>
										<button class="ctaSmall"><a href="etapPrec.php?id=<?= $panier['id_panier'] ?>"><i class="fa-solid fa-chevron-left fa-sm" style="color: #ffffff;"></i></a></button>
										<button class="ctaSmall"><a href="etapSuiv.php?id=<?= $panier['id_panier'] ?>"><i class="fa-solid fa-chevron-right fa-sm" style="color: #ffffff;"></i></a></button>
									</div>
								<?php endif; ?>
							</td>
						</tr>
						<?php endforeach; ?>
				</tbody>
			</table>


		</div>
	</main>

	<?php include('footer.php'); ?>

	<!-- script js bootstrap-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
	<!-- script popper et bundle -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

	<!-- script js -->
	<script src="Script/plusMoins.js" type="text/javascript"></script>
	<!-- <script src="script/script.js" type="text/javascript"></script> -->
	<!-- <script src="script/fonctions.js" type="text/javascript"></script> -->
	<script src="script/eye.js" type="text/javascript"></script>
	<!-- <script src="script/formulaire.js" type="text/javascript"></script> -->
	<script src="script/plusMoins.js" type="text/javascript"></script>
	<!-- <script src="script/choix.js" type="text/javascript"></script> -->
	<script src="script/images.js" type="text/javascript"></script>

</body>

</html>