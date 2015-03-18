<?php		
	include "objects/Produit.php";
	mysql_connect('localhost','root','admin123') or die("Impossible de se connecter à la base de données");
	mysql_select_db('CE2') or die("Impossible de lire les informations de la base de données");

	$pageCourante = @$_GET["page"];
	$objetRechercher=@$_GET["recherche"];
	$marque = @$_GET["marque"];
	$categorie = @$_GET["categorie"];

	if($pageCourante == null)
	{
		$pageCourante = 1;
	}

	/*va cherche le nombre de page de produits*/
	$requeteNbObjets = "SELECT count(*) FROM Produit INNER JOIN Modele ON Produit.IDModele = Modele.ID
		 where (Nom LIKE '%{$objetRechercher}%' or Description LIKE '%{$objetRechercher}%') 
		AND NomCompagnie LIKE '%{$marque}%'
		AND Modele.NomModele LIKE '%{$categorie}%'";
	$ResultatNbObjet = mysql_query($requeteNbObjets);
	$val = mysql_fetch_row($ResultatNbObjet);
 	$nbObjetParPage	= $val[0];
	$nbpage=ceil($nbObjetParPage/12);

	/*va remplir un tableau de produit avec les éléments de recherche*/
	$positionPremierObjet = ($pageCourante - 1) * 12;
	$queryAffichageProduit = "SELECT Nom, PrixVente, ImgPath, Produit.ID FROM Produit 
		INNER JOIN Modele ON Produit.IDModele = Modele.ID
		WHERE (Nom LIKE '%{$objetRechercher}%' or Description LIKE '%{$objetRechercher}%') 
		AND NomCompagnie LIKE '%{$marque}%' 
		AND Modele.NomModele LIKE '%{$categorie}%'
		LIMIT $positionPremierObjet,12";
	$resultatRequeteProduit = mysql_query($queryAffichageProduit);

	$tableauProduits = array();

	while ($val = mysql_fetch_array($resultatRequeteProduit))
	{
		$produit = new Produit();
		$produit->Nom = $val["Nom"];
		$produit->PrixVente = $val["PrixVente"];
		$produit->ImgPath = $val["ImgPath"];
		$produit->ID = $val["ID"];

		array_push($tableauProduits, $produit);
	}

	include "nb-of-kites-by-compagnie.php";

	mysql_close();
?>
<section>
	<div class="container">
		<div class="row">
			<?php include "liste-options-recherche.php" ?>			
			<div class="col-sm-9 padding-right">
				<div class="features_items"><!--features_items-->
					<h2 class="title text-center">Liste des produits</h2>
					<?php 
						if($nbpage == 0)
						{
							echo "<h4 class='no-result'>Aucun résultat trouvé!</h4>";
						}
						else //<!--Début else-->
						{
							include "shop-pagination.php";
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
									<div class="product-overlay" >
										<div class="overlay-top"></div>
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

						<?php } //<!--Fin foreach-->
						 include "shop-pagination.php"; 
						}
						?><!--Fin else-->
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
