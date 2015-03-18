
<?php
if(isset($_POST['btnSave'])
{
$file = fopen("../".$_POST["EditorFile"], 'w');
// Open the file to get existing content
$current = $_POST["editor1"];
// Append a new person to the file
// Write the contents back to the file
fwrite($file, $current);
fclose($file);
}
?>
