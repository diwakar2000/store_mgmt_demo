<?php
?>

<div class="container">
	<form class="well form-horizontal col-md-6 offset-3" action="<?=site_url('addProduct')?>" method="post">
		<fieldset>

			<!-- Form Name -->
			<legend class="text-center"><h2><b>Product Add Form</b></h2></legend><br>

			<!-- Text input-->
			<?=form_hidden('id',$this->uri->segment(2))?>

			<div class="form-group">
				<label class="control-label">Name</label>
				<div class="input-group">
					<span class="input-group-prepend">
						<div class="input-group-text">
							<i class="fa fa-user"></i>
						</div>
					</span>
					<input  name="name" placeholder="Name" class="form-control"  type="text" value="<?=set_value('name') ?>" required>
					<?=form_error('name','<div class="error">','</div>')?>
				</div>
			</div>





			<!-- Text input-->
			<div class="form-group">
				<label class="control-label">WholeSale Price</label>
				<div class="input-group">
					<span class="input-group-prepend">
						<div class="input-group-text px-3">
							<i class="fa fa-dollar-sign"></i>
						</div>
					</span>
					<input name="price_wholesale" placeholder="WholeSale Price .." class="form-control"  type="number" value="<?=set_value('price_wholesale')?>" required>
					<?=form_error('price_wholesale','<div class="error">','</div>')?>
				</div>
			</div>

			<!-- Text input-->
			<div class="form-group">
				<label class="control-label">Retail Price</label>
				<div class="input-group">
					<span class="input-group-prepend">
						<div class="input-group-text px-3">
							<i class="fa fa-dollar-sign"></i>
						</div>
					</span>
					<input name="price_retail" placeholder="Retail Price .." class="form-control"  type="number" value="<?=set_value('price_retail')?>" required>
					<?=form_error('price_retail','<div class="error">','</div>')?>
				</div>
			</div>

			<!-- Button -->
			<div class="form-group">
				<label class="control-label"></label>
				<br>
				<button type="submit" class="btn btn-primary px-4" >Add <span class="fa fa-save"></span></button>
			</div>

		</fieldset>
	</form>
</div>
