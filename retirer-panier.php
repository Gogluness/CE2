<?php
	session_start();

	$objetARetirer = $_POST['data'];
	$panier = $_SESSION['panier'];
	$nouveauPanier = "";

	$tableauIDProduits = explode("&",$panier);

	foreach ($tableauIDProduits as $idProduitCourrant)
	{
		if($idProduitCourrant != $objetARetirer)
		{
			$nouveauPanier = $nouveauPanier.$idProduitCourrant."&";
		}
	}

	$nouveauPanier = trim($nouveauPanier, "&");
	$_SESSION['panier'] = $nouveauPanier;
?>
