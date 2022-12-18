<?php $data['page'] = 'locations'; ?>
<?php $this->view('header', $data) ?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Locations</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="<?= ROOT ?>/locations/add_location" class="btn btn-sm btn-outline-primary mx-1" role="button">
            <span data-feather="plus" class="align-text-bottom"></span>
            Add New Location
        </a>
    </div>
</div>
<div class="row">

    <div class="col-8 border-end">
        <div class="table-responsive">
            <table id="locationsTable" class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th class="th-sm" scope="col">#</th>
                        <th class="th-sm" scope="col">Postal Code</th>
                        <th class="th-sm" scope="col">City</th>
                        <th class="th-sm" scope="col">State/Province</th>
                        <th class="th-sm" scope="col">Country</th>
                        <th class="th-sm" scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($locations): ?>
                    <?php foreach ($locations as $key => $value): ?>
                    <tr>
                        <td>
                            <?= $value->location_id ?>
                        </td>
                        <td>
                            <?= $value->postal_code ?>
                        </td>
                        <td>
                            <?= $value->city ?>
                        </td>
                        <td>
                            <?= $value->state_province ?>
                        </td>
                        <td>
                            <?= $value->country_name ?>
                        </td>
                        <td>
                            <a href="<?= ROOT ?>/locations/edit_location/<?= $value->location_id ?>"><span
                                    data-feather="edit" class="align-text-bottom mx-1"></span></a>
                            <a href="<?= ROOT ?>/locations/delete_location/<?= $value->location_id ?>"><span
                                    data-feather="x" class="align-text-bottom mx-1 text-danger"
                                    onclick="return confirm('Are you sure you want to delete?')"></span></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="col-4">

        <form method="post">
            <div class="input-group mb-3">
                <input name="country_name" type="text" class="form-control" placeholder="Enter a country name"
                    aria-label="Country Name" aria-describedby="button-addon2">
                <button class="btn btn-outline-success" type="submit" value="submit" name="submit"
                    id="button-addon2"><span data-feather="plus" class="align-text-center"></span> Add</button>
            </div>
        </form>


        <div class="table-responsive">
            <table id="locationsTable" class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th class="th-sm" scope="col">#</th>
                        <th class="th-sm" scope="col">Countries</th>
                        <th class="th-sm" scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($countries): ?>
                    <?php foreach ($countries as $key => $value): ?>
                    <tr>
                        <td>
                            <?= $value->country_id ?>
                        </td>
                        <td>
                            <?= $value->country_name ?>
                        </td>
                        <td>
                            <a href="<?= ROOT ?>/locations/edit_country/<?= $value->country_id ?>"><span
                                    data-feather="edit" class="align-text-bottom mx-1"></span></a>
                            <a href="<?= ROOT ?>/locations/delete_country/<?= $value->country_id ?>"><span
                                    data-feather="x" class="align-text-bottom mx-1 text-danger"
                                    onclick="return confirm('Are you sure you want to delete?')"></span></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<?php $this->view('footer') ?>