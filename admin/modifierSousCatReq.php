<?php
session_start();
include('../pdo.php');

if(!isset($_SESSION['userStatut']) || $_SESSION['userStatut']!="admin") {
	header('Location:../admin.php?erreur=accesRefuse');
  exit();
}

if(isset($_POST["id_sousCat"])){
  $stmt = $pdo->prepare("SELECT * FROM sousCategories  WHERE id = :id");
  $stmt->bindValue(':id', $_POST["id_sousCat"], PDO::PARAM_INT);
  $stmt->execute();
  $categories=$stmt->fetch();

  $stmt = $pdo->prepare("UPDATE sousCategories SET nom = :nom, descriptif = :descriptif  WHERE id = :id");
  $stmt->bindValue(':id', $_POST["id_sousCat"], PDO::PARAM_INT);
  $stmt->bindValue(':nom', $_POST["nom"], PDO::PARAM_STR);
  $stmt->bindValue(':descriptif', $_POST["descriptif"], PDO::PARAM_STR);
  $stmt->execute();
  $stmt->closeCursor();

  header("Location:listeCat.php?modification=reussie");
  exit();
}
echo "Vous n'avez pas de sous catégorie sélectionnée !";
header("Refresh: 3; listeCat.php");
exit();
