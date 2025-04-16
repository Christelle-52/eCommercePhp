<?php

$dbh = "mysql:host=private.localhost;dbname=ECF2";
$user = 'XXX';
$pass = 'XXX';

try {
	// On se connecte à MySQL
	$pdo = new PDO($dbh, $user, $pass);
  $pdo->exec('SET CHARACTER SET utf8');
}
catch (PDOException $e) {
  echo "Erreur !". $e->getMessage();
        die();
}
?>
