<?php		
	include "objects/Produit.php";
	mysql_connect('localhost','root','admin123') or die("Impossible de se connecter à la base de données");
	mysql_select_db('CE2') or die("Impossible de lire les informations de la base de données");

	$tableauProduits = array();

	$queryAffichageProduit = "SELECT * FROM Produit;";
	$resultatRequeteProduit = mysql_query($queryAffichageProduit);

	while ($val = mysql_fetch_array($resultatRequeteProduit))
	{
		$produit = new Produit();
		$produit->Nom = $val["Nom"];
		$produit->PrixVente = $val["PrixVente"];
		$produit->ImgPath = $val["ImgPath"];
		$produit->ID = $val["ID"];

		array_push($tableauProduits, $produit);
	}

	mysql_close();
?>
<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<div class="left-sidebar">
					<h2>Catégories</h2>
					<div class="panel-group category-products" id="accordian"><!--category-productsr-->
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordian" href="#deltas">
										<span class="badge pull-right"><i class="fa fa-plus"></i></span>
										Delta
									</a>
								</h4>
							</div>
							<div id="deltas" class="panel-collapse collapse">
								<div class="panel-body">
									<ul>
										<li><a href="">Delta 9' </a></li>
										<li><a href="">Delta 11' </a></li>
										<li><a href="">Delta 19' </a></li>
										<li><a href="">Tous les Deltas </a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title"><a href="#">acrobatique</a></h4>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title"><a href="#">De collection</a></h4>
							</div>
						</div>
						
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title"><a href="#">Méga</a></h4>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title"><a href="#">Article de décoration</a></h4>
							</div>
						</div>
					</div><!--/category-productsr-->
				
					<div class="brands_products"><!--brands_products-->
						<h2>Marques</h2>
						<div class="brands-name">
							<ul class="nav nav-pills nav-stacked">
								<li><a href=""> <span class="pull-right">(50)</span>Premier Kites</a></li>
								<li><a href=""> <span class="pull-right">(56)</span>R-SKY</a></li>
								<li><a href=""> <span class="pull-right">(27)</span>Level ONE</a></li>
								<li><a href=""> <span class="pull-right">(32)</span>Prism</a></li>
							</ul>
						</div>
					</div><!--/brands_products-->
					
					<div class="price-range"><!--price-range-->
						<h2>Prix</h2>
						<div class="well">
							 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" 										data-slider-value="[250,450]" id="sl2" ><br />
							 <b>$ 0</b> <b class="pull-right">$ 600</b>
						</div>
					</div><!--/price-range-->
					
				</div>
			</div>
			
			<div class="col-sm-9 padding-right">
				<div class="features_items"><!--features_items-->
					<h2 class="title text-center">Features Items</h2>
					<?php
						foreach ($tableauProduits as $produit)
						{
					?> <!--Debut foreach-->
					<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<?php
										echo "<img src='images/CerfVolantImages/".$produit->ImgPath."' alt='' />"
									?>
									?>						
									<h2>
										<?php echo $produit->PrixVente;?>$
									</h2>
									<p>
										<?php echo $produit->Nom;?>
									</p>
									<a href="#" class="btn btn-default add-to-cart">
										<i class="fa fa-shopping-cart"></i>Ajouter au panier
									</a>
								</div>
								<div class="product-overlay">
									<div class="overlay-content">
										<h2>
											<?php echo $produit->PrixVente;?>$
										</h2>
										<p>
											<?php echo $produit->Nom;?>
										</p>
										<a class="btn btn-default add-to-cart">
											<i class="fa fa-shopping-cart"></i>Ajouter au panier
										</a>
										<input type="hidden" class="ID-produit"
											<?php echo "value='".$produit->ID."'" ?>
										/>
									</div>
								</div>
							</div>
						</div>
					</div>

					<?php } ?><!--Fin foreach-->
											
					<ul class="pagination">
						<li class="active"><a href="">1</a></li>
						<li><a href="">2</a></li>
						<li><a href="">3</a></li>
						<li><a href="">&raquo;</a></li>
					</ul>
				</div><!--features_items-->
			</div>
		</div>
		<div class="common-modal modal fade" id="common-Modal1" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-content">
				<ul class="list-inline item-details">
					<li><a href="http://themifycloud.com">ThemifyCloud</a></li>
					<li><a href="http://themescloud.org">ThemesCloud</a></li>
				</ul>
			</div>
		</div>
	</div>
</section>
