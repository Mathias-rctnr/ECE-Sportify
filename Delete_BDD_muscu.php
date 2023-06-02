<?php
    session_start();
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $database = "Projet_Piscine";                           //!                     ATTENTION AU NOM DE LA BDD 
    $db_handle = mysqli_connect("localhost", "root", "");
    $db_found = mysqli_select_db($db_handle, $database);

    $ColRecup = $_SESSION['colonne'];
    $RowRecup = $_SESSION['ligne'];

    $Id_Coach = $_SESSION['id_Coach'];
    $Specialite = $_SESSION['specialite'];

    $MaxID = 0;

    $_SESSION['id_Coach'] = $Id_Coach;
    $_SESSION['specialite'] = $Specialite;

    $date = array("Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
    $heure = array(9, 9, 10, 11, 12, 14, 14, 15, 16, 17, 17);
    $minutes = array(00, 45, 30, 15, 00, 00, 45, 30, 15, 00, 45);

    if($db_found){
        $tempDate = $date[$ColRecup];
        $tempHeure = $heure[$RowRecup];
        $tempMinute = $minutes[$RowRecup];

        $dbl_zero = "";
            if($minutes[$RowRecup] === 0){
                $dbl_zero = "0";
            }

        $requeteMaxID = "SELECT MAX(id_rdv) AS max_id FROM rdv";
        $result1 = mysqli_query($db_handle, $requeteMaxID);


        while($database = mysqli_fetch_assoc($result1)){
            $MaxID = $database['max_id'];
        }

        echo $MaxID;

        echo"dedans";

        $requete1 = "SELECT * FROM rdv WHERE id_rdv = '$MaxID'";
        $result2 = mysqli_query($db_handle, $requete1);

        echo"tst";

        while($database = mysqli_fetch_assoc($result2)){
            echo "<p class='txt_recap'>Bonjour, Nous vous confirmons l'annulation de votre cours de " . $database['specialite'] . " avec " . $database['id_coach'] . " le " . $database['date'] . " à " . $database['heure_rdv'] . "h:" . $database['minutes_rdv'] . $dbl_zero . ".</p>";
        }

        echo "DHISI";

        $requeteMax = "DELETE FROM rdv WHERE id_rdv = '$MaxID'";
        $result = mysqli_query($db_handle, $requeteMax);

        mysqli_close($db_handle);
    }
?>