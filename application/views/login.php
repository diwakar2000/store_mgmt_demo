<head>
	<title><?=$title?></title>
	<?php
		foreach($css as $style){
	?>
		<link rel="stylesheet" href="assets/css/<?=$style?>.css">
	<?php
		}
	?>
</head>
<body>
		<div class="wrapper fadeInDown row text-center" style="width: 100%; height: 100vh">
			<div id="formContent" class="col-md-4 offset-4 border-dark bg-light p-4 my-auto ">
				<h1>Homendra Kirana Pasal</h1>

				<!-- Icon -->
				<div class="fadeIn first">
				</div>

				<!-- Tabs Titles -->
				<h2 class="active text-secondary"> Sign In </h2>

				<?=form_open(site_url('/login'),'class="mt-4 fadeIn"');?>

					<?php
					if(isset($msg_err)){
						echo "<div class='alert alert-danger'>".$msg_err."</div>";
					}
					?>

					<div class="form-group col-md-8 offset-md-2">
						<label class="control-label">Username</label>
						<div class="input-group">
								<span class="input-group-prepend">
									<div class="input-group-text">
										<i class="fa fa-user"></i>
									</div>
								</span>
							<input  name="username" placeholder="Username" class="form-control"  type="text" value="<?php echo set_value('username')?:get_cookie('user_name')?:'';  ?>" required>
						</div>
						<?=form_error('username','<span class="error">','</span>')?>
					</div>

					<!-- Text input-->

					<div class="form-group col-md-8 offset-md-2">
						<label class="control-label" >Password</label>
						<div class="input-group">
								<span class="input-group-prepend">
									<div class="input-group-text">
										<i class="fa fa-key"></i>
									</div>
								</span>
							<input name="password" placeholder="Password" class="form-control"  type="password" value="<?=(get_cookie('pass_word'))?:''?>" required>
						</div>
						<?=form_error('password','<span class="error">','</span>')?>
					</div>
					<br>
					<input type="checkbox" class="remember_me" name="remember_me" <?=get_cookie('user_name')?'checked':''?>> Remember Login
					<br>
					<input type="submit" class="fadeIn btn btn-primary" value="Log In">

				<?=form_close();?>

			</div>
	</div>


	<?php
	foreach($js as $script){
		?>
		<script src="assets/js/<?=$script?>.js"></script>
		<?php
	}
	?>
</body>

