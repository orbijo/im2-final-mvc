<?php $data['page'] = 'jobs'; ?>
<?php $this->view('header', $data) ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Add a Job</h1>
</div>

<form method="post" class="needs-validation px-5" novalidate>
    <div class="row g-3">

        <div class="col-12">
            <label for="job_title" class="form-label">Job Title</label>
            <input name="job_title" type="text" class="form-control" id="job_title" placeholder="Job Title"
                value="" required>
            <div class="invalid-feedback">
                Please enter a job title.
            </div>
        </div>

        <div class="col-sm-6">
            <label for="min_salary" class="form-label">Minimum Salary</label>
            <input name="min_salary" type="number" class="form-control" id="min_salary" placeholder="10000.00" value=""
                min="0" step=".01" required>
            <div class="invalid-feedback">
                Enter a minimum amount. Must not exceed maximum amount. 2 decimal places only.
            </div>
        </div>

        <div class="col-sm-6">
            <label for="max_salary" class="form-label">Maximum Salary</label>
            <input name="max_salary" type="number" class="form-control" id="max_salary" placeholder="20000.00" value=""
                min="0" step=".01" required>
            <div class="invalid-feedback">
                Enter a maximum amount. Must be greater than maximum amount. 2 decimal places only.
            </div>
        </div>

    </div>

    <hr class="my-4">

    <button class="w-100 btn btn-primary btn-lg" type="submit" value="submit" name="submit">Add Job</button>
</form>

<?php $this->view('footer') ?>