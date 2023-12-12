<?php
session_start();
include('pdo.php');

if ($_POST['nom'] == ''){
    $email_from = $_POST['email'];
    $email_message = nl2br($_POST["message"]);
    $email_message = trim($email_message)."<br><br> Message signé sous le nom de : ".$_POST['email'];
    $email_to = "christelle.billon52@gmail.com"; //Recipient
    $email_sujet = utf8_decode($_POST['sujet']);
    $passage_ligne = "\r\n";

    $boundary = md5(rand()); // Random boundary key

    $headers = 'From: ' . $email_from . $passage_ligne; //Sender
    $headers.= "MIME-Version: 1.0" . $passage_ligne; //MIME Version
    $headers .= 'Content-Type: text/html; charset=UTF-8' . $passage_ligne; //Content (2 versions ex:text/plain et text/html)
}

    if(mail($email_to,$email_sujet, $email_message, $headers)){  //Sending mail
        header('Location:merciContact.php?message=envoyé'); //Redirection
        exit();
    }
    else{
        header('Location:index.php?erreur=erreur');
    }

?>