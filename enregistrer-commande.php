<?php
session_start();

$link = mysql_connect('localhost','root','admin123') or die("Impossible de se connecter à la base de données");
mysql_set_charset('utf8',$link);
mysql_select_db('CE2') or die("Impossible de lire les informations de la base de données");

$email = $_SESSION['login_user'];

$queryGetUser = "SELECT * FROM Users WHERE Email ='$email';";
$executionRequeteUser = mysql_query($queryGetUser);
$userRetour = mysql_fetch_array($executionRequeteUser);

$username = $userRetour["Username"];

$queryInsererCommande = "INSERT INTO Commande (username) VALUES ('$username')";
mysql_query($queryInsererCommande);

mysql_close();
?>
<?php
$link = mysql_connect('localhost','root','admin123') or die("Impossible de se connecter à la base de données");
mysql_set_charset('utf8',$link);
mysql_select_db('CE2') or die("Impossible de lire les informations de la base de données");

$queryGetNoCommande = "SELECT noCommande FROM Commande WHERE username = '$username' ORDER BY dateCommande DESC LIMIT 1;";
$executionRequete = mysql_query($queryGetNoCommande);
$retourReqete = mysql_fetch_array($executionRequete);

$noCommande = $retourReqete[0];

$panier = $_SESSION['panier'];

foreach ($panier as $IDProduit => $produitPanier)
{
	$quantite = $produitPanier['Quantite'];

	$queryInsertProduitPanier = "INSERT INTO CommandeProduits(NoCommande, idProduit, Quantite) 
				     VALUES ($noCommande, $IDProduit, $quantite);";

	mysql_query($queryInsertProduitPanier);	

	$queryUpdateQuantite = "UPDATE Produit SET Quantite = (Quantite - $quantite) WHERE ID = $IDProduit"; 
	mysql_query($queryUpdateQuantite);	
}

mysql_close();
?>

