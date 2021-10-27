<?php
?>
<div class="container">
	<fieldset>
		<h2 class="d-block mx-auto  border-bottom">User Info</h2>
		<div class="row">
			<label for="user_name" class="col-md-3">User Name</label>
			<input type="text" id="user_name" class="form-control col-md-8" value="<?=ucfirst($user->first_name) .' '. ucfirst($user->last_name)?>" disabled>
		</div>
		<div class="row">
			<label for="email" class="col-md-3">Email</label>
			<input type="email" id="email" class="form-control col-md-8" value="<?=$user->email?>" disabled>
		</div>
		<div class="row">
			<label for="address" class="col-md-3">Address</label>
			<input type="text" id="address" class="form-control col-md-8" value="<?=$user->address?>" disabled>
		</div>
		<div class="row">
			<label for="contact_no" class="col-md-3">Contact Number</label>
			<input type="text" id="contact_no" class="form-control col-md-8" value="<?=$user->contact_no?>" disabled>
		</div>

		<hr>

	</fieldset>
</div>
