<div class="card">
	<div class="modal-header">
		<h5 class="modal-title"><?= $title_md ?></h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<form action="<?= site_url('Referensi/update_users/'.$data['id_users']) ?>" method="post">
		<div class="card-body">
			<div class="modal-body row">
				<div class="form-group col-md-12">
					<label for="">Full Name</label>
					<input type="text" class="form-control" name="fullname" placeholder="Full Name" value="<?= $data['full_name'] ?>">
				</div>
				<div class="form-group col-md-12">
					<label for="username">Username</label>
					<input type="text" class="form-control" name="username" placeholder="Username" value="<?= $data['username'] ?>">
				</div>
				<div class="form-group col-md-12">
					<label for="password">Password</label>
					<input type="password" class="form-control" name="password" placeholder="Password" value="<?= $this->encryption->decrypt($data['password']) ?>">
				</div>
				<div class="form-group col-md-6">
					<label for="email">Email</label>
					<input class="form-control" type="email" name="email" placeholder="Example: John@gmail.com" value="<?= $data['email'] ?>" required>
				</div>
				<div class="form-group col-md-6">
					<label for="">Phone</label>
					<input type="text" class="form-control" name="phone" placeholder="Example: 08**********" value="<?= $data['phone_number'] ?>">
				</div>
				<div class="form-group col-md-12">
					<label for="level">Level</label>
					<select name="level" class="form-control">
						<?php foreach ($data['list_level'] as $level): ?>
						<option value="<?= $level->id_level ?>" 
						<?php if ($level->id_level == $data['level_id_level']): ?>
						selected	
						<?php endif ?>><?= $level->name_level ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="form-group col-md-12">
					<label for="level">Alamat</label>
					<textarea name="address" class="form-control" placeholder="Alamat"><?= $data['address'] ?></textarea>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-info">Change</button>
				<button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
			</div>
		</div>
	</form>
</div>