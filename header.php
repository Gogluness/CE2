<?php
@ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Accueil | Le gîte du cerf-volant</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->

		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.php">Le gîte du cerf-volant</a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<?php
									if(isset($_COOKIE["nomUsager"]))
									{
										echo "<li><a id='header-nom-usager'>Bonjour ".$_COOKIE['nomUsager']."</a></li>";
									}
									elseif(isset($_SESSION['login_user']))
									{
										echo "<li>Bonjour <a href='profile.php'>".$_SESSION['login_user']."</a></li>";
									}
								?>
								<li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Panier</a></li>
								<?php
									if(isset($_SESSION['login_user']))
									{ 
								?>
								<li><a href="profile.php"><i class="fa fa-user"></i> Compte</a></li>
								<?php 
									} 
									else {
								?>
								<li><a href="register.php"><i class="fa fa-pencil"></i> Inscription</a></li>
								<li><a href="login.php"><i class="fa fa-lock"></i> Connexion</a></li>
								<?php
									}
									if(isset($_SESSION['login_user']))
									{ 
								?>
								<li><a href="logout.php"><i class="fa fa-lock"></i> Déconnexion</a></li>
								<?php 
									} 
								?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.php" class="active">Accueil</a></li>
								<li class="dropdown"><a href="shop.php">Produits<i class="fa fa-angle-down"></i></a>
		                            			<ul role="menu" class="sub-menu">
		                                			<li><a href="shop.php">Liste des Produits</a></li>
									<li><a href="product-details.html">Promotions</a></li>  
									<li><a href="cart.php">Panier</a></li>  
		                            			</ul>
                                				</li> 
								<li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
				                    			<ul role="menu" class="sub-menu">
				                        			<li><a href="blog.html">Blog List</a></li>
										<li><a href="blog-single.html">Blog Single</a></li>
				                    			</ul>
                                				</li> 						
							</ul>
						</div>
					</div>
					<div class="col-sm-3 pull-right">
						<div class="search_box">
							<form method="post" action="search.php">
								<input name="recherche" type="text" placeholder="Recherche" class="col-sm-10"/>
								<button type="submit" class="btn btn-default search-box-btn">
									<span class="glyphicon glyphicon-search"></span>
								</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
