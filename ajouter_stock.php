<?php
include "header.php" // Includes Login Script
?>

<?php
	$sername = "localhost";
	$dbname = "CE2";
	$username = "root";
	$password = "admin123";
	$dir = "NEW/";

	$formID = $_POST['formID'];
	$ImgPath = $dir . $_FILES["fichier"]["name"];
	$CUP = $_POST['CUP'];
	$Description = $_POST['Description'];
	$Modele = $_POST['Modele'];
	$Nom = $_POST['Nom'];
	$Compagnie = $_POST['NomCompagnie'];
	$PrixCout = $_POST['PrixCout'];
	$PrixVente = $_POST['PrixVente'];
	$Qte = $_POST['Quantite'];
	try
	{
			$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $preparedStatement = "INSERT INTO `Produit`  (`CUP`,`Description`,`IDModele`,`Nom`,`NomCompagnie`,`PrixCout`,`PrixVente`,`Quantite`,`ImgPath`) VALUES (?,?,?,?,?,?,?,?,?)";
    $stmt = $conn->prepare($preparedStatement);
    $stmt->execute(array($CUP,$Description,$Modele,$Nom,$Compagnie,$PrixCout,$PrixVente,$Qte,$ImgPath));
    $conn=null;
	}
 catch(PDOException $e) {
 echo $e->getMessage();
 } 
?>
<section>
<div class="col-md-10 col-md-offset-1">
	<a href="admin_stock" class="big-buttons">Retour</a>
</div>
</section>
<?php
include "footer.php"
?>
