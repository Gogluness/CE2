<?php
include "header.php" // Includes Login Script
?>

<?PHP

// Fonction pour identifier le succès ou l'insuccès
function code($err_code)
{

	switch ($err_code)
	{
		case 0:
			echo "Code d'erreur 0: Televersement complete <br>";
			break;
		case 1:
			echo "C'est beaucoup trop de pression!!!<br>Code d'erreur 1: Fichier trop volumineux pour le serveur<br>";
			break;
		case 2:
			echo "C'est beaucoup trop de pression!!!<br>Code d'erreur 2: Fichier trop volumineux pour le formulaire<br>";
			break;
		case 3:
			echo "Code d'erreur 3: Televersement interompu <br>";
			break;
		case 4:
			echo "Code d'erreur 3: Televersement non complete <br>";
			break;
	}
}

function GetModele()
{
	$sername = "localhost";
	$dbname = "CE2";
	$username = "root";
	$password = "admin123";
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $preparedStatement = "SELECT * FROM Modele";
    $stmt = $conn->prepare($preparedStatement);
    $stmt->execute();
    $rows = $stmt->FetchAll();

    // set the resulting array to associative
    foreach($rows as $row)
    {
    	if($row['ID'] == $Modele)
    	{
    	?>
			<option value="<?php $row['ID'] ?>"><?php echo($row['NomModele']) ?></option>
    	<?php
    	}
    	else
    	{
    	?>
			<option selected value="<?php $row['ID'] ?>"><?php echo($row['NomModele']) ?></option>
    	<?php
    	}
    }
}
	
	if(isset($_GET["ID"]))
	{
		$ID = $_GET["ID"];
	}
	$sername = "localhost";
	$dbname = "CE2";
	$username = "root";
	$password = "admin123";
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $preparedStatement = "SELECT * FROM Produit WHERE ID = :ID";
    $stmt = $conn->prepare($preparedStatement);
    $stmt->execute(array(':ID' => $ID));
    $rows = $stmt->Fetch();

	$CUP = $rows['CUP'];
	$Description = $rows['Description'];
	$ImgPath = $rows['ImgPath'];
	$Modele = $rows['Modele'];
	$Nom = $rows['Nom'];
	$NomCompagnie = $rows['NomCompagnie'];
	$PrixCout = $rows['PrixCout'];
	$PrixVente = $rows['PrixVente'];
	$Qte = $rows['Quantite'];

if(isset($_POST['submit']))
{
	$sername = "localhost";
	$dbname = "CE2";
	$username = "root";
	$password = "admin123";
	$dir = "images/CerfVolantImages/NEW/";
	//si le fichier existe
	if (isset($_FILES["fichier"])){
		echo "Upload du fichier ". $_FILES["fichier"]["name"] . " en cours...<P>";
	}
	//copie du fichier du dossier temporaire au bon endroit
	if ( @copy($_FILES["fichier"]["tmp_name"],$dir.$_FILES["fichier"]["name"])){
		code($_FILES["fichier"]["error"]);
	}
	else {
		code($_FILES["fichier"]["error"]);
	}
	$ImgPath = $dir . $_FILES["fichier"]["name"];
	$CUP = $_POST['CUP'];
	$Description = $_POST['Description'];
	$Modele = $_POST['Modele'];
	$Nom = $_POST['Nom'];
	$NomCompagnie = $_POST['NomCompagnie'];
	$PrixCout = $_POST['PrixCout'];
	$PrixVente = $_POST['PrixVente'];
	$Qte = $_POST['Quantite'];

	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
?>


<section>
		<div class="container outer-panel background-panel">
			<div class="col-md-10 col-md-offset-1 login-panel">
			<div class="col-md-12 inner-panel">
	<form action="modifier_stock.php" method="POST" enctype="multipart/form-data">
		<div class="col-md-12">
		<div class="col-md-6">
					<img src="images/CerfVolantImages/<?php echo($ImgPath); ?>" height="50%" width="50%">
					</div>
							<div class="col-md-6">
		<input type="hidden" name="MAX_FILE_SIZE" value="2097153">
		<input type="file" name="fichier">
		</div>
		</div>
		<input type="hidden" name="ID">
		<div class="col-md-12">
			<div class="l-input-label col-md-3">CUP</div>	
			<input type="text" name="CUP" class="l-input with-label col-md-9" placeholder="XXXXXXXXXXX" value="<?php echo($CUP); ?>">
		</div>
		<div class="col-md-12">
			<textarea rows="8" name="Description" class="l-input">
			<?php 
				if(!is_null($Description) && !empty($Description)) 
				{
					echo ($Description);
				}
				else
				{
					echo "Veuillez entrer une description...";
				}
			?>
			</textarea>
		</div>
		<div class="col-md-12">
			<div class="l-input-label col-md-3">Modele</div>
			<select name="Modele" class="l-input with-label col-md-9">
			<?php GetModele(); ?>
			</select>
		</div>
		<div class="col-md-12">
			<div class="l-input-label col-md-3">Nom</div>
			<input type="text" name="Nom" class="l-input with-label col-md-9" value="<?php echo($Nom); ?>">
			</div>
		<div class="col-md-12">
			<div class="l-input-label col-md-3">Compagnie</div>
			<input type="text" name="NomCompagnie" class="l-input with-label col-md-9" value="<?php echo($NomCompagnie); ?>">
		</div>
		<div class="col-md-12">
			<div class="l-input-label col-md-3">Prix Coutant</div>
			<input type="text" name="PrixCout" class="l-input with-label col-md-9" placeholder="0.00$" value="<?php echo($PrixCout); ?>">
		</div>
		<div class="col-md-12">
			<div class="l-input-label col-md-3">Ptix Vente</div>
			<input type="text" name="PrixVente" class="l-input with-label col-md-9" placeholder="0.00$" value="<?php echo($PrixVente); ?>">
		</div>
		<div class="col-md-12">
			<div class="l-input-label col-md-3">Quantite</div>
			<input type="text" name="Quantite" class="l-input with-label col-md-9" value="<?php echo($Qte); ?>">
		</div>
			<input type="submit" name="submit" value="Envoyer" class="big-buttons">
	</form>
</div>
</div>
</div>
</section>
<?php
include "footer.php"
?>