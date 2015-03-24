<div class="col-sm-12 page-div">				
	<ul class="pagination">
		<?php 
			$noPagePrec = $pageCourante - 1;
			$noPageSuiv = $pageCourante + 1;
			$URLAvecVar = "";

			if(strlen($objetRechercher) > 0)/*création de l'URL pour ne pas perdre les objets de recherche*/
			{
				$URLAvecVar = $URLAvecVar."recherche=$objetRechercher";
			}
			if(strlen($marque) > 0)
			{
				$URLAvecVar = $URLAvecVar."marque=$marque";
			}
			if(strlen($categorie) > 0)
			{
				$URLAvecVar = $URLAvecVar."categorie=$categorie";
			}

		
			if($pageCourante > 2)/*Création de la pagination par rapport aux nombres de pages et à la position actuelle*/
			{
				echo "<li><a href='shop.php?".$URLAvecVar."&page=1'>&laquo;</a></li>";
			}
		
			if($pageCourante != 1)
			{
				echo "<li><a href='shop.php?".$URLAvecVar."&page=$noPagePrec'>$noPagePrec</a></li>";
			}

			echo "<li class='active'><a>$pageCourante</a></li>";

			if($pageCourante != $nbpage && $nbpage != 0)
			{
				echo "<li><a href='shop.php?".$URLAvecVar."&page=$noPageSuiv'>$noPageSuiv</a></li>";
			}

			if($pageCourante <= $nbpage - 2)
			{
				echo "<li><a href='shop.php?".$URLAvecVar."&page=$nbpage'>&raquo;</a></li>";
			}
		?>
	</ul>
</div>
