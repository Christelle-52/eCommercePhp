<?php
session_start();
include('../pdo.php');

if (!isset($_SESSION['userStatut']) || $_SESSION['userStatut'] != "admin") {
	header('Location:../index.php?erreur=accesRefuse');
	exit();
};

if (isset($_GET["id_categorie"])) {
	$stmt = $pdo->prepare('SELECT * FROM categories WHERE id=:id');
	$stmt->bindValue(':id', $_GET["id_categorie"], PDO::PARAM_INT);
	$stmt->execute();
	$categories = $stmt->fetch();
	$stmt->closeCursor();

}
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

	<title>Page Administrateur - Catégories - Modifier</title>

</head>

<body>
	<?php include('header.php'); ?>

	<main>
		<div class="container text-center my-5">
			<h2 class="p-0 text-center pb-3 my-4">Modifier la catégorie <?= ucfirst($categories["nom"]) ?></h2>

			<div class="container text-center my-5 w-50 formAdmin">
				<form class="m-auto" action='modifierCatReq.php' method='POST'>
					<input type="hidden" name="id_categorie" value="<?= $_GET["id_categorie"] ?>">
					<label class="my-3"><strong>Nom</strong></label><br>
					<input class="col-10 ps-3" type="text" name="nom" value="<?= $categories["nom"] ?>"><br><br>
					<label class="my-3"><strong>Description</strong></label><br>
          <textarea class="col-10 ps-3" type="text" name="descript" rows="10"><?= $categories["descript"] ?></textarea>
					<input class="ctaSmall my-4" type="submit" value="Modifier la catégorie">
				</form>

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