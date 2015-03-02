
<?php
$prenom = $_POST["prenom"];
$nom = $_POST["nom"];
$email = $_POST["email"];
$password = $_POST["password"];
$confirmPassword = $_POST["confirmPassword"];

$servername = "localhost";
$dbusername = "root";
$dbpassword = "admin123";
$dbname = "CE2";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpassword);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO Users (Prenom, Nom, Username, Password)
    VALUES ('$prenom', '$nom', '$email', '$password')";

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




<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['email']))
{
$error = "Email vide";
}
elseif (empty($_POST['password'])) 
{
$error = "Mot de passe vide";
}
else
{
// Define $username and $password
$prenom = $_POST["prenom"];
$nom = $_POST["nom"];
$email = $_POST["email"];
$password = $_POST["password"];
$confirmPassword = $_POST["confirmPassword"];

if($password === $confirmPassword)
{
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysql_connect("localhost", "root", "admin123");
// To protect MySQL injection for Security purpose
$email = stripslashes($email);
$prenom = stripslashes($prenom);
$nom = stripslashes($nom);
$password = stripslashes($password);
$confirmPassword = stripslashes($confirmPassword);
$email = mysql_real_escape_string($email);
$prenom = mysql_real_escape_string($prenom);
$nom = mysql_real_escape_string($nom);
$password = mysql_real_escape_string($password);
$confirmPassword = mysql_real_escape_string($confirmPassword);
// Selecting Database
$db = mysql_select_db("CE2", $connection);
// SQL query to fetch information of registerd users and finds user match.
$query = mysql_query("INSERT INTO Users (Prenom, Nom, Username, Password) VALUES ('$prenom', '$nom', '$email', '$password')", $connection);
$query = mysql_query("select * from Users where Password='$password' AND Username='$username'", $connection);
$rows = mysql_num_rows($query);
if ($rows == 1) {
$_SESSION['login_user']=$username; // Initializing Session
header("location: profile.php"); // Redirecting To Other Page
} else {
$error = "Username or Password is invalid";
}
}
else
{ $error = "Mot de passes pas identiques"}
mysql_close($connection); // Closing Connection
}
}
?>