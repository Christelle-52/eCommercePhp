<?php

/*différence addCart et addCart2, projet adidas :
  methode de récup id produit, quantité ajoutée et url de redirection donc ce seront les paramètres de la fonction
  dans l'ajout page index (addCart2):
  GET id,1,index.php?product=added
  dans l'ajout sur article (addCart):
  POST id, $_POST['qty'],details.php*/
function ajoutPanier($idProduit,$quantite) {

  global $pdo;

  $stmt = $pdo->prepare('SELECT * from produits p
  WHERE p.id= :id');

  $stmt->bindValue(':id', $idProduit, PDO::PARAM_INT);
  $stmt->execute();
  $produit = $stmt->fetch(PDO::FETCH_ASSOC);

  $stockRestant = $produit['stock'] - $quantite;

  if ($produit['stock'] >= $quantite) {
    $updateStmt = $pdo->prepare("UPDATE produits SET stock = :stock where id = :id");
    $updateStmt->execute([':id' => $idProduit, ':stock' => $stockRestant]);
    $updateStmt->closeCursor();

    // $couponVal = null;
    $newPrice = $produit['prix'];
    
    
    
    $insertStmt = $pdo->prepare("INSERT INTO paniers(id_produit, dateCreation, id_client, quantite, montant, couponVal)
    VALUES (:id_produit, :dateCreation, :id_client, :quantite, :montant, :couponVal)",
    array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $insertStmt->execute([
      ':id_produit' => $productId,
      ':dateCreation' => date('Y-m-d H:i:s'),
      ':id_client' => $_SESSION['userId'],
      ':quantite' => $quantite,
      ':montant' => $quantite * $newPrice
      // ':couponVal' => $couponVal
    ]);
    $insertStmt->closeCursor();
    
    header("Location: panier.php?message=validate&id=$idProduit");
      } else {
      header("Location: panier.php?message=outstock&id=$idProduit");
      }
}




// if (isset($_SESSION['couponCode'])) {
//   $couponId = $_SESSION['couponId'];
//   $couponStmt = $pdo->prepare('SELECT * from coupons WHERE id = :id');
//   $couponStmt->bindValue(':id', $couponId, PDO::PARAM_INT);
//   $couponStmt->execute();
//   $coupon = $couponStmt->fetch();

//   if ($coupon['type'] == "%") {
//       $percent = 1 - ($coupon['remise'] / 100);
//       $newPrice = $produit['prix'] * $percent;
//   }
//   else if ($coupon['type'] == "€") {
//     $newPrice = $produit['prix'] - $coupon['remise'];
//   }
// }