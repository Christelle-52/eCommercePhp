<?php
session_start();
include('../pdo.php');

if (!isset($_SESSION['userStatut']) || $_SESSION['userStatut'] != "admin") {
	header('Refresh: 3;../index.php?erreur=accesRefuse');
	exit();
};

$req = $pdo->prepare("INSERT INTO coupons (code, remise, type, dateDebut, dateFin)
VALUES (:code, :remise, :type, :dateDebut, :dateFin)",
array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

$req->execute(
    array(
        ':code'=>$_POST['code'],
        ':remise'=>$_POST['remise'],
        ':type'=>$_POST['type'],
        ':dateDebut'=>$_POST['dateDebut'],
				':dateFin'=>$_POST['dateFin'])
);

$req->closeCursor();

header('Location:admin.php?ajout=reussi');
exit();