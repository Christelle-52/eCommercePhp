<?php
session_start();
include('../pdo.php');

if(!isset($_SESSION['userStatut']) || $_SESSION['userStatut']!="admin") {
	header('Location:../admin.php?erreur=accesRefuse');
  exit();
}

if(isset($_POST["id_taille"])){
  $stmt = $pdo->prepare("SELECT * FROM conditionnement  WHERE id = :id");
  $stmt->bindValue(':id', $_POST["id_taille"], PDO::PARAM_INT);
  $stmt->execute();
  $tailles=$stmt->fetch();

  $stmt = $pdo->prepare("UPDATE conditionnement SET taille = :taille, prix = :prix, stock = :stock, size = :size, prixKg = :prixKg, id_produit = :id_produit  
  WHERE id = :id");
  $stmt->bindValue(':id', $_POST["id_taille"], PDO::PARAM_INT);
  $stmt->bindValue(':taille', $_POST["taille"], PDO::PARAM_STR);
  $stmt->bindValue(':prix', $_POST["prix"], PDO::PARAM_STR);
  $stmt->bindValue(':stock', $_POST["stock"], PDO::PARAM_STR);
  $stmt->bindValue(':size', $_POST["size"], PDO::PARAM_STR);
  $stmt->bindValue(':prixKg', $_POST["prixKg"], PDO::PARAM_STR);
  $stmt->bindValue(':id_produit', $_POST["id_produit"], PDO::PARAM_INT);
  $stmt->execute();
  $stmt->closeCursor();

  header("Location:listeProduits.php?modification=reussie");
  exit();
}
echo "Vous n'avez pas de taille sélectionnée !";
header("Refresh: 3; listeProduits.php");
exit();
