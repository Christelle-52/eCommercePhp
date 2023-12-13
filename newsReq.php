<?php
session_start();
include('pdo.php');

$stmt = $pdo->prepare('SELECT * FROM newsletter WHERE email= :email');
$stmt->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
$userExist = $stmt->fetch();
$stmt->closeCursor();


//bindValue($param,$value,$type) = associe $param à $value et renvoie bool

// empty(mixed $var): bool
if (empty($userExist)) {

	$req = $pdo->prepare("INSERT INTO newsletter( email) 
  VALUES (:email)", array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

	$req->execute(
		array(
			':email' => $_POST['email'],
		)
	);
	$req->closeCursor();
	header('Location:merciNews.php?inscriptionNews=success');
	exit();
} else {
	header('Location:index.php?inscriptionNews=error');
	exit();
}
