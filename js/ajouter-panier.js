$(".add-to-cart").click(function() {
	var idProduit = $(this).siblings(".ID-produit").val();
alert(idProduit);

	request = $.ajax({
	    url: "ajouter-panier.php",
	    type: "post",
	    data: {data:idProduit}
	});

	request.done(function (response, textStatus, jqXHR){
	    // log a message to the console
	    alert("Hooray, it worked!");
	});

	request.fail(function (jqXHR, textStatus, errorThrown){
	    alert(
		"The following error occured: "+
		textStatus, errorThrown
	    );
    });
});
