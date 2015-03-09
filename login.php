<?php
include('loginbackend.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
header("location: profile.php");
}
include "header.php" // Includes Login Script
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
		<form>
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
<?php include "footer.php"?>