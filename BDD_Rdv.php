<?php
    session_start();

    $database = "Projet_Piscine";                           //!                     ATTENTION AU NOM DE LA BDD 
    $db_handle = mysqli_connect("localhost", "root", "");
    $db_found = mysqli_select_db($db_handle, $database);

    if($_SESSION["login_id"]){

        $ID_utilisateur = $_SESSION["login_id"];        //Utilisateur connecter

        if($db_found){
            $requeteClient = "SELECT * FROM rdv WHERE id_client='$ID_utilisateur'";
            $resultClient = mysqli_query($db_handle, $requeteClient);
    
            while($database = mysqli_fetch_assoc($resultClient)){
    
                $dbl_zero = "";         //Doubles zéros
                if($database['minutes_rdv'] == 0){
                    $dbl_zero = "0";
                }
                
                //On injecte le code en html pour afficher les rdv
                echo "<div id='WrappBDD' data-idrdv='" . $database['id_rdv'] . "'>";
                    echo "<p class='dateRdv'>" . $database['date'] ."</p>";
                    echo "<div class='txt_perso'>";
                        echo "<p class='HeureRdv'>" . $database['heure_rdv'] . ":" . $database['minutes_rdv']. $dbl_zero ."</p></br>";
                        echo "<p class='Spe'>" . $database['specialite'] . "</p>";
                    echo "</div>";
                echo "</div>";
            }
        }
    }
    else{
        header("Location: login.html");
    }
?>