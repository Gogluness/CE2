<?php
	include "db_connect.php"
?>
<?php
	include "objects/Produit.php";

	$IDProduit = @$_GET["id"];

	$link = mysql_connect($servername,$username,$password) or die("Impossible de se connecter à la base de données");
	mysql_set_charset('utf8',$link);
	mysql_select_db($dbname) or die("Impossible de lire les informations de la base de données");

	$queryObtenirProduit = "SELECT Produit.ID, Produit.Nom, Produit.PrixVente, Produit.ImgPath, Produit.Description, Produit.NomCompagnie, Produit.Quantite, Description,
				   Modele.Grandeur, Modele.Vent, Modele.Tissus,Modele.Armature, Modele.Emballage, Modele.Cordes, Modele.Poids 
				FROM Produit 
				INNER JOIN Modele ON Produit.IDModele = Modele.ID
				WHERE  Produit.ID = $IDProduit;";

	$resultatRequeteProduit = mysql_query($queryObtenirProduit);

	$val = mysql_fetch_array($resultatRequeteProduit);
	
	$ID = $val["ID"];
	$Nom = $val["Nom"];
	$PrixVente = $val["PrixVente"];
	$ImgPath = $val["ImgPath"];
	$Description = $val["Description"];
	$NomCompagnie = $val["NomCompagnie"];
	$Quantite = $val["Quantite"];
	$Grandeur = $val["Grandeur"];
	$Vent = $val["Vent"];
	$Tissus = $val["Tissus"];
	$Armature = $val["Armature"];
	$Emballage = $val["Emballage"];
	$Cordes = $val["Cordes"];
	$Poids = $val["Poids"];
	$Description = $val["Description"];
	
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
									echo "<img src='images/CerfVolantImages/".$ImgPath."' alt='' />"
								?>
							</div>
							
						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-->
								<h2><?php echo $Nom; ?></h2>
								<p>ID: <?php echo $ID; ?></p>
								<span>
									<span><?php echo $PrixVente; ?>$</span>
									<button type="button" class="btn btn-fefault cart add-to-cart">
										<i class="fa fa-shopping-cart"></i>
										Ajouter au panier
									</button>
									<input type="hidden" class="ID-produit"
										<?php echo "value='".$ID."'" ?>
									/>
								</span>
								<p><b>Quantité en stock:</b> <?php echo $Quantite; ?></p>
								<p><b>Condition:</b> Neuf</p>
								<p><b>Compagnie:</b> <?php echo $NomCompagnie; ?></p>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->

					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#details" data-toggle="tab">Détails</a></li>
								<li><a href="#info-company" data-toggle="tab">Informations compagnie</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="details" >
								<div class="">
									<?php if($Quantite != null) { ?>
										<p><b>Quantité en stock:</b> <?php echo $Quantite; ?></p>
									<?php } ?>
									<p><b>Condition:</b> Neuf</p>
									<?php if($NomCompagnie != null) { ?>
										<p><b>Compagnie:</b> <?php echo $NomCompagnie; ?></p>
									<?php } ?>
									<?php if($Grandeur != null) { ?>
										<p><b>Grandeur:</b> <?php echo $Grandeur; ?></p>
									<?php } ?>
									<?php if($Vent != null) { ?>
										<p><b>Vent:</b> <?php echo $Vent; ?></p>
									<?php } ?>
									<?php if($Tissus != null) { ?>
										<p><b>Tissu:</b> <?php echo $Tissus; ?></p>
									<?php } ?>
									<?php if($Armature != null) { ?>
										<p><b>Armature:</b> <?php echo $Armature; ?></p>
									<?php } ?>
									<?php if($Emballage != null) { ?>
										<p><b>Emballage:</b> <?php echo $Emballage; ?></p>
									<?php } ?>
									<?php if($Cordes != null) { ?>
										<p><b>Cordes:</b> <?php echo $Cordes; ?></p>
									<?php } ?>
									<?php if($Poids != null) { ?>
										<p><b>Poids:</b> <?php echo $Poids; ?></p>
									<?php } ?>
									<?php if($Description != null) { ?>
										<p><b>Description:</b> <?php echo $Description; ?></p>
									<?php } ?>
								</div>
							</div>
							<div class="tab-pane fade" id="info-company" >
								<p>Information non-disponible pour le moment.</p>
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
