<?php
session_start();
include('../pdo.php');

if (!isset($_SESSION['userStatut']) || $_SESSION['userStatut'] != "admin") {
	header('Refresh: 3;../index.php?erreur=accesRefuse');
	exit();
};

$stmt = $pdo->prepare('SELECT * FROM clients WHERE id = :id');
$stmt->bindValue(':id', $_GET["idClient"], PDO::PARAM_INT);
$stmt -> execute();
$client = $stmt -> fetch();
$stmt->closeCursor();

if($user) {

  $statut= $client['statut'] == 'client' ? 'admin' : 'client'; 
  $stmt = $pdo->prepare('UPDATE clients SET statut = :statut WHERE id = :id');
  $stmt->bindValue(':id', $_GET["idClient"], PDO::PARAM_INT);
  $stmt->bindValue(':statut', $statut, PDO::PARAM_STR);

  $stmt -> execute();
  $stmt->closeCursor();
  header('Location:listeClients.php?modificationreussie');
  exit();
  
}
