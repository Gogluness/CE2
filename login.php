<?php
session_start();
if(isset($_SESSION['login_user']))
{
	   header('Location: ' . 'profile.php', true, $statusCode);
	   die();
	}
include "header.php" // Includes Login Script
?>

<?php
	$error=''; // Variable To Store Error Message
	if (isset($_POST['submit'])) {
		if (empty($_POST['username']))
		{
			$error = "Nom d'utilisateur vide";
		}
		elseif (empty($_POST['password'])) 
		{
			$error = "Mot de passe vide";
		}
		else
		{
			$servername = "localhost";
            $username = "root";
            $password = "admin123";
            $dbname = "CE2";
			// Define $username and $password
			$loginuser=$_POST['username'];
			$loginpassword=$_POST['password'];
			// Establishing Connection with Server by passing server_name, user_id and password as a parameter
			// Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            // Check connection
            if (!$conn) {
            	echo("not connecting");
                die("Connection failed: " . mysqli_connect_error());
            }
			// Selecting Database
			// SQL query to fetch information of registerd users and finds user match.
			$sql = "select * from Users where Password='$loginpassword' AND Username='$loginuser'";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
			    // output data of each row
			    while($row = $result->fetch_assoc()) {
			        echo "user: " . $row["Username"]. " - password: " . $row["Password"]. "<br>";
			        $_SESSION['login_user'] = $loginuser;
			    }
			} else {
			    echo "0 results";
			}
		}
		mysql_close($conn); // Closing Connection
	}
	else
	{
		?>

<section class="body-section">
<div class="main">
<div class="inner-main">
	<div class="social-icons">
		 <div class="col_1_of_f span_1_of_f"><a href="#">
		    <ul class='facebook'>
		    	<i class="fb"> </i>
		    	<li>Avec Facebook</li>
		    	<div class='clear'> </div>
		    </ul>
		    </a>
		 </div>	
		 <div class="col_1_of_f span_1_of_f"><a href="#">
		    <ul class='twitter'>
		      <i class="tw"> </i>
		      <li>Avec Twitter</li>
		      <div class='clear'> </div>
		    </ul>
		    </a>
		</div>
		<div class="clear"> </div>	
      </div>
      <h2>S'identifier</h2>
		<form action="login.php" method="POST">
		   <div class="lable-2">
		        <input name="username" type="text" class="text" value="votre@email.com " onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'votre@email.com ';}">
		        <input name="password" type="password" class="text" value="Mot de passe " onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Mot de passe ';}">
		   </div>
		   <div class="submit">
			  <input type="submit" name="submit" value="Identifier" >
		   </div>
		   <div class="clear"> </div>
		</form>
		<!-----//end-inner-main---->
		</div>
		<!-----//end-main---->
		</div>
		 <!-----start-copyright---->
   		<div class="copy-right">
			<p>Template by <a href="http://w3layouts.com">w3layouts</a></p> 
		</div>
				<!-----//end-copyright---->
</section>
		<?php
	}
?>

<?php include "footer.php"?>