<?php
	session_start();
	unset($_SESSION["login_user"]);  // where $_SESSION["nome"] is your own variable. if you do not have one use only this as follow **session_unset();**
	setcookie("nomUsager","",1);
	header("Location: index.php");
?>
