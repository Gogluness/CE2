<?php
session_start();

$idProduit = $_POST['data'];

if(!isset($_SESSION['panier']))
{
	$_SESSION['panier'] = array();
}

$_SESSION['panier'][$idProduit]['Quantite'] = 1;
?>
 
