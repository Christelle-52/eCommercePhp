<?php
session_start();
include ('../pdo.php');

if(!isset($_SESSION['userStatut']) || $_SESSION['userStatut']!="admin") {
	header('Location:../index.php?erreur=accesRefuse');
  exit();
}

if(!empty($_GET["id_categorie"])){
			$stmt = $pdo->prepare("DELETE categories,sousCategories FROM categories
      INNER JOIN sousCategories ON sousCategories.id_categorie = categories.id 
      WHERE categories.id = :id");
			$stmt->bindValue(':id', $_GET['id_categorie'], PDO::PARAM_INT);
			$stmt->execute();
			$stmt->closeCursor();

			echo "La catégorie vient d'être supprimée, retour à la page d'administration";
			header("Refresh: 3; listeCat.php");
			exit();
	}

echo "Erreur : Impossible de supprimer la catégorie.";
header("Refresh: 3; admin.php");
exit();
