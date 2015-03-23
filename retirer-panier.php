<?php
	session_start();

	$objetARetirer = $_POST['data'];
	unset($_SESSION['panier'][$objetARetirer]);
?>
