<?php
session_start();
include('../pdo.php');

if(!isset($_SESSION['userStatut']) && $_SESSION['userStatut']!="admin") {
  echo "Erreur : vous ne pouvez pas entrer ici !!";
  exit();
}

if(!empty($_POST['nom']) && !empty($_POST['description']) && !empty($_POST['prix']) && !empty($_POST['idmenu'])){
    $stmt = $pdo->prepare("SELECT * FROM menusvip WHERE id=:id");
    $stmt->bindValue(':id', $_POST["idmenu"], PDO::PARAM_INT);
    $stmt->execute();
    $menu=$stmt->fetch();
    $stmt->closeCursor();
}

if($menu){

  $stmt = $pdo->prepare("UPDATE menusvip SET nom = :nom, description = :description, prix = :prix,
  image = :image  WHERE id = :id");
  $stmt->bindValue(':nom', $_POST["nom"], PDO::PARAM_STR);
  $stmt->bindValue(':description', $_POST["description"], PDO::PARAM_STR);
  $stmt->bindValue(':prix', $_POST["prix"], PDO::PARAM_STR);


  if(!empty($_FILES["image"]["name"])){
    $extension = explode('.', $_FILES['image']["name"]);
    $name = uniqid();
    $image = $name.".".$extension[1];
    $stmt->bindValue(':image', "./images/".$image, PDO::PARAM_STR);

    var_dump($_FILES);die();

    move_uploaded_file($_FILES["image"]["tmp_name"], "../images/".$image);
  }
  else{
    $stmt->bindValue(':image', $image, PDO::PARAM_STR);
    $image = $menu['image'];
  }

  $stmt->bindValue(':id', $_POST["idmenu"], PDO::PARAM_INT);
  $stmt->execute();
  $stmt->closeCursor();

  header("Location:./index.php?modification=reussie");
  exit();
}

echo "Veuillez remplir tous les champs !";
?>

