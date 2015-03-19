<?php
	interface iMySqlDao
	{
		static function GetAll(){}
		static function GetById($id){}
		static function Add($object){}
		static function Remove($object){}
	}

	class DAO
	{
		protected $db;
		function __construct
		{
			$db = new PDO('mysql:host=localhost;dbname=CE2;charset=utf8', 'root', 'admin123');
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		}

		function DataToTable($Rows)
		{
			// open the table
			$str =  "<table wdith='100%'>\n";
			$str .= "<tr>\n";
			// add the table headers
			foreach ($Rows[0] as $key => $useless){
			    $str .= "<th>$key</th>";
			}
			$str .= "</tr>";
			// display data
			foreach ($Rows as $row){
			    $str .= "<tr>";
			    foreach ($row as $key => $val){
			        $str .= "<td>$val</td>";
			    }
			    $str .= "</tr>\n";
			}
			// close the table
			$str .= "</table>\n";
		}
	}
?>