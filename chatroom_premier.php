<?php

// start the session
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Chat</title>
    <meta http-equiv="refresh" content="100"><!--Pour recharger cette page toutes les 5 secondes -->

    <link rel="stylesheet" href="chatroom.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
    <div id="total">
        <header>
            <div class="Titre_Sportify">Sportify</div>
            <div class="Wrapper_Liens">
                <a class="Liens1" id="liens_Nav" href="menu.html">Accueil</a>
                <a class="Liens2" id="liens_Nav" href="Tout_parcourir.html">Tout Parcourir</a>
                <a class="Liens3" id="liens_Nav" href="recherche.html">Recherche</a>
                <a class="Liens4" id="liens_Nav" href="Affichage_Rdv.php">Rendez-Vous</a>
                <a class="Liens5" id="liens_Nav" href="">Votre Compte</a>
            </div>
        </header>

        <div id="content">
            <div class="calque"></div>
            <div id="titre"><span class="Libere"><br>Votre Chatroom avec votre coach</span></div>

            <?php
            $database = "test_piscine_chatroom";
            $db_handle = mysqli_connect("localhost", "root", "");
            $db_found = mysqli_select_db($db_handle, $database);

            $sql = "SELECT * FROM chatroom /*WHERE ID_emetteur == ID_client AND ID_emetteur == ID_coach OR ID_emetteur == ID_coach AND ID_emetteur == ID_client*/";
            $result = mysqli_query($db_handle, $sql);

            //Contrairement à chatroom_2.php on n'ecrit rien dans la base de donné car une erreur s'affiche concernat la variable contenu qui n'existe pas
            //Dans un premier temps on est sur cette page, puis, lorsque l'on envoie un message on est redirige vers chatroom_2.php
            //Et toutes les 5 secondes on est redirigé vers cette page pour ne pas avoir l'erreur 

            echo "<div class='chat' id='chatroom'>";
            while ($data = mysqli_fetch_assoc($result)) {
                /*if($data["date"] != $date){
                    echo "<div id = 'nouv_journee'>".$data["date"]."</div>";                    
                }
                $date = $data["heure"];*/

                if ($data["ID_emetteur"] === "1"/*ID_celui connecte*/) {
                    echo "<div id = 'texte_droite' class = 'texte_droite'>";
                    echo "<div id = 'contenu_message' name = 'contenu_message'>" . $data["contenu"] . "</div><div id = 'vous' name = 'vous'>Vous "/*.$data["heure"]*/ . "</div>";
                    echo "</div>";
                } 
                else {
                    echo "<div id = 'texte_gauche' class = 'texte_gauche'>";
                    echo "<div id = 'contenu_message' name = 'contenu_message'>" . $data["contenu"] . "</div><div id = 'coach' name = 'coach'>Coach "/*.$data["heure"]*/ . "</div>";
                    echo "</div>";
                }
            }
            echo "</div>";

            /*$sql = $db_handle->prepare("INSERT INTO chatroom (ID_emetteur, ID_receveur, heure, contenu) Values (?,?,?,?)");
        $sql->bind_param("ssss", $contenu, $contenu, $contenu, $contenu);
        $sql->execute();*/

            mysqli_close($db_handle);
            ?>

            <script>
                var chatroom = document.getElementById('chatroom');
                chatroom.scrollTop = chatroom.scrollHeight; // Scroller en bas de la div chatroom
            </script>

            <div class="ecrire" id = "ecrire">
                <form action="chatroom_2.php" method="post">
                    <input type="text" id="contenu_envoi" class="contenu_envoi" name="contenu" placeholder="Votre message" />
                    <button type="submit" id="bouton_envoi" value="Envoyer">Envoyer</button>
                </form>
            </div>


        </div>
    </div>
</body>