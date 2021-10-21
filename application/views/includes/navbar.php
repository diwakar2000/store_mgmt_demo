<nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
	<div class="container">
		<a class="display-4 mx-4" href="<?=site_url('home')?>">Kirana</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarsExample09">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Products
					</a>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						<a class="dropdown-item" href="<?=site_url('productList')?>"><i class="fa fa-list"></i> Product List</a>
						<a class="dropdown-item" href="<?=site_url('addProduct')?>"> <i class="fa fa-user-plus"></i> Add Product</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Vendors
					</a>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						<a class="dropdown-item" href="<?=site_url('vendorList')?>"><i class="fa fa-list"></i> Vendor List</a>
						<a class="dropdown-item" href="<?=site_url('addVendor')?>"> <i class="fa fa-user-plus"></i> Add Vendor</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Customers
					</a>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						<a class="dropdown-item" href="<?=site_url('customerList')?>"><i class="fa fa-list"></i> Customer List</a>
						<a class="dropdown-item" href="<?=site_url('addCustomer')?>"> <i class="fa fa-user-plus"></i> Add Customer</a>
					</div>
				</li>
			</ul>
			<ul class="navbar-nav ml-auto">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<?php
							echo ucfirst($this->session->userdata('user_name')?:'Unknown User');
							echo $this->session->userdata('user_type') === '1' ? ' (Admin)': ' (User)';
						?>
					</a>
					<div class="dropdown-menu" aria-labelledby="dropdown09">
						<a class="dropdown-item" href="<?=site_url('userDetails')?>"> <i class="fa fa-file-alt"></i> User Info</a>
						<?php if($this->session->userdata('user_type') === '1'){ ?>
						<a class="dropdown-item" href="<?=site_url('userList')?>"><i class="fa fa-list"></i> User List</a>
						<a class="dropdown-item" href="<?=site_url('addUser')?>"> <i class="fa fa-user-plus"></i> Add User</a>
						<?php } ?>
						<a class="dropdown-item text-danger"  href="<?=site_url('logout')?>"> <i class="fa fa-sign-out-alt"></i> Logout</a>
					</div>
				</li>
			</ul>
		</div>
	</div>

</nav>

