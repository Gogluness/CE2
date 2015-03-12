<?php
	include "objects/Produit.php";

	$IDProduit = @$_GET["id"];

	mysql_connect('localhost','root','admin123') or die("Impossible de se connecter à la base de données");
	mysql_select_db('CE2') or die("Impossible de lire les informations de la base de données");

	$queryObtenirProduit = "SELECT * FROM Produit WHERE  ID = $IDProduit;";

	$resultatRequeteProduit = mysql_query($queryObtenirProduit);

	$val = mysql_fetch_array($resultatRequeteProduit);
	
	$produit = new Produit();
	$produit->ID = $val["ID"];
	$produit->Nom = $val["Nom"];
	$produit->PrixVente = $val["PrixVente"];
	$produit->ImgPath = $val["ImgPath"];
	$produit->Description = $val["Description"];
	$produit->NomCompagnie = $val["NomCompagnie"];
	$produit->Quantite = $val["Quantite"];
	
	include "nb-of-kites-by-compagnie.php";

	mysql_close();
?>

<?php include "header.php"?>

<section>
		<div class="container">
			<div class="row">
				<?php include "liste-options-recherche.php" ?>
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<?php
									echo "<img src='images/CerfVolantImages/".$produit->ImgPath."' alt='' />"
								?>
							</div>
							
						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-->
								<h2><?php echo $produit->Nom; ?></h2>
								<p>ID: <?php echo $produit->ID; ?></p>
								<span>
									<span><?php echo $produit->PrixVente; ?>$</span>
									<button type="button" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Ajouter au panier
									</button>
								</span>
								<p><b>Quantité en stock:</b> <?php echo $produit->Quantite; ?></p>
								<p><b>Condition:</b> Neuf</p>
								<p><b>Compagnie:</b> <?php echo $produit->NomCompagnie; ?></p>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->

					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#details" data-toggle="tab">Détails</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane active" id="details" >
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery1.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery2.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery3.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery4.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
							</div>							
						</div>
					</div><!--/category-tab-->
				</div>
			</div>
		</div>
		<div class="common-modal modal fade" id="common-Modal1" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-content">
				<ul class="list-inline item-details">
					<li><a href="http://themifycloud.com">Ecommerce templates</a></li>
					<li><a href="http://themescloud.org">Ecommerce themes</a></li>
				</ul>
			</div>
		</div>
	</section>


<?php include "footer.php"?>
