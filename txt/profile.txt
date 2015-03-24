<?php include "header.php" // Includes Login Script ?>
<?php
	include "db_connect.php"
?>
<?php
if(!isset($_SESSION['login_user']))
{
   header('Location: ' . 'register.php', true, $statusCode);
   die();
}	
?>
<?php

$loginuser = $_SESSION['login_user'];
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$preparedStatement = "SELECT * FROM `Users` WHERE `Email`=:user";
$stmt = $conn->prepare($preparedStatement);
$stmt->execute(array(':user'=>$loginuser));
$row = $stmt->Fetch();
if (!is_null($row))
{
	$prenom = $row['Prenom'];
	$nom = $row['Nom'];
	$lusername = $row['Username'];
	$lpassword = $row['Password'];
	$email = $row['Email'];
	$adresse = $row['Adresse'];
	$ville = $row['Ville'];
	$codepostal = $row['CodePostal'];
}
$error="";
$success="";
if(isset($_POST['submit_name']))
{
	if (empty($_POST['username']))
	{
		$error .= "Nom utilisateur vide \n";
	}
	elseif (empty($_POST['nom'])) 
	{
		$error .= "Nom vide \n";
	}
	elseif (empty($_POST['prenom'])) 
	{
		$error .= "Prenom vide \n";
	}
	else
	{
		$preparedStatement = "UPDATE `Users` SET `Prenom` = ?, `Nom` = ?, `Username` = ? WHERE `Email` = ?";
	    $stmt = $conn->prepare($preparedStatement);
	    $stmt->execute(array($_POST['prenom'],$_POST['nom'],$_POST['username'],$loginuser));
		$preparedStatement = "SELECT * FROM `Users` WHERE `Email`=:user";
		$stmt = $conn->prepare($preparedStatement);
		$stmt->execute(array(':user'=>$loginuser));
		$row = $stmt->Fetch();
		if (!is_null($row))
		{
			$prenom = $row['Prenom'];
			$nom = $row['Nom'];
			$lusername = $row['Username'];
			$email = $row['Email'];
			$adresse = $row['Adresse'];
			$ville = $row['Ville'];
			$codepostal = $row['CodePostal'];
			$lpassword = $row['Password'];
		}
		$success = "mise a jour des informations personelles avec succes";
	}
}

if(isset($_POST['submit_addr']))
{
	if (empty($_POST['adresse']))
	{
		$error .= "Adresse vide\n";
	}
	elseif (empty($_POST['codepostal'])) 
	{
		$error .= "Code postal vide \n";
	}
	elseif (empty($_POST['ville'])) 
	{
		$error .= "Ville vide \n";
	}
	else
	{
		$preparedStatement = "UPDATE `Users` SET `Ville` = ?, `CodePostal` = ?, `Adresse` = ? WHERE `Email` = ?";
	    $stmt = $conn->prepare($preparedStatement);
	    $stmt->execute(array($_POST['ville'],$_POST['codepostal'],$_POST['adresse'],$loginuser));
    	$preparedStatement = "SELECT * FROM `Users` WHERE `Email`=:user";
		$stmt = $conn->prepare($preparedStatement);
		$stmt->execute(array(':user'=>$loginuser));
		$row = $stmt->Fetch();
		if (!is_null($row))
		{
			$prenom = $row['Prenom'];
			$nom = $row['Nom'];
			$lusername = $row['Username'];
			$email = $row['Email'];
			$adresse = $row['Adresse'];
			$ville = $row['Ville'];
			$codepostal = $row['CodePostal'];
			$lpassword = $row['Password'];
		}
		$success = "mise a jour de l'adresse avec succes";
	}
}

if(isset($_POST['submit_pass']))
{
	$oldpass = $_POST['oldpass'];
	$newpassword = $_POST['newpassword'];
	$confirmpass = $_POST['confirmpass'];
	$oldpass = MD5($oldpass);
	if($oldpass == $lpassword)
	{
		if(!is_null($newpassword) AND !empty($newpassword))
		{
			if($_POST['newpassword'] == $_POST['confirmpass'])
			{
				$preparedStatement = "UPDATE `Users` SET `Password` = ? WHERE `Email` = ?";
		    	$stmt = $conn->prepare($preparedStatement);
		    	$stmt->execute(array(MD5($newpassword),$loginuser));

	    		$preparedStatement = "SELECT * FROM `Users` WHERE `Email`=:user";
				$stmt = $conn->prepare($preparedStatement);
				$stmt->execute(array(':user'=>$loginuser));
				$row = $stmt->Fetch();
				if (!is_null($row))
				{
					$prenom = $row['Prenom'];
					$lpassword = $row['Password'];
					$nom = $row['Nom'];
					$lusername = $row['Username'];
					$email = $row['Email'];
					$adresse = $row['Adresse'];
					$ville = $row['Ville'];
					$codepostal = $row['CodePostal'];
				}
				$success = "mise a jour du mot de passe avec succes";
	    	}
	    	else
	    	{
	    		$error .= "Les nouveaux mots de passe ne correspondent pas";
	    	}
    	}
    	else
    	{
    		$error .= "Le mot de passe est vide";
    	}
	}
	else
	{
		$error .= "Le mot de passe actuel est incorrecte";
	}
}
?>
		<section>
		<div class="container outer-panel background-panel">
			<div class="col-md-10 col-md-offset-1 login-panel">
			<div class="col-md-10 col-md-offset-2 inner-panel">
			<?php if(isset($error) AND !empty($error)) {?>
				<div class="col-md-12 l-error">
				<p><?php echo($error); ?><p>
				</div>

				<?php } ?>
				<?php if(isset($success) AND !empty($success)) {?>
				<div class="col-md-12 l-success">
				<p><?php echo($success); ?><p>
				</div>

				<?php } ?>
				<div class="col-md-12">
					<h3>Modification</h3>
				</div>
				<div class="col-md-12 l-input dark-input">
					<h4>Informations personelles</h4>
					<form action="profile.php" method="POST">
						<div>
							<div class="col-md-6">
							<div class="l-input-label col-md-4">Prenom</div>
								<input type="text" name="prenom" class="l-input with-label col-md-8"
								placeholder="ex: Jean" value="<?php echo($prenom); ?>">
							</div>
							<div class="col-md-6">
								<div class="l-input-label col-md-3">Nom</div>
								<input type="text" name="nom" class="col-md-9 l-input with-label"
								placeholder="ex: Dit" value="<?php echo($nom); ?>">
							</div>
						</div>
						<div class="col-md-12">
							<div class="l-input-label col-md-3">Nom utilisateur</div>
							<input type="text" name="username" class="col-md-9 l-input with-label"
							placeholder="ex: Toto" value="<?php echo($lusername); ?>">
						</div>

						<div class="col-md-12">
							<input type="submit" name="submit_name" value="Mise a jour" class="big-buttons col-md-12">
						</div>
					</form>
				</div>



				<div class="col-md-12 l-input dark-input">
					<h4>Adresse</h4>
					<form action="profile.php" method="POST">
						<div>
							<div class="col-md-12">
							<div class="l-input-label col-md-3">Adresse</div>
								<input type="text" name="adresse" class="col-md-9 l-input with-label"
								placeholder="ex: 1010 rue de gauche" value="<?php echo($adresse); ?>">
							</div>

							<div class="col-md-6">
							<div class="l-input-label col-md-3">ville</div>
								<input type="text" name="ville" class="col-md-9 l-input with-label"
								placeholder="ex: Québec" value="<?php echo($ville); ?>">
							</div>

							<div class="col-md-6">
							<div class="l-input-label col-md-5">Code postal</div>
								<input type="text" name="codepostal" class="col-md-7 l-input with-label"
								placeholder="ex: A1A 1A1" value="<?php echo($codepostal); ?>">
							</div>
							<div class="col-md-12">
								<input type="submit" name="submit_addr" value="Mise a jour" class="big-buttons col-md-12">
							</div>
						</div>
					</form>
				</div>




				<div class="col-md-12 l-input dark-input">
					<h4>Mot de passe</h4>
					<form action="profile.php" method="POST">
						<div class="col-md-12">
							<div class="l-input-label col-md-3">Ancien</div>
							<input type="password" name="oldpass" class="col-md-9 l-input with-label">
							<div class="l-input-label col-md-3">Nouveau</div>
							<input type="password" name="newpassword" class="col-md-9 l-input with-label">
							<div class="l-input-label col-md-3">Confirmation</div>
							<input type="password" name="confirmpass" class="col-md-9 l-input with-label">
						</div>

						<div class="col-md-12">
							<input type="submit" name="submit_pass" value="Mise a jour" class="big-buttons col-md-12">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>

<?php include "footer.php" ?>

