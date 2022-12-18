<?php $data['page'] = 'locations'; ?>
<?php $this->view('header', $data) ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Location</h1>
</div>

<?php if ($location): ?>
<form method="post" class="needs-validation px-5" novalidate>
    <input type="hidden" name="location_id" value="<?= $location->location_id ?>" />
    <div class="row g-3">

        <div class="col-sm-6">
            <label for="postal_code" class="form-label">Postal Code</label>
            <input name="postal_code" type="text" class="form-control" id="postal_code" placeholder="<?=$location->postal_code?>"
                value="<?=$location->postal_code?>" required>
            <div class="invalid-feedback">
                Please enter a postal code.
            </div>
        </div>

        <div class="col-sm-6">
            <label for="city" class="form-label">City</label>
            <input name="city" type="text" class="form-control" id="city" placeholder="<?=$location->city?>" value="<?=$location->city?>" required>
            <div class="invalid-feedback">
                Please enter a name of a city.
            </div>
        </div>

        <div class="col-sm-6">
            <label for="state_province" class="form-label">State/Province</label>
            <input name="state_province" type="text" class="form-control" id="state_province"
                placeholder="<?=$location->city?>" value="<?=$location->city?>" required>
            <div class="invalid-feedback">
                Please enter a name of a state or province.
            </div>
        </div>

        <div class="col-sm-6">
            <label for="country" class="form-label">Country</label>
            <select name="country_id" class="form-select" id="country" required>
                <option value="">Choose...</option>
                <?php if ($countries): ?>
                <?php foreach ($countries as $key => $value): ?>
                <?php if ($location->country_id == $value->country_id): ?>
                <option selected value="<?= $value->country_id ?>">
                    <?= $value->country_name ?>
                </option>
                <?php else: ?>
                <option value="<?= $value->country_id ?>">
                    <?= $value->country_name ?>
                </option>
                <?php endif; ?>
                <?php endforeach; ?>
                <?php endif; ?>
            </select>
            <div class="invalid-feedback">
                Please select a valid country.
            </div>
        </div>

    </div>

    <hr class="my-4">

    <button class="w-100 btn btn-primary btn-lg" type="submit" value="submit" name="submit">Edit</button>
</form>
<?php else: ?>
<div class="d-flex justify-content-center">
    <div class="alert alert-danger" role="alert">
        The location you are looking for does not exist!
    </div>
</div>
<?php endif; ?>

<?php $this->view('footer') ?>