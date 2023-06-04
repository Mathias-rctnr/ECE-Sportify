<?php
    session_start();
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $database = "Projet_Piscine";
    $db_handle = mysqli_connect("localhost", "root", "");
    $db_found = mysqli_select_db($db_handle, $database);

    $ID_Login = $_SESSION["login_id"];

    if($_SESSION["login_id"]){
        $NumEspace = isset($_POST["Num_Carte"])? $_POST["Num_Carte"] : "";
        $Titulaire = isset($_POST["Titulaire"])? $_POST["Titulaire"] : "";
        $TypeCarte = isset($_POST["type_Carte"])? $_POST["type_Carte"] : "";
        $Mois = isset($_POST["mois"])? $_POST["mois"] : "";
        $Annee = isset($_POST["annee"])? $_POST["annee"] : "";
        $CVV = isset($_POST["CVV"])? $_POST["CVV"] : "";

        $Groupe = "";

        if($TypeCarte==="01"){
            $Groupe="VISA";
        }
        else if($TypeCarte==="02"){
            $Groupe="MasterCard";
        }
        else if($TypeCarte==="03"){
            $Groupe="PayPal";
        }
        else if($TypeCarte==="04"){
            $Groupe="American Express";
        }

        $Num_Carte = str_replace(' ', '', $NumEspace);

        $TitulaireSepar = explode(" ", $Titulaire);
        $Nom = trim($TitulaireSepar[0]);
        $Prenom = trim($TitulaireSepar[1]);

        $DateExp = $Annee . "-" . $Mois . "-01"; 

        if($db_found){
            $requeteClient = "UPDATE client SET num_carte = '$Num_Carte', nom_carte = '$Nom', prenom_carte = '$Prenom', date_exp = '$DateExp', type_carte = '$Groupe', ccv = '$CVV' WHERE id_client = '$ID_Login'";
            $resultClient = mysqli_query($db_handle, $requeteClient);
        }
        header("Location: validationPaiement.php");
    }
    else{
        header("Location: login.html");
    }
?>