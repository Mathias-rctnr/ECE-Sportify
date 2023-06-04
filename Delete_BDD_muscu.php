<?php
    session_start();
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $database = "Projet_Piscine";                           //!                     ATTENTION AU NOM DE LA BDD 
    $db_handle = mysqli_connect("localhost", "root", "");
    $db_found = mysqli_select_db($db_handle, $database);

    $MaxID = 0;

    $ID_Recup = isset($_POST["Inp_Id_rdv"])? $_POST["Inp_Id_rdv"] : "";

    if($db_found){

        $requete1 = "SELECT * FROM rdv WHERE id_rdv = '$ID_Recup'";
        $result2 = mysqli_query($db_handle, $requete1);

        //Affichage du message de confirmation

        while($database = mysqli_fetch_assoc($result2)){
            echo "<p class='txt_recap'>Bonjour, Nous vous confirmons l'annulation de votre réservation.</p>";
        }

        //Suppression du rdv dns la BDD

        $requeteMax = "DELETE FROM rdv WHERE id_rdv = '$ID_Recup'";
        $result = mysqli_query($db_handle, $requeteMax);

        mysqli_close($db_handle);
    }
?>