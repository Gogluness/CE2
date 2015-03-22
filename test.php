<?php
	$sername = "localhost";
	$dbname = "CE2";
	$username = "root";
	$password = "admin123";
	$dir = "images/CerfVolantImages/NEW/";

	$formID = $_POST['formID'];
	echo($formID);
	$ImgPath = $dir . $_FILES["fichier"]["name"];
	$CUP = $_POST['CUP'];
	$Description = $_POST['Description'];
	$Modele = $_POST['Modele'];
	$Nom = $_POST['Nom'];
	$Compagnie = $_POST['NomCompagnie'];
	$PrixCout = $_POST['PrixCout'];
	$PrixVente = $_POST['PrixVente'];
	$Qte = $_POST['Quantite'];
	echo($Qte);

    $preparedStatement = "UPDATE `Produit` SET CUP = ?, Description = ?, IDModele = :Mod, Nom = :Nom, NomCompagnie = :Comp, PrixCout = :PrixC, PrixVente = :PrixV, Quantite = :Qte, ImgPath = :Img WHERE ID = :ID";
    $stmt = $conn->prepare($preparedStatement);
    $stmt->bindParam(":CUP", $CUP);
	$stmt->bindParam(":Descr", $Description);
	$stmt->bindParam(":Mod", $Modele);
	$stmt->bindParam(":Nom", $Nom);
	$stmt->bindParam(":Comp", $Compagnie);
	$stmt->bindParam(":PrixC", $PrixCout);
	$stmt->bindParam(":PrixV", $PrixVente);
	$stmt->bindParam(":Qte", $Qte);
	$stmt->bindParam(":Img", $ImgPath);
	$stmt->bindParam(":ID", $formID);
    $stmt->execute();
?>