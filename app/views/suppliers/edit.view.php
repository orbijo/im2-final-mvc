<?php $data['page'] = 'suppliers'; ?>
<?php $this->view('header', $data) ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	<h1 class="h2">Edit Supplier Information</h1>
</div>

<?php if ($supplier): ?>
				<form method="post" class="needs-validation px-5" novalidate>
					<input type="hidden" name="supplier_id" value="<?= $supplier->supplier_id ?>" />
					<div class="row g-3">
						<div class="col-sm-6">
							<label for="first_name" class="form-label">First name</label>
							<input name="first_name" type="text" class="form-control" id="first_name"
								placeholder="<?= $supplier->first_name ?>" value="<?= $supplier->first_name ?>" required>
							<div class="invalid-feedback">
								Valid first name is required.
							</div>
						</div>

						<div class="col-sm-6">
							<label for="last_name" class="form-label">Last name</label>
							<input name="last_name" type="text" class="form-control" id="last_name"
								placeholder="<?= $supplier->last_name ?>" value="<?= $supplier->last_name ?>" required>
							<div class="invalid-feedback">
								Valid last name is required.
							</div>
						</div>

						<div class="col-12">
							<label for="email" class="form-label">Email</label>
							<input name="email" type="email" class="form-control" id="email" placeholder="<?= $supplier->email ?>"
								value="<?= $supplier->email ?>" required>
							<div class="invalid-feedback">
								Please enter a valid email address.
							</div>
						</div>

						<div class="col-12">
							<label for="phone_number" class="form-label">Phone Number</label>
							<div class="input-group has-validation">
								<input name="phone_number" type="text" class="form-control" id="phone_number"
									placeholder="<?= $supplier->phone_number ?>" value="<?= $supplier->phone_number ?>"
									required>
								<div class="invalid-feedback">
									Phone number is required.
								</div>
							</div>
						</div>

						<div class="col-12">
							<label for="address" class="form-label">Address</label>
							<input name="address" type="text" class="form-control" id="address" placeholder="<?= $supplier->address ?>"
								value="<?= $supplier->address ?>" required>
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
						The supplier you are looking for does not exist!
					</div>
				</div>
				<?php endif; ?>

<?php $this->view('footer') ?>