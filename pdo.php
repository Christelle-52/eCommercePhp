<?php

$dbh = "mysql:host=private.localhost;dbname=ECF2";
$user = 'AdminPOPOS';
$pass = 'Mq*sL--52Dpt';

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
