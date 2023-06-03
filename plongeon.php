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
            <a class="Liens2" id="liens_Nav" href="Tout_parcourir.html">Tout Parcourir</a>
            <a class="Liens3" id="liens_Nav" href="">Recherche</a>
            <a class="Liens4" id="liens_Nav" href="">Rendez-Vous</a>
            <a class="Liens5" id="liens_Nav" href="">Votre Compte</a>
        </div>
    </header>

    <div class="Content">
        <div id="debut">
            <img class="Back" src="photos/sport de competition/plongeontete.png" alt="background_Gym">
        </div>
        <div id="coach">
            <a href="cvplongeon.html">
                <div class="cv_cache">
                    <img class="cv_coach" src="photos/activites sportives/cv.png" alt="cliquez pour voir cv">
                    <img class="photo_coach" src="photos/sport de competition/plongeon.png" alt="coach plongeon">
            </a>
        </div>
        <div class="text_coach">
            <p class="nom_coach">
                <span class="highlight">MARIE LAMBERT</span><br>
                <span class="bureau">SPORTIFY MONACO - 28 Boulvard des Moulins, Monaco</span>
            </p>

            <p class="description_coach">
                Préparez-vous à plonger dans un monde d'élégance et de grâce avec <span class="highlight">la coach passionnée</span> de plongeon
                artistique que je suis.<br><br> Je possède une connaissance approfondie des techniques de plongeon
                artistique, une
                créativité débordante et un talent exceptionnel pour <span class="highlight">vous guider vers la perfection</span>.<br><br> Avec moi,
                vous
                apprendrez les mouvements acrobatiques, les sauts périlleux, les entrées en eau spectaculaires et les
                figures complexes qui caractérisent cet art aquatique. Je vous vous aidera à développer votre
                coordination, votre maîtrise du corps et votre confiance en vous, <span class="highlight">tout en veillant à votre sécurité et à
                votre progression constante</span>.<br><br> <span class="highlight">Rejoignez</span> mes cours de plongeon artistique et découvrez la magie de
                l'envol, la grâce de la chute et la beauté de l'expression artistique dans l'eau.
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

                    $_SESSION['id_Coach'] = "A5";
                    $_SESSION['specialite'] = 'plongeon';

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
                                    $tempSpe = 'plongeon';
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