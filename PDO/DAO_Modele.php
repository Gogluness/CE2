<?php
require_once("DAO.php");
include("objects/Modele.php");
class DAO_Modele extends DAO implements iMySqlDao
{
		static function GetAll(){}
		static function GetById($id){}
		static function Add($object){}
		static function Remove($object){}
}
?>