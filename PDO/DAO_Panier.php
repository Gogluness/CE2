<?php
require_once("DAO.php");
include("objects/Panier.php");
class DAO_Panier extends DAO implements iMySqlDao
{
		static function GetAll(){}
		static function GetById($id){}
		static function Add($object){}
		static function Remove($object){}
}
?>