$(".cart_quantity_up").click(function(e) {
	var quantityText = $(this).siblings(".cart_quantity_input").val();
	var quantity = parseInt(quantityText) + 1;
	
	$(this).siblings(".cart_quantity_input").val(quantity);
	e.preventDefault();
	changedQte($(this), quantity);
});

$(".cart_quantity_down").click(function(e) {
	var quantityText = $(this).siblings(".cart_quantity_input").val();
	var quantity = parseInt(quantityText) - 1;
	
	$(this).siblings(".cart_quantity_input").val(quantity);

	e.preventDefault();
	changedQte($(this), quantity);
});

$(".cart_quantity_input").change(function() {
	var quantity = parseInt($(this).val());
	changedQte($(this), quantity);
});

function changedQte(currentElement, quantity)
{
	var prix = $(currentElement).closest("tr").find(".cart_price").text();
	prix = prix.slice(0,-1);

	var prixTotal = parseInt(prix) * quantity;

	$(currentElement).closest("tr").find(".cart_total_price").text(prixTotal + "$");
}
