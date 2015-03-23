<?php include "header.php" // Includes Login Script ?>
<?php
if(isset($_SESSION['login_user']))
{
   header('Location: ' . 'profile.php', true, $statusCode);
   die();
}	
?>
<?php

if (isset($_POST['submit']))
    {
    $error=''; // Variable To Store Error Message
		if (empty($_POST['email']))
		{
			$error .= "Email vide \n";
		}
		elseif (empty($_POST['password'])) 
		{
			$error .= "Mot de passe vide \n";
		}
		elseif (empty($_POST['nom'])) 
		{
			$error .= "Nom vide \n";
		}
		elseif (empty($_POST['prenom'])) 
		{
			$error .= "Prenom vide \n";
		}
		else{
            $nom = $_POST["nom"];
            $prenom = $_POST["prenom"];
            $loginuser = $_POST["username"];
	    $email = $_POST["email"];
            $loginpassword = $_POST["password"];
            $confirmpassword = $_POST["confirmPassword"];
	    $adresse = $_POST["adresse"];
	    $codePostal = $_POST["codePostal"];
	    $ville = $_POST["ville"];


            if($loginpassword == $confirmpassword)
            {
	            $servername = "localhost";
	            $username = "root";
	            $password = "admin123";
	            $dbname = "CE2";
	            try
	            {
					$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
			    	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			    	$preparedStatement = "SELECT * FROM Users WHERE Password=':pass' AND Username=':user'";
			    	$stmt = $conn->prepare($preparedStatement);
			    	$stmt->execute(array(':pass'=>$loginpassword));
	    			$row = $stmt->Fetch();
	    			if(!is_null($row))
	    			{

				    	$preparedStatement = "INSERT INTO Users (`Nom`, `Prenom`, `Email`, `Password`, `Adresse`, `CodePostal`, `Ville`, `Username`) VALUES (?,?,?,?,?,?,?,?)";
				    	$stmt = $conn->prepare($preparedStatement);
				    	$stmt->execute(array($nom,$prenom,$email,MD5($loginpassword),$adresse, $codePostal, $ville, $loginuser));
				    	$conn=null;
					$expire = 365*24*3600;
					setcookie("nomUsager",$nom,time()+$expire);
			            
			            	header('Location: ' . 'profile.php', true, $statusCode);
					die();
				}
				else
				{
					$error = "un utilisateur usilise deja cet email";
				}
			}
		 	catch(PDOException $e) 
		 	{
				$error = $e->getMessage();
			} 
	        }
	        else
	        {
	        	$error .= "les mots de passe ne correspondent pas \n";
	        }
    	}
    }
?>
		<section>
		<div class="container outer-panel background-panel">
			<div class="col-md-10 col-md-offset-1 login-panel">
			<div class="col-md-10 col-md-offset-2 inner-panel">
			<form action="register.php" method="POST">
			<?php if(isset($error) AND !empty($error)) {?>
				<div class="col-md-12 login-error">
				<p><?php echo($error); ?><p>
				</div>

				<?php } ?>
				<div class="col-md-12">
					<h3>Déjà inscrit? <a href="login.php">Connectez-vous!</a></h3>
				</div>
				<div class="col-md-12">
					<h3>Inscription</h3>
				</div>

				<div>
				<div class="col-md-6">
				<div class="l-input-label col-md-3">Prenom</div>
					<input type="text" name="prenom" class="l-input with-label col-md-9"
					placeholder="ex: Jean">
				</div>
				<div class="col-md-6">
				<div class="l-input-label col-md-3">Nom</div>
					<input type="text" name="nom" class="col-md-9 l-input with-label"
					placeholder="ex: Dit">
				</div>
				</div>

				<div class="col-md-12">
				<div class="l-input-label col-md-3">Adresse</div>
					<input type="text" name="adresse" class="col-md-9 l-input with-label"
					placeholder="ex: 1010 rue de gauche">
				</div>

				<div class="col-md-6">
				<div class="l-input-label col-md-3">ville</div>
					<input type="text" name="ville" class="col-md-9 l-input with-label"
					placeholder="ex: Québec">
				</div>

				<div class="col-md-6">
				<div class="l-input-label col-md-5">Code postal</div>
					<input type="text" name="codePostal" class="col-md-7 l-input with-label"
					placeholder="ex: A1A 1A1">
				</div>

				<div class="col-md-12">
				<div class="l-input-label col-md-3">Nom d'utilisateur</div>
					<input type="text" name="username" class="col-md-9 l-input with-label"
					placeholder="ex: jeandit">
				</div>

				<div class="col-md-12">
				<div class="l-input-label col-md-3">Email</div>
					<input type="email" name="email" class="col-md-9 l-input with-label"
					placeholder="ex: mon@email.com">
				</div>

				<div class="col-md-12">
				<div class="l-input-label col-md-3">Mot de passe</div>
					<input type="password" name="password" class="col-md-9 l-input with-label">
					<div class="l-input-label col-md-3">Confirmation</div>
					<input type="password" name="confirmPassword" class="col-md-9 l-input with-label">
				</div>

				<div class="col-md-12">
					<input type="submit" name="submit" value="S'inscrire" class="big-buttons col-md-12">
				</div>
				</form>
			</div>
			</div>
			</div>
			</section>

<?php include "footer.php" ?>

