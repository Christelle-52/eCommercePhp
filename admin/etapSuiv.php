<?php
include('../pdo.php');
session_start();
if(!isset($_SESSION['userStatut']) || $_SESSION['userStatut']!="admin") {
	header('Location:../index.php?erreur=accesRefuse');
  // exit();
}

$stmt = $pdo->prepare('SELECT * from paniers WHERE id = :id');
$stmt->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
$stmt->execute();
$panier = $stmt->fetch();

if ($panier) {

$etat = ($panier['statut'] == "") ? "En cours de préparation" :
        (($panier['statut'] == "En cours de préparation") ? "En cours de livraison" :
        (($panier['statut'] == "En cours de livraison") ? "Livré" : "Terminé"));

$stmt = $pdo->prepare("UPDATE paniers SET statut = :statut WHERE id = :id");
$stmt->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
$stmt->bindValue(':statut', $etat, PDO::PARAM_STR);
$stmt->execute();
$stmt->closeCursor();

header("Location: listePaniers.php");
exit();
}
