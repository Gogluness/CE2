<?php
require_once("DAO.php");
include("objects/Panier.php");
include("objects/LignePanier.php");
class DAO_Panier extends DAO implements iMySqlDao
{
		static function GetAll(){
			$query = "SELECT * FROM Panier";
			$stmt = $conn->prepare($query);
			$stmt->execute();
			// set the resulting array to associative
			$result = $stmt->fetchAll(PDO::FETCH_CLASS, 'Panier');
			return $result;
		}
		static function GetById($id){
			$query = "SELECT * FROM Panier WHERE ID = :id";
			$stmt = $conn->prepare($query);
			$stmt->execute(array(':id' => $id));;
			// set the resulting array to associative
			$result = $stmt->fetchAll(PDO::FETCH_CLASS, 'Panier');
			return $result;
		}
		static function GetByCup($CUP){
			$query = "SELECT * FROM Panier WHERE CUP = :CUP";
			$stmt = $conn->prepare($query);
			$stmt->execute(array(':CUP' => $CUP));;
			// set the resulting array to associative
			$result = $stmt->fetchAll(PDO::FETCH_CLASS, 'Panier');
			return $result;
		}
		static function Add($object)
		{
			if(is_a($object,'Panier'))
			{
				$query = "INSERT INTO Panier (`Client`) VALUES (?)";
				$stmt = $conn->prepare($query);
				$stmt->execute(array(
					  $object->$Client));

				foreach($LignePanier as $ligne)
				{
					$query = "INSERT INTO Panier (`Client`) VALUES (?)";
					$stmt = $conn->prepare($query);
					$stmt->execute(array(
					$object->$Client));
			}
		}
		static function Remove($object)
		{
			if(is_a($object,'Panier'))
			{
				$query = "DELETE FROM Panier WHERE ID = ?";
				$stmt = $conn->prepare($query);
				$stmt->execute(array($object->$Email));;
				// set the resulting array to associative
			}
		}
}
?>