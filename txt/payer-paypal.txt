<form id="form-payer-paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
	<input type="hidden" name="cmd" value="_xclick">
	<input type="hidden" name="business" value="ce.gitcerfvolant@hotmail.com">
	<input type="hidden" name="lc" value="CA">
	<input type="hidden" name="item_name" value="Montant">
	<input type="hidden" name="item_number" value="10847">
	<input id="paypal-amount" type="hidden" name="amount" value="<?php echo $prixTotalFinal ?>">
	<input type="hidden" name="currency_code" value="CAD">
	<input type="hidden" name="button_subtype" value="services">
	<input type="hidden" name="no_note" value="0">
	<input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHostedGuest">
</form>
