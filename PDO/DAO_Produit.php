<?php
require_once("DAO.php");
include("objects/Produit.php");
class DAO_Produit extends DAO implements iMySqlDao
{
		static function GetAll(){
			$query = "SELECT *, ID FROM Produit";
			$stmt = $conn->prepare($query);
			$stmt->execute();
			// set the resulting array to associative
			$result = $stmt->fetchAll(PDO::FETCH_CLASS, 'Produit');
			return $result;
		}
		static function GetById($id){
			$query = "SELECT *, ID FROM Produit WHERE ID = :id";
			$stmt = $conn->prepare($query);
			$stmt->execute(array(':id' => $id));
			// set the resulting array to associative
			$result = $stmt->fetchAll(PDO::FETCH_CLASS, 'Produit');
			return $result;
		}
		static function GetByCup($CUP){
			$query = "SELECT *, ID FROM Produit WHERE CUP = :CUP";
			$stmt = $conn->prepare($query);
			$stmt->execute(array(':CUP' => $CUP));
			// set the resulting array to associative
			$result = $stmt->fetchAll(PDO::FETCH_CLASS, 'Produit');
			return $result;
		}
		static function Add($object)
		{
			if(is_a($object,'Produit'))
			{
				$query = "INSERT INTO Produit (`CUP`, `Description`, `ID`, `IDModele`,`ImgPath`,`Nom`,`NomCompagnie`,`PrixCout`,`PrixVente`,`Quantite`) VALUES (?,?,?,?,?,?,?,?,?,?)";
				$stmt = $conn->prepare($query);
				$stmt->execute(array(
					  $object->$CUP
					, $object->$Description
					, $object->$ID
					, $object->$IDModele
					, $object->$ImgPath
					, $object->$Nom
					, $object->$NomCompagnie
					, $object->$PrixCout
					, $object->$PrixVente
					, $object->$Quantite);
			}
		}
		static function Remove($object)
		{
			if(is_a($object,'Produit'))
			{
				$query = "DELETE FROM Produit WHERE ID = ?";
				$stmt = $conn->prepare($query);
				$stmt->execute(array($object->$ID));;
			}
		}

		static function Update($object)
		{
			if(is_a($object,'Produit'))
			{
				$query = "UPDATE Produit SET
					 CUP = :CUP
					,Description = :Descr
					,IDModele = :Modele
					,ImgPath = :Img
					,Nom = :Nom
					,NomCompagnie = :Compagnie
					,PrixCout = :PrixCout
					,PrixVente = :PrixVente
					,Quantite = :Quantite
				WHERE ID = :id";
				$stmt = $conn->prepare($query);
				$stmt->execute(array(
					 ':id' => $object->$id
					,':CUP' => $object->$CUP
					,':Descr' => $object->$Description
					,':Modele' => $object->$IDModele
					,':Img' => $object->$ImgPath
					,':Nom' => $object->$Nom
					,':Compagnie' => $object->$NomCompagnie
					,':PrixCout' => $object->$PrixCout
					,':PrixVente' => $object->$PrixVente
					,':Quantite' => $object->$Quantite);
			}
		}

		static function SearchByName($name){
			$query = "SELECT * , ID FROM Produit WHERE Name LIKE ?";
			$stmt = $conn->prepare($query);
			$stmt->bindValue(1, "%$name%", PDO::PARAM_STR);
			$stmt->execute();
			$result = $stmt->fetchAll(PDO::FETCH_CLASS, 'Produit');
		}
}
?>