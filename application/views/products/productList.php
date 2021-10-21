<?php
?>


<div class="container">
	<header class="text-center">
		<h3>Product List</h3>
	</header>

	<table class="table table-hover w-100" id="datatables">
		<thead>
		<tr>
			<th>Name</th>
			<th>Price</th>
			<th>Options</th>
		</tr>
		</thead>
		<tbody>
		<?php
		if(isset($products)){
			foreach ($products as $product){ ?>
				<tr>
					<td><?=ucfirst($product->name)?></td>
					<td><?=$product->price?></td>
					<td class="d-block">
						<a href="<?=site_url('editProduct/'.$product->id)?>" class="btn btn-default btn-sm text-primary">Edit</a>
						<span><button class="btn btn-danger btn-sm text-light" onclick="delete(<?=$product->id?>,'product')">Delete</button></span>
					</td>
				</tr>
				<?php
			}
		}
		?>
		</tbody>
	</table>
</div>


