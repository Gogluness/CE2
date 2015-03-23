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
<div class="conatiner">
<div class="col-md-10 col-md-offset-1">

<?php
if(isset($_POST['submit']))
{
  $Search = $_POST['Search'];
  echo "<table class='table table-hover table-striped'> <tbody>";
  ?>
    <tr>
    <th>CUP</th>
    <th>Nom</th>
    <th>Modele</th>
    <th>Description</th>
    <th>Compagnie</th>
    <th>PrixVente</th>
    <th>PrixCout</th>
    <th>Quantite en stock</th>
    </tr>
  <?php

$servername = "localhost";
$username = "root";
$password = "admin123";
$dbname = "CE2";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $preparedStatement = "SELECT * FROM Produit WHERE `Nom` = :name";
    $stmt = $conn->prepare($preparedStatement);
    $stmt->execute(array(':name'=>$Search));
    $rows = $stmt->FetchAll();

    // set the resulting array to associative
    foreach($rows as $row)
    {
        ?>
        <tr onclick="window.location='formulaire_stock.php?ID=<?php echo($row["ID"]); ?>'">

        <td> <?php echo($row['CUP']); ?> </td>
        <td> <?php echo($row['Nom']); ?> </td>
        <td> <?php echo($row['IDModele']); ?> </td>
        <td> <?php echo($row['Description']); ?> </td>
        <td> <?php echo($row['NomCompagnie']); ?> </td>
        <td> <?php echo($row['PrixVente']); ?> </td>
        <td> <?php echo($row['PrixCout']); ?> </td>
        <td> <?php echo($row['Quantite']); ?> </td>
        </tr>
        <?php
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</tbody> </table>";
}
?>
</div> 
</div>
<div class="col-md-8 col-md-offset-2">
<form action="admin_stock.php" method="POST">
<input type="text" name="Search" class="l-input dark-input col-md-12">
<input type="submit" name="submit" value="Rechercher" class="big-buttons">
</form>
<a href="formulaire_stock.php" class="big-buttons"> Nouveau </a>
</div>
<?php } ?>
<?php
include "footer.php"
?>