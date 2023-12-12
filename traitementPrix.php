<?php
include('pdo.php');


$taille = $_POST['taille'];
$idProduit = $_GET['id_produit'];

    $stmt = $pdo->prepare("SELECT prix,taille FROM conditionnement
     WHERE id =:taille AND id_produit=:idProduit");
    $stmt->bindValue(':taille', $taille);
    $stmt->bindValue(':idProduit', $idProduit);

    $stmt->execute();
    $selectedArticle = $stmt->fetch(PDO::FETCH_ASSOC);
    echo  $selectedArticle['prix']." €";
		$stmt->closeCursor();

?>