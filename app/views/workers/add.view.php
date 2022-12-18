<?php $data['page'] = 'workers'; ?>
<?php $this->view('header', $data) ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	<h1 class="h2">Add a Worker</h1>
</div>

<form method="post" class="needs-validation px-5" novalidate>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="first_name" class="form-label">First name</label>
                            <input name="first_name" type="text" class="form-control" id="first_name"
                                placeholder="First Name" value="" required>
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label for="last_name" class="form-label">Last name</label>
                            <input name="last_name" type="text" class="form-control" id="last_name"
                                placeholder="Last Name" value="" required>
                            <div class="invalid-feedback">
                                Valid last name is required.
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="email" class="form-label">Email</label>
                            <input name="email" type="email" class="form-control" id="email"
                                placeholder="you@example.com" value="" required>
                            <div class="invalid-feedback">
                                Please enter a valid email address.
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="phone_number" class="form-label">Phone Number</label>
                            <div class="input-group has-validation">
                                <input name="phone_number" type="text" class="form-control" id="phone_number"
                                    placeholder="(123) 345-7890" value="" required>
                                <div class="invalid-feedback">
                                    Phone number is required.
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="address" class="form-label">Address</label>
                            <input name="address" type="text" class="form-control" id="address"
                                placeholder="123 Main St." value="" required>
                            <div class="invalid-feedback">
                                Please enter an address.
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="job" class="form-label">Job</label>
                            <select name="job_id" class="form-select" id="job" required>
                                <option value="">Choose...</option>
                                
                                <?php if($jobs): ?>
                                    <?php foreach ($jobs as $key => $value): ?>

                                        <option value="<?=$value->job_id?>"><?=$value->job_title?></option>

                                    <?php endforeach; ?>
                                <?php endif; ?>

                            </select>
                            <div class="invalid-feedback">
                                Please choose a job.
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label for="salary" class="form-label">Salary</label>
                            <input name="salary" type="number" class="form-control" id="salary"
                                placeholder="10000.00" value="" min="0" step=".01" required>
                            <div class="invalid-feedback">
                                Salary is required.
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">

                    <button class="w-100 btn btn-primary btn-lg" type="submit" value="submit"
                        name="submit">Add Worker</button>
                </form>

<?php $this->view('footer') ?>