<?php
include "header.php" // Includes Login Script
?>
<div class="outer-panel">
<div class="container">
<div class="col-md-10 col-md-offset-1">
<textarea name="editor1" id="editor1"><?php include "presentationEntreprise.txt" ?></textarea>
<script>
    CKEDITOR.replace( 'editor1' );
</script>
	<div class="col-md-12">
		<input type="button" name="btnGstUser" value="Gestion d'utilisateurs" class="big-buttons col-md-12">
	</div>
</div>
</div>
</div>
</section>


<?php
include "footer.php" // Includes Login Script
?>