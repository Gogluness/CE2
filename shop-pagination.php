<div class="col-sm-12 page-div">				
	<ul class="pagination">
		<?php 
			$noPagePrec = $pageCourante - 1;
			$noPageSuiv = $pageCourante + 1;
		
			if($pageCourante > 2)
			{
				echo "<li><a href='shop.php?recherche=$objetRechercher&page=1'>&laquo;</a></li>";
			}
		
			if($pageCourante != 1)
			{
				echo "<li><a href='shop.php?recherche=$objetRechercher&page=$noPagePrec'>$noPagePrec</a></li>";
			}

			echo "<li class='active'><a>$pageCourante</a></li>";

			if($pageCourante != $nbpage)
			{
				echo "<li><a href='shop.php?recherche=$objetRechercher&page=$noPageSuiv'>$noPageSuiv</a></li>";
			}

			if($pageCourante <= $nbpage - 2)
			{
				echo "<li><a href='shop.php?recherche=$objetRechercher&page=$nbpage'>&raquo;</a></li>";
			}
		?>
	</ul>
</div>
