<?php
session_start();
include ('../pdo.php');

if(!isset($_SESSION['userStatut']) && $_SESSION['userStatut']!="admin") {
  echo "Erreur : vous ne pouvez pas entrer ici !!";
  exit();
}

$stmt = $pdo->prepare("SELECT id FROM menusvip WHERE id =".$_GET['idmenu']);
$stmt->execute();
$burger=$stmt->fetch();

if(!empty($_GET["idmenu"])){
	if($_SESSION['userStatut']=="admin"){
			$stmt = $pdo->prepare("DELETE FROM menusvip WHERE id = :id");
			$stmt->bindValue(':id', $_GET["idmenu"], PDO::PARAM_INT);
			$stmt->execute();
			$stmt->closeCursor();

			echo "Le menu vient d'être supprimé, retour à la page d'accueil";
			header("Refresh: 3; index.php");
			exit();
	}
}

echo "Erreur : Impossible de supprimer l'article.";
header("Refresh: 3; index.php");
?>