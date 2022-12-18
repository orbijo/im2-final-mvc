<?php $data['page'] = 'locations'; ?>
<?php $this->view('header', $data) ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Country Name</h1>
</div>

<?php if ($country): ?>
<form method="post" class="needs-validation px-5" novalidate>
    <input type="hidden" name="country_id" value="<?= $country->country_id ?>" />
    <div class="row g-3">

        <div class="col-sm-12">
            <label for="country_name" class="form-label">Country Name</label>
            <input name="country_name" type="text" class="form-control" id="country_name" placeholder="<?=$country->country_name?>"
                value="<?=$country->country_name?>" required>
            <div class="invalid-feedback">
                Please enter a postal code.
            </div>
        </div>

    </div>

    <hr class="my-4">

    <button class="w-100 btn btn-primary btn-lg" type="submit" value="submit" name="submit">Edit</button>
</form>
<?php else: ?>
<div class="d-flex justify-content-center">
    <div class="alert alert-danger" role="alert">
        The country you are looking for does not exist!
    </div>
</div>
<?php endif; ?>

<?php $this->view('footer') ?>