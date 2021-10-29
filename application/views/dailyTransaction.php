<?php
?>

<div class="container">
	<div class="row mt-4">
		<fieldset class="col-md-6 offset-md-3">
			<?=form_open(site_url('daily_transaction'))?>


			<div class="card">
				<div class="card-header">
					<div class="row mb-4">
						<div class="input-group">
							<div class="input-grooup-prepend">
								<div class="input-group-text">Payment Type: </div>
							</div>
							<div class="form-control">
								<label for="payment_type2"></label>
								<input type="radio" name="payment_type" id="payment_type2" value="cash" checked> cash
								<label for="payment_type1"></label>
								<input type="radio" name="payment_type" id="payment_type1" value="credit"> credit
								<label for="payment_type3"></label>
								<input type="radio" name="payment_type" id="payment_type3" value="both"> both
							</div>
						</div>
					</div>

					<div class="row mb-2">
						<div class="input-group">
							<div class="input-group-prepend">
								<label class="input-group-text" for="customer">Customer</label>
							</div>
							<select name="customer" id="customer" class="form-control select2" required>
								<option selected>Select an option</option>
								<?php 
								if(isset($customers)){
									foreach($customers as $customer){ ?>
									<option value="<?=$customer->id?>"><?=ucfirst($customer->first_name).' '.ucfirst($customer->last_name)?></option>
									<?php
									}
								}	
								?>
							</select>
							<?=form_error('customer','<div class="error">','</div>')?>
						</div>
					</div>
					<div class="row float-right mx-1">
						<h6><b>Grand Total:<b> </h6>
						<span  id="grand_total"></span>
					</div>
				</div>
			</div>


			<div class="mt-4" id="product_div">
				<div class="card mb-1 bg-light text-secondary">
					<div class="card-body">
						<div class="row">
							<label for="product">Product: </label>
							<select name="product[]" id="product" class="select2 form-control" required>
								<?php if(isset($products)){
									foreach($products as $product){ ?>
									<option value="<?=$product->id?>"><?=ucfirst($product->name)?></option>
									<?php
									}
								}	
								?>
							</select>
							<?=form_error('product','<div class="error">','</div>')?>
						</div>

						<div class="row">		
							<label for="quantity">Quantity:</label>
							<input class="form-control quantity" type="number" name="quantity[]" required>
							<?=form_error('quantity','<div class="error">','</div>')?>
						</div>

						<div class="row">
							<label for="price">Price:</label>
							<input class="form-control price" type="number" name="price" disabled>
							<?=form_error('price','<div class="error">','</div>')?>
						</div>
					</div>
				</div>
			</div>
			<div class="btn btn-sm btn-info float-right" onclick="addProduct()">Add More+</div>

			<button class="btn btn-lg btn-success mt-4" type="submit"><b>Save</b></button>

			<?=form_close()?>
		</fieldset>
	</div>

</div>
<script>
	function addProduct(){
		let productDiv = document.getElementById('product_div');
		productDivContent = productDiv.innerHTML;
		productDiv.insertAdjacentHTML('afterend','<div>'+productDivContent+"<span class='btn btn-sm btn-danger mx-2' onclick='deleteProductDiv(this)'>del <i class='fa fa-delete'></span></div>");
	}
	function deleteProductDiv(el){
		el.parentNode.remove();
	}
</script>
