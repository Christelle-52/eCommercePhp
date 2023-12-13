<?php
session_start();
include('pdo.php');

$email = htmlspecialchars($_POST['email']);
$mdp = htmlspecialchars($_POST['mdp']);

$stmt = $pdo->prepare('SELECT * FROM clients WHERE email= :email');
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->execute();
$userExist = $stmt->fetch();


if (!empty($userExist)) {
  // if(password_verify($_POST['mdp'],$userExist['mdp'])) {
  if ($mdp == $userExist['mdp']) {

    if ($_POST['remember']) {
      setcookie('email', $email, time() + 31536000); //nb de secondes sur 1 an 60*60*24*365
      setcookie('mdp', $mdp, time() + 31536000);
    } else {
      setcookie('email', $email, time() - 1); //-1 = ne fais pas de cookie
      setcookie('mdp', $mdp, time() - 1);
    }

    $_SESSION['userId'] = $userExist['id'];
    $_SESSION['userNom'] = $userExist['nom'];
    $_SESSION['userPrenom'] = $userExist['prenom'];
    $_SESSION['userEmail'] = $userExist['email'];
    $_SESSION['userTel'] = $userExist['telephone'];
    $_SESSION['userStatut'] = $userExist['statut'];
    $_SESSION['userAvatar'] = $userExist['avatar'];

    $_SESSION['userDateI'] = $userExist['dateInscription'];


    header('Location:profil.php?auth=success');
    exit();
  } else {
    header('Location:connexion.php?auth=errormdp');
    exit();
  }
} else {
  header('Location:connexion.php?auth=erroremail');
  exit();
}
