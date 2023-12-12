<?php
include('../pdo.php');
?>


<header>
  <!-- nav de haut de page -->
  <nav class=" container-fluid navHeader d-flex justify-content-end align-items-center">
    <?php if (isset($_SESSION['userPrenom'])) { ?>
    <div class="navHeaderItem">
      <span class="text-success py-0 my-0 gy-0">Bienvenu(e) <?=$_SESSION['userPrenom']?></span>
    </div>
    <a class="linkButton" href="../deconnexionReq.php">
      <div class="navHeaderItem">
        <svg xmlns="http://www.w3.org/2000/svg" width="17.5" height="17.5" viewBox="0 0 24 24">
          <g transform="translate(24 0) scale(-1 1)">
            <g fill="currentColor">
              <path d="M12 3.25a.75.75 0 0 1 0 1.5a7.25 7.25 0 0 0 0 14.5a.75.75 0 0 1 0 1.5a8.75 8.75 0 1 1 0-17.5Z" />
              <path
                d="M16.47 9.53a.75.75 0 0 1 1.06-1.06l3 3a.75.75 0 0 1 0 1.06l-3 3a.75.75 0 1 1-1.06-1.06l1.72-1.72H10a.75.75 0 0 1 0-1.5h8.19l-1.72-1.72Z" />
            </g>
          </g>
        </svg>
        <span>Déconnexion</span>
      </div>
    </a>

    <?php  } else { ?>
    <span class="text-danger py-0 my-0 gy-0">Vous n'êtes pas connecté.</span>
    <?php  } 
    if (!isset($_SESSION['userPrenom'])) { ?>

    <a class="linkButton" href="../connexion.php">
      <div class="navHeaderItem">
        <svg xmlns="http://www.w3.org/2000/svg" width="17.5" height="17.5" viewBox="0 0 24 24">
          <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5">
            <path d="M12 20a8 8 0 1 0 0-16" />
            <path stroke-linejoin="round" d="M4 12h10m0 0l-3-3m3 3l-3 3" />
          </g>
        </svg>
        <span>Connexion</span>
      </div>
    </a>
    
    <a class="linkButton" href="../contact.php">
      <div class="navHeaderItem">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" viewBox="0 0 24 24">
          <path fill="currentColor"
            d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm-.4 4.25l-6.54 4.09c-.65.41-1.47.41-2.12 0L4.4 8.25a.85.85 0 1 1 .9-1.44L12 11l6.7-4.19a.85.85 0 1 1 .9 1.44z" />
        </svg>
        <span>Contactez-nous</span>
      </div>
    </a>
    <a class="linkButton" href="../panier.php">
      <div class="navHeaderItem">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" viewBox="0 0 256 256">
          <path fill="currentColor"
            d="M222.14 58.87A8 8 0 0 0 216 56H54.68l-4.89-26.86A16 16 0 0 0 34.05 16H16a8 8 0 0 0 0 16h18l25.56 140.29a24 24 0 0 0 5.33 11.27a28 28 0 1 0 44.4 8.44h45.42a27.75 27.75 0 0 0-2.71 12a28 28 0 1 0 28-28H83.17a8 8 0 0 1-7.87-6.57L72.13 152h116a24 24 0 0 0 23.61-19.71l12.16-66.86a8 8 0 0 0-1.76-6.56ZM180 192a12 12 0 1 1-12 12a12 12 0 0 1 12-12Zm-96 0a12 12 0 1 1-12 12a12 12 0 0 1 12-12Z" />
        </svg>
        <span>Panier</span>
      </div>
    </a>
    <?php }

   if (isset($_SESSION['userPrenom']) && $_SESSION['userStatut']=="admin") { ?>
      <a class="linkButton" href="admin.php">
      <div class="navHeaderItem">
        <!-- <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" viewBox="0 0 256 256">
          <path fill="currentColor"
            d="M222.14 58.87A8 8 0 0 0 216 56H54.68l-4.89-26.86A16 16 0 0 0 34.05 16H16a8 8 0 0 0 0 16h18l25.56 140.29a24 24 0 0 0 5.33 11.27a28 28 0 1 0 44.4 8.44h45.42a27.75 27.75 0 0 0-2.71 12a28 28 0 1 0 28-28H83.17a8 8 0 0 1-7.87-6.57L72.13 152h116a24 24 0 0 0 23.61-19.71l12.16-66.86a8 8 0 0 0-1.76-6.56ZM180 192a12 12 0 1 1-12 12a12 12 0 0 1 12-12Zm-96 0a12 12 0 1 1-12 12a12 12 0 0 1 12-12Z" />
        </svg> -->
        <span>Administrateur</span>
      </div>
    </a>
    <?php  }  ?>

  </nav>

  <!-- bannière + promesse + logo + CTA + searchBar-->
  <section class="container-fluid header">
    <div class="container-fluid banTop d-flex justify-content-between">
      <a href="../index.php"><img class="logo" src="../logo/logo_small.png" alt="logo"></a>
      <h1 class="promesse">La vie est belle à travers le regard d’un chien.<br>
        Laissez-nous le combler avec nos produits de qualité.</h1>
    </div>
    <!-- CTA + searchBar -->
    <div class="container-fluid banLink justify-content-center">
      <div class="row justify-content-between w-100 gy-2 mx-1">
        <!-- searchBar -->
        <form class="col-lg-6 col-md-8 search d-flex" action="../pageSearch.php" method="GET" require>
          <input class="form-control" name="search" type="text" placeholder="Recherche" aria-label="Search">
          <button class="searchSubmit" type="submit">
            <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 512 512">
              <path fill="#85147a"
                d="M416 208c0 45.9-14.9 88.3-40 122.7l126.6 126.7c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0s208 93.1 208 208zM208 352a144 144 0 1 0 0-288a144 144 0 1 0 0 288z" />
            </svg>
          </button>
        </form>
        <!-- CTA -->
        <a class="col-lg-2 col-md-3 cta py-0" href="../inscription.php" role="button">
          Rejoignez-nous
        </a>
      </div>
    </div>
  </section>

  <!-- Nav des catégories -->
  <section class="container-fluid navMenuItem w-100">
    <div class="container navbar navbar-expand-lg ">
      <!-- toggler button -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarToggleExternalContent">
        <!-- Catégories -->

      <?php 
        $stmt = $pdo->prepare('SELECT * FROM categories');
        $stmt->execute();
        $cat = $stmt -> fetchAll();
        $stmt->closeCursor();

        // var_dump($cat);
        foreach($cat as $c): ?>
          <li class="nav-item dropdown">
          <a href="../categories.php?categorie=<?= ucfirst($c["nom"])?>" class="btn" role="button"><?= ucfirst($c["nom"]) ?></a>
          <ul class="dropdown-menu py-0">
            <?php 
            $sous_Cat = $pdo->prepare('SELECT * FROM sousCategories WHERE id_categorie= ?');
            $sous_Cat->execute(array($c['id']));
            $sousCat = $sous_Cat -> fetchAll();
            $stmt->closeCursor();

            foreach($sousCat as $ssc): ?>

          <li><a class="dropdown-item" href="../sousCategories.php?id_categorie=<?= $c['nom'] ?>&id_sousCategorie=<?= $ssc['id'] ?>"><?= ucfirst($ssc['nom']) ?></a></li>

            <?php endforeach ?> 
          </ul> 
        <?php endforeach ?>
        </li>

        <div class="dropdown">
          <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            A propos de nous
          </button>
        </div>
      </div>
    </div>
  </section>
</header>