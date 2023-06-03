<?php

// start the session
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Chat</title>
    <meta http-equiv="refresh" content="10; url = chatroom_premier.php"><!--Pour recharger la page toutes les 5 secondes -->
    <!--et rediriger vers chatroom_premier pour ne pas avoir d'erreur sur la variable contenu-->
    <link rel="stylesheet" href="chatroom.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"><!--Lien vers chatroom.css-->
</head>

<body>
    <div id="total">
        <header>
            <div class="Titre_Sportify">Sportify</div><!--Lien en haut de la page-->
            <div class="Wrapper_Liens">
                <a class="Liens1" id="liens_Nav" href="menu.html">Accueil</a>
                <a class="Liens2" id="liens_Nav" href="Tout_parcourir.html">Tout Parcourir</a>
                <a class="Liens3" id="liens_Nav" href="recherche.html">Recherche</a>
                <a class="Liens4" id="liens_Nav" href="Affichage_Rdv.php">Rendez-Vous</a>
                <a class="Liens5" id="liens_Nav" href="">Votre Compte</a>
            </div>
        </header>

        <div id="content"><!--Grande div du contenu-->
            <div class="calque"></div><!--Couleur de fond-->
            <div id="titre"><span class="Libere"><br>Votre Chatroom avec votre coach</span></div><!--Titre-->

            <?php
            $database = "test_piscine_chatroom"; //connection a la base de donne
            $db_handle = mysqli_connect("localhost", "root", "");
            $db_found = mysqli_select_db($db_handle, $database);

            $contenu = $_POST["contenu"]; //Recupere les données qu'on va ecrire dans la bdd qui vienne du formulaire
            $heure_actuelle = date("H:i:s");
            $ID_emetteur = '1';

            if (!empty($contenu)) { //Si un message a été ecrit on l'ajoute dans la bdd
                $requete = $db_handle->prepare("INSERT INTO chatroom(ID_emetteur, heure, contenu) values (?, ?, ?)");
                $requete->bind_param("sss", $ID_emetteur, $heure_actuelle, $contenu);
                $requete->execute();
            }


            $sql = "SELECT * FROM chatroom /*WHERE ID_emetteur == ID_client AND ID_emetteur == ID_coach OR ID_emetteur == ID_coach AND ID_emetteur == ID_client*/";
            //requete SQl pour afficher tous les messages de la conversation
            $result = mysqli_query($db_handle, $sql);

            echo "<div class='chat' id='chatroom'>";
            while ($data = mysqli_fetch_assoc($result)) { //Tant que l'on a des resultats on l'affiche a droite ou a gauche du menu déroulant 
                //selon qui a envoye le message, on le sait grâce a ID_emetteur
                /*if($data["date"] != $date){
                    echo "<div id = 'nouv_journee'>".$data["date"]."</div>";                    
                }
                $date = $data["heure"];*/

                if ($data["ID_emetteur"] == "1"/*ID_client*/) { //Si la personne connecte a envoye le message
                    echo "<div id = 'texte_droite' class = 'texte_droite'>";
                    echo "<div id = 'contenu_message' name = 'contenu_message'>" . $data["contenu"] . "</div><div id = 'vous' name = 'vous'>Vous "/*.$data["heure"]*/ . "</div>";
                    echo "</div>";
                } else {
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
                /*fonction pour scroller en bas du menu déroulant*/
                var chatroom = document.getElementById('chatroom');
                chatroom.scrollTop = chatroom.scrollHeight; // Scroller en bas de la div chatroom


                window.onload = function() {
                    var isTyping = false;

                    // Écoute l'événement de saisie (keydown) sur le champ de saisie
                    document.getElementById('contenu_envoi').addEventListener('keydown', function() {
                        isTyping = true;
                    });
                }
            </script>

            <div class="ecrire" id="ecrire"><!--formulaure ou l'utilisateur écrite le message-->
                <form action="chatroom_2.php" method="post">
                    <input type="text" id="contenu_envoi" class="contenu_envoi" name="contenu" placeholder="Votre message" /><!--espace pour ecrire-->
                    <button type="submit" id="bouton_envoi" value="Envoyer">Envoyer</button><!--Le bouton pour l'envoi-->
                </form>
            </div>


        </div>
    </div>
</body>