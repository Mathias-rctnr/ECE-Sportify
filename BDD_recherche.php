<?php
    session_start();
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $database = "Projet_Piscine";                           //!                     ATTENTION AU NOM DE LA BDD 
    $db_handle = mysqli_connect("localhost", "root", "");
    $db_found = mysqli_select_db($db_handle, $database);

    $Recherche = isset($_POST["recherche"])? $_POST["recherche"] : "";

    if($db_found){

        $requeteCoach = "SELECT * FROM personnel WHERE nom='$Recherche' OR prenom='$Recherche' OR id_coach='$Recherche' OR specialite='$Recherche'";
        $resultCoach = mysqli_query($db_handle, $requeteCoach);

        while($database = mysqli_fetch_assoc($resultCoach)){
            echo "<div id='WrappBDD'>";
                echo "<img class='imgRecherche' src" . $database['photo'] ." alt='imgCoach'>";
                echo "<div class='txt_perso'>";
                    echo "<p class='NomCoach'>" . $database['nom'] . " " . $database['prenom']. "</p></br>";
                    echo "<p class='SpeCoach'>" . $database['specialite'] . "</p>";
                echo "</div>";
            echo "</div>";
        }
    }
?>
