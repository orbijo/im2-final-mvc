<?php $data['page'] = 'jobs'; ?>
<?php $this->view('header', $data) ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	<h1 class="h2">Edit Job Information</h1>
</div>

<?php if ($job): ?>
<form method="post" class="needs-validation px-5" novalidate>
	<input type="hidden" name="job_id" value="<?= $job->job_id ?>" />
	<div class="row g-3">

		<div class="col-12">
			<label for="job_title" class="form-label">Job Title</label>
			<input name="job_title" type="job_title" class="form-control" id="job_title" placeholder="<?= $job->job_title ?>"
				value="<?= $job->job_title ?>" required>
			<div class="invalid-feedback">
				Please enter a job title.
			</div>
		</div>

		<div class="col-sm-6">
            <label for="min_salary" class="form-label">Minimum Salary</label>
            <input name="min_salary" type="number" class="form-control" id="min_salary" placeholder="<?=$job->min_salary?>" value="<?=$job->min_salary?>"
                min="0" step=".01" required>
            <div class="invalid-feedback">
                Enter a minimum amount. Must not exceed maximum amount. 2 decimal places only.
            </div>
        </div>

        <div class="col-sm-6">
            <label for="max_salary" class="form-label">Maximum Salary</label>
            <input name="max_salary" type="number" class="form-control" id="max_salary" placeholder="<?=$job->max_salary?>" value="<?=$job->max_salary?>"
                min="0" step=".01" required>
            <div class="invalid-feedback">
                Enter a maximum amount. Must be greater than maximum amount. 2 decimal places only.
            </div>
        </div>

	</div>

	<hr class="my-4">

	<button class="w-100 btn btn-primary btn-lg" type="submit" value="submit" name="submit">Edit</button>
</form>
<?php else: ?>
<div class="d-flex justify-content-center">
	<div class="alert alert-danger" role="alert">
		The job you are looking for does not exist!
	</div>
</div>
<?php endif; ?>

<?php $this->view('footer') ?>