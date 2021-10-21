<?php
?>


<div class="container">
	<header class="text-center">
		<h3>Customer List</h3>
	</header>

	<table class="table table-hover w-100" id="datatables">
		<thead>
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Address</th>
			<th>Contact Number</th>
			<th>Options</th>
		</tr>
		</thead>
		<tbody>
		<?php
		if(isset($customers)){
			foreach ($customers as $customer){ ?>
				<tr>
					<td><?=ucfirst($customer->first_name)?></td>
					<td><?=ucfirst($customer->last_name)?></td>
					<td><?=$customer->address?></td>
					<td><?=$customer->contact_no?></td>
					<td class="d-block">
						<a href="<?=site_url('editCustomer/'.$customer->id)?>" class="btn btn-default btn-sm text-primary">Edit</a>
						<span><button class="btn btn-danger btn-sm text-light" onclick="deleteRow(<?=$customer->id?>,'user')">Delete</button></span>
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
