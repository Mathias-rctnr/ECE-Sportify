<?php
session_start();
if($_SESSION["login_id"]){
 $text = $_POST['text'];
 
 $text_message = "<div class='msgln'><span class='chat-time'>".date("g:i A")."</span> <b class='username'>".$_SESSION['nom']."</b> ".stripslashes(htmlspecialchars($text))."<br></div>";
 // file_put_contents("log.html", $text_message, FILE_APPEND | LOCK_EX);
 
 $myfile = fopen(__DIR__ . "/".$_SESSION['ID_client'].$_SESSION['ID_coach'].".html", "a") or die("Impossible d'ouvrir le fichier " . __DIR__ . "/".$_SESSION['ID_client'].$_SESSION['ID_coach'].".html");
 fwrite($myfile, $text_message);
 fclose($myfile);
}

