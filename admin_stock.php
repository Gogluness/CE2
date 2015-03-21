<?php
include "header.php" // Includes Login Script
?>

<?php
if(isset($_POST['submit']))
{
  $Search = $_POST['Search'];
  echo "<table id='example' style='border: solid 1px black;'>";
  ?>
    <tr>
    <th>CUP</th>
    <th>Nom</th>
    <th>Modele</th>
    <th>Description</th>
    <th>Compagnie</th>
    <th>Image</th>
    <th>PrixVente</th>
    <th>PrixCout</th>
    <th>Quantite en stock</th>
    <th></th>
    </tr>
  <?php

$servername = "localhost";
$username = "root";
$password = "admin123";
$dbname = "CE2";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $preparedStatement = "SELECT * FROM Produit";
    $stmt = $conn->prepare($preparedStatement);
    $stmt->execute();
    $rows = $stmt->FetchAll();

    // set the resulting array to associative
    foreach($rows as $row)
    {
        ?>
        <tr>

        <td> <?php echo($row['CUP']); ?> </td>
        <td> <?php echo($row['Nom']); ?> </td>
        <td> <?php echo($row['IDModele']); ?> </td>
        <td> <?php echo($row['Description']); ?> </td>
        <td> <?php echo($row['NomCompagnie']); ?> </td>
        <td> <img src="<?php echo($row['ImgPath']); ?>" ></td>
        <td> <?php echo($row['PrixVente']); ?> </td>
        <td> <?php echo($row['PrixCout']); ?> </td>
        <td> <?php echo($row['Quantite']); ?> </td>
        <td> <a href="localhost/modifier_stock.php?ID=<?php echo($row['ID']); ?>" >Edit</a></td>
        </tr>
        <?php
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
}
?> 
<form action="admin_stock.php" method="POST">
<input type="text" name="Search">
<input type="submit" name="submit">
</form>

<?php
include "footer.php"
?>