$(".cart_quantity_delete").click(function(event) {

	event.preventDefault();

	var idProduit = $(this).attr("data-objectid");

	request = $.ajax({
	    url: "retirer-panier.php",
	    type: "post",
	    data: {data:idProduit}
	});

	request.done(function (response, textStatus, jqXHR){
	    alert("Le produit a bien été supprimé!");
	    location.reload();
	});

	request.fail(function (jqXHR, textStatus, errorThrown){
	    alert(
		"L'erreur suivante est survenue: "+
		textStatus, errorThrown
	    );
    	});
});
