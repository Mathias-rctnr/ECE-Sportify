<?php

// Définition du nom de la base de données
$database = "Projet_Piscine";

// Connexion à la base de données MySQL
$db_handle = mysqli_connect("127.0.0.1:3306", "root", "");
$db_found = mysqli_select_db($db_handle, $database);

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$tel = $_POST['tel'];
$mail = $_POST['mail'];
$mdp = $_POST['mdp'];
$mdp_conf = $_POST['mdp_conf'];
$adresse1 = $_POST['adresse1'];
$adresse2 = $_POST['adresse2'];
$ville = $_POST['ville'];
$cp = $_POST['cp'];
$pays = $_POST['pays'];
$num_etu = $_POST['num_etu'];


if ($db_found) {

    $sql = "SELECT * FROM client WHERE mail = '$mail' OR tel = '$tel'";
    $result = mysqli_query($db_handle, $sql);

    if ($result->num_rows > 0) { // deja utilisé par d autres clients
        header("Location: newclienterror.html");
        exit;
    } else {
        $sql = "SELECT MAX(id_client) AS max_id FROM client ";
        $result = mysqli_query($db_handle, $sql);
        if ($result->num_rows > 0) {
            $data = mysqli_fetch_assoc($result);
            $maxId = $data["max_id"];
            $newId = $maxId + 1;
            $sqlInsert = "INSERT INTO client (id_client, nom, prenom, adresse1, adresse2, ville, cp, pays, tel, mail, mdp, num_etud) VALUES ('$newId', '$nom', '$prenom', '$adresse1', '$adresse2', '$ville', '$cp', '$pays', '$tel', '$mail', '$mdp', '$num_etu')";
            $results = mysqli_query($db_handle, $sqlInsert);
            if($results){
                header("Location: moncompte.php");
                exit;
                
            }
            else
            {
                echo "erreur lors de l ajout";
            }
        } else {
            $newId = 1;
            $sqlInsert = "INSERT INTO client (id_client, nom, prenom, adresse1, adresse2, ville, cp, pays, tel, mail, mdp, num_etud) VALUES ('$newId', '$nom', '$prenom', '$adresse1', '$adresse2', '$ville', '$cp', '$pays', '$tel', '$mail', '$mdp', '$num_etu')";
            $results = mysqli_query($db_handle, $sqlInsert);
            if($results){
                header("Location: moncompte.php");
                exit;
                
            }
            else
            {
                echo "erreur lors de l ajout";
            }
        }
    }


} else {
    echo "erreur base de donnee";
}
?>