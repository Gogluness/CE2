$(".cart_quantity_up").click(function(e) {
	var quantityText = $(this).siblings(".cart_quantity_input").val();
	var quantity = parseInt(quantityText) + 1;
	
	$(this).siblings(".cart_quantity_input").val(quantity);
	e.preventDefault();
	changedQte($(this), quantity);
});

$(".cart_quantity_down").click(function(e) {
	e.preventDefault();
	var quantityText = $(this).siblings(".cart_quantity_input").val();
	var quantity = parseInt(quantityText) - 1;

	if(quantity > 0)
	{
		$(this).siblings(".cart_quantity_input").val(quantity);

		changedQte($(this), quantity);
	}
});

$(".cart_quantity_input").change(function() {
	var quantity = parseInt($(this).val());

	if(estPositif(quantity) === false)
	{
		quantity = 1;
		$(this).val(1);
	}

	changedQte($(this), quantity);
});

function changedQte(currentElement, quantity)
{
	var prix = $(currentElement).closest("tr").find(".cart_price").text();
	prix = prix.slice(0,-1);

	var prixTotal = parseInt(prix) * quantity;

	$(currentElement).closest("tr").find(".cart_total_price").text(prixTotal + "$");
	changerPrixTotal();
	saveQuantity();
}

function changerPrixTotal()
{
	var totalPanier = 0;

	$(".cart_total_price").each(function() {
		var prixCourant = $(this).text().slice(0,-1);
		totalPanier += parseInt(prixCourant); 
	});

	var taxes = totalPanier * 0.14975;
	taxes = Math.round( taxes * 100 )/100;
	var totalFinal = totalPanier + taxes;
	taxes = taxes.toFixed(2);
	totalFinal = totalFinal.toFixed(2);

	$("#total-cart").text(totalPanier+"$");
	$("#cart-taxes").text(taxes+"$");
	$("#cart-final-total").text(totalFinal+"$");
}

function estPositif(nombre) {
	var regex = new RegExp("^[0-9]");
	return regex.test(nombre);
}

$("#btn-payer-paypal").click(function(event) {
	event.preventDefault();

	var montantFinal = $("#cart-final-total").text();
	
	$("#paypal-amount").val(parseFloat(montantFinal));
	$("#form-payer-paypal").submit();
});

function createStringQuantity()
{
	var stringQuantity = "";

	$(".cart_quantity_button input").each(function() {
		stringQuantity += $(this).val() + "&";
	});
	
	return stringQuantity.slice(0,-1);
}

function saveQuantity()
{
	var stringQuantity = createStringQuantity();

	$("#stringQuantity").val(stringQuantity);
}
