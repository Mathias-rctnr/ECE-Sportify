<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Définition du nom de la base de données
$database = "Projet_Piscine";

// Connexion à la base de données MySQL
$db_handle = mysqli_connect("localhost", "root", "");
$db_found = mysqli_select_db($db_handle, $database);

// RECUPERATION DES DONNEES AVEC LA METHODE POST
$mail = isset($_POST["mail"]) ? $_POST["mail"] : "";
$mdp = isset($_POST["mdp"]) ? $_POST["mdp"] : "";

$login_id_recup = "";

if ($db_found) {

  $sql = "SELECT * FROM client WHERE mail = '$mail' AND mdp = '$mdp'";
  $result = mysqli_query($db_handle, $sql);

  if ($result->num_rows == 1) {
    $data = mysqli_fetch_assoc($result);
    echo "<p>Prenom : " . $data["prenom"] . "<p>";
    $login_id_recup = $data["id_client"];
    echo "id " . $login_id_recup;
  } 
  
  else {
    $sql_coach = "SELECT * FROM personnel WHERE mail = '$mail' AND mdp = '$mdp'";
    $result_coach = mysqli_query($db_handle, $sql_coach);
    if ($result_coach->num_rows == 1) {
      $data = mysqli_fetch_assoc($result_coach);
      $login_id_recup = $data["id_coach"];
    } 
    
    else {
      $sql_admin = "SELECT * FROM admin WHERE mail = '$mail' AND mdp = '$mdp'";
      $result_admin = mysqli_query($db_handle, $sql_admin);
      if ($result_admin->num_rows == 1) {
        $data = mysqli_fetch_assoc($result_admin);
        $login_id_recup = $data["id"];

      } 
      
      else {
        header("Location: loginerror.html");
        exit; // redirige vers page d erreur
      }
    }
  }
} else { // SI ON NE TROUVE PAS LA DATABASE
  echo 'probleme de base';
}

$_SESSION["login_id"] = $login_id_recup;
echo "id " . $login_id_recup;
echo "id " . $_SESSION["login_id"];

header("Location: moncompte.php");
exit;

?>