<?php

$id = 1;
// Définition du nom de la base de données
$database = "projet_piscine";
// Connexion à la base de données MySQL
$db_handle = mysqli_connect("127.0.0.1:3306", "root", "");
$db_found = mysqli_select_db($db_handle, $database);

if($db_found){
    $sql = "SELECT * FROM client WHERE id_client = '$id'";
    $result = mysqli_query($db_handle, $sql);

    if($result){
        $data = mysqli_fetch_assoc($result);
        echo "<p>Compte client : </p>";
        echo "<p>Nom :" . $data["nom"] . "</p>";
        echo "<p>Prenom :" . $data["prenom"] . "</p>";
        echo "<p>Adresse :" . $data["adresse1"] . "</p>";
        echo "<p>Complement d'adresse :" . $data["adresse2"] . "</p>";
        echo "<p>Ville :" . $data["ville"] . "</p>";
        echo "<p>Code Postal :" . $data["cp"] . "</p>";
        echo "<p>Pays :" . $data["pays"] . "</p>";
        echo "<p>Téléphone :" . $data["tel"] . "</p>";
        echo "<p>Mail :" . $data["mail"] . "</p>";
        echo "<p>Mot de passe :". $data["mdp"] . "</p>";
        echo "<p>N° Étudiant :" . $data["num_etud"] . "</p>";
        echo "<p>Type de carte :" . $data["type_carte"] . "</p>";
        echo "<p>Prénom carte :" . $data["prenom_carte"] . "</p>";
        echo "<p>Nom carte :" . $data["nom_carte"] . "</p>";
        echo "<p>N° Carte :" . $data["num_carte"] . "</p>";
        echo "<p>Date d'expiration :" . $data["date_exp"] . "</p>";
        echo "<p>CCV :" . $data["ccv"] . "</p>";

    }
    else{
        $sql = "SELECT * FROM personnel WHERE id_coach = '$id'";
        $result = mysqli_query($db_handle, $sql);
        if($result){
            $data = mysqli_fetch_assoc($result);
            echo "<p>Compte coach : </p>";
            echo "<p>Nom :" . $data["nom"] . "</p>";
            echo "<p>Photo :" . $data["photo"] . "</p>";
            echo "<p>Spécialité :" . $data["specialite"] . "</p>";
            echo "<p>Video :" . $data["video"] . "</p>";
            echo "<p>CV :" . $data["cv"] . "</p>";
            echo "<p>Mail :" . $data["mail"] . "</p>";
            echo "<p>Mot de passe :". $data["mdp"] . "</p>";
        }
        else{
            $sql = "SELECT * FROM admin WHERE id = '$id'";
            $result = mysqli_query($db_handle, $sql);
            if($result){
                echo "<p>Compte admin : </p>";
                echo "<p>Nom :" . $data["nom"] . "</p>";
                echo "<p>Photo :" . $data["photo"] . "</p>";
                echo "<p>Spécialité :" . $data["specialite"] . "</p>";
                echo "<p>Video :" . $data["video"] . "</p>";
                echo "<p>CV :" . $data["cv"] . "</p>";
                echo "<p>Mail :" . $data["mail"] . "</p>";
                echo "<p>Mot de passe :". $data["mdp"] . "</p>";
            }
            else{
                echo "<p>pb identifiant client inconnu</p>";
            }
        }
    }

}
else{
    echo "<p>Pb base de données 'projet_piscine'.</p>";
}