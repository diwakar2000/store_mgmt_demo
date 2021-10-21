<?php
?>


<div class="container">
	<header class="text-center">
		<h3>Vendor List</h3>
	</header>

	<table class="table table-hover w-100" id="datatables">
		<thead>
		<tr>
			<th>Name</th>
			<th>Address</th>
			<th>Contact Number</th>
			<th>Options</th>
		</tr>
		</thead>
		<tbody>
		<?php
		if(isset($vendors)){
			foreach ($vendors as $vendor){ ?>
				<tr>
					<td><?=ucfirst($vendor->name)?></td>
					<td><?=$vendor->address?></td>
					<td><?=$vendor->contact_no?></td>
					<td class="d-block">
						<a href="<?=site_url('editVendor/'.$vendor->id)?>" class="btn btn-default btn-sm text-primary">Edit</a>
						<span><button class="btn btn-danger btn-sm text-light" onclick="deleteRow(<?=$vendor->id?>,'user')">Delete</button></span>
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
