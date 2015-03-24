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
							<li>
								<a href="shop.php?recherche=<?php echo $objetRechercher; ?>&page=1&categorie=deltas+9">Delta 9' </a>
							</li>
							<li>
								<a href="shop.php?recherche=<?php echo $objetRechercher; ?>&page=1&categorie=deltas+11">Delta 11' </a>
							</li>
							<li>
								<a href="shop.php?recherche=<?php echo $objetRechercher; ?>&page=1&categorie=deltas+19">Delta 19' </a>
							</li>
							<li>
								<a href="shop.php?recherche=<?php echo $objetRechercher; ?>&page=1&categorie=delta">Tous les Deltas </a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a href="shop.php?recherche=<?php echo $objetRechercher; ?>&page=1&categorie=acrobatique">acrobatique</a>
					</h4>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a href="shop.php?recherche=<?php echo $objetRechercher; ?>&page=1&categorie=collection">De collection</a>
					</h4>
				</div>
			</div>
			
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a href="shop.php?recherche=<?php echo $objetRechercher; ?>&page=1&categorie=mega">Méga</a>
					</h4>
				</div>
			</div>
		</div><!--/category-productsr-->
	
		<div class="brands_products"><!--brands_products-->
			<h2>Marques</h2>
			<div class="brands-name">
				<ul class="nav nav-pills nav-stacked">
					<li><a href="shop.php?recherche=<?php echo $objetRechercher; ?>&page=1&marque=Premier+Kites"> 
						<span class="pull-right"><?php echo $nbOfKitesForPremierKites ?></span>Premier Kites
					</a></li>
					<li><a href="shop.php?recherche=<?php echo $objetRechercher; ?>&page=1&marque=Level+One"> 
						<span class="pull-right"><?php echo $nbOfKitesForLevelOne ?></span>Level ONE
					</a></li>
					<li><a href="shop.php?recherche=<?php echo $objetRechercher; ?>&page=1&marque=Prism"> 
						<span class="pull-right"><?php echo $nbOfKitesForPrism ?></span>Prism
					</a></li>
					<li><a href="shop.php?recherche=<?php echo $objetRechercher; ?>&page=1&marque=R-Sky"> 
						<span class="pull-right"><?php echo $nbOfKitesForRSky ?></span>R-SKY
					</a></li>
				</ul>
			</div>
		</div><!--/brands_products-->
		
		<!--<div class="price-range">//price-range
			<h2>Prix</h2>
			<div class="well">
				 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="2000" data-slider-step="5" 										data-slider-value="[0,2000]" id="sl2" ><br />
				 <b>0 $</b> <b class="pull-right">2000 $</b>
			</div>
		</div>//price-range-->
		
	</div>
</div>

