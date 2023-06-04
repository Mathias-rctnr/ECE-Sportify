<?php
session_start();
if (!($_SESSION["login_id"])) {
    $myfile = fopen(__DIR__ . "/" . $_SESSION["login_id"] . "html", "a") or die("Impossible d'ouvrir le fichier!" . __DIR__ . "/" . $_SESSION["login_id"] . "html");
    fwrite($myfile, $logout_message);
    fclose($myfile);
    session_destroy();
    sleep(1);
    header("Location: chat.php"); //Rediriger l'utilisateur vers chat.php
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Votre Chatroom</title>
    <link rel="stylesheet" href="chatroom.css" />
</head>

<body>
    <?php
    ini_set('display_startup_errors', 1); //En cas de mauvais demarrage
    error_reporting(E_ALL); //Affiche toutes les erreurs
    

    // 
    // Définition du nom de la base de données
    $database = "projet_piscine";
    // Connexion à la base de données MySQL
    $db_handle = mysqli_connect("localhost", "root", "");
    $db_found = mysqli_select_db($db_handle, $database);

    if (!($_SESSION["login_id"])) { //Si l'utilisateur n'est pas connecté
        header("Location: login.html");
    } else if ($_SESSION["login_id"]) { //Sinon on affiche
        $id = $_SESSION["login_id"];
        //div du header
        echo " 
        <div id='content'>
            <header>
                <div class='Titre_Sportify'>Sportify</div><!--Lien en haut de la page-->
                <div class='Wrapper_Liens'>
                    <a class='Liens1' id='liens_Nav' href='menu.html'>Accueil</a>
                    <a class='Liens2' id='liens_Nav' href='Tout_parcourir.html'>Tout Parcourir</a>
                    <a class='Liens3' id='liens_Nav' href='recherche.html'>Recherche</a>
                    <a class='Liens4' id='liens_Nav' href='Affichage_Rdv.php'>Rendez-Vous</a>
                    <a class='Liens5' id='liens_Nav' href='moncompte.php'>Votre Compte</a>
                </div>
            </header>
            <div class='calque'></div><!--Couleur de fond-->";

        if ($db_found) { //si on est bien connecte a la base de donne
            $sql = "SELECT * FROM client WHERE id_client = '$id'";
            $result = mysqli_query($db_handle, $sql);
            // AFFICHAGE DE LA CHATROOM SELON LE TYPE DE COMPTE
            if ($result->num_rows == 1) { //SI c'est un client qui est connecte
                $data = mysqli_fetch_assoc($result);
                $nom = $data['prenom']; //On recupere son prenom
                $_SESSION['nom'] = $nom;

                $ID_client = $id; //ainsi que son ID
                $_SESSION['ID_client'] = $ID_client;

                $ID_coach = $_POST['id_coach']; //On recupere du form avec valeur constante l'ID du coach
                $_SESSION['ID_coach'] = $ID_coach;
                echo "<div id='titre'><span class='Libere'><br>Votre Chatroom avec votre coach</span></div><!--Titre-->"; //affichage du titre
            } else { // CHATROOM POUR LES COACHS
                $sql1 = "SELECT * FROM personnel WHERE id_coach = '$id'";
                $result_coach = mysqli_query($db_handle, $sql1);

                if ($result_coach->num_rows == 1) { //SI c'est un coach
                    $data1 = mysqli_fetch_assoc($result_coach); //recupere ses donnes
                    $nom = $data1["prenom"]; //Son nom
                    $_SESSION['nom'] = $nom;

                    $ID_coach = $id; //Son id
                    $_SESSION['ID_coach'] = $ID_coach;

                    $nom_client = $_POST['nom_client']; //recupere le nom du client grâce au form sur "votre compte" des coachs
                    $sql2 = "SELECT * FROM client WHERE nom = '$nom_client'"; //requete pour rechercher le client
                    $result_client = mysqli_query($db_handle, $sql2);

                    if ($result_client->num_rows == 1) { //Si un client a ce nom on recupere ses données et son ID
                        $data2 = mysqli_fetch_assoc($result_client);
                        $ID_client = $data2["id_client"];
                        $_SESSION['ID_client'] = $ID_client;
                    } else { //Sinon on retourne a la page pour rentrer le nom du client
                        header("Location: coach_contacter.html");
                    }

                    echo "<div id='titre'><span class='Libere'><br>Votre Chatroom avec votre client</span></div><!--Titre-->"; //on affiche le titre
                }
            }
        }

        //On entre dans la chatbox
        echo "            
            <div id='wrapper'>
                <div id='menu'>
                    <p class='welcome'>Bonjour, <b>" . $nom . " </b></p>
                </div>
                <div id='chatbox'>";
        //on ouvre le fichier ID_client.ID_coach.'html' si il existe et qu'il a du contenu
        if (file_exists($ID_client . $ID_coach . '.html') && filesize($ID_client . $ID_coach . '.html') > 0) {
            $contents = file_get_contents($ID_client . $ID_coach . '.html'); //on affiche le contenu
            echo $contents;
        }

        echo "
                </div>
                    <form name='message' action ='' >
                        <input name='usermsg' type='text' id='usermsg' />
                        <input name='submitmsg' type='submit' id='submitmsg' value='Envoyer' />
                    </form>
                </div>
            </div>";
        //form pour ecrire un message et l'envoyer
    }

    ?>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        // jQuery Document
        $(document).ready(function () {
            $("#submitmsg").click(function () {//Si on appuie sur le input envoyer
                var msg = $("#usermsg").val();//on déclare une variable message
                $.post("chat_traitement.php", {//on redirige vers la page chat_traitement.php
                    text: msg
                });
                $("#usermsg").val("");//on met à 0 la valeur dans l'input
                return false;
            });

            function loadLog() {
                var oldscrollHeight = $("#chatbox")[0].scrollHeight - 20; //Hauteur de défilement avant la requête
                $.ajax({
                    url: '<?php echo $ID_client . $ID_coach; ?>' + '.html',
                    cache: false,
                    success: function (html) {
                        $("#chatbox").html(html); //Insérez le log de chat dans la #chatbox div
                        //Auto-scroll 
                        var newscrollHeight = $("#chatbox")[0].scrollHeight - 20; //Hauteur de défilement apres la requête
                        if (newscrollHeight > oldscrollHeight) {
                            $("#chatbox").animate({
                                scrollTop: newscrollHeight
                            }, 'normal'); //Défilement automatique 
                        }
                    }
                });
            }
            setInterval(loadLog, 2500);
        });
    </script>
</body>

</html>