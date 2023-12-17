<?php
session_start();
include('../pdo.php');

if (!isset($_SESSION['userStatut']) || $_SESSION['userStatut'] != "admin") {
	header('Location:../index.php?erreur=accesRefuse');
	exit();
};

$req = $pdo->prepare(
	"INSERT INTO conditionnement (taille, prix, stock, size, prixKg, id_produit)
  VALUES (:taille, :prix, :stock, :size, :prixKg, :id_produit)",
	array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY)
);

$req->execute(
	array(
		':taille' => $_POST["taille"],
		':prix' => $_POST["prix"],
		':stock' => $_POST["stock"],
		':size' => $_POST["size"],
		':prixKg' => $_POST["prixKg"],
		':id_produit' => $_POST["id_produit"]
	)
);

$req->closeCursor();


header('Location:listeProduits.php?ajout=reussi');
exit();
