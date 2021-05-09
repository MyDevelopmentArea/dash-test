<p>
	<a href="<?php echo base_url('users/create') ?>" class="btn btn-primary">Add New</a>
</p>

<div class="table-responsive">
	<table class="table table-bordered table-hover table-striped">
		<caption>List Data</caption>
		<thead>
			<tr>
				<th width="80px">ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Email</th>
				<th>Gender</th>
				<th>IP</th>
				<th>Genres</th>
				<th>Misc.</th>
				<th width="80px">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			if (empty($data)) {
			?>
				<div class="alert alert-info" role="alert">No data found</div>
				<?php
			} else {
				foreach ($data as $row) {
				?>
					<tr>
						<td><?php echo $row['id']; ?></td>
						<td><?php echo $row['first_name']; ?></td>
						<td><?php echo $row['last_name']; ?></td>
						<td><?php echo $row['email']; ?></td>
						<td><?php echo $row['gender']; ?></td>
						<td><?php echo $row['ip_address']; ?></td>
						<td><?php echo $row['genres']; ?></td>
						<td><?php echo $row['misc']; ?></td>
						<td>
							<a href="<?php echo base_url('users/edit/' . $row['id']); ?>" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
							<a href="<?php echo base_url('users/delete/' . $row['id']); ?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
						</td>
				<?php
				}
			}
				?>
					</tr>
		</tbody>
	</table>
	<div class="pagination_links">

		<?php echo $links; ?> </div>

</div>
</div>