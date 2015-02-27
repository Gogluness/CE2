
<?php
$prenom = $_POST["prenom"];
$nom = $_POST["nom"];
$username = $_POST["username"];
$password = $_POST["password"];
$confirmPassword = $_POST["confirmPassword"];

$servername = "205.236.12.52";
$username = "equipe3h15";
$password = "ebola-cerf";
$dbname = "equipe3h15";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO users (Prenom, Nom, Username, Password)
    VALUES ('$prenom', '$nom', '$username', '$password')";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Ajout de " . $nom . " " . $prenom . " username " . $username;
    }

    //email de confirmation d'inscription

catch(PDOException $e)
    {
    	echo "erreur de connexion";
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;

?>