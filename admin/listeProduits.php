<?php
session_start();
include('../pdo.php');

if (!isset($_SESSION['userStatut']) || $_SESSION['userStatut'] != "admin") {
	header('Refresh: 3;../index.php?erreur=accesRefuse');
	exit();
};

$stmt = $pdo->prepare('SELECT p.id AS id_produit, p.nom, p.description1, p.image,co.id AS id_taille, co.prix, co.taille, co.stock
FROM produits p 
INNER JOIN conditionnement co ON p.id = co.id_produit');
$stmt->execute();
$Produits = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt->closeCursor();
// echo '<pre>';
// var_dump($Produits);die();


$groupedProduits = [];

foreach ($Produits as $p) {
	//pour un index=$key on regroupe et stocke 1 unique valeur associée pour éviter d'afficher à chaque fois nom, image, descrip, id
	//et on crée un tableau tailles pour récupérer les valeurs de la bdd conditionnement
	$key = $p['nom'];
	if (!isset($groupedProduits[$key])) {
		$groupedProduits[$key] = [
			'nom' => $p['nom'],
			'image' => [],
			'description' => $p['description1'],
			'id_produit' => $p['id_produit'],
			'tailles' => []
		];
	}
	// 	echo '<pre>';
	// var_dump($groupedProduits[$key]);die();


	//s'il existe plusieurs images associées au produit, on les récupère et les stocke sous forme de tableau 
	$groupedProduits[$key]['image'] = explode(',', $p['image']);

	//pour chaque $key, on crée le tableau tailles, association des valeurs que l'on veut récupérer
	$groupedProduits[$key]['tailles'][] = [
		'id_taille' => $p['id_taille'],
		'conditionnement' => $p['taille'],
		'stock' => $p['stock'],
		'prix' => $p['prix']
	];
	// echo '<pre>';
	// var_dump($groupedProduits[$key]);die();
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

	<title>Page Administrateur - Liste des produits</title>

</head>

<body>
	<?php include('header.php'); ?>
	<main>
		<section class="container my-4">

			<h2 class="p-0 text-center pb-3">Liste des produits</h2>
			<div class="text-center">
				<a href="ajouterProduit.php">
					<button type="button" class="ctaSmall fs-3 my-3">Ajouter un article</button>
				</a>
			</div>

			<table class="m-auto">
				<thead>
					<tr>
						<th class="col-md-1 px-2">Actions produits</th>
						<th class="col-md-6 px-2">Produits</th>
						<th class="col-md-1 px-2">Taille</th>
						<th class="col-md-1 px-2">Prix</th>
						<th class="col-md-1 px-2">Stock</th>
						<th class="col-md-2 px-2">Actions tailles</th>
					</tr>
				</thead>
				<tbody class="text-center" id="page">
					<?php foreach ($groupedProduits as $group) : ?>
						<?php foreach ($group['tailles'] as $index => $taille) :
						?>
							<?php if ($index === 0) : ?>
								<!-- actions produit-->
								<tr>
									<td class="col-md-1 text-center vertical-center g-0 p-0" rowspan="<?= count($group['tailles']) ?>">
										<div class="row justify-content-between align-items-center m-auto my-2">
											<a class="ctaSmall my-2" href="modifierProduit.php?id_produit=<?= $group['id_produit'] ?>">
												<span>Modifier</span>
											</a>
											<a class="mb-2" href="supprimerProdReq.php?id_produit=<?= $group['id_produit'] ?>" onclick="return confirm('Etes-vous sûr de vouloir supprimer cette produit ?')">
												<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 14 14">
													<path fill="none" stroke-linecap="round" stroke-linejoin="round" d="M1 3.5h12m-10.5 0h9v9a1 1 0 0 1-1 1h-7a1 1 0 0 1-1-1v-9h0Zm2 0V3a2.5 2.5 0 0 1 5 0v.5m-4 2V11m3-5.5V11" />
												</svg>
											</a>

										</div>
									</td>
									<td class="col-md-6 text-center g-0" rowspan="<?= count($group['tailles']) ?>">
										<div class="row justify-content-center align-items-center">
											<img class="col-md-1 p-0 m-0" src="../<?= $group['image'][0] ?>">
											<div class="col-md-10">
												<h5 class="p-2 m-0"><?= $group['nom'] ?></h5>
												<p class="m-0"><?= $group['description'] ?></p>
												<button class="col-2 ctaSmall"><a href="ajouterTaille.php?id_produit=<?= $group['id_produit'] ?>"><i class="fa-solid fa-plus fa-sm" style="color: #ffffff;"> taille</i></a></button>
											</div>
										</div>
									</td>
								<?php endif; ?>
								<!-- taille -->
								<td class="col-md-1 g-0">
									<?= $taille['conditionnement'] ?></td>
								<!-- prix -->
								<td class="col-md-1 g-0"><?= $taille['prix'] ?> €</td>
								<!-- stock -->
								<td class="col-md-1 g-0"><?= $taille['stock'] ?></td>
								<!-- actions taille-->
								<td class="col-md-2 g-0">
									<div class="row justify-content-between align-items-center m-auto">
										<a class="col-3 ctaSmall" href="modifierTaille.php?id_taille=<?= $taille['id_taille'] ?>">
											<span>Modifier</span>
										</a>

										<a class="col-2 p-0 m-2" href="supprimerTailleReq.php?id_taille=<?= $taille['id_taille'] ?>" onclick="return confirm('Etes-vous sûr de vouloir supprimer cette taille ?')">
											<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 14 14">
												<path fill="none" stroke-linecap="round" stroke-linejoin="round" d="M1 3.5h12m-10.5 0h9v9a1 1 0 0 1-1 1h-7a1 1 0 0 1-1-1v-9h0Zm2 0V3a2.5 2.5 0 0 1 5 0v.5m-4 2V11m3-5.5V11" />
											</svg>
										</a>
									</div>
								</td>
								<tr>
								<?php endforeach; ?>
							<?php endforeach; ?>
				</tbody>
			</table>

		</section>
	</main>

	<?php include('footer.php'); ?>

	<!-- script js bootstrap-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
	<!-- script popper et bundle -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

	<!-- script js -->
	<!-- <script src="script/script.js" type="text/javascript"></script> -->
	<!-- <script src="script/eye.js" type="text/javascript"></script> -->
	<!-- <script src="script/formulaire.js" type="text/javascript"></script> -->
	<script src="script/plusMoins.js" type="text/javascript"></script>
</body>

</html>