<?php
session_start();
include ('../pdo.php');
$stmt = $pdo->prepare('SELECT * FROM produits');
$stmt->execute();
$menusvip=$stmt->fetchAll();
if(!isset($_SESSION['userStatut']) && $_SESSION['userStatut']!="admin") {
  echo "Erreur : vous ne pouvez pas entrer ici !!";
  exit();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Zendog</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="../styles/style.css">
</head>

<body>
  <?php include ('header.php');?>
  <h1 class="text-center my-5">Liste des menus</h1>
  <div class="text-center admin-item">
  <a class="admin-link" href="ajouterMenu.php">Ajouter un menu</a>

</div>
  <table class=" w-75 m-auto">
    <thead>
      <tr>
        <th class="col-md-1 px-2">Nom</th>
        <th class="col px-2">Description</th>
        <th class="col-md-1 px-2">Prix</th>
        <th class="col-md-1 px-2 text-center">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($menusvip as $menu){ ?>

      <tr>
        <th class="col-md-1 px-2"><?= $menu['nom'] ?></th>
        <td class="col px-2"><?= $menu['description'] ?></td>
        <td class="col-md-1 px-2"><?= $menu['prix'] ?> €</td>
        <td class="col-md-1 px-2">
          <div class="text-center admin-item">
            <a class="admin-link" href="supprimerReq.php?idmenu=<?=$menu['id']?>">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 14 14">
                <path fill="none" stroke="#e9530d" stroke-linecap="round" stroke-linejoin="round"
                  d="m12 .5l-1.4 12.11a1 1 0 0 1-1 .89H4.39a1 1 0 0 1-1-.89L2 .5m-1 0h12m-6 0v13m-4.54-9h9.08M2.98 9h8.04" />
              </svg></a><br>
            <a class="admin-link" href="modifier.php?idmenu=<?=$menu['id']?>">Modifier</a>
          </div>
      </tr>

    </tbody>
    <?php } ?>
  </table>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
  </script>
</body>

</html>