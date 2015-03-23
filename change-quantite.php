<?php
session_start();

$idProduit = $_POST['ID'];
$quantite = $_POST['Quantite'];

$_SESSION['panier'][$idProduit]['Quantite'] = $quantite;
?>
 
