<?php include "header.php"?>

<?php
	$panier = array();
	$prixTotal = 0;

	if(isset($_SESSION['panier']))
	{
		include "objects/LignePanier.php";
		mysql_connect('localhost','root','admin123') or die("Impossible de se connecter à la base de données");
		mysql_select_db('CE2') or die("Impossible de lire les informations de la base de données");

		$listIDProduits = $_SESSION['panier'];
		$tableauIDProduits = explode("&",$listIDProduits);

		foreach ($tableauIDProduits as $idProduitCourrant){

			if($idProduitCourrant != null || $idProduitCourrant != "")
			{
				$queryGetProduit = "SELECT * FROM Produit WHERE ID =$idProduitCourrant;";
				$executionRequeteProduit = mysql_query($queryGetProduit);
				$produitRetour = mysql_fetch_array($executionRequeteProduit);

				$lignePanier = new LignePanier();
				$lignePanier->Nom = $produitRetour["Nom"];
				$lignePanier->Prix = $produitRetour["PrixVente"];
				$lignePanier->ImgPath = $produitRetour["ImgPath"];
				$lignePanier->ID = $produitRetour["ID"];
				$lignePanier->Qte = 1;

				array_push($panier, $lignePanier);
			}
		}

		mysql_close();

	}
?>

<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="index.php">Accueil</a></li>
				  <li class="active">Panier</li>
				</ol>
			</div>
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
										$prixTotal = $prixTotal + $ligne->Prix;
									?>$
								</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" href=""> + </a>
									<input class="cart_quantity_input" type="text" name="quantity" value="1" autocomplete="off" size="2">
									<a class="cart_quantity_down" href=""> - </a>
								</div>
							</td>
							<td class="cart_total col-md-2">
								<p class="cart_total_price"><?php echo $ligne->Prix;?>$</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="" data-ObjectID="<?php echo $ligne->ID;?>">
									<i class="fa fa-times"></i>
								</a>
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
			<div class="heading">
				<h3>Que voulez-vous faire maintenant?</h3>
				<p>Vous pouvez continuer votre magasinage ou bien procéder au paiement des articles dans votre panier.</p>
			</div>
				<div class="col-sm-6 col-sm-offset-6">
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
							<a class="btn btn-default update pull-right" href="shop.php">Continuer le magasinage</a>
							<?php include "payer-paypal.php"; ?>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

<?php include "footer.php"?>
