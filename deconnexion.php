<?php

session_start();

$_SESSION['login_id'] = NULL;

header("Location: menu.html");
exit;

?>