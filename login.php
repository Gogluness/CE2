<?php include "header.php" // Includes Login Script ?>
<?php
	include "db_connect.php"
?>
<?php
if(isset($_SESSION['login_user']))
{
   header('Location: ' . 'profile.php', true, $statusCode);
   die();
}	
?>
<?php
	$error=''; // Variable To Store Error Message
	if (isset($_POST['submit']))
	{
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
			$loginpassword = MD5($_POST['password']);
			$loginuser = $_POST['email'];
            try
            {
				$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$preparedStatement = "SELECT * FROM Users WHERE Password=':pass' AND (Email=':user' OR Username=':user')";
				$stmt = $conn->prepare($preparedStatement);
				$stmt->execute(array(':pass'=>$loginpassword,':user'=>$loginuser));
				$row = $stmt->Fetch();
				if (isset($row) AND !is_null($row) AND !empty($row))
				{
					$_SESSION['login_user'] = $loginuser;
					$expire = 365*24*3600;
					setcookie("nomUsager",$loginuser,time()+$expire);
					header('Location: ' . 'profile.php', true, $statusCode);
					die();
				}
				else {
					$error .= "L'email et le mot de passe ne correspondent pas \n";
				}
			}
			catch(PDOException $e)
			{
				$error = $e->getMessage();
			}
		}
	}
?>
<section>
	<div class="container outer-panel background-panel">
		<div class="col-md-10 col-md-offset-1 login-panel">
			<div class="col-md-10 col-md-offset-2 inner-panel">
				<form action="login.php" method="POST">
					<?php if(isset($error) AND !empty($error)) {?>
						<div class="col-md-12 l-error">
							<p><?php echo($error); ?><p>
						</div>
					<?php } ?>
					<div class="col-md-12">
						<h3>Identification</h3>
					</div>
					<div class="col-md-12">
						<div class="l-input-label col-md-3">Email</div>
						<input type="text" name="email" class="col-md-9 l-input with-label" placeholder="ex: mon@email.com">
					</div>
					<div class="col-md-12">
						<div class="l-input-label col-md-3">Mot de passe</div>
						<input type="password" name="password" class="col-md-9 l-input with-label">
					</div>
					<div class="col-md-12">
						<input type="submit" name="submit" value="Identifier" class="big-buttons col-md-12">
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<?php include "footer.php" ?>
