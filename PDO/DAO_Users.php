<?php
require_once("DAO.php");
include("objects/Users.php");
class DAO_Users extends DAO implements iMySqlDao
{
		static function GetAll(){
			$query = "SELECT * FROM USERS";
			$stmt = $conn->prepare($query);
			$stmt->setFetchMode(PDO::FETCH_CLASS, 'Users'); 
			$stmt->execute();
			// set the resulting array to associative
			$result = $stmt->fetch();
			return $result;
		}
		static function GetById($id){
			$query = "SELECT * FROM USERS WHERE ID = :id";
			$stmt = $conn->prepare($query);
			$stmt->setFetchMode(PDO::FETCH_CLASS, 'Users'); 
			$stmt->execute(array(':id' => $id));
			// set the resulting array to associative
			$result = $stmt->fetch();
			return $result;
		}
		static function GetByEmail($email){
			$query = "SELECT * FROM USERS WHERE EMAIL = :email";
			$stmt = $conn->prepare($query);
			$stmt->setFetchMode(PDO::FETCH_CLASS, 'Users'); 
			$stmt->execute(array(':email' => $email));;
			// set the resulting array to associative
			$result = $stmt->fetch();
			return $result;
		}
		static function Add($object)
		{
			if(is_a($object,'Users'))
			{
				$query = "INSERT INTO Users (`Prenom`, `Nom`, `Email`, `Password`) VALUES (?,?,?,PASSWORD(?)";
				$stmt = $conn->prepare($query);
				$stmt->execute(array($object->$Prenom, $object->$Nom, $object->$Email, $object->$Password);
				// set the resulting array to associative
			}
		}
		static function Remove($object)
		{
			if(is_a($object,'Users'))
			{
				$query = "DELETE FROM Users WHERE ID = ?";
				$stmt = $conn->prepare($query);
				$stmt->execute(array($object->$ID));;
				// set the resulting array to associative
			}
		}
		static function SearchByName($name){
			$query = "SELECT * FROM Users WHERE FIRSTNAME LIKE ? OR LASTNAME LIKE ?";
			$stmt = $conn->prepare($query);
			$result = $stmt->fetchAll(PDO::FETCH_CLASS, 'Users');
			$stmt->execute();
		}
}
?>