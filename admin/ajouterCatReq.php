<?php
session_start();
include('../pdo.php');

if (!isset($_SESSION['userStatut']) || $_SESSION['userStatut'] != "admin") {
	header('Refresh: 3;../index.php?erreur=accesRefuse');
	exit();
};

if(!empty($_POST['nom'])){
$req = $pdo->prepare(
	"INSERT INTO categories (nom, descript)
	VALUES (:nom, :descript)",
	array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY)
);

$req->execute(
	array(
		':nom' => $_POST['nom'],
		':descript' => $_POST['descript']
	)
);

$req->closeCursor();

header('Location:listeCat.php?ajout=reussi');
exit();
}else {
  echo "Vous devez remplir le nom !";
  header('Refresh: 3;ajouterCategorie.php');

}
