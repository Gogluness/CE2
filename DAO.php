<?php
	class DAO
	{
		const $database ="CE2";
		const $servername ="localhost";
		const $dbuser = "root";
		const $dbpassword = "admin123";

		function INSERT ($table, string ...$Variables, string ...$Values)
		{
			$Variables = PREVENT_BAD_INJECTION($Variables);
			$Values = PREVENT_BAD_INJECTION($Values);
			$i = 0;
			$query = "INSERT INTO " . $table . "(";
			foreach ($Variables as $variable)
			{
				if($i != 0 )
				{
					$query .= "'";
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

		function PREVENT_BAD_INJECTION($Variables)
		{
			$i = 0;
			$tmp
			foreach($Variables ad $variable)
			{
				$tmp[$i] = stripslashes($variable);
				$tmp[$i] = mysql_real_escape_string($tmp[Si]);
			}

			return $tmp;
		}
	}
?>