<?php
session_start();
include ('../pdo.php');

if(!isset($_SESSION['userStatut']) || $_SESSION['userStatut']!="admin") {
	header('Location:../index.php?erreur=accesRefuse');
  exit();
}

if(!empty($_GET["id"])){
	if($_SESSION['userStatut']=="admin"){
			$stmt = $pdo->prepare("DELETE FROM coupons WHERE id = :id");
			$stmt->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
			$stmt->execute();
			$stmt->closeCursor();

			echo "Le coupon vient d'être supprimé, retour à la page d'administration";
			header("Refresh: 3; listeCoupons.php");
			exit();
	}
}

echo "Erreur : Impossible de supprimer le coupon.";
header("Refresh: 3; admin.php");
exit();
