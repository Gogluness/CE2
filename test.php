<HTML>
<HEAD>
<TITLE>Ajouter un joueur</TITLE>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<link rel='stylesheet' type='text/css' href='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
</HEAD>
<BODY>
<CENTER>
<div class="jumbotron">
  <h1>Ajouter un joueur</h1>
</CENTER>

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
$table = "Users"

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpassword);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO $table (Prenom, Nom, Username, Password)
    VALUES ('$prenom', '$nom', '$email', '$password')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Ajout du joueur " . $nom . " " . $prenom . " email " . $email;
    }
catch(PDOException $e)
    {
    	echo ("erreur de connexion");
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;

?>

</BODY>
</FOOT>
	<div class="panel panel-default">
	  <div class="panel-body">
	    	<?php
		include("Copyright.txt");
		?>
	  </div>
	</div>
<FOOT>
</HTML>