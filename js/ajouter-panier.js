$(".add-to-cart").click(function() {
	var idProduit = $(this).siblings(".ID-produit").val();

	request = $.ajax({
	    url: "ajouter-panier.php",
	    type: "post",
	    data: {data:idProduit}
	});

	request.done(function (response, textStatus, jqXHR){
	    alert("Le produit a bien été ajouté!");
	});

	request.fail(function (jqXHR, textStatus, errorThrown){
	    alert(
		"L'erreur suivante est survenue: "+
		textStatus, errorThrown
	    );
    });
});
