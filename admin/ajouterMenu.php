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
  <title>GlaDalle - Ajouter</title> 
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="../style.css">
</head>
<body>
<?php include('header.php');?>

<h1 class="text-center">Ajouter un menu</h1>
  <form class="w-50 m-auto" action="ajouterMenuReq.php" method="post" enctype="multipart/form-data">
    <!-- enctype="multipart/form-data est un type d'encodage nécessaire pour 
    télécharger img en post -->
    <label for="nom">Nom du menu</label><br>
    <input class="w-100 m-auto" type="text" name="nom" required><br><br>

    <label for="description">description du menu</label><br>
    <textarea class="w-100 m-auto" name="description" required rows="15">description</textarea><br><br>

    <label for="prix">Prix du menu</label><br>
    <input class="w-100 m-auto" type="text" name="prix" required><br><br>


    <label for="image">Image du menu</label><br>
    <input class="w-100 m-auto" type="file" name="image" required><br><br>

    <input type="submit" value="Ajouter un menu">
  </form>
</body>

</html>
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