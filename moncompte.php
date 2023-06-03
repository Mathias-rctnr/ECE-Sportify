<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Sportify</title>
    <link rel="stylesheet" href="moncompte.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

</head>

<body>
    <header>
        <div class="Titre_Sportify">Sportify</div>
        <div class="Wrapper_Liens">
            <a class="Liens1" id="liens_Nav" href="menu.html">Accueil</a>
            <a class="Liens2" id="liens_Nav" href="Tout_parcourir.html">Tout Parcourir</a>
            <a class="Liens3" id="liens_Nav" href="recherche.html">Recherche</a>
            <a class="Liens4" id="liens_Nav" href="affichage_Rdv.php">Rendez-Vous</a>
            <a class="Liens5" id="liens_Nav" href="moncompte.php">Votre Compte</a>
        </div>
    </header>
    <div class="wrapper">

        <?php
        echo "<div class = 'id' ><img class='Back' src='photos/salle/moncompte_tete.png' alt='image mon compte'></div>";

        session_start();

        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);


        // 
// Définition du nom de la base de données
        $database = "projet_piscine";
        // Connexion à la base de données MySQL
        $db_handle = mysqli_connect("localhost", "root", "");
        $db_found = mysqli_select_db($db_handle, $database);

        if ($_SESSION["login_id"]) {
            $id = $_SESSION["login_id"];
            echo "<p>" . $id . "</p>";

            if ($db_found) {
                $sql = "SELECT * FROM client WHERE id_client = '$id'";
                $result = mysqli_query($db_handle, $sql);
                // AFFICHAGE DE LA PAGE MON COMPTE SELON LE TYPE DE COMPTE
                if ($result->num_rows == 1) {

                    $data = mysqli_fetch_assoc($result);
                    // Récupérer le numéro de carte depuis la base de données
                    $numCarte = $data['num_carte']; // Remplacez cette variable par la valeur récupérée de votre base de données
        
                    // Définir le nombre de caractères à masquer (nombre de caractères précédents à remplacer par des astérisques)
                    $nbCaracteresMasques = strlen($numCarte) - 4; // Dans cet exemple, nous masquons tous les caractères précédents, sauf les 4 derniers chiffres
                    if($nbCaracteresMasques < 0)
                    {
                        $nbCaracteresMasques = 0;
                    }
                    // Générer une chaîne de caractères composée d'astérisques du même nombre que les caractères masqués
                    $caracteresMasques = str_repeat("*", $nbCaracteresMasques);

                    // Concaténer la chaîne de caractères masqués avec les derniers chiffres du numéro de carte
                    $numCarteMasque = $caracteresMasques . substr($numCarte, -4);

                    $mdp = $data['mdp'];
                    $nbCaracteresMasquesmdp = strlen($mdp) - 2;
                    if($nbCaracteresMasquesmdp < 0)
                    {
                        $nbCaracteresMasquesmdp = 0;
                    }

                    $caracteresMasquesmdp = str_repeat("*", $nbCaracteresMasquesmdp);
                    $mdpMasque = $caracteresMasquesmdp . substr($mdp, -2);

                    echo "<p class = 'type_compte'>Compte client </p>";
                    echo "<div class = 'contour_info' >";
                    echo "<p class = 'sous_titre'>Coordonnées</p>";
                    echo "<div class = 'contour_info_1' >";



                    echo "<div class = 'contour_info_2' >";

                    echo "<p>Nom : " . $data["nom"] . "</p>";
                    echo "<p>Prenom : " . $data["prenom"] . "</p>";
                    echo "<p>N° Étudiant : " . $data["num_etud"] . "</p>";

                    echo "</div>";
                    echo "<div class = 'contour_info_2' >";

                    echo "<p>Téléphone : " . $data["tel"] . "</p>";
                    echo "<p>Mail : " . $data["mail"] . "</p>";
                    echo "<p>Mot de passe : " . $mdpMasque . "</p>";

                    echo "</div>";
                    echo "</div>";
                    echo "<p class = 'sous_titre'>Adresse</p>";
                    echo "<div class = 'contour_info_1' >";

                    echo "<div class = 'contour_info_2' >";
                    echo "<p>Adresse : " . $data["adresse1"] . "</p>";
                    echo "<p>Complement d'adresse : " . $data["adresse2"] . "</p>";
                    echo "</div>";
                    echo "<div class = 'contour_info_2' >";
                    echo "<p>Ville : " . $data["ville"] . "</p>";
                    echo "<p>Code Postal : " . $data["cp"] . "</p>";
                    echo "<p>Pays : " . $data["pays"] . "</p>";
                    echo "</div>";
                    echo "</div>";
                    echo "<p class = 'sous_titre'>Informations de Paiements</p>";
                    echo "<div class = 'contour_info_1' >";
                    echo "<div class = 'contour_info_2' >";
                    echo "<p>Type de carte : " . $data["type_carte"] . "</p>";
                    echo "<p>Prénom carte : " . $data["prenom_carte"] . "</p>";
                    echo "<p>Nom carte : " . $data["nom_carte"] . "</p>";
                    echo "<p>Abonnement : " . $data["abonnement"] . "</p>";
                    echo "</div>";
                    echo "<div class = 'contour_info_2' >";
                    echo "<p>N° Carte : " . $numCarteMasque . "</p>";
                    echo "<p>Date d'expiration : " . $data["date_exp"] . "</p>";
                    echo "<p>CCV : " . $data["ccv"] . "</p>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>
                    <form action = 'deconnexion.php'>
                    <input type='submit' class = 'deconnexion' value = 'DECONNEXION'></div>
                    </form>";

                } else { // COMPTE POUR LES COACHS
                    $sql = "SELECT * FROM personnel WHERE id_coach = '$id'";
                    $result_coach = mysqli_query($db_handle, $sql);
                    if ($result_coach->num_rows == 1) {

                        $data = mysqli_fetch_assoc($result_coach);

                        $mdp = $data['mdp'];
                        $nbCaracteresMasquesmdp = strlen($mdp) - 2;
                        $caracteresMasquesmdp = str_repeat("*", $nbCaracteresMasquesmdp);
                        $mdpMasque = $caracteresMasquesmdp . substr($mdp, -2);

                        echo "<p class = 'type_compte'>Compte Coach</p>";
                        echo "<div class = 'contour_info' >";
                        echo "<div class = 'contour_info_1' >";
                        echo "<div class = 'contour_info_2' >";
                        echo "<img src = '" . $data["photo"] . "' alt = 'photo coach' >";
                        echo "</div>";
                        echo "<div class = 'contour_info_2' >";
                        echo "<p>Nom : " . $data["nom"] . "</p>";
                        echo "<p>Prenom : " . $data["prenom"] . "</p>";
                        echo "<p>Mail : " . $data["mail"] . "</p>";
                        echo "<p>Mot de passe : " . $mdpMasque . "</p>";
                        echo "<p>Spécialité : " . $data["specialite"] . "</p>";
                        echo "<p>Lieu d'activité : " . $data["salle"] . "</p>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                        echo "<div class = 'contour_info_1' >";
                        echo "<div class = 'contour_info_2' >";
                        echo "<a href = '" . $data["video"] . "' class = 'card'>VIDEO</a>";

                        echo "</div>";
                        echo "<div class = 'contour_info_2' >";

                        echo "<a href = '" . $data["cv"] . "' class = 'card'>CV</a>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>
                        <form action = 'deconnexion.php'>
                        <input type='submit' class = 'deconnexion' value = 'DECONNEXION'></div>
                        </form>";
                    } else { // COMPTE POUR LES ADMINS
                        $sql = "SELECT * FROM admin WHERE id = '$id'";
                        $result_admin = mysqli_query($db_handle, $sql);
                        if ($result_admin->num_rows == 1) {

                            $data = mysqli_fetch_assoc($result_admin);

                            $mdp = $data['mdp'];
                            $nbCaracteresMasquesmdp = strlen($mdp) - 2;
                            $caracteresMasquesmdp = str_repeat("*", $nbCaracteresMasquesmdp);
                            $mdpMasque = $caracteresMasquesmdp . substr($mdp, -2);

                            echo "<p class = 'type_compte'>Compte Admin</p>";
                            echo "<div class = 'contour_info' >";
                            echo "<div class = 'contour_info_1' >";
                            echo "<div class = 'contour_info_2' >";
                            echo "<p>Nom : " . $data["nom"] . "</p>";
                            echo "<p>Prenom : " . $data["prenom"] . "</p>";
                            echo "</div>";
                            echo "<div class = 'contour_info_2' >";

                            echo "<p>Mail : " . $data["mail"] . "</p>";
                            echo "<p>Mot de passe : " . $mdpMasque . "</p>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                            // FORM POUR AJOUTER DU PERSONNEL
                            echo "<p class = 'ajtcoach'>Ajout de Personnel</p>

                            
                        <div class = 'contour_form' >
                        <form  action = 'newcoach.php' method ='post'>
                        <div class = 'contour_form_2' >

                        <div  class='user-box'>
                        <label>Nom</label>
                        <input  id='nom' type='text' name='nom' required=''>
                        </div>
                        <div class='user-box'>
                        <label>Prenom</label>
                        <input  id='prenom' type='text' name='prenom' required=''>

                        </div>
                        <div class='user-box'>
                        <label>Mail</label>
                        <input  id='mail' type='email' name='mail' required=''>

                        </div>
                        <div class='user-box'>
                        <label>Mot De Passe</label>
                        <input  id='mdp' type='text' name='mdp' required=''>
                        </div>
                        </div>
                        <div class = 'contour_form_2' >
                        <div class='user-box'>
                        <label>Salle</label>
                        <select id = 'salle' name='salle'>
                        <option value='Monaco'>Monaco</option>
                        <option value='Paris'>Paris</option>
                        <option value='St-Tropez'>St-Tropez</option>
                        </select>
                        <label>Specialité</label>
                        <select id = 'specialite' name='specialite'>
                        <option value='Biking'>Biking</option>
                        <option value='Basketball'>Basketball</option>
                        <option value='Cardio Training'>Cardio Training</option>
                        <option value='Cours collectifs'>Cours collectifs</option>
                        <option value='Plongeon'>Plongeon</option>
                        <option value='Fitness'>Fitness</option>
                        <option value='Football'>Football</option>
                        <option value='Musculation'>Musculation</option>
                        <option value='Natation'>Natation</option>
                        <option value='Rugby'>Rugby</option>
                        <option value='Tennis'>Tennis</option>
                        </select>

                        </div>
                        <div class='user-box_spe'>
                        <label>CV(.xml)</label>
                        <input  id='cv' type='file' name='cv' required='' accept ='xml'>

                        </div>
                        <div class='user-box_spe'>
                        <label>Video</label>
                        <input  id='video' type='file' name='video' >
                        </div>
                        <div class='user-box_spe'>
                        <label>Photo</label>
                        <input  id='photo' type='file' name='photo' >
                        </div>
                        <input type = 'submit' class = 'card' value = 'AJOUTER'>
                        </div>
                        </form>
                        </div>";

                            // FORM POUR MOFIFIER DES INFOS DU PERSONNEL
        
                            echo "<p class = 'ajtcoach'>Modifier infos du Personnel</p>
                        <div class = 'contour_form_modif' >
                        <form  action = 'modifcoach.php' method ='post'>
                        <div class = 'contour_form_2' >

                        <div  class='user-box'>
                        <label>ID Personnel</label>
                        <input  id='id_perso' type='text' name='id_perso' required=''>
                        </div>
                        <div class='user-box'>
                        <label>Type d'action</label>
                        <select id = 'type_action' name='type_action'>
                        <option value='1'>Suppression du personnel relié à cet ID</option>
                        <option value='2'>Suppresion du fichier XML relié à cet ID</option>
                        <option value='3'>Ajout d'un fichier XML(CV) à cet ID</option>
                        <option value='4'>Supprimer les RDV relié à cet ID</option>
                        </select>

                        </div>
                        <div class='user-box_spe'>
                        <label>fichier .xml(si vous décidez d'en ajouter un)</label>
                        <input  id='cv' type='file' name='cv' accept ='xml'>
                        </div>
                        <input type = 'submit' class = 'card' value = 'APPLIQUER LA MODIFICATION'>
                        </div>
                        </form>
                        </div>";

                            // FORM POUR AJOUTER D ADMIN
                            echo "<p class = 'ajtcoach'>Ajout d'Admin</p>
                        <div class = 'contour_form_admin' >
                        <form  action = 'newadmin.php' method ='post'>
                        <div class = 'contour_form_2' >

                        <div  class='user-box'>
                        <label>Nom</label>
                        <input  id='nom' type='text' name='nom' required=''>
                        </div>
                        <div class='user-box'>
                        <label>Prenom</label>
                        <input  id='prenom' type='text' name='prenom' required=''>
                        </div>
                        <div class = 'contour_form_2' >
                        </div>
                        <div class='user-box'>
                        <label>Mail</label>
                        <input  id='mail' type='email' name='mail' required=''>

                        </div>
                        <div class='user-box'>
                        <label>Mot De Passe</label>
                        <input  id='mdp' type='text' name='mdp' required=''>
                        </div>


                        </div>
                        <input type = 'submit' class = 'card' value = 'AJOUTER'>
                        </form>
                        </div>
                        <form action = 'deconnexion.php'>
                        <input type='submit' class = 'deconnexion' value = 'DECONNEXION'></div>
                        </form>";
                        } else {
                            echo "<p>pb identifiant client inconnu</p>";
                        }
                    }
                }

            } else {
                echo "<p>Pb base de données 'projet_piscine'.</p>";
            }
        } else {
            header("Location: login.html");
            exit;
        }
        ?>
    </div>

</body>

</html>