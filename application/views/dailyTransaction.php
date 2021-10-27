<?php
?>

<div class="container">
	<fieldset>
		<?=form_open(site_url('daily_transaction'))?>

		<label for="payment_type1"></label>
		<input type="radio" name="payment_type" id="payment_type1" value="credit">credit
		<label for="payment_type2"></label>
		<input type="radio" name="payment_type" id="payment_type2" value="credit">cash
		<label for="payment_type3"></label>
		<input type="radio" name="payment_type" id="payment_type3" value="credit">both

		<label for="quantity">Quantity:</label>
		<input type="number" name="quantity" id="quantity">
		<?=form_error('quantity','<div class="error">','</div>')?>


		<label for="price">Price:</label>
		<input type="number" name="price" id="price">

		<label for=""></label>
		<input type="" name="" id="">
		<div class="error"></div>

		<label for=""></label>
		<input type="" name="" id="">
		<div class="error"></div>
		<?=form_close()?>
	</fieldset>
</div>
