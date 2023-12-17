<?php
session_start();
include('../pdo.php');

if (!isset($_SESSION['userStatut']) || $_SESSION['userStatut'] != "admin") {
	header('Location:../index.php?erreur=accesRefuse');
	exit();
};


if(!empty($_GET["id_taille"])){
	if($_SESSION['userStatut']=="admin"){
			$stmt = $pdo->prepare("DELETE FROM conditionnement WHERE id = :id");
			$stmt->bindValue(':id', $_GET['id_taille'], PDO::PARAM_INT);
			$stmt->execute();
			$stmt->closeCursor();

			echo "Cette taille vient d'être supprimée, retour à la page des produits";
			header("Refresh: 3; listeProduits.php");
			exit();
	}
}

echo "Erreur : Impossible de supprimer la taille.";
header("Refresh: 3; admin.php");
exit();
