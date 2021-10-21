<?php
?>

<div class="container">
	<form class="well form-horizontal col-md-6 offset-3" action="<?=site_url('editProduct')?>" method="post">
		<fieldset>

			<!-- Form Name -->
			<legend class="text-center"><h2><b>Product Edit Form</b></h2></legend><br>

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
					<input  name="name" placeholder="Name" class="form-control"  type="text" value="<?=set_value('name')?:$product->name ?>" required>
					<?=form_error('name','<div class="error">','</div>')?>
				</div>
			</div>


			<!-- Text input-->
			<div class="form-group">
				<label class="control-label">Price</label>
				<div class="input-group">
					<span class="input-group-prepend">
						<div class="input-group-text">
							<i class="fa fa-envelope"></i>
						</div>
					</span>
					<input name="price" placeholder="Price .." class="form-control"  type="number" value="<?=set_value('price')?:$product->price?>" required>
					<?=form_error('price','<div class="error">','</div>')?>
				</div>
			</div>



			<!-- Button -->
			<div class="form-group">
				<label class="control-label"></label>
				<br>
				<button type="submit" class="btn btn-primary" >Update <span class="fa fa-edit"></span></button>
				<a href="<?= site_url('productList') ?>" class="btn btn-danger"><i class="fa fa-times"></i> Cancel</a>
			</div>

		</fieldset>
	</form>
</div>
