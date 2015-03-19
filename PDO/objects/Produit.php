<?php
class Produit
{
	public $CUP;
	public $Description;
	public $ID;
	public $modele;
	public $ImgPath;
	public $Nom;
	public $NomCompagnie;
	public $PrixCout;
	public $PrixVente;
	public $Quantite;
	public $Grandeur;
	public $Vent;
	public $Tissus;
	public $Armature;
	public $Emballage;
	public $Cordes;
	public $Poids;

	static function GetById($id){
		$query = "SELECT * FROM Produit WHERE ID = :id";
		$stmt = $conn->prepare($query);
		$stmt->execute(array(':id' => $id));;
		// set the resulting array to associative
		$result = $stmt->fetchAll(PDO::FETCH_CLASS, 'Produit');
		return $result;
	}
}
?>

