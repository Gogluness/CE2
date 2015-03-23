<?php
include "header.php" // Includes Login Script
?>
<?php
if(!isset($_SESSION['login_user']) && $_SESSION['login_user'] != "my@admin.com")
{
   echo "vous n'etes pas admin";
}
else
{  
?>
<?php
if (isset($_POST['submit']))
{
$file = fopen($_POST["EditorFile"], 'w');
// Open the file to get existing content
$current = $_POST["editor1"];
// Append a new person to the file
// Write the contents back to the file
fwrite($file, $current);
fclose($file);
}
?>

<div class="outer-panel">
<div class="container">
<div class="col-md-10 col-md-offset-1">
<form action="admin_accueil.php" method="POST">
<textarea name="editor1" id="editor1"><?php include "presentationEntreprise.txt" ?></textarea>
<input type="hidden" name="EditorFile" value="presentationEntreprise.txt">
<script>
    CKEDITOR.replace( 'editor1' );
</script>

	<div class="col-md-12">
		<input type="submit" name="submit" value="Sauvegarder" class="big-buttons col-md-12">
	</div>
	</form>
</div>
</div>
</div>
</section>

<?php } ?>
<?php
include "footer.php" // Includes Login Script
?>