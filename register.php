<?php
session_start();
if(isset($_SESSION['login_user']))
{
   header('Location: ' . 'profile.php', true, $statusCode);
   die();
}	
    include "header.php" // Includes Login Script
?>
<?php

if (isset($_POST['submit']))
    {
    $error=''; // Variable To Store Error Message
    		if (empty($_POST['username']))
		{
			$error = "Nom d'utilisateur vide";
		}
		elseif (empty($_POST['password'])) 
		{
			$error = "Mot de passe vide";
		}
		elseif (empty($_POST['nom'])) 
		{
			$error = "Nom vide";
		}
		elseif (empty($_POST['prenom'])) 
		{
			$error = "Prenom vide";
		}
		else{
            $nom = stripslashes($_POST["nom"]);
            $prenom = stripslashes($_POST["prenom"]);
            $loginuser = stripslashes($_POST["email"]);
            $loginpassword = stripslashes($_POST["password"]);
            $confirmpassword = stripslashes($_POST["confirmPassword"]);

            if($loginpassword == $confirmpassword)
            {

            $servername = "localhost";
            $username = "root";
            $password = "admin123";
            $dbname = "CE2";

            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "INSERT INTO Users (Prenom, Nom, Username, Password) VALUES ('$prenom', '$nom', '$loginuser', '$loginpassword')";

            if (mysqli_query($conn, $sql)) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }

            mysqli_close($conn);
            header('Location: ' . 'profile.php', true, $statusCode);
			die();
        }
        else
        {
        	$error = "les mots de passe ne correspondent pas";
        }
    }
    }
		?>
		<section>
		<div class="container outer-panel">
			<div class="col-md-10 col-md-offset-1 login-panel">
			<div class="col-md-10 col-md-offset-2 inner-panel">
			<form action="register.php" method="POST">
			<?php if(isset($error) AND !empty($error)) {?>
				<div class="col-md-12 login-error">
				<p><?php echo($error); ?><p>
				</div>

				<?php } ?>
				<div class="col-md-12">
					<h3>Inscription</h3>
				</div>

				<div>
				<div class="col-md-6">
				<div class="login-input-label col-md-3">Prenom</div>
					<input type="text" name="prenom" class="login-input col-md-9"
					placeholder="ex: Jean">
				</div>
				<div class="col-md-6">
				<div class="login-input-label col-md-3">Nom</div>
					<input type="text" name="nom" class="col-md-9 login-input"
					placeholder="ex: Dit">
				</div>
				</div>

				<div class="col-md-12">
				<div class="login-input-label col-md-3">Email</div>
					<input type="email" name="email" class="col-md-9 login-input"
					placeholder="ex: mon@email.com">
				</div>

				<div class="col-md-12">
				<div class="login-input-label col-md-3">Mot de passe</div>
					<input type="password" name="password" class="col-md-9 login-input">
					<div class="login-input-label col-md-3">Confirmation</div>
					<input type="password" name="confirmPassword" class="col-md-9 login-input">
				</div>

				<div class="col-md-12">
					<input type="submit" name="submit" value="Inscrire" class="login-submit col-md-12">
				</div>
				</form>
			</div>
			</div>
			</div>
			</section>

<?php include "footer.php" ?>

