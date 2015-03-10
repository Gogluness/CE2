<?php include "header.php" // Includes Login Script ?>
<?php
if(isset($_SESSION['login_user']))
{
   header('Location: ' . 'profile.php', true, $statusCode);
   die();
}	
?>

<?php
	$error=''; // Variable To Store Error Message
	if (isset($_POST['submit'])) {
		if (empty($_POST['email']))
		{
			$error .= "Email vide \n";
		}
		elseif (empty($_POST['password'])) 
		{
			$error .= "Mot de passe vide \n";
		}
		else
		{
			$servername = "localhost";
            $username = "root";
            $password = "admin123";
            $dbname = "CE2";
			// Define $username and $password
			$loginuser= stripslashes($_POST['email']);
			$loginpassword=stripslashes($_POST['password']);
			// Establishing Connection with Server by passing server_name, user_id and password as a parameter
			// Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            // Check connection
            if (!$conn) {
            	$error.="not connecting\n";
                die("Connection failed: " . mysqli_connect_error());
            }
			// Selecting Database
			// SQL query to fetch information of registerd users and finds user match.
			$sql = "select * from Users where Password='$loginpassword' AND Username='$loginuser'";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
			    // output data of each row
			    while($row = $result->fetch_assoc()) {
			        echo "user: " . $row["Username"]. " - password: " . $row["Password"]. "<br>";
			        $_SESSION['login_user'] = $loginuser;
			    }
			                header('Location: ' . 'profile.php', true, $statusCode);
			die();
			} else {
			    $error .= "L'email et le mot de passe ne correspondent pas \n";
			}
		}
		mysql_close($conn); // Closing Connection
	}
		?>
		<section>
		<div class="container outer-panel">
			<div class="col-md-10 col-md-offset-1 login-panel">
			<div class="col-md-10 col-md-offset-2 inner-panel">
			<form action="login.php" method="POST">
							<?php if(isset($error) AND !empty($error)) {?>
				<div class="col-md-12 login-error">
				<p><?php echo($error); ?><p>
				</div>

				<?php } ?>
				<div class="col-md-12">
					<h3>Identification</h3>
				</div>

				<div class="col-md-12">
				<div class="login-input-label col-md-3">Email</div>
					<input type="email" name="email" class="col-md-9 login-input"
					placeholder="ex: mon@email.com">
				</div>

				<div class="col-md-12">
				<div class="login-input-label col-md-3">Mot de passe</div>
					<input type="password" name="password" class="col-md-9 login-input">
				</div>

				<div class="col-md-12">
					<input type="submit" name="submit" value="Identifier" class="login-submit col-md-12">
				</div>
				</form>
			</div>
			</div>
			</div>
			</section>

<?php include "footer.php"?>
