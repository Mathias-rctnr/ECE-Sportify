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
            <a class="Liens3" id="liens_Nav" href="recherche.html">Recherche</a>
            <a class="Liens4" id="liens_Nav" href="Affichage_Rdv.php">Rendez-Vous</a>
            <a class="Liens5" id="liens_Nav" href="moncompte.php">Votre Compte</a>
        </div>
    </header>

    <div class="Content">
        <div id="debut">
            <img class="Back" src="photos/sport de competition/tennistete.png" alt="background_Gym">
        </div>

        <?php   // VERIFIER SI UN AUTRE COACH EST DISPONIBLE DANS LA BDD 
        //*** COMMENTAIRES IDENTIQUES A MUSCULATION.PHP */
        session_start();
        // Définition du nom de la base de données
        $database = "projet_piscine";
        // Connexion à la base de données MySQL
        $db_handle = mysqli_connect("localhost", "root", "");
        $db_found = mysqli_select_db($db_handle, $database);
        if ($db_found) {

            $sql = "SELECT MIN(id_coach) AS prochain_id
    FROM personnel
    WHERE specialite = 'Tennis'
    AND id_coach > 'A11'";

            $result_coach = mysqli_query($db_handle, $sql);

            if ($result_coach->num_rows > 0) {

                $coach_base = mysqli_fetch_assoc($result_coach);
                $coach = $coach_base["prochain_id"];
                $_SESSION['prochaincoach_id'] = $coach;

                $sql = "SELECT * FROM personnel where id_coach = '$coach'";
                $resultat_b = mysqli_query($db_handle, $sql);

                if ($resultat_b->num_rows > 0) {
                    $data = mysqli_fetch_assoc($resultat_b);

                    echo "
        <a href = '" . $data['page_web'] . "'>
            <div class = 'prochain_coach'>
            VOIR AUTRE COACH
            </div
            </a>
        ";
                }
            }
        }

        ?>

        <div id="coach">
            <a href="cvtennis.html">
                <div class="cv_cache">
                    <img class="cv_coach" src="photos/activites sportives/cv.png" alt="cliquez pour voir cv">
                    <img class="photo_coach" src="photos/sport de competition/tennis.png" alt="coach tennis">
            </a>
        </div>
        <div class="text_coach">
            <p class="nom_coach">
                <span class="highlight">ALEXANDRE LEROY<br><br> A11</span><br>
                <span class="bureau">SPORTIFY PARIS - 13 Place des Vosges, 75004 Paris France</span>
            </p>

            <p class="description_coach">
                Préparez-vous à vivre une expérience unique sur les courts de tennis avec un coach passionné qui saura
                vous guider vers <span class="highlight">l'excellence</span>.<br><br> Ce coach de tennis est doté d'une expertise approfondie du jeu, d'une
                passion inébranlable et d'un talent exceptionnel pour améliorer vos compétences.<br><br> Grâce à des techniques
                d'enseignement personnalisées, vous développerez votre technique de frappe, votre agilité, votre
                stratégie de jeu et votre mentalité de gagnant. Que vous soyez <span class="highlight">débutant ou joueur confirmé</span>, ce coach
                saura vous pousser à donner le meilleur de vous-même, à repousser vos limites et à atteindre vos
                objectifs tennistiques.<br><br> Ne manquez
                pas cette opportunité de vous <span class="highlight">épanouir</span> dans le tennis et de <span class="highlight">devenir un joueur accompli</span>, aux côtés de ce
                coach inspirant.
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

                    $compteur = 0;

                    $_SESSION['id_Coach'] = "A11";
                    $_SESSION['specialite'] = 'tennis';

                    $database = "Projet_Piscine";                           //!                     ATTENTION AU NOM DE LA BDD 
                    $db_handle = mysqli_connect("localhost", "root", "");
                    $db_found = mysqli_select_db($db_handle, $database);

                    $Bouton = isset($_POST["btn"]) ? $_POST["btn"] : "";

                    $date = array("Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
                    $heure = array(9, 9, 10, 11, 12, 14, 14, 15, 16, 17, 17);
                    $minutes = array(00, 45, 30, 15, 00, 00, 45, 30, 15, 00, 45);
                    $Reserv = "reserv";

                    if ($db_found) {
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
                                $tempSpe = 'tennis';
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
                    ?>
                </div>
            </div>
        </div>

        <form action="confirmation.php" method="post">
            <div id="Input_cases">
                <p>Colonne: </p>
                <input id="Inp_Col" name="Num_Col" required>
                <p>Ligne:</p>
                <input id="Inp_Row" name="Num_Lig" required>
            </div>
    </div>
    <div class="button">
        <div class="card">
            <button type="submit" class="card">
                <p class="title">VALIDER</p>
            </button>
        </div>
    </div>
    </form>


    <div class="button">
        <div class="card">
            <div class="card-info">
                <form name="form_contact" method="POST" action="chat.php">
                    <input type="hidden" name="id_coach" value="A11" />
                    <input type="submit" value='ME CONTACTER' />
                </form>
            </div>
        </div>
    </div>
    <script src="musculation.js"></script>
</body>

</html>