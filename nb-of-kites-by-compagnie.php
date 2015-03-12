<?php
	$nbOfKitesForPremierKites;
	$nbOfKitesForRSky;
	$nbOfKitesForLevelOne;
	$nbOfKitesForPrism;
	
	if(isset($objetRechercher) == false)
	{
		$objetRechercher = "";
	}

	$requeteNbObjetsBase = "SELECT count(*) FROM Produit where (Nom LIKE '%{$objetRechercher}%' or Description LIKE '%{$objetRechercher}%') 
		AND NomCompagnie LIKE ";

	$requeteNbObjets = $requeteNbObjetsBase."'%Premier Kites%'";
	$ResultatNbObjet = mysql_query($requeteNbObjets);
	$val = mysql_fetch_row($ResultatNbObjet);
 	$nbOfKitesForPremierKites = $val[0];

	$requeteNbObjets = $requeteNbObjetsBase."'%R-Sky%'";
	$ResultatNbObjet = mysql_query($requeteNbObjets);
	$val = mysql_fetch_row($ResultatNbObjet);
 	$nbOfKitesForRSky = $val[0];

	$requeteNbObjets = $requeteNbObjetsBase."'%Level One%'";
	$ResultatNbObjet = mysql_query($requeteNbObjets);
	$val = mysql_fetch_row($ResultatNbObjet);
 	$nbOfKitesForLevelOne = $val[0];

	$requeteNbObjets = $requeteNbObjetsBase."'%Prism%'";
	$ResultatNbObjet = mysql_query($requeteNbObjets);
	$val = mysql_fetch_row($ResultatNbObjet);
 	$nbOfKitesForPrism = $val[0];
?>
