<?php
session_start();
include('../pdo.php');

if(!isset($_SESSION['userStatut']) || $_SESSION['userStatut']!="admin") {
	header('Location:../admin.php?erreur=accesRefuse');
  exit();
}

if(isset($_POST["idCoupon"])){
  $stmt = $pdo->prepare("SELECT * FROM coupons  WHERE id = :id");
  $stmt->bindValue(':id', $_POST["idCoupon"], PDO::PARAM_INT);
  $stmt->execute();
  $coupons=$stmt->fetch();

  $stmt = $pdo->prepare("UPDATE coupons SET code = :code, remise = :remise, type = :type, dateDebut = :dateDebut, dateFin = :dateFin  WHERE id = :id");
  $stmt->bindValue(':id', $_POST["idCoupon"], PDO::PARAM_INT);
  $stmt->bindValue(':code', $_POST["code"], PDO::PARAM_STR);
  $stmt->bindValue(':remise', $_POST["remise"], PDO::PARAM_STR);
  $stmt->bindValue(':type', $_POST["type"], PDO::PARAM_STR);
  $stmt->bindValue(':dateDebut', $_POST["dateDebut"], PDO::PARAM_STR);
  $stmt->bindValue(':dateFin', $_POST["dateFin"], PDO::PARAM_STR);
  $stmt->execute();
  $stmt->closeCursor();

  header("Location:listeCoupons.php?modification=reussie");
  exit();
}
echo "Vous n'avez pas de coupon sélectionné !";
header("Refresh: 3; listeCoupons.php");
exit();
