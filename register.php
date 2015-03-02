
<?php
$prenom = $_POST["prenom"];
$nom = $_POST["nom"];
$email = $_POST["username"];
$password = $_POST["password"];
$confirmPassword = $_POST["confirmPassword"];

$servername = "localhost";
$username = "root";
$password = "admin123";
$dbname = "CE2";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO Users (Prenom, Nom, Username, Password)
    VALUES ('$prenom', '$nom', '$username', '$password')";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Ajout de " . $nom . " " . $prenom . " username " . $email;
    }

    //email de confirmation d'inscription

catch(PDOException $e)
    {
    	echo "erreur de connexion";
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;

?>