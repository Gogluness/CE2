<?php
session_start();

$objetPanier = $_POST['data'];

if(isset($_SESSION['panier']))
{
	$objetPanier = $_SESSION['panier']."&".$objetPanier;
}

$objetPanier = trim($objetPanier, "&");
$_SESSION['panier'] = $objetPanier;

?>


