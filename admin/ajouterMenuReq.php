<?php
include('../pdo.php');
session_start();
if(!isset($_SESSION['userStatut']) && $_SESSION['userStatut']!="admin") {
  echo "Erreur : vous ne pouvez pas entrer ici !!";
  exit();
}


$tmp_name = $_FILES['image']['tmp_name'];
// var_dump($_FILES['photo']);//array avec toutes les propriétés
$name = basename($_FILES['image']['name']);
$ext = explode('.',$name);
$ext = $ext[1];
$unique = uniqid(); 
$newName = $unique.".".$ext;
$destination = "./images/".$newName;
// var_dump($destination);

move_uploaded_file($tmp_name,$destination);

//Insertion des données dans la table actus
$req = $pdo->prepare("INSERT INTO menusvip(nom,description,prix,image)
VALUES (:nom,:description,:prix,:image)",
array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

$req->execute(
    array(
        ':nom'=>$_POST['nom'],
        ':description'=>$_POST['description'],
        ':image'=>$destination,
        ':prix'=>$_POST['prix']
    )
);

$req->closeCursor();

header('Location:index.php?ajout=reussi');
?>
