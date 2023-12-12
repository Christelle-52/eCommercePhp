<?php
session_start();
include('pdo.php');

$_GET["search"] = htmlspecialchars($_GET["search"]); //pour sécuriser le formulaire contre les failles html
$search = $_GET["search"];
$search = strtolower($search);
$search = trim($search); //pour supprimer les espaces dans la requête de l'internaute
$search = strip_tags($search); //pour supprimer les balises html dans la requête

if (isset($search))
 {
  $rech = $pdo->prepare('SELECT p.nom AS nom_p, MIN(co.prix) AS prix_min, p.image, p.id 
  FROM produits p 
  INNER JOIN categories c ON p.id_categorie = c.id 
  INNER JOIN sousCategories ssc ON p.id_sousCategorie = ssc.id 
  INNER JOIN conditionnement co ON p.id = co.id_produit
  WHERE p.id IN (
      SELECT MIN(p2.id) 
      FROM produits p2 
      WHERE p2.nom = p.nom
  ) 
  AND (p.nom LIKE :search OR p.description1 LIKE :search OR p.description2 LIKE :search OR c.nom LIKE :search OR ssc.nom LIKE :search) 
  GROUP BY p.nom, p.image, p.id');

  $searchTerm = "%$search%";
  $rech->bindParam(':search', $searchTerm, PDO::PARAM_STR);
  $rech->execute();
  $productExist = $rech -> fetchAll(PDO::FETCH_ASSOC);
  $rech->closeCursor();

  // var_dump($productExist);
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
  <link rel="stylesheet" href="styles/merci.css">
  <link rel="stylesheet" href="styles/categories.css">
  <link rel="stylesheet" href="styles/contact.css">

  <script src="https://code.jquery.com/jquery-3.7.0.min.js"
    integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

  <title>ZenDog - Recherche</title>

</head>

<body>
  <?php include ('header.php');?>
  <main>
    <div class="container my-3">
      <div class="row">
        <?php foreach($productExist as $product){
            $images =explode(',', $product['image']);
            $image = $images[0];
            ?>
        <div class="col-6 col-md-3 card-group g-3 text-center">
          <div class="card ">
            <img class="card-img-top" src="<?= $image ?>" alt="Card image cap">
            <p class="bodyBold"><?= $product['nom_p'] ?></p>

            <p class=" text-center">A partir de <?= $product['prix_min'] ?> €<small>/TTC</small> </p>
            <a class="ctaSmall" href="#">
              <div class="addCard">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 256 256">
                  <path fill="currentColor"
                    d="M222.14 58.87A8 8 0 0 0 216 56H54.68l-4.89-26.86A16 16 0 0 0 34.05 16H16a8 8 0 0 0 0 16h18l25.56 140.29a24 24 0 0 0 5.33 11.27a28 28 0 1 0 44.4 8.44h45.42a27.75 27.75 0 0 0-2.71 12a28 28 0 1 0 28-28H83.17a8 8 0 0 1-7.87-6.57L72.13 152h116a24 24 0 0 0 23.61-19.71l12.16-66.86a8 8 0 0 0-1.76-6.56ZM180 192a12 12 0 1 1-12 12a12 12 0 0 1 12-12Zm-96 0a12 12 0 1 1-12 12a12 12 0 0 1 12-12Z" />
                </svg>
                <span class="bodyBold">Ajouter au panier</span>
              </div>
            </a>
            <a href="article.php?id_produit=<?= $product['id'] ?>" id="descriptProduct">Voir le produit</a>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </main>

  <?php include ('footer.php'); ?>


  <!-- script js bootstrap-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
    integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous">
  </script>
  <!-- script popper et bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
  </script>

  <!-- script js -->
  <!-- <script src="script/script.js" type="text/javascript"></script> -->
  <!-- <script src="script/eye.js" type="text/javascript"></script> -->
  <!-- <script src="script/formulaire.js" type="text/javascript"></script> -->
  <!-- <script src="script/plusMoins.js" type="text/javascript"></script> -->
</body>