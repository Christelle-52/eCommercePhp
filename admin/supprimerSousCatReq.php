<?php
session_start();
include('../pdo.php');

if (!isset($_SESSION['userStatut']) || $_SESSION['userStatut'] != "admin") {
	header('Location:../index.php?erreur=accesRefuse');
	exit();
};


if(!empty($_GET["id_sousCat"])){
	if($_SESSION['userStatut']=="admin"){
			$stmt = $pdo->prepare("DELETE FROM sousCategories WHERE id = :id");
			$stmt->bindValue(':id', $_GET['id_sousCat'], PDO::PARAM_INT);
			$stmt->execute();
			$stmt->closeCursor();

			echo "Cette sous catégorie vient d'être supprimée, retour à la page des produits";
			header("Refresh: 3; listeCat.php");
			exit();
	}
}

echo "Erreur : Impossible de supprimer la sous catégorie.";
header("Refresh: 3; admin.php");
exit();
