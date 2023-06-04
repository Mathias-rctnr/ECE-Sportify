<?php
session_start();
if($_SESSION["login_id"]){
 $text = $_POST['text'];
 
 $text_message = "<div class='msgln'><span class='chat-time'>".date("g:i A")."</span> <b class='username'>".$_SESSION['nom']."</b> ".stripslashes(htmlspecialchars($text))."<br></div>";
//On déclare $text_message et lui attribue le message qu'on va envoyer
 
 $myfile = fopen(__DIR__ . "/".$_SESSION['ID_client'].$_SESSION['ID_coach'].".html", "a") or die("Impossible d'ouvrir le fichier " . __DIR__ . "/".$_SESSION['ID_client'].$_SESSION['ID_coach'].".html");
 //On ouvre le fichier avec le nom ID_client.ID_coach.'html'
 fwrite($myfile, $text_message);//on ecrit dans le fichier
 fclose($myfile);//on ferme le fichier
}

