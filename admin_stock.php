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
    <th>Modele</th>
    <th>ID</th>
    <th>Nom</th>
    <th>Description</th>
    <th>Image</th>
    <th>PrixVente</th>
    <th>PrixCout</th>
    <th>Quantite en stock</th>
    <th>Compagnie</th>
    </tr>
  <?php


  class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() {
        return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() {
        echo "<tr>";
    }

    function endChildren() {
        echo "<td><a href='apple'>Edit</a></td></tr>" . "\n";
    }
}

$servername = "localhost";
$username = "root";
$password = "admin123";
$dbname = "CE2";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $preparedStatement = "SELECT * FROM Produit";
    if(!empty($Search) AND !is_null($Search))
    {
      $preparedStatement .= " WHERE CUP LIKE '%".$Search ."%' OR Nom LIKE '%".$Search."%'";
    }
    $stmt = $conn->prepare($preparedStatement);
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
        echo $v;
    }
    ?>
    <?php
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


<script>
$(document).ready(function() {

    $('#example tr').click(function() {
        var href = $(this).find("a").attr("href");
        if(href) {
            window.location = href;
        }
    });

});
</script>

<?php
include "footer.php"
?>