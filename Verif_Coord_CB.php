<?php
    session_start();

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $database = "Projet_Piscine";
    $db_handle = mysqli_connect("localhost", "root", "");
    $db_found = mysqli_select_db($db_handle, $database);

    $Abonnement = "";

    if (isset($_POST['btn'])) {     //Selon le bouton cliqué, on déduie le prix a payer
        $boutonClick = $_POST['btn'];
        
        if ($boutonClick == 'Essentiel') {
            $_SESSION["prix"]=60;
            $Abonnement = 'Essentiel';
        } else if ($boutonClick == 'Partenaire') {
            $_SESSION["prix"]=100;
            $Abonnement = 'Partenaire';
        } else if ($boutonClick == 'Part_Plus') {
            $_SESSION["prix"]=200;
            $Abonnement = 'Partenaire+';
        }
    }

    $LoginID = $_SESSION['login_id'];

    if($LoginID){

        if($db_found){
            
            //Changement et ajout des nouvelles informations bancaires

            $requeteAbo = "UPDATE client SET abonnement = '$Abonnement' WHERE id_client = '$LoginID'";
            $resultAbo = mysqli_query($db_handle, $requeteAbo);

            $requete = "SELECT * FROM client WHERE id_client = '$LoginID'";
            $result = mysqli_query($db_handle, $requete);

            if ($result) {
                $row = mysqli_fetch_assoc($result);
                $numCarte = $row['num_carte'];
                echo "testNumCarte: " . $numCarte;
                if($numCarte!=="" && $numCarte!==NULL && $numCarte!=="0"){      //Si il possède deja des codes bancaires dans la BDD, alors ...
                    header("Location: validationPaiement.php");                 //Animation de validation de paiement
                }
                else if($numCarte==="" || $numCarte==="0" || $numCarte===NULL){ //Si il n'en possède pas, on lui demande de les rentrées
                    header("Location: Paiement.php");
                }
            } else {
                echo "Erreur lors de l'exécution de la requête SQL.";
            }
        }
    }
    else{
        header("Location: login.html");
    }
?>