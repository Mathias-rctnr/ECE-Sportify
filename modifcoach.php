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
    $db_handle = mysqli_connect("127.0.0.1:3306", "root", "");
    $db_found = mysqli_select_db($db_handle, $database);

    $id_perso = $_POST['id_perso'];
    $choix = $_POST['type_action'];
    $fichier = $_POST['cv'];

    if ($db_found) {
    
        $sql = "SELECT * FROM personnel WHERE id_coach = '$id_perso'";
        $result = mysqli_query($db_handle, $sql);

        if ($result->num_rows == 0) {
            echo "<div class = 'container_error'><p>MODIFICATION IMPOSSIBLE : ID INCONNU<p><a href = 'menu.html' class = 'card'>
            RETOURNER A L'ACCUEIL</a></div>";
        } else {
            if ($choix == 1) // SUPPRESSION D UN COACH
            {
                $data = mysqli_fetch_assoc($result);
                $sql = "DELETE FROM personnel WHERE id_coach = '$id_perso'";
                $result_b = mysqli_query($db_handle, $sql);

                // RESULTAT ADAPTATIF
                if ($result_b) {
                    echo "<div class = 'container_valid'><p>SUPPRESSION REUSSIE !<p><a href = 'menu.html' class = 'card'>
                    RETOURNER A L'ACCUEIL</a></div>";
                } else {
                    echo "<div class = 'container_error'><p>SUPPRESION IMPOSSIBLE : ERREUR LORS DE LA SUPPRESSION DANS LA BDD 'PROJET_PISCINE' <p><a href = 'menu.html' class = 'card'>
            RETOURNER A L'ACCUEIL</a></div>";

                }
            } else if ($choix == 2) { // SUPPRESSION DU FICHIER XML
    
                $sql = "UPDATE personnel SET cv = NULL WHERE id_coach = '$id_perso'";
                $result_b = mysqli_query($db_handle, $sql);

                if ($result_b) {
                    echo "<div class = 'container_valid'><p>SUPPRESSION REUSSIE !<p><a href = 'menu.html' class = 'card'>
                RETOURNER A L'ACCUEIL</a></div>";
                } else {
                    echo "<div class = 'container_error'><p>SUPPRESION IMPOSSIBLE : ERREUR LORS DE LA SUPPRESSION DU FICHIER DANS LA BDD 'PROJET_PISCINE' <p><a href = 'menu.html' class = 'card'>
        RETOURNER A L'ACCUEIL</a></div>";

                }
            } else if ($choix == 3) {
                $sql = "UPDATE personnel SET cv = '$fichier' WHERE id_coach = '$id_perso'";
                $result_b = mysqli_query($db_handle, $sql);

                if ($result_b) {
                    echo "<div class = 'container_valid'><p>AJOUT REUSSI !<p><a href = 'menu.html' class = 'card'>
                RETOURNER A L'ACCUEIL</a></div>";
                } else {
                    echo "<div class = 'container_error'><p>AJOUT IMPOSSIBLE : ERREUR LORS DE L'AJOUT DANS LA BDD 'PROJET_PISCINE' <p><a href = 'menu.html' class = 'card'>
        RETOURNER A L'ACCUEIL</a></div>";

                }
            } else if ($choix == 4) { // MODIFIER LES RDV 
    
                //            MATHIAS      MATHIAS      MATHIAS      MATHIAS      MATHIAS      MATHIAS      MATHIAS
                //      MATHIAS      MATHIAS      MATHIAS      MATHIAS      MATHIAS      MATHIAS      MATHIAS
                //            MATHIAS      MATHIAS      MATHIAS      MATHIAS      MATHIAS      MATHIAS      MATHIAS
                //      MATHIAS      MATHIAS      MATHIAS      MATHIAS      MATHIAS      MATHIAS      MATHIAS
                //            MATHIAS      MATHIAS      MATHIAS      MATHIAS      MATHIAS      MATHIAS      MATHIAS
    
            }
        }
    } else {
        echo "<div class = 'container_error'><p>AJOUT IMPOSSIBLE :CONNEXION IMPOSSIBLE À LA BDD 'PROJET_PISCINE' <p><a href = 'menu.html' class = 'card'>
        RETOURNER A L'ACCUEIL</a></div>";
    }
    ?>
</body>

</html>