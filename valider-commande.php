<?php include "header.php"?>

<?php 
	if(!isset($_SESSION['login_user']))
	{
		header('Location: ' . 'register.php', true, $statusCode);
   		die();
	}
	else
	{
		include "objects/Users.php";
		$link = mysql_connect('localhost','root','admin123') or die("Impossible de se connecter à la base de données");
		mysql_set_charset('utf8',$link);
		mysql_select_db('CE2') or die("Impossible de lire les informations de la base de données");

		$email = $_SESSION['login_user'];

		$queryGetUser = "SELECT * FROM Users WHERE Email ='$email';";
		$executionRequeteUser = mysql_query($queryGetUser);
		$userRetour = mysql_fetch_array($executionRequeteUser);

		$user = new Users();
		$user->Nom = $userRetour["Nom"];
		$user->Prenom = $userRetour["Prenom"];
		$user->Adresse = $userRetour["Adresse"];
		$user->CodePostal = $userRetour["CodePostal"];
		$user->Ville = $userRetour["Ville"];
		
		mysql_close();
	}
?>

<?php
	$panier = array();
	$prixTotal = 0;

	if(isset($_SESSION['panier']))
	{
		$listeQuantite = $_REQUEST["stringQuantity"];
		$tableauQuantite = explode("&",$listeQuantite);

		include "objects/LignePanier.php";
		$link = mysql_connect('localhost','root','admin123') or die("Impossible de se connecter à la base de données");
		mysql_set_charset('utf8',$link);
		mysql_select_db('CE2') or die("Impossible de lire les informations de la base de données");

		$arrayProduits = $_SESSION['panier'];

		foreach ($arrayProduits as $IDProduit => $produitPanier)
		{
			$queryGetProduit = "SELECT * FROM Produit WHERE ID = $IDProduit;";
			$executionRequeteProduit = mysql_query($queryGetProduit);
			$produitRetour = mysql_fetch_array($executionRequeteProduit);

			$lignePanier = new LignePanier();
			$lignePanier->Nom = $produitRetour["Nom"];
			$lignePanier->Prix = $produitRetour["PrixVente"];
			$lignePanier->ImgPath = $produitRetour["ImgPath"];
			$lignePanier->ID = $produitRetour["ID"];
			$lignePanier->Qte = $produitPanier['Quantite'];

			array_push($panier, $lignePanier);
		}

		mysql_close();

	}
?>

<section id="cart_items">
		<div class="container">
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Article</td>
							<td class="description"></td>
							<td class="price">Prix</td>
							<td class="quantity">Quantité</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
					<?php 
						foreach ($panier as $ligne)
						{
					?><!--Debut foreach-->
						<tr>
							<td class="cart_product">
								<a href="">
									<?php
										echo "<img src='images/CerfVolantImages/".$ligne->ImgPath."' alt='' />"
									?>
								</a>
							</td>
							<td class="cart_description">
								<h4>
									<a href=""><?php echo $ligne->Nom;?></a>
								</h4>
								<p>Web ID: <?php echo $ligne->ID;?></p>
							</td>
							<td class="cart_price">
								<p>
									<?php 
										echo $ligne->Prix;
										$prixTotal = $prixTotal + $ligne->Prix * $ligne->Qte;
									?>$
								</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<p><?php echo $ligne->Qte; ?></p>
								</div>
							</td>
							<td class="cart_total col-md-2">
								<p class="cart_total_price"><?php echo $ligne->Prix * $ligne->Qte;?>$</p>
							</td>
						</tr>
					<?php } ?><!--Fin foreach-->
						<tr>
							<div class="common-modal modal fade" id="common-Modal1" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-content">
									<ul class="list-inline item-details">
										<li><a href="http://themifycloud.com">Ecommerce templates</a></li>
										<li><a href="http://themescloud.org">Ecommerce themes</a></li>
									</ul>
								</div>
							</div>
						</tr>
					</tbody>
				</table>
				
			</div>
		</div>
	</section> <!--/#cart_items-->
	<section id="do_action">
		<div class="container">
				<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							<li>
								<h4>Livraison à:</h4>
							</li>
							<li>
								<label><?php echo $user->Prenom.$user->Nom ?></label>
							</li>
							<li>
								<label><?php echo $user->Adresse ?></label>
							</li>
							<li>
								<label><?php echo $user->Ville ?></label>
							</li>
							<li>
								<label><?php echo $user->CodePostal ?>, Québec</label>
							</li>
							<li>
								<label>Canada</label>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Total panier <span id="total-cart"><?php echo $prixTotal; ?>$</span></li>
							<li>Taxes 
								<span id="cart-taxes">
									<?php 
										$taxes = $prixTotal * 0.14975; 
										echo number_format((float)$taxes, 2, '.', ''); 
									?>$
								</span>
							</li>
							<li>Expédition <span>Gratuite</span></li>
							<li>Total 
								<span id="cart-final-total">
									<?php 
										$prixTotalFinal = $prixTotal + $taxes;
										$prixTotalFinal = number_format((float)$prixTotalFinal, 2, '.', '');
										echo $prixTotalFinal; 
									?>
								$</span>
							</li>
						</ul>
							<a id="btn-payer-paypal" class="btn btn-default check_out pull-right" href="">Payer avec Paypal</a>
							<a class="btn btn-default update pull-right" href="shop.php">Annuler</a>
							<?php include "payer-paypal.php"; ?>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

<?php include "footer.php"?>
