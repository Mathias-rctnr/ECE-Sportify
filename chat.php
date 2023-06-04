<?php
session_start();
if (!($_SESSION["login_id"])) {
    $myfile = fopen(__DIR__ . "/".$_SESSION["login_id"]."html", "a") or die("Impossible d'ouvrir le fichier!" . __DIR__ . "/".$_SESSION["login_id"]."html");
    fwrite($myfile, $logout_message);
    fclose($myfile);
    session_destroy();
    sleep(1);
    header("Location: chat.php"); //Rediriger l'utilisateur
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
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);


    // 
    // Définition du nom de la base de données
    $database = "projet_piscine";
    // Connexion à la base de données MySQL
    $db_handle = mysqli_connect("localhost", "root", "");
    $db_found = mysqli_select_db($db_handle, $database);

    if (!($_SESSION["login_id"])) {
        header("Location: login.html");
    } else if ($_SESSION["login_id"]) {
        $id = $_SESSION["login_id"];

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

        if ($db_found) {
            $sql = "SELECT * FROM client WHERE id_client = '$id'";
            $result = mysqli_query($db_handle, $sql);
            // AFFICHAGE DE LA CHATROOM SELON LE TYPE DE COMPTE
            if ($result->num_rows == 1) {
                $data = mysqli_fetch_assoc($result);
                $nom = $data['prenom'];
                $_SESSION['nom'] = $nom;

                $ID_client = $id;
                $_SESSION['ID_client'] = $ID_client;

                $ID_coach = $_POST['id_coach'];
                $_SESSION['ID_coach'] = $ID_coach;
                echo "<div id='titre'><span class='Libere'><br>Votre Chatroom avec votre coach</span></div><!--Titre-->";
            } else { // COMPTE POUR LES COACHS
                $sql = "SELECT * FROM personnel WHERE id_coach = '$id'";
                $result_coach = mysqli_query($db_handle, $sql);

                if ($result_coach->num_rows == 1) {
                    $data = mysqli_fetch_assoc($result_coach);
                    $nom = $data["prenom"];
                    $_SESSION['nom'] = $nom;

                    $ID_coach = $id;  
                    $_SESSION['ID_coach'] = $ID_coach;

                    $ID_client = "1";
                    echo "<div id='titre'><span class='Libere'><br>Votre Chatroom avec votre client</span></div><!--Titre-->";
                }
            }
        }

        echo "            
            <div id='wrapper'>
                <div id='menu'>
                    <p class='welcome'>Bonjour, <b>" . $nom . " </b></p>
                </div>
                <div id='chatbox'>";
                if (file_exists($ID_client.$ID_coach.'.html') && filesize($ID_client.$ID_coach.'.html') > 0) {
                    $contents = file_get_contents($ID_client.$ID_coach.'.html');
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
    }

    ?>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        // jQuery Document
        $(document).ready(function() {
            $("#submitmsg").click(function() {
                var msg = $("#usermsg").val();
                $.post("post.php", {
                    text: msg
                });
                $("#usermsg").val("");
                return false;
            });

            function loadLog() {
                var oldscrollHeight = $("#chatbox")[0].scrollHeight - 20; //Hauteur de défilement avant la requête
                $.ajax({
                    url: '<?php echo $ID_client.$ID_coach; ?>'+'.html',
                    cache: false,
                    success: function(html) {
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

