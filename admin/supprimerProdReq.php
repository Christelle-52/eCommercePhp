<?php
session_start();
include ('../pdo.php');

if(!isset($_SESSION['userStatut']) || $_SESSION['userStatut']!="admin") {
	header('Location:../index.php?erreur=accesRefuse');
  exit();
}

if(!empty($_GET["id_produit"])){
	if($_SESSION['userStatut']=="admin"){
			$stmt = $pdo->prepare("DELETE produits,conditionnement FROM produits
      INNER JOIN conditionnement ON conditionnement.id_produit = produits.id 
      WHERE produits.id = :id");
			$stmt->bindValue(':id', $_GET['id_produit'], PDO::PARAM_INT);
			$stmt->execute();
			$stmt->closeCursor();

			echo "Le produit vient d'être supprimé, retour à la page d'administration";
			header("Refresh: 3; listeProduits.php");
			exit();
	}
}

echo "Erreur : Impossible de supprimer le produit.";
header("Refresh: 3; admin.php");
exit();
