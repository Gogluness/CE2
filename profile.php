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
		<section>
		<div class="container outer-panel background-panel">
			<div class="col-md-10 col-md-offset-1 login-panel">
			<div class="col-md-10 col-md-offset-2 inner-panel">
			<?php if(isset($error) AND !empty($error)) {?>
				<div class="col-md-12 login-error">
				<p><?php echo($error); ?><p>
				</div>

				<?php } ?>
				<div class="col-md-12">
					<h3>Modification</h3>
				</div>
				<div class="col-md-12 l-input dark-input">
				<h4>Informations personelles</h4>
				<form action="register.php" method="POST">
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
						<div class="l-input-label col-md-3">Email</div>
						<input type="email" name="email" class="col-md-9 l-input with-label"
						placeholder="ex: mon@email.com">
					</div>
									<div class="col-md-12">
					<input type="submit" name="submit_name" value="Mise a jour" class="big-buttons col-md-12">
				</div>
					</form>
					</div>
				<div class="col-md-12 l-input dark-input">
				<h4>Mot de passe</h4>
				<form action="register.php" method="POST">
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

