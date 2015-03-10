<?php

	class DAO
	{
		const $database ="CE2";
		const $servername ="localhost";
		const $dbuser = "root";
		const $dbpassword = "admin123";

		/*function INSERT_INTO ($table, array $Variables, array $Values)
		{
			$Variables = PREVENT_BAD_INJECTION($Variables);
			$Values = PREVENT_BAD_INJECTION($Values);
			$i = 0;
			$query = "INSERT INTO " . $table . "(";
			foreach ($Variables as $variable)
			{
				if($i != 0 )
				{
					$query .= ",";
				}
				$query .= "`" . $variable . "`";
			}
			$query .= ") VALUES ("

			$i = 0;
			foreach ($Values as $value)
			{
				if($i != 0 )
				{
					$query .= "'";
				}
				$query .= $value;
			}
			$query .= ")"
		}

		function SELECT_WHERE_CLAUSE($table, $WhereInput, array $Variables)
		{
			//$WhereInput est un tableau de clees valeurs
			$where = array();
			if (!empty($) && is_array($WhereInput)) 
			{
    			foreach ($WhereInput as $key => $value) 
    			{
        		$where[] = $key . " = " . $value;
			    }
			}


			$query = "SELECT"



			if($Variables == null)
			{
				$query .= ' * '
			}
			else
			{
				$Variables = PREVENT_BAD_INJECTION($Variables);
				$i = 0;
				foreach ($Variables as $variable)
				{
					if($i != 0 )
					{
						$query .= ",";
					}
					$query .= "`" . $variable . "`";
				}
			}
			$query .= 'FROM ' . $table;

			if (!empty($where))
			{
			    $query .= sprintf(' WHERE %s', implode('AND ', $where));
			}

			$query = PREVENT_BAD_INJECTION($query);
		}*/

		/*protected function PREVENT_BAD_INJECTION(string &...$Variables)
		{
			$i = 0;
			$tmp
			foreach($Variables ad $variable)
			{
				$tmp[$i] = stripslashes($variable);
				$tmp[$i] = mysql_real_escape_string($tmp[Si]);
			}
			return $tmp;
		}*/

		function PREVENT_BAD_INJECTION($Variables)
		{
			$tmp
				$tmp = stripslashes($variable);
				$tmp = mysql_real_escape_string($tmp);
			}
			return $tmp;
		}



	/*}*/
?>