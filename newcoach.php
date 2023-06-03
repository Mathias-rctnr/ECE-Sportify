<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Sportify</title>
    <link rel="stylesheet" href="moncompte.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

</head>

<body>

    <?php

    // Définition du nom de la base de données
    $database = "Projet_Piscine";

    // Connexion à la base de données MySQL
    $db_handle = mysqli_connect("localhost", "root", "");
    $db_found = mysqli_select_db($db_handle, $database);

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mail = $_POST['mail'];
    $mdp = $_POST['mdp'];
    $specialite = $_POST['specialite'];
    $cv = $_POST['cv'];
    $salle = $_POST['salle'];
    $video = $_POST['video'];
    $photo = $_POST['photo'];

    if ($db_found) {
        // verif pas deja utilisé
        $sql = "SELECT * FROM client WHERE mail = '$mail'";
        $result = mysqli_query($db_handle, $sql);

        $sql = "SELECT * FROM personnel WHERE mail = '$mail'";
        $result_b = mysqli_query($db_handle, $sql);

        $sql = "SELECT * FROM admin WHERE mail = '$mail'";
        $result_c = mysqli_query($db_handle, $sql);

        if ($result->num_rows > 0) { // deja utilisé par d autres clients
            echo "<div class = 'container_error'><p>AJOUT IMPOSSIBLE : MAIL DEJA UTLISÉ PAR UN CLIENT<p><a href = 'menu.html' class = 'card'>
        RETOURNER A L'ACCUEIL</a></div>";
        } else if ($result_b->num_rows > 0) { // deja utilisé par d autres coach
            echo "<div class = 'container_error'><p>AJOUT IMPOSSIBLE : MAIL DEJA UTLISÉ PAR UN MEMBRE DU PERSONNEL<p><a href = 'menu.html' class = 'card'>
        RETOURNER A L'ACCUEIL</a></div>";
        } else if ($result_c->num_rows > 0) { // deja utilisé par d autres ADMIN
            echo "<div class = 'container_error'><p>AJOUT IMPOSSIBLE : MAIL DEJA UTLISÉ PAR UN ADMIN<p><a href = 'menu.html' class = 'card'>
        RETOURNER A L'ACCUEIL</a></div>";
        } else {
            // trouver le plus haut ID en chiffre dans une colonne contenant des valeurs telles que B1, B2, B3, etc. 
            $sql = "SELECT MAX(CAST(SUBSTRING(id, 2) AS UNSIGNED)) AS highest_id FROM personnel WHERE id REGEXP '^B[0-9]+$'";
            $result_id = mysqli_query($db_handle, $sql);
            if ($result->num_rows > 0) {
                $row_id = mysqli_fetch_array($result_id);
                $highest_id = $row_id['highest_id'];
                // Incrémenter le plus haut ID
                $new_id = 'B' . ($highest_id + 1);
            } else {
                $new_id = 'B1';
            }

            // On ajoute l element a la bdd
            $sql = "INSERT INTO personnel (id_coach, nom, prenom, mail, mdp, specialite, cv, salle, video, photo) VALUES ('$new_id', '$nom', '$prenom', '$mail', '$mdp', '$specialite', '$cv', '$salle', '$video', '$photo')";
            $result_ajt = mysqli_query($db_handle, $sql);
            if ($result_ajt) {
                echo "<div class = 'container_valid'><p>AJOUT REUSSI ! : LE NOUVEAU MEMBRE DU PERSONNEL EST AJOUTÉ À 'PROJET_PISCINE' <p><a href = 'menu.html' class = 'card'>
                RETOURNER A L'ACCUEIL</a></div>";
            } else {
                echo "<div class = 'container_error'><p>AJOUT IMPOSSIBLE : ERREUR LORS DE L'AJOUT À LA BDD 'PROJET_PISCINE' <p><a href = 'menu.html' class = 'card'>
        RETOURNER A L'ACCUEIL</a></div>";
            }
        }

    } else {
        echo "<div class = 'container_error'><p>AJOUT IMPOSSIBLE :CONNEXION IMPOSSIBLE À LA BDD 'PROJET_PISCINE' <p><a href = 'menu.html' class = 'card'>
        RETOURNER A L'ACCUEIL</a></div>";
    }
    ?>
</body>

</html>