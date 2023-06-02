<?php

session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// 
// Définition du nom de la base de données
$database = "projet_piscine";
// Connexion à la base de données MySQL
$db_handle = mysqli_connect("127.0.0.1:3306", "root", "");
$db_found = mysqli_select_db($db_handle, $database);

$id = $_SESSION["login_id"];
echo "<p>" . $id . "</p>"; 

if ($db_found) {
    $sql = "SELECT * FROM client WHERE id_client = '$id'";
    $result = mysqli_query($db_handle, $sql);

    if ($result->num_rows == 1) {

        $data = mysqli_fetch_assoc($result);
        // Récupérer le numéro de carte depuis la base de données
        $numCarte = $data['num_carte']; // Remplacez cette variable par la valeur récupérée de votre base de données

        // Définir le nombre de caractères à masquer (nombre de caractères précédents à remplacer par des astérisques)
        $nbCaracteresMasques = strlen($numCarte) - 4; // Dans cet exemple, nous masquons tous les caractères précédents, sauf les 4 derniers chiffres

        // Générer une chaîne de caractères composée d'astérisques du même nombre que les caractères masqués
        $caracteresMasques = str_repeat("*", $nbCaracteresMasques);

        // Concaténer la chaîne de caractères masqués avec les derniers chiffres du numéro de carte
        $numCarteMasque = $caracteresMasques . substr($numCarte, -4);

        $mdp = $data['mdp'];
        $nbCaracteresMasquesmdp = strlen($mdp) - 2;
        $caracteresMasquesmdp = str_repeat("*", $nbCaracteresMasquesmdp);
        $mdpMasque = $caracteresMasquesmdp . substr($mdp, -2);

        echo "<p>Compte client </p>";
        echo "<p>Nom : " . $data["nom"] . "</p>";
        echo "<p>Prenom : " . $data["prenom"] . "</p>";
        echo "<p>Adresse :" . $data["adresse1"] . "</p>";
        echo "<p>Complement d'adresse : " . $data["adresse2"] . "</p>";
        echo "<p>Ville : " . $data["ville"] . "</p>";
        echo "<p>Code Postal : " . $data["cp"] . "</p>";
        echo "<p>Pays : " . $data["pays"] . "</p>";
        echo "<p>Téléphone : " . $data["tel"] . "</p>";
        echo "<p>Mail : " . $data["mail"] . "</p>";
        echo "<p>Mot de passe : " . $mdpMasque . "</p>";
        echo "<p>N° Étudiant : " . $data["num_etud"] . "</p>";
        echo "<p>Type de carte : " . $data["type_carte"] . "</p>";
        echo "<p>Prénom carte : " . $data["prenom_carte"] . "</p>";
        echo "<p>Nom carte : " . $data["nom_carte"] . "</p>";
        echo "<p>N° Carte : " . $numCarteMasque . "</p>";
        echo "<p>Date d'expiration : " . $data["date_exp"] . "</p>";
        echo "<p>CCV : " . $data["ccv"] . "</p>";

    } else {
        $sql = "SELECT * FROM personnel WHERE id_coach = '$id'";
        $result_coach = mysqli_query($db_handle, $sql);
        if ($result_coach->num_rows == 1) {

            $data = mysqli_fetch_assoc($result_coach);

            $mdp = $data['mdp'];
            $nbCaracteresMasquesmdp = strlen($mdp) - 2;
            $caracteresMasquesmdp = str_repeat("*", $nbCaracteresMasquesmdp);
            $mdpMasque = $caracteresMasquesmdp . substr($mdp, -2);

            echo "<p>Compte coach </p>";
            echo "<p>Nom : " . $data["nom"] . "</p>";
            echo "<p>Prenom : " . $data["prenom"] . "</p>";
            echo "<p>Photo : " . $data["photo"] . "</p>";
            echo "<p>Spécialité : " . $data["specialite"] . "</p>";
            echo "<p>Video : " . $data["video"] . "</p>";
            echo "<p>CV : " . $data["cv"] . "</p>";
            echo "<p>Mail : " . $data["mail"] . "</p>";
            echo "<p>Mot de passe : " . $mdpMasque . "</p>";

        } else {
            $sql = "SELECT * FROM admin WHERE id = '$id'";
            $result_admin = mysqli_query($db_handle, $sql);
            if ($result_admin->num_rows == 1) {

                $data = mysqli_fetch_assoc($result_admin);

                $mdp = $data['mdp'];
                $nbCaracteresMasquesmdp = strlen($mdp) - 2;
                $caracteresMasquesmdp = str_repeat("*", $nbCaracteresMasquesmdp);
                $mdpMasque = $caracteresMasquesmdp . substr($mdp, -2);

                echo "<p>Compte admin </p>";
                echo "<p>Nom : " . $data["nom"] . "</p>";
                echo "<p>Prenom : " . $data["prenom"] . "</p>";
                echo "<p>Mail : " . $data["mail"] . "</p>";
                echo "<p>Mot de passe : " . $mdpMasque . "</p>";
            } else {
                echo "<p>pb identifiant client inconnu</p>";
            }
        }
    }

} else {
    echo "<p>Pb base de données 'projet_piscine'.</p>";
}

?>