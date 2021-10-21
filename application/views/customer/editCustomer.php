<?php ?>
<div class="container">
	<div class="container">
		<form class="well form-horizontal col-md-6 offset-3" action="<?=site_url('editCustomer')?>" method="post" >
			<fieldset>

				<!-- Form Name -->
				<legend class="text-center"><h2><b>Customer Add Form</b></h2></legend><br>

				<!-- Text input-->
				<?=form_hidden('id',$this->uri->segment(2))?>
				<div class="form-group">
					<label class="control-label">First Name</label>
					<div class="input-group">
						<span class="input-group-prepend">
							<div class="input-group-text">
								<i class="fa fa-user"></i>
							</div>
						</span>
						<input  name="first_name" placeholder="First Name" class="form-control"  type="text" value="<?=set_value('first_name')?>" required>
						<?=form_error('first_name','<div class="error">','</div>')?>
					</div>
				</div>

				<!-- Text input-->

				<div class="form-group">
					<label class="control-label" >Last Name</label>
					<div class="input-group">
						<span class="input-group-prepend">
							<div class="input-group-text">
								<i class="fa fa-user"></i>
							</div>
						</span>
						<input name="last_name" placeholder="Last Name" class="form-control"  type="text" value="<?=set_value('last_name')?>" required>
						<?=form_error('last_name','<div class="error">','</div>')?>
					</div>
				</div>

				<!-- Text input-->
				<div class="form-group">
					<label class="control-label">Permanent Address</label>
					<div class="input-group">
						<span class="input-group-prepend">
							<div class="input-group-text">
								<i class="fa fa-envelope"></i>
							</div>
						</span>
						<input name="address" placeholder=" Address" class="form-control"  type="text" value="<?=set_value('address')?>" required maxlength="50">
						<?=form_error('address','<div class="error">','</div>')?>
					</div>
				</div>

				<!-- Text input-->

				<div class="form-group">
					<label class="control-label">Contact Number</label>
					<div class="input-group">
						<span class="input-group-prepend">
							<div class="input-group-text">
								<i class="fa fa-phone"></i>
							</div>
						</span>
						<input name="contact_no" placeholder=" Contact .." class="form-control"  type="tel" value="<?=set_value('contact_no')?>" maxlength="14" required>
						<?=form_error('contact_no','<div class="error">','</div>')?>
					</div>
				</div>

				<!-- Text input-->
				<!-- Button -->
				<div class="form-group">
					<label class="control-label"></label>
					<br>
					<button type="submit" class="btn btn-warning" >SUBMIT <span class="fa glyphicon-send"></span></button>
				</div>

			</fieldset>
		</form>
	</div>
</div><!-- /.container -->

