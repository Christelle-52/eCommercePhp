<?php
include('pdo.php');
date_default_timezone_set('Europe/Paris');

$email = htmlspecialchars($_POST['email']);

$stmt = $pdo -> prepare('SELECT * FROM clients WHERE email= :email');
$stmt -> bindValue(':email',$email,PDO::PARAM_STR);
$userExist = $stmt -> fetch();
$stmt->closeCursor();


//bindValue($param,$value,$type) = associe $param à $value et renvoie bool

// empty(mixed $var): bool
if (empty($userExist)) {

  $req = $pdo -> prepare("INSERT INTO clients(nom, prenom, email, mdp, dateInscription) 
  VALUES (:nom, :prenom, :email, :mdp, :dateInscription)",array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

  $req -> execute(
    array(
      ':nom' => htmlspecialchars($_POST['nom']),
      ':prenom' => htmlspecialchars($_POST['prenom']),
      ':email' => htmlspecialchars($email),
      ':mdp' => htmlspecialchars($_POST['mdp']),// password_hash($_POST['mdp'], PASSWORD_DEFAULT),
      ':dateInscription' => htmlspecialchars(date('Y-m-d H:i:s'))
    )
  );
  $req -> closeCursor();
  header('Location:index.php?inscription=success');

}
else {
  header('Location:index.php?inscription=error');

}
?>