<?php $data['page'] = 'workers'; ?>
<?php $this->view('header', $data) ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	<h1 class="h2">Edit Worker Information</h1>
</div>

<?php if ($worker): ?>
<form method="post" class="needs-validation px-5" novalidate>
	<input type="hidden" name="worker_id" value="<?= $worker->worker_id ?>" />
	<div class="row g-3">
		<div class="col-sm-6">
			<label for="first_name" class="form-label">First name</label>
			<input name="first_name" type="text" class="form-control" id="first_name"
				placeholder="<?= $worker->first_name ?>" value="<?= $worker->first_name ?>" required>
			<div class="invalid-feedback">
				Valid first name is required.
			</div>
		</div>

		<div class="col-sm-6">
			<label for="last_name" class="form-label">Last name</label>
			<input name="last_name" type="text" class="form-control" id="last_name"
				placeholder="<?= $worker->last_name ?>" value="<?= $worker->last_name ?>" required>
			<div class="invalid-feedback">
				Valid last name is required.
			</div>
		</div>

		<div class="col-12">
			<label for="email" class="form-label">Email</label>
			<input name="email" type="email" class="form-control" id="email" placeholder="<?= $worker->email ?>"
				value="<?= $worker->email ?>" required>
			<div class="invalid-feedback">
				Please enter a valid email address.
			</div>
		</div>

		<div class="col-12">
			<label for="phone_number" class="form-label">Phone Number</label>
			<div class="input-group has-validation">
				<input name="phone_number" type="text" class="form-control" id="phone_number"
					placeholder="<?= $worker->phone_number ?>" value="<?= $worker->phone_number ?>" required>
				<div class="invalid-feedback">
					Phone number is required.
				</div>
			</div>
		</div>

		<div class="col-4">
			<label for="job_id" class="form-label">Job</label>
			<select name="job_id" class="form-select" id="job_id" required>

				<?php if($jobs): ?>
					<?php foreach ($jobs as $key => $value): ?>
					<?php if ($value->job_id == $worker->job_id): ?>
					<option selected value="<?= $value->job_id ?>"><?= $value->job_title ?></option>
					<?php else: ?>
					<option value="<?= $value->job_id ?>"><?= $value->job_title ?></option>
					<?php endif; ?>
					<?php endforeach; ?>
				<?php else: ?>
					<option value="">No Jobs Available</option>
				<?php endif; ?>


			</select>
			<div class="invalid-feedback">
				Select a job
			</div>
		</div>

		<div class="col-4">
			<label for="salary" class="form-label">Salary</label>
			<input name="salary" type="text" class="form-control" id="salary" placeholder="<?= $worker->salary ?>"
				value="<?= $worker->salary ?>" required>
			<div class="invalid-feedback">
				Please enter a valid amount
			</div>
		</div>

		<?php if ($worker->job_id != $foreman_job->job_id): ?>
		<div class="col-4">
			<label for="foreman" class="form-label">Foreman</label>
			<select name="foreman_id" class="form-select" id="foreman" required>
				<option value="">Choose...</option>

				<?php foreach ($foremen as $foreman): ?>
				<?php if ($worker->foreman_id == $foreman->worker_id): ?>
				<option selected value="<?= $foreman->worker_id ?>"><?= $foreman->first_name ?> <?= $foreman->last_name ?>
				</option>
				<?php else: ?>
				<option value="<?= $foreman->worker_id ?>"><?= $foreman->first_name ?> <?= $foreman->last_name ?></option>
				<?php endif; ?>
				<?php endforeach; ?>

			</select>
			<div class="invalid-feedback">
				Please enter an address.
			</div>
		</div>
		<?php endif ?>

		<div class="col-12">
			<label for="address" class="form-label">Address</label>
			<input name="address" type="text" class="form-control" id="address" placeholder="<?= $worker->address ?>"
				value="<?= $worker->address ?>" required>
			<div class="invalid-feedback">
				Please enter an address.
			</div>
		</div>

	</div>

	<hr class="my-4">

	<button class="w-100 btn btn-primary btn-lg" type="submit" value="submit" name="submit">Edit</button>
</form>
<?php else: ?>
<div class="d-flex justify-content-center">
	<div class="alert alert-danger" role="alert">
		The worker you are looking for does not exist!
	</div>
</div>
<?php endif; ?>

<?php $this->view('footer') ?>