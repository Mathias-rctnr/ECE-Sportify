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
        <?php
        session_start();

        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        $database = "projet_piscine";
        // Connexion à la base de données MySQL
        $db_handle = mysqli_connect("localhost", "root", "");
        $db_found = mysqli_select_db($db_handle, $database);
        if ($db_found) {


            $coach = $_SESSION['prochaincoach_id'];
            $sql = "SELECT * FROM personnel WHERE id_coach  = '$coach'";
            $result_adapt = mysqli_query($db_handle, $sql);
            
            if ($result_adapt->num_rows > 0) {

                $data = mysqli_fetch_assoc($result_adapt);
                // AFFICHAGE TETE DE PAGE SPORT DE COMPETITION
                if ($data["specialite"] = "Football") {
                    echo
                        "<div id='debut'>
                <img class='Back' src='photos/sport de competition/footballtete.png' alt='background_Gym'>
            </div>;";
                } else if ($data["specialite"] = "Rugby") {
                    echo
                        "<div id='debut'>
                <img class='Back' src='photos/sport de competition/rugbytete.png' alt='background_Gym'>
            </div>;";
                } else if ($data["specialite"] = "Natation") {
                    echo
                        "<div id='debut'>
                <img class='Back' src='photos/sport de competition/natationtete.png' alt='background_Gym'>
            </div>;";
                } else if ($data["specialite"] = "Plongeon") {
                    echo
                        "<div id='debut'>
                <img class='Back' src='photos/sport de competition/plongeontete.png' alt='background_Gym'>
            </div>;";
                } else if ($data["specialite"] = "Basketball") {
                    echo
                        "<div id='debut'>
                <img class='Back' src='photos/sport de competition/baskettete.png' alt='background_Gym'>
            </div>;";
                } else if ($data["specialite"] = "Tennis") {
                    echo
                        "<div id='debut'>
                <img class='Back' src='photos/sport de competition/tennistete.png' alt='background_Gym'>
            </div>;";
                }
                // AFFICHAGE TETE DE PAGE ACTIVITE SPORTIVES
                else if ($data["specialite"] = "Musculation") {
                    echo
                        "<div id='debut'>
                <img class='Back' src='photos/sport de competition/gym6.png' alt='background_Gym'>
            </div>;";
                } else if ($data["specialite"] = "Fitness") {
                    echo
                        "<div id='debut'>
                <img class='Back' src='photos/sport de competition/fitnesstete.png' alt='background_Gym'>
            </div>;";
                } else if ($data["specialite"] = "Biking") {
                    echo
                        "<div id='debut'>
                <img class='Back' src='photos/sport de competition/bikingtete.png' alt='background_Gym'>
            </div>;";
                } else if ($data["specialite"] = "Cardio Training") {
                    echo
                        "<div id='debut'>
                <img class='Back' src='photos/sport de competition/cardio_trainingTETE.png' alt='background_Gym'>
            </div>;";
                } else if ($data["specialite"] = "Cours collectifs") {
                    echo
                        "<div id='debut'>
                <img class='Back' src='photos/sport de competition/courstete.png' alt='background_Gym'>
            </div>";
                }
                
                $sql = "SELECT MIN(id_coach) AS prochain_id
                FROM personnel
                WHERE specialite = 'Football'
                AND id_coach > '$coach' ";
    
                $result_btn = mysqli_query($db_handle, $sql);
    
                if ($result_btn->num_rows > 0) {
    
                    $coach_base = mysqli_fetch_assoc($result_btn);
                    $prochain_id = $coach_base["prochain_id"];
                    $_SESSION['prochaincoach_id'] = $prochain_id;
    
                    $sql = "SELECT * FROM personnel where id_coach = '$prochain_id'";
                    $resultat_b = mysqli_query($db_handle, $sql);
    
                    if ($resultat_b->num_rows > 0) 
                    {
                    $donnee = mysqli_fetch_assoc($resultat_b);
    
                    echo "
                    <a href = '". $donnee['page_web'] ."'>
                        <div class = 'prochain_coach'>
                        VOIR AUTRE COACH
                        </div
                        </a>
                    ";
                    }

                }

                echo "<div id='coach'>
                <a href='".$data["cv"]."'>
                    <div class='cv_cache'>
                        <img class='cv_coach' src='photos/activites sportives/cv.png' alt='cliquez pour voir cv'>
                        <img class='photo_coach' src='".$data["photo"]. "' alt='coach football'>
                </a>
            </div>
            <div class='text_coach'>
                <p class='nom_coach'>
                    <span class='highlight'>" . $data["nom"] ." ". $data["prenom"] ."<br><br>". $data["id_coach"] . "</span><br>";
                    if ($data["salle"] = "Monaco") {
                    echo "<span class='bureau'>SPORTIFY MONACO - 28 Boulvard des Moulins, Monaco</span>";
                    }
                    else if ($data["salle"] = "Paris") {
                    echo "<span class='bureau'>SPORTIFY PARIS - 13 Place des Vosges, 75004 Paris France</span>";
                    }
                    else if ($data["salle"] = "St-Tropez") {
                    echo "<span class='bureau'>SPORTIFY ST-TROPEZ - 99 Rue du General Allard, 83990 Saint-Tropez</span>";
                    }
                echo"
                </p>

            <p class='description_coach'>
                Le coach n'a pas encore de description... Cela ne devrait pas tarder ! 
        </p>
        </div>
        </div>
        <div id='dispo'>
        <div class='rdv_text'>
            <p>MES DISPONIBILITÉS</p>
        </div>
        <div id='rdv'>
        <div class='container_edt'>
            <div class='edt'>
        ";}
                
        $compteur = 0;

        $_SESSION['id_Coach'] = $coach;
        $_SESSION['specialite'] = $data["specialite"];


        $Bouton = isset($_POST["btn"]) ? $_POST["btn"] : "";

        $date = array("Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
        $heure = array(9, 9, 10, 11, 12, 14, 14, 15, 16, 17, 17);
        $minutes = array(00, 45, 30, 15, 00, 00, 45, 30, 15, 00, 45);
        $Reserv = "reserv";

            echo "<table>";

            echo "<tr>";
            for ($i = 0; $i < 6; $i++) {
                echo "<th><p>" . $date[$i] . "</p></th>";
            }
            echo "</tr>";
            for ($row = 0; $row < 11; $row++) {
                echo "<tr>";

                $dbl_zero = "";
                if ($minutes[$row] === 0) {
                    $dbl_zero = "0";
                }

                for ($col = 0; $col < 6; $col++) {
                    $tempDate = $date[$col];
                    $tempHeure = $heure[$row];
                    $tempMinute = $minutes[$row];
                    $tempSpe = $data["specialite"];
                    $requete = "SELECT * FROM rdv WHERE date = '$tempDate' AND heure_rdv = '$tempHeure' AND minutes_rdv = '$tempMinute' AND specialite = '$tempSpe'";
                    $result = mysqli_query($db_handle, $requete);

                    if (mysqli_num_rows($result) === 0) {
                        $Reserv = "libre";
                    } else {
                        $Reserv = "reserv";
                    }

                    $compteur++;

                    echo "<td><button class='" . $Reserv . "' name='" . $compteur . "' id='cases' data-row='" . $row . "' data-col='" . $col . "'>" . $heure[$row] . ":" . $minutes[$row] . $dbl_zero . "</button></td>";
                }
                echo "</tr>";
            }
            echo "</table>";

            $_SESSION['specialite'] = $tempSpe;


        }
        echo "</div>
        </div>
        </div>
        
        <form action='confirmation.php' method='post'>
            <div id='Input_cases'>
                <p>Colonne:</p>
                <input id='Inp_Col' name='Num_Col'>
                <p>Ligne:</p>
                <input id='Inp_Row' name='Num_Lig'>
            </div>
        </div>
        <div class='button'>
            <div class='card'>
                <button type='submit' class='card-info'>
                    <p class='title'>VALIDER</p>
                </button>
            </div>
        
            <div class='card'>
                <div class='card-info'>
                    <p class='title'>ME CONTACTER</p>
                </div>
            </div>
        </div>
        </form>
        <script src='musculation.js'></script>
        </body>
        
        </html>
        ";
        ?>
