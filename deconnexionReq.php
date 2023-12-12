<?php
session_start();
include('pdo.php');

unset($_SESSION['userId']);
unset($_SESSION['userNom']);
unset($_SESSION['userPrenom']);
unset($_SESSION['userEmail']);
unset($_SESSION['userStatut']);


header('Location:index.php?deconnexion=success');
?>