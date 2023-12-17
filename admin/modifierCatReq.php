<?php
session_start();
include('../pdo.php');

if(!isset($_SESSION['userStatut']) || $_SESSION['userStatut']!="admin") {
	header('Location:../admin.php?erreur=accesRefuse');
  exit();
}

if(isset($_POST["id_categorie"])){
  $stmt = $pdo->prepare("SELECT * FROM categories  WHERE id = :id");
  $stmt->bindValue(':id', $_POST["id_categorie"], PDO::PARAM_INT);
  $stmt->execute();
  $categories=$stmt->fetch();

  $stmt = $pdo->prepare("UPDATE categories SET nom = :nom, descript = :descript  WHERE id = :id");
  $stmt->bindValue(':id', $_POST["id_categorie"], PDO::PARAM_INT);
  $stmt->bindValue(':nom', $_POST["nom"], PDO::PARAM_STR);
  $stmt->bindValue(':descript', $_POST["descript"], PDO::PARAM_STR);
  $stmt->execute();
  $stmt->closeCursor();

  header("Location:listeCat.php?modification=reussie");
  exit();
}
echo "Vous n'avez pas de catégorie sélectionnée !";
header("Refresh: 3; listeCat.php");
exit();
