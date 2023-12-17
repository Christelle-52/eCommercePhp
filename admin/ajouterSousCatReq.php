<?php
session_start();
include('../pdo.php');

if (!isset($_SESSION['userStatut']) || $_SESSION['userStatut'] != "admin") {
	header('Location../index.php?erreur=accesRefuse');
	exit();
};

$req = $pdo->prepare(
	"INSERT INTO sousCategories (nom, descriptif, id_categorie)
  VALUES (:nom, :descriptif, :id_categorie)",
	array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY)
);

$req->execute(
	array(
		':nom' => $_POST["nom"],
		':descriptif' => $_POST["descriptif"],
		':id_categorie' => $_POST["id_categorie"]
	)
);

$req->closeCursor();


header('Location:listeCat.php?ajout=reussi');
exit();
