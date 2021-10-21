<?php
?>


<div class="container">
	<header class="text-center">
		<h3>User List</h3>
	</header>

	<table class="table table-hover w-100" id="datatables">
		<thead>
			<tr>
				<th>First Name</th>
				<th>Last Name</th>
				<th>User Name</th>
				<th>Email</th>
				<th>Address</th>
				<th>Contact Number</th>
				<th>Options</th>
			</tr>
		</thead>
		<tbody>
		<?php
			if(isset($users)){
				foreach ($users as $user){ ?>
					<tr>
						<td><?=ucfirst($user->first_name)?></td>
						<td><?=ucfirst($user->last_name)?></td>
						<td><?=$user->user_name?></td>
						<td><?=$user->email?></td>
						<td><?=$user->address?></td>
						<td><?=$user->contact_no?></td>
						<td class="d-block">
							<a href="<?=site_url('editUser/'.$user->id)?>" class="btn btn-default btn-sm text-primary">Edit</a>
							<span><button class="btn btn-danger btn-sm text-light" onclick="deleteRow(<?=$user->id?>,'user')">Delete</button></span>
						</td>
					</tr>
				<?php
				}
			}
		?>
		</tbody>
	</table>
</div>

<script>

</script>
