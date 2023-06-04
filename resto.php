<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="resto.css">
    <title>Document</title>
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
    <div class="wrapper">
        <div class="wrapper_img">

        </div>
        <div class="wrapper_texte">
            <div class="bienvenue">
                <p class="sous_titre" id="first">
                    Bienvenue dans votre restaurant Sportify
                </p>
                <p class="text">
                    Nous sommes ravis de vous présenter notre restaurant, le dernier ajout à notre gamme d'installations
                    premium au sein de Sportify. Notre restaurant est spécialement conçu pour répondre aux besoins
                    nutritionnels des sportifs, dans un cadre élégant et sophistiqué.
                </p>

            </div>
            <div class="bloc-1">
                <div class="sous_bloc1">
                    <div class="cadre">
                        <p class="sous_titre">
                            Un Cadre Élégant pour une Expérience Culinaire Mémorable
                        </p>
                        <p class="text">
                            Chez Sportify, nous sommes dédiés à offrir à nos membres une expérience exceptionnelle à
                            tous les niveaux. Notre restaurant ne fait pas exception. Dès que vous franchirez les
                            portes, vous serez accueillis dans un cadre chic et confortable, conçu pour créer une
                            atmosphère relaxante et conviviale. Que vous souhaitiez profiter d'un repas en solo, en
                            famille ou avec vos coéquipiers, notre ambiance chaleureuse saura vous séduire.
                        </p>
                    </div>



                    <div class="alimentation">
                        <p class="sous_titre">
                            Une Alimentation Adaptée à Votre Performance
                        </p>
                        <p class="text">
                            Chez Sportify, nous croyons fermement que la nutrition est la clé de la performance sportive
                            optimale. C'est pourquoi nous avons créé notre restaurant, un lieu où les sportifs peuvent
                            trouver une alimentation adaptée à leurs besoins. Notre équipe de nutritionnistes et de
                            chefs expérimentés travaille en étroite collaboration pour élaborer un menu qui combine
                            expertise nutritionnelle et saveurs exquises.
                        </p>
                    </div>
                </div>
                <img class="img_bloc1" src="photos/salle/resto3.jpg" width="500px" alt ="notre cuisinier">
            </div>
        <div class="menu">
            <p class="sous_titre">
                Le Menu - Une Fusion de Saveurs et de Nutrition
            </p>
            <p class="text">
                Découvrez notre menu diversifié qui offre une fusion parfaite entre saveurs délicieuses et nutrition
                équilibrée. Chaque plat est méticuleusement préparé avec des ingrédients de première qualité pour vous
                offrir une expérience culinaire exceptionnelle. Voici un aperçu des délices que vous pouvez déguster :
            </p>
            <div class = "bloc-2">
                <img class = "img_bloc2" width = 500px src="photos/salle/restaurant2.jpg"  alt = "photo resto">
                <div class = "sous_bloc2">
            <ul><br>
                <li><span>Le Matin Énergétique</span> : Commencez votre journée du bon pied avec nos options nutritives pour le
                    petit-déjeuner. Profitez de smoothies revitalisants, de bols de fruits frais, d'omelettes protéinées
                    et bien plus encore.</li><br>
                <li><span>Le Déjeuner Équilibré</span> : Rechargez-vous après votre séance d'entraînement intense avec nos plats
                    équilibrés. Savourez nos salades nourrissantes, nos wraps protéinés, nos plats de pâtes saines et
                    nos options végétariennes pour une récupération optimale.</li><br>
                <li><span>Le Dîner Gourmet</span> : Terminez votre journée en beauté avec notre expérience culinaire exceptionnelle.
                    Détendez-vous et régalez-vous avec nos grillades succulentes, nos poissons frais, nos légumes de
                    saison et bien plus encore.</li><br>
                <li><span>Les Collations Énergétiques</span> : Entre les repas, offrez-vous nos collations saines et énergétiques
                    pour maintenir votre niveau d'énergie tout au long de la journée. Nous proposons une sélection de
                    barres protéinées, de smoothies vitaminés et d'autres options savoureuses.</li><br>
            </ul>
            </div>
            
            </div>
        </div>

        <div class="venez">
            <p class="text">
                Venez découvrir comment notre restaurant peut vous aider à atteindre vos objectifs sportifs grâce à
                une alimentation saine et adaptée à vos besoins. Nous vous invitons à visiter notre restaurant lors de
                votre prochaine séance d'entraînement chez Sportify. Profitez de l'ambiance chic et confortable de notre
                restaurant, conçu pour créer une expérience culinaire mémorable, le tout dans notre salle de sport ultra
                luxueuse.
            </p><br>
            <p id ="avert" class="avertissement">
                Veuillez noter que l'accès à cet espace est exclusivement réservé aux membres de Sportify. Rejoignez
                notre communauté dès aujourd'hui pour bénéficier de tous nos avantages.
            </p>
        </div>
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

                    $_SESSION['id_Coach'] = "R";
                    $_SESSION['specialite'] = 'restaurant';

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
                                    $tempSpe = "restaurant";
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
                    <input id="Inp_Col" name="Num_Col" required>
                    <p>Ligne:</p>
                    <input id="Inp_Row" name="Num_Lig" required>
                </div>
            </div>
        <div class = "button">
        <div class="card">
            <button type="submit" class="card">
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