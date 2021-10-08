<?php ?>
<div class="container">
	<div class="container">

		<form class="well form-horizontal col-md-6 offset-3" action="<?=site_url('addUser')?>" method="post"  id="contact_form">
			<fieldset>

				<!-- Form Name -->
				<legend class="text-center"><h2><b>Registration Form</b></h2></legend><br>

				<!-- Text input-->

				<div class="form-group">
					<label class="control-label">First Name</label>
					<div class="input-group">
						<span class="input-group-prepend">
							<div class="input-group-text">
								<i class="fa fa-user"></i>
							</div>
						</span>
						<input  name="first_name" placeholder="First Name" class="form-control"  type="text" value="<?=set_value('first_name')?>" required>
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
					</div>
				</div>

				<!-- Text input-->

				<div class="form-group">
					<label class="control-label">Username</label>
					<div class="input-group">
						<span class="input-group-prepend">
							<div class="input-group-text">
								<i class="fa fa-user"></i>
							</div>
						</span>
						<input  name="user_name" placeholder="Username" class="form-control"  type="text" value="<?=set_value('user_name')?>" minlength="6" maxlength="20" required>
					</div>
				</div>

				<!-- Text input-->

				<div class="form-group">
					<label class="control-label" >Password</label>
					<div class="input-group">
						<span class="input-group-prepend">
							<div class="input-group-text">
								<i class="fa fa-key"></i>
							</div>
						</span>
						<input name="password" placeholder="Password" class="form-control"  type="password" minlength="6" maxlength="20" required>
					</div>
				</div>

				<!-- Text input-->

				<div class="form-group">
					<label class="control-label" >Confirm Password</label>
					<div class="input-group">
						<span class="input-group-prepend">
							<div class="input-group-text">
								<i class="fa fa-key"></i>
							</div>
						</span>
						<input name="confirm_password" placeholder="Confirm Password" class="form-control"  type="password" minlength="6" maxlength="20" required>
					</div>
				</div>

				<!-- Text input-->
				<div class="form-group">
					<label class="control-label">E-Mail</label>
					<div class="input-group">
						<span class="input-group-prepend">
							<div class="input-group-text">
								<i class="fa fa-envelope"></i>
							</div>
						</span>
						<input name="email" placeholder="E-Mail Address" class="form-control"  type="email" value="<?=set_value('email')?>" required>
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
						<input name="address" placeholder=" Address" class="form-control"  type="text" value="<?=set_value('address')?>" required maxlength="20">
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
						<input name="contact_no" placeholder=" Contact .." class="form-control"  type="number" value="<?=set_value('contact_no')?>" required>
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
</div>

