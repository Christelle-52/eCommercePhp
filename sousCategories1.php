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
  <link rel="stylesheet" href="styles/categories.css">

  <script src="https://code.jquery.com/jquery-3.7.0.min.js"
    integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

  <title>ZenDog - Sous catégories</title>

</head>

<body>
<?php include('header.php'); ?>
  <main>

    <section class="container my-4">
    
    <?php
    $stmt = $pdo->prepare('SELECT p.id AS id_produit, p.nom, p.description1, p.description2,p.image,p.prix, p.conditionnement, ssc.nom AS nom_sous_categorie, c.descript AS c_desc
    FROM produits p 
    INNER JOIN categories c ON p.id_categorie = c.id 
    INNER JOIN sousCategories ssc ON p.id_sousCategorie = ssc.id 
    WHERE p.id_sousCategorie="'.$_GET['id_sousCategorie'].'"');
    $stmt->execute();
    //PDO::FETCH_ASSOC: retourne un tableau indexé par le nom de la colonne comme retourné dans le jeu de résultats 
    $products = $stmt -> fetchAll(PDO::FETCH_ASSOC);
  // Variable temporaire pour stocker la valeur du champ descript
    $previousDescript = null;    
    // var_dump($products);
    ?>
      <!--Titre catégories -->
      <h2 class="p-0 text-center pb-3"><?=ucfirst($_GET['id_categorie'])?></h2>
      
      <!--début card catégories -->
      <?php foreach($products as $p): 
      // Affiche la valeur du champ descript uniquement si elle change
        if ($p['c_desc'] !== $previousDescript) {
        $previousDescript = $p['c_desc'];?>
        <p class="my-4 fs-4 px-4"><?=$p['c_desc']?></p>
        <?php }?>
      <div class="card p-0 my-3 w-100 h-auto">
        <div class="row g-0 p-0 pt-3">
          <div class="col-md-3 p-2 text-center">
            <img src="<?=$p['image']?>" class="rounded-start w-50"
              alt="...">
          </div>
          <div class="col-md-9">
            <div class="card-body">
              <h5 class="card-title p-0"><?= $p['description1']?></p>
              <div class="d-flex align-items-center">
                <p>Livraison estimée : 2-4 jours ouvrés.</p>
                <a href="article.php?id_categorie=<?= $_GET['id_categorie'] ?>&id_sousCategorie=<?= $_GET['id_sousCategorie'] ?>&id_produit=<?= $p['id_produit'] ?>" class="px-3 ctaSmall">Lire la suite</a>
              </div>
              <div class="sousCat">
                <div class="row py-3 m-0">
                  <div class="col-6">
                    <small class="ps-4"><?=$p['conditionnement']?></small>
                  </div>
                  <div class="col-2 text-end p-0 m-0">
                    <p class="bodyBold p-0 m-0"><?=$p['prix']?> € </p>
                    <small class="text-secondary p-0 m-0">27,45 €/kg</small>
                  </div>
                  <div class="col-4 d-flex align-items-center qty">
                    <div class="input-group ">
                      <i class="fas fa-regular fa-circle-minus fa-2xl boutonMoins mx-3"></i>
                      <input type="text" name="qty" id="quantity" value="1" class="input-group form-control" min="1"
                      aria-label="Quantité">
                      <i class="fas fa-regular fa-circle-plus fa-2xl boutonPlus mx-3"></i>
                      <a href="#" class="mx-3 addCard2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                        viewBox="0 0 256 256">
                        <path
                        d="M222.14 58.87A8 8 0 0 0 216 56H54.68l-4.89-26.86A16 16 0 0 0 34.05 16H16a8 8 0 0 0 0 16h18l25.56 140.29a24 24 0 0 0 5.33 11.27a28 28 0 1 0 44.4 8.44h45.42a27.75 27.75 0 0 0-2.71 12a28 28 0 1 0 28-28H83.17a8 8 0 0 1-7.87-6.57L72.13 152h116a24 24 0 0 0 23.61-19.71l12.16-66.86a8 8 0 0 0-1.76-6.56ZM180 192a12 12 0 1 1-12 12a12 12 0 0 1 12-12Zm-96 0a12 12 0 1 1-12 12a12 12 0 0 1 12-12Z" />
                        </svg>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="row py-3 m-0">
                  <div class="col-6">
                      <small class="ps-4">canard (200g)</small>
                  </div>
                  <div class="col-2 text-end p-0 m-0">
                    <p class="bodyBold p-0 m-0">5,49 €</p>
                    <small class="text-secondary p-0 m-0">27,45 €/kg</small>
                  </div>
                  <div class="col-4 d-flex align-items-center qty">
                    <div class="input-group ">
                       <i class="fas fa-regular fa-circle-minus fa-2xl boutonMoins mx-3"></i>
                      <input type="text" name="qty" id="quantity" value="1" class="input-group form-control" min="1"
                        aria-label="Quantité">
                        <i class="fas fa-regular fa-circle-plus fa-2xl boutonPlus mx-3"></i>
                        <a href="#" class="mx-3 addCard2">
                          <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                          viewBox="0 0 256 256">
                          <path
                          d="M222.14 58.87A8 8 0 0 0 216 56H54.68l-4.89-26.86A16 16 0 0 0 34.05 16H16a8 8 0 0 0 0 16h18l25.56 140.29a24 24 0 0 0 5.33 11.27a28 28 0 1 0 44.4 8.44h45.42a27.75 27.75 0 0 0-2.71 12a28 28 0 1 0 28-28H83.17a8 8 0 0 1-7.87-6.57L72.13 152h116a24 24 0 0 0 23.61-19.71l12.16-66.86a8 8 0 0 0-1.76-6.56ZM180 192a12 12 0 1 1-12 12a12 12 0 0 1 12-12Zm-96 0a12 12 0 1 1-12 12a12 12 0 0 1 12-12Z" />
                          </svg>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach ?>
      </div>

      
      <!-- <div class="card mb-3 w-100 h-auto produit">
        <div class="row g-0 p-0 pt-3">
          <div class="col-md-3 p-2 text-center">
            <img src="articles/categories/poulet/pla_rocco_chingsdouble_chicken_1000x1000_3.jpg"
              class="rounded-start w-50" alt="...">
          </div>
          <div class="col-md-9">
            <div class="card-body">
              <h5 class="card-title p-0">Rocco Chings Double pour chien</h5>
              <p class="card-text">Les Rocco Chings Double sont enfin de retour ! Une double dose de viande pour deux
                fois plus de plaisir ! Cœur au poulet, à l'agneau ou au bœuf enrobé de filets de poulet. Un plaisir
                irrésistible !</p>
              <div class="d-flex align-items-center">
                <p>Livraison estimée : 2-4 jours ouvrés.</p>
                <a href="article.html" class="px-3  ctaSmall">Lire la suite</a>
              </div>
              <div class="sousCat">
                <div class="row py-3 m-0">
                  <div class="col-6">
                    <small class="ps-4">poulet, agneau (200g)</small>
                  </div>
                  <div class="col-2 text-end p-0 m-0">
                    <p class="bodyBold p-0 m-0">5,49 €</p>
                    <small class="text-secondary p-0 m-0">27,45 €/kg</small>
                  </div>
                  <div class="col-4 d-flex align-items-center qty">
                    <div class="input-group ">
                      <i class="fas fa-regular fa-circle-minus fa-2xl boutonMoins mx-3"></i>
                      <input type="text" name="qty" id="quantity" value="1" class="input-group form-control" min="1"
                        aria-label="Quantité">
                      <i class="fas fa-regular fa-circle-plus fa-2xl boutonPlus mx-3"></i>
                      <a href="#" class="mx-3 addCard2"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                          viewBox="0 0 256 256">
                          <path
                            d="M222.14 58.87A8 8 0 0 0 216 56H54.68l-4.89-26.86A16 16 0 0 0 34.05 16H16a8 8 0 0 0 0 16h18l25.56 140.29a24 24 0 0 0 5.33 11.27a28 28 0 1 0 44.4 8.44h45.42a27.75 27.75 0 0 0-2.71 12a28 28 0 1 0 28-28H83.17a8 8 0 0 1-7.87-6.57L72.13 152h116a24 24 0 0 0 23.61-19.71l12.16-66.86a8 8 0 0 0-1.76-6.56ZM180 192a12 12 0 1 1-12 12a12 12 0 0 1 12-12Zm-96 0a12 12 0 1 1-12 12a12 12 0 0 1 12-12Z" />
                        </svg>
                      </a>
                    </div>
                  </div>
                </div>

                <div class="row py-3 m-0">
                  <div class="col-6">
                    <small class="ps-4">poulet, foie (200g)</small>
                  </div>
                  <div class="col-2 text-end p-0 m-0">
                    <p class="bodyBold p-0 m-0">5,49 €</p>
                    <small class="text-secondary p-0 m-0">27,45 €/kg</small>
                  </div>
                  <div class="col-4 d-flex align-items-center qty">
                    <div class="input-group ">
                      <i class="fas fa-regular fa-circle-minus fa-2xl boutonMoins mx-3"></i>
                      <input type="text" name="qty" id="quantity" value="1" class="input-group form-control" min="1"
                        aria-label="Quantité">
                      <i class="fas fa-regular fa-circle-plus fa-2xl boutonPlus mx-3"></i>
                      <a href="#" class="mx-3 addCard2"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                          viewBox="0 0 256 256">
                          <path
                            d="M222.14 58.87A8 8 0 0 0 216 56H54.68l-4.89-26.86A16 16 0 0 0 34.05 16H16a8 8 0 0 0 0 16h18l25.56 140.29a24 24 0 0 0 5.33 11.27a28 28 0 1 0 44.4 8.44h45.42a27.75 27.75 0 0 0-2.71 12a28 28 0 1 0 28-28H83.17a8 8 0 0 1-7.87-6.57L72.13 152h116a24 24 0 0 0 23.61-19.71l12.16-66.86a8 8 0 0 0-1.76-6.56ZM180 192a12 12 0 1 1-12 12a12 12 0 0 1 12-12Zm-96 0a12 12 0 1 1-12 12a12 12 0 0 1 12-12Z" />
                        </svg>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="row py-3 m-0">
                  <div class="col-6">
                    <small class="ps-4">poulet, boeuf (200g)</small>
                  </div>
                  <div class="col-2 text-end p-0 m-0">
                    <p class="bodyBold p-0 m-0">5,49 €</p>
                    <small class="text-secondary p-0 m-0">27,45 €/kg</small>
                  </div>
                  <div class="col-4 d-flex align-items-center qty">
                    <div class="input-group ">
                      <i class="fas fa-regular fa-circle-minus fa-2xl boutonMoins mx-3"></i>
                      <input type="text" name="qty" id="quantity" value="1" class="input-group form-control" min="1"
                        aria-label="Quantité">
                      <i class="fas fa-regular fa-circle-plus fa-2xl boutonPlus mx-3"></i>
                      <a href="#" class="mx-3 addCard2"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                          viewBox="0 0 256 256">
                          <path
                            d="M222.14 58.87A8 8 0 0 0 216 56H54.68l-4.89-26.86A16 16 0 0 0 34.05 16H16a8 8 0 0 0 0 16h18l25.56 140.29a24 24 0 0 0 5.33 11.27a28 28 0 1 0 44.4 8.44h45.42a27.75 27.75 0 0 0-2.71 12a28 28 0 1 0 28-28H83.17a8 8 0 0 1-7.87-6.57L72.13 152h116a24 24 0 0 0 23.61-19.71l12.16-66.86a8 8 0 0 0-1.76-6.56ZM180 192a12 12 0 1 1-12 12a12 12 0 0 1 12-12Zm-96 0a12 12 0 1 1-12 12a12 12 0 0 1 12-12Z" />
                        </svg>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <!-- </div> -->
            </div>
          </div>
        </div>
      </div>
      <div class="card mb-3 w-100 h-auto produit">
        <div class="row g-0 p-0 pt-3">
          <div class="col-md-3 p-2 text-center">
            <img src="articles/categories/poulet/8in1_tasties_huehnerbrust_85g_hs_01_2.jpg"
              class="rounded-start w-50" alt="...">
          </div>
          <div class="col-md-9">
            <div class="card-body">
              <h5 class="card-title p-0">8 in 1 Tasties Poitrine de poulet pour chien</h5>
              <p class="card-text">Friandises pauvres en matières grasses pour chien, riches en poitrine de poulet, sans
                gluten, idéales comme en-cas ou récompense, riches en protéines et sans additifs, digestes, cuites au
                four</p>
              <div class="d-flex align-items-center">
                <p>Livraison estimée : 2-4 jours ouvrés.</p>
                <a href="article.html" class="px-3  ctaSmall">Lire la suite</a>
              </div>
              <div class="sousCat">

                <div class="row py-3 m-0">
                  <div class="col-6">
                    <small class="ps-4">85 g</small>
                  </div>
                  <div class="col-2 text-end p-0 m-0">
                    <p class="bodyBold p-0 m-0">3,49 €</p>
                    <small class="text-secondary">41,06 €/kg</small>
                  </div>
                  <div class="col-4 d-flex align-items-center qty">
                    <div class="input-group ">
                      <i class="fas fa-regular fa-circle-minus fa-2xl boutonMoins mx-3"></i>
                      <input type="text" name="qty" id="quantity" value="1" class="input-group form-control" min="1"
                        aria-label="Quantité">
                      <i class="fas fa-regular fa-circle-plus fa-2xl boutonPlus mx-3"></i>
                      <a href="#" class="mx-3 addCard2"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                          viewBox="0 0 256 256">
                          <path
                            d="M222.14 58.87A8 8 0 0 0 216 56H54.68l-4.89-26.86A16 16 0 0 0 34.05 16H16a8 8 0 0 0 0 16h18l25.56 140.29a24 24 0 0 0 5.33 11.27a28 28 0 1 0 44.4 8.44h45.42a27.75 27.75 0 0 0-2.71 12a28 28 0 1 0 28-28H83.17a8 8 0 0 1-7.87-6.57L72.13 152h116a24 24 0 0 0 23.61-19.71l12.16-66.86a8 8 0 0 0-1.76-6.56ZM180 192a12 12 0 1 1-12 12a12 12 0 0 1 12-12Zm-96 0a12 12 0 1 1-12 12a12 12 0 0 1 12-12Z" />
                        </svg>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="row py-3 m-0">
                  <div class="col-6">
                    <small class="ps-4">3 x 85 g</small>
                  </div>
                  <div class="col-2 text-end p-0 m-0">
                    <small class="my-0 text-secondary">A l'unité 10,47 €</small>
                    <p class="bodyBold text-danger p-0 m-0">Par lot 9,79 €</p>
                    <small class="text-secondary">38,39 €/kg</small>
                  </div>
                  <div class="col-4 d-flex align-items-center qty">
                    <div class="input-group ">
                      <i class="fas fa-regular fa-circle-minus fa-2xl boutonMoins mx-3"></i>
                      <input type="text" name="qty" id="quantity" value="1" class="input-group form-control" min="1"
                        aria-label="Quantité">
                      <i class="fas fa-regular fa-circle-plus fa-2xl boutonPlus mx-3"></i>
                      <a href="#" class="mx-3 addCard2"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                          viewBox="0 0 256 256">
                          <path
                            d="M222.14 58.87A8 8 0 0 0 216 56H54.68l-4.89-26.86A16 16 0 0 0 34.05 16H16a8 8 0 0 0 0 16h18l25.56 140.29a24 24 0 0 0 5.33 11.27a28 28 0 1 0 44.4 8.44h45.42a27.75 27.75 0 0 0-2.71 12a28 28 0 1 0 28-28H83.17a8 8 0 0 1-7.87-6.57L72.13 152h116a24 24 0 0 0 23.61-19.71l12.16-66.86a8 8 0 0 0-1.76-6.56ZM180 192a12 12 0 1 1-12 12a12 12 0 0 1 12-12Zm-96 0a12 12 0 1 1-12 12a12 12 0 0 1 12-12Z" />
                        </svg>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="row py-3 m-0">
                  <div class="col-6">
                    <small class="ps-4">6 x 85 g</small>
                  </div>
                  <div class="col-2 text-end p-0 m-0">
                    <small class="my-0 text-secondary">A l'unité 20,94 €</small>
                    <p class="bodyBold text-danger p-0 m-0">Par lot 18,79 €</p>
                    <small class="text-secondary">36,84 €/kg</small>
                  </div>
                  <div class="col-4 d-flex align-items-center qty">
                    <div class="input-group ">
                      <i class="fas fa-regular fa-circle-minus fa-2xl boutonMoins mx-3"></i>
                      <input type="text" name="qty" id="quantity" value="1" class="input-group form-control" min="1"
                        aria-label="Quantité">
                      <i class="fas fa-regular fa-circle-plus fa-2xl boutonPlus mx-3"></i>
                      <a href="#" class="mx-3 addCard2"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                          viewBox="0 0 256 256">
                          <path
                            d="M222.14 58.87A8 8 0 0 0 216 56H54.68l-4.89-26.86A16 16 0 0 0 34.05 16H16a8 8 0 0 0 0 16h18l25.56 140.29a24 24 0 0 0 5.33 11.27a28 28 0 1 0 44.4 8.44h45.42a27.75 27.75 0 0 0-2.71 12a28 28 0 1 0 28-28H83.17a8 8 0 0 1-7.87-6.57L72.13 152h116a24 24 0 0 0 23.61-19.71l12.16-66.86a8 8 0 0 0-1.76-6.56ZM180 192a12 12 0 1 1-12 12a12 12 0 0 1 12-12Zm-96 0a12 12 0 1 1-12 12a12 12 0 0 1 12-12Z" />
                        </svg>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <!-- </div> -->
            </div>
          </div>
        </div>
      </div>
      <div class="card mb-3 w-100 h-auto produit">
        <div class="row g-0 p-0 pt-3">
          <div class="col-md-3 p-2 text-center">
            <img src="articles/categories/poulet/braaaf_roll_sticks_with_chicken_12_5cm_hs_01_7.jpg"
              class="rounded-start w-50" alt="...">
          </div>
          <div class="col-md-9">
            <div class="card-body">
              <h5 class="card-title p-0">Braaaf Bâtonnets torsadés à mâcher, poulet pour chien</h5>
              <p class="card-text">Bâtonnets à mâcher pour chien sans céréales, parfaits pour satisfaire l'instinct
                naturel de mastication, favorisent le nettoyage des dents et des gencives, naturels, sans arômes ni
                parfums.</p>
              <div class="d-flex align-items-center">
                <p>Livraison estimée : 2-4 jours ouvrés.</p>
                <a href="article.php" class="px-3  ctaSmall">Lire la suite</a>
              </div>
              <div class="sousCat">

                <div class="row py-3 m-0">
                  <div class="col-6">
                    <small class="ps-4">12.5 cm (30 bâtonnets)</small>
                  </div>
                  <div class="col-2 text-end p-0 m-0">
                    <p class="bodyBold p-0 m-0">14,99 €</p>
                    <small class="text-secondary">53,54 €/kg</small>
                  </div>
                  <div class="col-4 d-flex align-items-center qty">
                    <div class="input-group ">
                      <i class="fas fa-regular fa-circle-minus fa-2xl boutonMoins mx-3"></i>
                      <input type="text" name="qty" id="quantity" value="1" class="input-group form-control" min="1"
                        aria-label="Quantité">
                      <i class="fas fa-regular fa-circle-plus fa-2xl boutonPlus mx-3"></i>
                      <a href="#" class="mx-3 addCard2"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                          viewBox="0 0 256 256">
                          <path
                            d="M222.14 58.87A8 8 0 0 0 216 56H54.68l-4.89-26.86A16 16 0 0 0 34.05 16H16a8 8 0 0 0 0 16h18l25.56 140.29a24 24 0 0 0 5.33 11.27a28 28 0 1 0 44.4 8.44h45.42a27.75 27.75 0 0 0-2.71 12a28 28 0 1 0 28-28H83.17a8 8 0 0 1-7.87-6.57L72.13 152h116a24 24 0 0 0 23.61-19.71l12.16-66.86a8 8 0 0 0-1.76-6.56ZM180 192a12 12 0 1 1-12 12a12 12 0 0 1 12-12Zm-96 0a12 12 0 1 1-12 12a12 12 0 0 1 12-12Z" />
                        </svg>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="row py-3 m-0">
                  <div class="col-6">
                    <small class="ps-4">2 x 12.5 cm (30 bâtonnets)</small>
                  </div>
                  <div class="col-2 text-end p-0 m-0">
                    <small class="my-0 text-secondary">A l'unité 29,98 €</small>
                    <p class="bodyBold text-danger p-0 m-0">Par lot 26,46 €</p>
                    <small class="text-secondary">47,30 €/kg</small>
                  </div>
                  <div class="col-4 d-flex align-items-center qty">
                    <div class="input-group ">
                      <i class="fas fa-regular fa-circle-minus fa-2xl boutonMoins mx-3"></i>
                      <input type="text" name="qty" id="quantity" value="1" class="input-group form-control" min="1"
                        aria-label="Quantité">
                      <i class="fas fa-regular fa-circle-plus fa-2xl boutonPlus mx-3"></i>
                      <a href="#" class="mx-3 addCard2"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                          viewBox="0 0 256 256">
                          <path
                            d="M222.14 58.87A8 8 0 0 0 216 56H54.68l-4.89-26.86A16 16 0 0 0 34.05 16H16a8 8 0 0 0 0 16h18l25.56 140.29a24 24 0 0 0 5.33 11.27a28 28 0 1 0 44.4 8.44h45.42a27.75 27.75 0 0 0-2.71 12a28 28 0 1 0 28-28H83.17a8 8 0 0 1-7.87-6.57L72.13 152h116a24 24 0 0 0 23.61-19.71l12.16-66.86a8 8 0 0 0-1.76-6.56ZM180 192a12 12 0 1 1-12 12a12 12 0 0 1 12-12Zm-96 0a12 12 0 1 1-12 12a12 12 0 0 1 12-12Z" />
                        </svg>
                      </a>
                    </div>
                  </div>

                </div>
              </div>
            </div>
            <!-- </div> -->
          </div>
        </div>
      </div> -->

    </section>
  </main>

  <?php include('footer.php'); ?>

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
</body>

</html>