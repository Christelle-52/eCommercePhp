<?php
session_start();
include('pdo.php');
// $categorie = $_GET[id_categorie];

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

  <title>ZenDog - Article</title>

</head>

<body>
<?php include('header.php');
$stmt = $pdo->prepare("SELECT * FROM produits p
INNER JOIN conditionnement co ON p.id = co.id_produit
WHERE p.id= :id");
$stmt->bindValue(':id', $_GET['id_produit'], PDO::PARAM_INT);
$stmt->execute();
$article = $stmt -> fetchAll(PDO::FETCH_ASSOC);

// print_r($article);
$id=($article[0]['id_produit']);
$stmt->closeCursor();

$images =explode(',', $article[0]['image']);
// var_dump($images);


if (!empty($article[0]['description1'])){
$details = explode(',', $article[0]['description1']);
// var_dump($details);
}
?>
  <main>
    <section class="container">
      <nav class="wayLink p-2">
        <!-- <ol>
          <li><a href="index.html">Accueil</a></li>
          <li><a href="#"></a>Friandises</li>
          <li><a href="#"></a>Autres</li>
        </ol> -->
      </nav>
      <div class="row m-auto containerProduct">
        <div class="col-lg-4 col-12 gx-5 mt-5">
          <div class="row images p-3">
            <div class="p-4">
              <img id="changeImage" class="image pb-4" src="<?=$images[0] ?>">
            </div>

            <div class="row">
            <?php 
            if (count($images)>1){
              for($i=0;$i< count($images);$i++){ ?>
              <img class="image col" src="<?=$images[$i] ?>">
            <?php } 
            } ?>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-12 textProduct gx-5">
          <h1><?=ucfirst($article[0]["nom"]) ?></h1>
          <h3><?php if (!empty($article[0]['classe'])){echo ucfirst($article[0]['classe']); } ?></h3>
          <ul>
            <?php if(!empty($details)) {
             foreach($details as $detail){ ?>
            <li><?= ucfirst($detail) ?></li>
            <?php } } ?>
          </ul>
          <p><?php if (!empty($article[0]['description2'])){echo ucfirst($article[0]['description2']);} ?></span>
          </p>
          <table >
            <tr>

              <th>Taille</th>
              <th>Description</th>
            <?php foreach($article as $art){ 
              // var_dump($art)?>
            </tr>
            <tr>
              <td><?=($art['taille']) ?></td>
              <td> <?=($art['size']) ?> ;</td>
              <?php } ?>
            </tr>
            
          </table>
          <form>
          <input type="hidden" value="<?= ($_GET['id_produit']) ?>" name="idProduit">
            <div class="row selectSizeQty py-4 justify-content-around me-0 ms-0">
              <div class="col-4">
                <label for="taille" class="control-label bodyBold">Choix :</label>
                <select name="taille" class="form-control form-control-select" id="selectSize">
                <option value="">Choisisssez votre taille</option>

                  <?php foreach($article as $art){ ?>
                  <option value="<?= ($art['id']) ?>"> <?= ($art['taille']);
                   } ?></option>
                </select>
                </div>
                <div class="col-3 text-center">
                  <span class="control-label bodyBold">Quantité :</span>
                  <div class="qty">
                    <div class="input-group">
                      <i class="fas fa-regular fa-circle-minus fa-2xl boutonMoins"></i>
                      <input type="text" name="qty" id="quantity" value="1" class="input-group form-control mx-1 text-center" min="1"
                      aria-label="Quantité">
                      <i class="fas fa-regular fa-circle-plus fa-2xl boutonPlus"></i>
                    </div>
                  </div>
                </div>
                <div class="col-4 text-bottom">
                  <div class="price">
                    
                    <p class="valueProduct" id="prix">&nbsp;</p><small>TTC</small>

                  </div>
                </div>
              </div>
              
              <a class="ctaSmall d-block" href="addcart.php?id_produit=<?= $id ?>" >
                <div class="addCard">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 256 256">
                    <path fill="currentColor"
                    d="M222.14 58.87A8 8 0 0 0 216 56H54.68l-4.89-26.86A16 16 0 0 0 34.05 16H16a8 8 0 0 0 0 16h18l25.56 140.29a24 24 0 0 0 5.33 11.27a28 28 0 1 0 44.4 8.44h45.42a27.75 27.75 0 0 0-2.71 12a28 28 0 1 0 28-28H83.17a8 8 0 0 1-7.87-6.57L72.13 152h116a24 24 0 0 0 23.61-19.71l12.16-66.86a8 8 0 0 0-1.76-6.56ZM180 192a12 12 0 1 1-12 12a12 12 0 0 1 12-12Zm-96 0a12 12 0 1 1-12 12a12 12 0 0 1 12-12Z" />
                  </svg>
                  <span class="bodyBold">Ajouter au panier</span>
                </div>
              </a>
            </form>
          </div>
      </div>

    </section>
    <section>
      <?php
      $stmt = $pdo->prepare("SELECT fiche, details, composition FROM produits p
      WHERE p.id = :id_produit");
      $stmt->bindValue(':id_produit', $_GET['id_produit'], PDO::PARAM_INT);
      $stmt->execute();
      $tabs = $stmt -> fetch();
      $stmt->closeCursor();

      if(!empty($tabs['fiche']) || !empty($tabs['details']) || !empty($tabs['composition'])) {
      $fiche = explode('/', $tabs['fiche']);
      $tech = explode('/', $tabs['details']);
      
      ?>
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane"
            type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">DESCRIPTION</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane"
            type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">DETAILS DU PRODUIT</button>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
          <div class="product-description p-3">
            <h2 class="py-2"><?=$fiche[0] ?></h2>
            <p class="bodyBold"><?=$fiche[1] ?></p>
            <?php for($i=2;$i<count($fiche) ; $i++){ ?>

            <p><?=$fiche[$i] ?></p>
            <?php } ?>
            <p class="bodyBold">Composition : </p>
            <p><?=$tabs['composition'] ?></p>
          </div>
        </div>
        <div class="tab-pane fade show active" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
          tabindex="0">
          <div class="productFeature">
            <h2>Fiche technique</h2>
            <table class="my-5">
              <tr>
                <td class="bodyBold pe-5">Type de produits</td>
                <td><?=$tech[0] ?></td>
              </tr>
              <tr>
                <td class="bodyBold pe-5">Animal</td>
                <td><?=$tech[1] ?></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <?php } ?>
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
  <script src="script/eye.js" type="text/javascript"></script>
  <!-- <script src="script/formulaire.js" type="text/javascript"></script> -->
  <script src="script/plusMoins.js" type="text/javascript"></script>
  <!-- <script src="script/choix.js" type="text/javascript"></script> -->
  <script src="script/choixAjax.js" type="text/javascript"></script>

  <script src="script/images.js" type="text/javascript"></script>

</body>

</html>