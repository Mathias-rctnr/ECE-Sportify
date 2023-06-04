<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Sportify</title>
    <link rel="stylesheet" href="musculation.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

</head>

<body>
    <header>
        <div class="Titre_Sportify">Sportify</div>
        <div class="Wrapper_Liens">
            <a class="Liens1" id="liens_Nav" href="menu.html">Accueil</a>
            <a class="Liens2" id="liens_Nav" href="activite.html">Tout Parcourir</a>
            <a class="Liens3" id="liens_Nav" href="recherche.html">Recherche</a>
            <a class="Liens4" id="liens_Nav" href="Affichage_Rdv.php">Rendez-Vous</a>
            <a class="Liens5" id="liens_Nav" href="moncompte.php">Votre Compte</a>
        </div>
    </header>

    <div class="Content">
        <div id="debut">
            <img class="Back" src="photos/sport de competition/natationtete.png" alt="background_Gym">
        </div>
        <div id="coach">
            <a href="cvnatation.html">
                <div class="cv_cache">
                    <img class="cv_coach" src="photos/activites sportives/cv.png" alt="cliquez pour voir cv">
                    <img class="photo_coach" src="photos/sport de competition/natation.png" alt="coach natation">
            </a>
        </div>
        <div class="text_coach">
            <p class="nom_coach">
                <span class="highlight">Jonathan Patterson</span><br>
                <span class="bureau">SPORTIFY MONACO - 28 Boulvard des Moulins, Monaco</span>
            </p>

            <p class="description_coach">
                Découvrez les joies de l'eau et laissez-vous guider par <span class="highlight">un coach passionné</span> de natation.<br><br> Avec une
                expertise approfondie dans le domaine, ce coach saura vous accompagner tout au long de votre parcours
                aquatique. Que vous soyez <span class="highlight">débutant ou nageur confirmé</span>, ce coach vous aidera à perfectionner votre
                technique de nage, à améliorer votre respiration, votre endurance et votre efficacité dans l'eau.<br><br> Doté
                d'une pédagogie adaptée et d'un soutien constant, il créera un environnement sûr et stimulant pour vous
                permettre de <span class="highlight">repousser vos limites</span> et d'atteindre vos objectifs de natation. Rejoignez ses cours de
                natation et découvrez le plaisir de glisser dans l'eau en toute fluidité, de vous sentir à l'aise et en
                confiance. <br><br>Ne manquez pas cette occasion de <span class="highlight">vous épanouir</span> dans la natation et de devenir un nageur
                compétent, aux côtés de ce coach inspirant.
            </p>
        </div>
    </div>
    <div id="dispo">
        <div class="rdv_text">
            <p>MES DISPONIBILITÉS</p>
        </div>
        <div id="rdv">
            <div class="container_edt">
                <div class="edt">
                <?php
                    session_start();

                    ini_set('display_errors', 1);
                    ini_set('display_startup_errors', 1);
                    error_reporting(E_ALL);

                    $compteur = 0;

                    $_SESSION['id_Coach'] = "A9";
                    $_SESSION['specialite'] = 'natation';

                    $database = "Projet_Piscine";                           //!                     ATTENTION AU NOM DE LA BDD 
                    $db_handle = mysqli_connect("localhost", "root", "");
                    $db_found = mysqli_select_db($db_handle, $database);

                    $Bouton = isset($_POST["btn"]) ? $_POST["btn"] : "";

                    $date = array("Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
                    $heure = array(9, 9, 10, 11, 12, 14, 14, 15, 16, 17, 17);
                    $minutes = array(00, 45, 30, 15, 00, 00, 45, 30, 15, 00, 45);
                    $Reserv = "reserv";

                    if($db_found){
                            echo "<table>";

                            echo "<tr>";
                            for($i=0; $i<6 ;$i++){
                                echo "<th><p>" . $date[$i] . "</p></th>";
                            }
                            echo "</tr>";
                            for($row=0; $row<11; $row++){
                                echo "<tr>";

                                $dbl_zero = "";
                                if($minutes[$row] === 0){
                                    $dbl_zero = "0";
                                }

                                for ($col = 0; $col < 6; $col++) {
                                    $tempDate = $date[$col];
                                    $tempHeure = $heure[$row];
                                    $tempMinute = $minutes[$row];
                                    $tempSpe = 'natation';
                                    $requete = "SELECT * FROM rdv WHERE date = '$tempDate' AND heure_rdv = '$tempHeure' AND minutes_rdv = '$tempMinute' AND specialite = '$tempSpe'";
                                    $result = mysqli_query($db_handle, $requete);

                                    if (mysqli_num_rows($result) === 0) {
                                        $Reserv = "libre";
                                    } else {
                                        $Reserv = "reserv";
                                    }

                                    $compteur++;

                                    echo "<td><button class='" . $Reserv . "' name='". $compteur ."' id='cases' data-row='" . $row ."' data-col='" . $col ."'>" . $heure[$row] .":". $minutes[$row] . $dbl_zero ."</button></td>";
                                }
                                echo "</tr>";
                            }
                            echo "</table>";

                            $_SESSION['specialite'] = $tempSpe;
                    }
                    ?>
                </div>
            </div>
        </div>

        <form action="confirmation.php" method="post">
                <div id="Input_cases">
                    <p>Colonne: </p>
                    <input id="Inp_Col" name="Num_Col">
                    <p>Ligne:</p>
                    <input id="Inp_Row" name="Num_Lig">
                </div>
            </div>
        <div class = "button">
        <div class="card">
            <button type="submit" class="card-info">
                <p class="title">VALIDER</p>
            </button>
            </div>

        <div class="card">
            <div class="card-info">
                <p class="title">ME CONTACTER</p>
            </div>
            </div>
            </div>
        </form>
    <script src="musculation.js"></script>
</body>

</html>