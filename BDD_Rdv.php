<?php
    session_start();
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $database = "Projet_Piscine";                           //!                     ATTENTION AU NOM DE LA BDD 
    $db_handle = mysqli_connect("localhost", "root", "");
    $db_found = mysqli_select_db($db_handle, $database);


    $ID_utilisateur = $_SESSION["login_id"];

    if($db_found){

        $requeteClient = "SELECT * FROM rdv WHERE id_client='$ID_utilisateur'";
        $resultClient = mysqli_query($db_handle, $requeteClient);

        while($database = mysqli_fetch_assoc($resultClient)){

            $dbl_zero = "";
            if($database['minutes_rdv'] == 0){
                $dbl_zero = "0";
            }
            //echo $_SESSION["login_id"];
            echo "<div id='WrappBDD'>";
                echo "<p class='dateRdv'>" . $database['date'] ."</p>";
                echo "<div class='txt_perso'>";
                    echo "<p class='HeureRdv'>" . $database['heure_rdv'] . ":" . $database['minutes_rdv']. $dbl_zero ."</p></br>";
                    echo "<p class='Spe'>" . $database['specialite'] . "</p>";
                echo "</div>";
            echo "</div>";
        }
    }
?>
