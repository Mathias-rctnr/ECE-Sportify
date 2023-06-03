<?php
    session_start();
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $database = "Projet_Piscine";                           //!                     ATTENTION AU NOM DE LA BDD 
    $db_handle = mysqli_connect("localhost", "root", "");
    $db_found = mysqli_select_db($db_handle, $database);

    $ColRecup = isset($_POST["Num_Col"])? $_POST["Num_Col"] : "";
    $RowRecup = isset($_POST["Num_Lig"])? $_POST["Num_Lig"] : "";

    $_SESSION['colonne'] = $ColRecup;
    $_SESSION['ligne'] = $RowRecup;

    $Id_Coach = $_SESSION['id_Coach'];
    $Specialite = $_SESSION['specialite'];


    $MaxID = 0;

    $_SESSION['id_Coach'] = $Id_Coach;
    $_SESSION['specialite'] = $Specialite;

    $ID_Login = $_SESSION["login_id"];

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

        $requeteClient= "SELECT * FROM client WHERE client='$ID_Login'";
        $resultClient = mysqli_query($db_handle, $requeteClient);

        while($database = mysqli_fetch_assoc($resultClient)){
            $PrenomClient = $database['prenom'];
        }

        $requeteMaxID = "SELECT MAX(id_rdv) AS max_id FROM rdv";
        $result = mysqli_query($db_handle, $requeteMaxID);

        while($database = mysqli_fetch_assoc($result)){
            $MaxID = $database['max_id'];
        }

        $MaxID = $MaxID + 1;

        $requete = "INSERT INTO rdv (id_rdv, id_coach, id_client, date, specialite, adresse1, adresse2, doc_sup, info_sup, heure_rdv, minutes_rdv) VALUES ('$MaxID', '$Id_Coach', '$ID_Login', '$tempDate', '$Specialite', ' ', ' ', ' ', ' ', '$tempHeure', '$tempMinute')";
        $result = mysqli_query($db_handle, $requete);

        $requeteCoach = "SELECT * FROM personnel WHERE id_coach='$Id_Coach'";
        $resultCoach = mysqli_query($db_handle, $requeteCoach);

        while($database = mysqli_fetch_assoc($resultCoach)){
            $NomCoach = $database['nom'];
            $PrenomCoach = $database['prenom'];
        }

        echo "<p class='txt_recap'>Bonjour " . $PrenomClient . ", Nous vous confirmons la réservation de votre cours de " . $Specialite . " avec " . $PrenomCoach . " " . $NomCoach . " le " . $tempDate . " à " . $tempHeure . "h:" . $tempMinute . $dbl_zero . " !</p>";
    }
?>
