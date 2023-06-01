<?php

// Définition du nom de la base de données
$database = "Projet_Piscine";

// Connexion à la base de données MySQL
$db_handle = mysqli_connect("127.0.0.1:3306", "root", "");
$db_found = mysqli_select_db($db_handle, $database);

// RECUPERATION DES DONNEES AVEC LA METHODE POST
$mail = isset($_POST["mail"]) ? $_POST["mail"] : "";
$mdp = isset($_POST["mdp"]) ? $_POST["mdp"] : "";

if($db_found)
{

  $sql = "SELECT * FROM client WHERE mail = '$mail' AND mdp = '$mdp'";
  $result = mysqli_query($db_handle, $sql);

  if($result->num_rows == 1){
    $data = mysqli_fetch_assoc($result);
      echo
      "<p>Bonjour ".$data['nom']." ".$data['prenom']."</p>";
    }
  else{
    header("Location: loginerror.html");
    exit; // redirige vers page d erreur
    }
}
else { // SI ON NE TROUVE PAS LA DATABASE
  echo 'probleme de base';
}

?>