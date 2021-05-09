<form method="POST" action="<?php echo base_url('users/store'); ?>">
	<div class="form-group">
		<label for="first_name">First Name</label>
		<input type="text" class="form-control" id="first_name" name="first_name" required>
	</div>
	<div class="form-group">
		<label for="last_name">Last Name</label>
		<input type="text" class="form-control" id="last_name" name="last_name" required>
	</div>
	<div class="form-group">
		<label for="email">Email</label>
		<input type="email" class="form-control" id="email" name="email" required>
	</div>
	<div class="form-group">
		<label for="gender">Gender</label>
		<select class="form-control" name="gender" id="gender" required>
			<option value="Male">Male</option>
			<option value="Female">Female</option>
			<option value="Other">Other</option>
		</select>
	</div>
	<div class="form-group">
		<label for="ip_address">IP Address</label>
		<input type="text" class="form-control" id="ip_address" name="ip_address" required>
	</div>
	<div class="form-group">
		<label for="genres">Genres</label>
		<input type="text" class="form-control" id="genres" name="genres" required>
	</div>
	<div class="form-group">
		<label for="misc">Misc. Data</label>
		<input type="text" class="form-control" id="misc" name="misc">
	</div>
	<input type="submit" class="btn btn-primary" value="Submit">
	<button type="button" onclick="location.href='<?php echo base_url('users') ?>'" class="btn btn-success">Back</button>
</form>