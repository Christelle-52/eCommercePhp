<?php
session_start();
include('../pdo.php');

if(!isset($_SESSION['userStatut']) && $_SESSION['userStatut']!="admin") {
  echo "Erreur : vous ne pouvez pas entrer ici !!";
  exit();
}
if(isset($_GET["idmenu"])){
  $stmt = $pdo->prepare('SELECT * FROM menusvip WHERE id=:id');
  $stmt->bindValue(':id', $_GET["idmenu"], PDO::PARAM_INT);
  $stmt->execute();
  $menu = $stmt->fetch();
  $stmt->closeCursor();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GlaDalle - Modifier</title> 
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="../style.css">
</head>
<body>
<?php include('header.php');?>

<div class="m-auto py-3 my-5 mod w-50">
<h1 class="text-center">Mettre à jour le menu</h1>
    <form class="w-75 m-auto py-5" action="modifierReq.php" method="POST" enctype="multipart/form-data">
        <label for="nom">Nom du menu</label><br>
        <input class="w-100" type="text" name="nom" value="<?= $menu["nom"] ?>">
        <input type="hidden" name="idmenu" value="<?= $_GET["idmenu"] ?>"><br><br>

        <label for="description">Description du menu</label><br>
        <textarea class="w-100" name="description" cols="30" rows="5"><?= $menu['description'] ?></textarea><br><br>

        <label for="prix">Prix du menu</label><br>
        <input class="w-100" type="number" step=".01" name="prix" value="<?= $menu["prix"] ?>">

        <div class="text-center"> Image actuelle : <br>
            <img class="text-center w-50 m-auto" src="<?='.'.$menu["image"] ?>">
        </div>
        <label for="image">Changer la photo de menu</label>
        <input type="file" name="image"><br><br>

        <button class="text-center m-auto p-2" type="submit">Modifier ce menu</button>
    </form>
</div>
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