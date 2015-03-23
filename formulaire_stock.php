<?php
include "header.php" // Includes Login Script
?>
<?php
	include "db_connect.php"
?>
<?php
if(!isset($_SESSION['login_user']) && $_SESSION['login_user'] != "my@admin.com")
{
   echo "vous n'etes pas admin";
}
else
{  

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

function GetModele($Modele)
{
	include "db_connect.php";
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $preparedStatement = "SELECT ID, NomModele FROM Modele";
    $stmt = $conn->prepare($preparedStatement);
    $stmt->execute();
    $rows = $stmt->FetchAll();
    // set the resulting array to associative
    foreach($rows as $row)
    {
    	if($row['ID'] == $Modele)
    	{
    	?>
			<option selected value='<?php echo($row['ID']) ?>'><?php echo($row['NomModele']) ?></option>
    	<?php
    	}
    	else
    	{
    	?>
			<option value='<?php echo($row['ID']) ?>'><?php echo($row['NomModele']) ?></option>
    	<?php
    	}
    }
    $conn = null;
}
	
	if(isset($_GET["ID"]))
	{
		$ID = $_GET["ID"];
	}
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $preparedStatement = "SELECT * FROM Produit WHERE ID = :ID";
    $stmt = $conn->prepare($preparedStatement);
    $stmt->execute(array(':ID' => $ID));
    $rows = $stmt->Fetch();

	$CUP = $rows['CUP'];
	$Description = $rows['Description'];
	$ImgPath = $rows['ImgPath'];
	$Modele = $rows['IDModele'];
	$Nom = $rows['Nom'];
	$NomCompagnie = $rows['NomCompagnie'];
	$PrixCout = $rows['PrixCout'];
	$PrixVente = $rows['PrixVente'];
	$Qte = $rows['Quantite'];
	$conn = null;
?>


<section>
		<div class="container outer-panel background-panel">
			<div class="col-md-10 col-md-offset-1 login-panel">
			<div class="col-md-12 inner-panel">	<?php 
				if(isset($_GET["ID"]))
				{
					?>
					<form action="modifier_stock.php" method="POST" enctype="multipart/form-data">
					<?php
				}
				else
				{
					?>
					<form action="ajouter_stock.php" method="POST" enctype="multipart/form-data">
					<?php
				}
			?> 
		<div class="col-md-12">
		<div class="col-md-12 l-input dark-input">
		<div class="col-md-6">
					<img src="images/CerfVolantImages/<?php echo($ImgPath); ?>" height="50%" width="50%">
					</div>
							<div class="col-md-6">
		<input type="hidden" name="MAX_FILE_SIZE" value="2097153">
		<input type="file" name="fichier">
		</div>
		</div>
		</div>
		<input type="hidden" name="formID" value="<?php echo($_GET['ID']); ?>">
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
			<?php GetModele($Modele);?>
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
		<?php 
			if(isset($_GET["ID"]))
			{
				?>
				<input type="submit" name="submit" value="Modifier" class="big-buttons">
				<?php
			}
			else
			{
				?>
				<input type="submit" name="submit" value="Ajouter" class="big-buttons">
				<?php
			}
		?>
	</form>
</div>
</div>
</div>
</section>
<?php } ?>
<?php
include "footer.php"
?>