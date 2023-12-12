<?php
session_start();
include('pdo.php');

if(isset($_SESSION['userId'])){
	$stmt = $pdo->prepare('SELECT P.stock as qtProduit, P.*, Pa.* FROM produits P, paniers Pa
	WHERE Pa.id_produit = P.id AND Pa.id_client = :userId');
	$stmt->bindValue(':userId', $_SESSION['userId'], PDO::PARAM_INT);
	$stmt->execute();
	$productPanier = $stmt->fetchALL();
	$nbProduit = count($productPanier);
}else{
	$nbProduit = 0;
}
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
    
  <title>ZenDog - Panier</title>

</head>

<body>
<?php include ('header.php');?>

	<main>
		<section class="container  my-4">
			<h2>Votre panier</h2>
			<div class="container d-flex g-0 w-100 p-0 justify-content-between my-4 cart">
				<article class="col-lg-7 col-12 mb-2">
					<div class="row product mx-0 py-4">
						<a href="article.html" class="col-2"><img class="col-12" src="articles/fromageYak.png" alt=""></a>
						<div class="col-xl-10 col-12 textCard ps-4">
							<span>Fromage de Yak</span>
							<div class="row justify-content-between selectSizeQty align-items-center m-auto">
								<div class="col-1 pt-4">
									<a href="#"> <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 14 14">
											<path fill="none" stroke-linecap="round" stroke-linejoin="round"
												d="M1 3.5h12m-10.5 0h9v9a1 1 0 0 1-1 1h-7a1 1 0 0 1-1-1v-9h0Zm2 0V3a2.5 2.5 0 0 1 5 0v.5m-4 2V11m3-5.5V11" />
										</svg>
									</a>
								</div>
								<div class="col-3  py-4 justify-content-around me-0 ms-0">
									<span class="control-label littleCard">Choix :</span>
									<select class="form-control form-control-select" id="selectSize">
										<option value="1" title="S" selected="selected">S</option>
										<option value="2" title="M">M</option>
										<option value="3" title="L">L</option>
										<option value="4" title="XL">XL</option>
										<option value="5" title="XXL">XXL</option>
									</select>
								</div>

								<div class="col-4">
									<span class="control-label littleCard">Quantité :</span>
									<div class="qty">
										<div class="input-group">
											<i class="fas fa-regular fa-circle-minus fa-2xl boutonMoins me-2"></i>
											<input type="text" name="qty" id="quantity" value="1" class="input-group form-control" min="1"
												aria-label="Quantité">
											<i class="fas fa-regular fa-circle-plus fa-2xl boutonPlus ms-2"></i>
										</div>
									</div>
								</div>

								<div class="col-4 text-bottom">
									<div class="price">
										<p class="valueProduct"> 4,50 € </p><small>TTC</small>
									</div>
								</div>
							</div>


						</div>
					</div>
					<div class="row product mx-0 py-4">
						<a href="article.html" class="col-2"><img class="col-12" src="articles/nezDeCochonSouffle.png" alt=""></a>
						<div class="col-xl-10 col-12 textCard ps-4">
							<span>Nez de cochons soufflés</span>
							<div class="row justify-content-between selectSizeQty align-items-center m-auto">
								<div class="col-1 pt-4">
									<a href="#"> <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 14 14">
											<path fill="none" stroke-linecap="round" stroke-linejoin="round"
												d="M1 3.5h12m-10.5 0h9v9a1 1 0 0 1-1 1h-7a1 1 0 0 1-1-1v-9h0Zm2 0V3a2.5 2.5 0 0 1 5 0v.5m-4 2V11m3-5.5V11" />
										</svg>
									</a>
								</div>
								<!-- <div class="col-4  py-4 justify-content-around me-0 ms-0">
									<span class="control-label littleCard">Choix :</span>
									<select class="form-control form-control-select" id="selectSize">
										<option value="1" title="unitaire" selected="selected">Unitaire</option>
										<option value="2" title="Par 4">Par 4</option>
										<option value="3" title="Par 10">Par 10</option>
									</select>
								</div> -->

								<div class="col-4">
									<span class="control-label littleCard">Quantité :</span>
									<div class="qty">
										<div class="input-group">
											<i class="fas fa-regular fa-circle-minus fa-2xl boutonMoins me-2"></i>
											<input type="text" name="qty" id="quantity" value="1" class="input-group form-control" min="1"
												aria-label="Quantité">
											<i class="fas fa-regular fa-circle-plus fa-2xl boutonPlus ms-2"></i>
										</div>
									</div>
								</div>

								<div class="col-4 text-bottom">
									<div class="price">
										<p class="valueProduct"> 2,50 € </p><small>TTC</small>
									</div>
								</div>
							</div>


						</div>
					</div>
				</article>

				<article class="col-lg-4 py-3">
					<div class="row sumCard m-auto g-0">
						<div class="col-9">
							<h5>Sous total</h5>
						</div>
						<div class="col-2 d-block m-auto">
							<p>7,00<small> €</small></p>
						</div>
					</div>
					<div class="row shipping g-0 pb-4">
						<div class="col-9">
							<h5 class="pb-0">Frais de port </h5>
								<small class="offerShipping ps-4">(offert dès 49 €)</small> 
						</div>
						<div class="col-2 d-flex d-block m-auto">
							<p>4,99<small> €</small></p>
						</div>
					</div>
					<div class="row reduce g-0">
						<div class="col mb-4">
							<h5 class="mb-0 pb-1">Bons de réduction/Remise</h5>
							<a class="codeReduce ps-4" href="#">Entrez un code coupon </a>
						</div>
					</div>
					<div class="row totalSum g-0 pb-1">
						<div class="col-9">
							<h5 class="mb-0 pb-1">Total à régler</h5>
							<p class="ps-4">TTC</p>

						</div>
						<div class="col-3">
							<h5>11,99 €</h5>
						</div>
					</div>

					<a class="ctaSmall d-block" href="paiement.html">
						<div class="command">
							<span class="bodyBold">Passer commande</span>
						</div>
					</a>
				</article>
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
	<script src="script/plusMoins.js" type="text/javascript"></script>
	<script src="script/choix.js" type="text/javascript"></script>
</body>

</html>