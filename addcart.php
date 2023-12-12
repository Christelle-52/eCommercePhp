<?php
include('pdo.php');
session_start();
include_once('fonctions.php');

$taille =$_POST['selectedSizeTaille'];
$prix = $_POST['selectedSizePrice'];
$quantite=$_POST['qty'];
$idProduit=$_GET['id_produit'];

// var_dump($taille);
// var_dump($prix);
// var_dump($_GET['id_produit']);die();

$stmt = $pdo->prepare("SELECT * FROM produits WHERE id= :id");
$stmt->bindValue(':id', $idProduit, PDO::PARAM_INT);
$stmt->execute();
$article = $stmt -> fetch(PDO::FETCH_ASSOC);

$stockRestant = $article['stock'] - $quantite;

// var_dump($stockRestant);die();



if ($article['stock'] >= $quantite) {
  $updateStmt = $pdo->prepare("UPDATE produits SET stock = :stock where id = :id");
  $updateStmt->execute([':id' => $_GET['id_produit'], ':stock' => $stockRestant]);
  $updateStmt->closeCursor();

  // $couponVal = null;
  $newPrice = $prix;
  
  
  
  $insertStmt = $pdo->prepare("INSERT INTO paniers(id_produit, dateCreation, id_client, quantite, montant, taille, prix)
  VALUES (:id_produit, :dateCreation, :id_client, :quantite, :montant, :taille, :prix)",
  array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
  $insertStmt->execute([
    ':id_produit' => $idProduit,
    ':dateCreation' => date('Y-m-d H:i:s'),
    ':id_client' => $_SESSION['userId'],
    ':quantite' => $quantite,
    ':montant' => $quantite * $newPrice,
    ":taille" => $taille,
    ":prix" => $prix,

    // ':couponVal' => $couponVal
  ]);
  $insertStmt->closeCursor();
  
  header("Location: panier.php?message=validate&id_produit=".$idProduit);
  } else {
    header("Location: panier.php?message=outstock&id_produit=".$idProduit);
  }

?>