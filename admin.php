<?php
include "header.php" // Includes Login Script
?>
<section>
<div class="outer-panel">
<div class="container">
<div class="col-md-8 col-md-offset-2">
	<div class="col-md-12">
		<input type="button" onclick="location.href='admin_compte.php'" name="btnGstCompte" value="Gestion du compte administrateur" class="big-buttons col-md-12">
	</div>
	<div class="col-md-12">
		<input type="button" onclick="location.href='admin_accueil.php'" name="btnGstAccueil" value="Gestion de l'accueil" class="big-buttons col-md-12">
	</div>
	<div class="col-md-12">
		<input type="button" onclick="location.href='admin_stock.php'" name="btnGstStock" value="Gestion de stock" class="big-buttons col-md-12">
	</div>
	<div class="col-md-12">
		<input type="button" onclick="location.href='admin_users.php'" name="btnGstUser" value="Gestion d'utilisateurs" class="big-buttons col-md-12">
	</div>
</div>
</div>
</div>
</section>
<?php
include "footer.php" // Includes Login Script
?>