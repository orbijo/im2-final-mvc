<?php $data['page'] = 'clients'; ?>
<?php $this->view('header', $data) ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	<h1 class="h2">Edit Client Information</h1>
</div>

<?php if ($client): ?>
				<form method="post" class="needs-validation px-5" novalidate>
					<input type="hidden" name="client_id" value="<?= $client->client_id ?>" />
					<div class="row g-3">
						<div class="col-sm-6">
							<label for="first_name" class="form-label">First name</label>
							<input name="first_name" type="text" class="form-control" id="first_name"
								placeholder="<?= $client->first_name ?>" value="<?= $client->first_name ?>" required>
							<div class="invalid-feedback">
								Valid first name is required.
							</div>
						</div>

						<div class="col-sm-6">
							<label for="last_name" class="form-label">Last name</label>
							<input name="last_name" type="text" class="form-control" id="last_name"
								placeholder="<?= $client->last_name ?>" value="<?= $client->last_name ?>" required>
							<div class="invalid-feedback">
								Valid last name is required.
							</div>
						</div>

						<div class="col-12">
							<label for="email" class="form-label">Email</label>
							<input name="email" type="email" class="form-control" id="email" placeholder="<?= $client->email ?>"
								value="<?= $client->email ?>" required>
							<div class="invalid-feedback">
								Please enter a valid email address.
							</div>
						</div>

						<div class="col-12">
							<label for="phone_number" class="form-label">Phone Number</label>
							<div class="input-group has-validation">
								<input name="phone_number" type="text" class="form-control" id="phone_number"
									placeholder="<?= $client->phone_number ?>" value="<?= $client->phone_number ?>"
									required>
								<div class="invalid-feedback">
									Phone number is required.
								</div>
							</div>
						</div>

						<div class="col-12">
							<label for="address" class="form-label">Address</label>
							<input name="address" type="text" class="form-control" id="address" placeholder="<?= $client->address ?>"
								value="<?= $client->address ?>" required>
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
						The client you are looking for does not exist!
					</div>
				</div>
				<?php endif; ?>

<?php $this->view('footer') ?>