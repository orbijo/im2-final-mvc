<?php $data['page'] = 'projects'; ?>
<?php $this->view('header', $data) ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">New Project</h1>
</div>
<form method="post" class="needs-validation px-5" novalidate>
    <div class="row g-3">
        <div class="col-sm-6">
            <label for="project_name" class="form-label">Project Name</label>
            <input name="project_name" type="text" class="form-control" id="project_name" placeholder="Project Name"
                value="" required>
            <div class="invalid-feedback">
                Project name is required
            </div>
        </div>

        <div class="col-sm-6">
            <label for="budget" class="form-label">Budget</label>
            <input name="budget" type="number" class="form-control" id="budget" placeholder="Budget" value="" min="0"
                step=".01" required>
            <div class="invalid-feedback">
                Enter a valid amount
            </div>
        </div>

        <div class="col-sm-6">
            <label for="start_date" class="form-label">Start Date</label>
            <input name="start_date" type="date" class="form-control" id="start_date" placeholder="Start Date" value=""
                required>
            <div class="invalid-feedback">
                Please enter a valid date
            </div>
        </div>

        <div class="col-sm-6">
            <label for="end_date" class="form-label">End Date</label>
            <input name="end_date" type="date" class="form-control" id="end_date" placeholder="End Date" value=""
                required>
            <div class="invalid-feedback">
                Please enter a valid date
            </div>
        </div>

        <div class="col-sm-4">
            <label for="foreman" class="form-label">Foreman</label>
            <select name="foreman_id" class="form-select" id="foreman" required>
                <option value="">Choose...</option>
                <?php if ($foremen): ?>
                <?php foreach ($foremen as $key => $value): ?>
                <option value="<?= $value->worker_id ?>">
                    <?= $value->first_name . ' ' . $value->last_name?>
                </option>
                <?php endforeach; ?>
                <?php endif; ?>
            </select>
            <div class="invalid-feedback">
                Choose a foreman
            </div>
        </div>

        <div class="col-sm-4">
            <label for="client" class="form-label">Client</label>
            <select name="client_id" class="form-select" id="client" required>
                <option value="">Choose...</option>
                <?php if ($clients): ?>
                <?php foreach ($clients as $key => $value): ?>
                <option value="<?= $value->client_id ?>">
                    <?= $value->first_name . ' ' . $value->last_name?>
                </option>
                <?php endforeach; ?>
                <?php endif; ?>
            </select>
            <div class="invalid-feedback">
                Choose a client
            </div>
        </div>

        <div class="col-sm-4">
            <label for="location" class="form-label">Location</label>
            <select name="location_id" class="form-select" id="location" required>
                <option value="">Choose...</option>
                <?php if ($locations): ?>
                <?php foreach ($locations as $key => $value): ?>
                <option value="<?= $value->location_id ?>">
                    <?= $value->city . ' (' . $value->postal_code . ') ' . $value->state_province . ', ' . $value->country_name ?>
                </option>
                <?php endforeach; ?>
                <?php endif; ?>
            </select>
            <div class="invalid-feedback">
                Choose a location
            </div>
        </div>

    </div>

    <hr class="my-4">

    <button class="w-100 btn btn-primary btn-lg" type="submit" value="submit" name="submit">Add Project</button>

</form>

<?php $this->view('footer') ?>