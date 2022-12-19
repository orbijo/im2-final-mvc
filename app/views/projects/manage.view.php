<?php $data['page'] = 'projects'; ?>
<?php $this->view('header', $data) ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <?php if ($project): ?>
    <h1 class="h2">
        <?= $project->project_name ?>
    </h1>
    <?php else: ?>
    <h1 class="h2">NaN</h1>
    <?php endif; ?>
</div>

<div class="row g-3">
    <div class="col-6 border-end">

        <form method="post" class="needs-validation" novalidate>
            <input hidden type="text" name="project_id" value="<?=$project->project_id?>">
            <div class="input-group mb-3">
                <select name="worker_id" class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                    <option selected>Choose...</option>
                    <?php if($workers_not): ?>
                        <?php foreach ($workers_not as $key => $value): ?>
                            <option value="<?=$value->worker_id?>"><?=$value->first_name?> <?=$value->last_name?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
                <button class="btn btn-outline-success" type="submit" value="submit" name="submit_worker"
                    id="button-addon2"><span data-feather="plus" class="align-text-center"></span> Add Worker</button>
            </div>
        </form>

        <h1 class="h5">Workers</h1>
        <div class="table-responsive">
            <table id="workersTable" class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th class="th-sm" scope="col">#</th>
                        <th class="th-sm" scope="col">Name</th>
                        <th class="th-sm" scope="col">Phone Number</th>
                        <th class="th-sm" scope="col">Email</th>
                        <th class="th-sm" scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($workers): ?>
                    <?php foreach ($workers as $key => $value): ?>
                    <tr>
                        <td>
                            <?= $value->worker_id ?>
                        </td>
                        <td>
                            <?= $value->first_name ?> <?= $value->last_name ?>
                        </td>
                        <td>
                            <?= $value->phone_number ?>
                        </td>
                        <td>
                            <?= $value->email ?>
                        </td>
                        <td>
                            <a href="<?= ROOT ?>/projects/remove_worker/<?= $value->id ?>"><span
                                    data-feather="user-x" class="align-text-bottom mx-1 text-danger"
                                    onclick="return confirm('Are you sure you want to delete?')"></span></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

    </div>

    <div class="col-6">

        <form method="post" class="needs-validation" novalidate>
            <input hidden type="text" name="project_id" value="<?=$project->project_id?>">
            <div class="input-group mb-3">
                <select name="supplier_id" class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                    <option selected>Choose...</option>
                    <?php if($suppliers_not): ?>
                        <?php foreach ($suppliers_not as $key => $value): ?>
                            <option value="<?=$value->supplier_id?>"><?=$value->first_name?> <?=$value->last_name?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
                <button class="btn btn-outline-success" type="submit" value="submit" name="submit_supplier"
                    id="button-addon2"><span data-feather="plus" class="align-text-center"></span> Add Supplier</button>
            </div>
        </form>
        
        <h1 class="h5">Suppliers</h1>
        <div class="table-responsive">
            <table id="suppliersTable" class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th class="th-sm" scope="col">#</th>
                        <th class="th-sm" scope="col">Name</th>
                        <th class="th-sm" scope="col">Phone Number</th>
                        <th class="th-sm" scope="col">Email</th>
                        <th class="th-sm" scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($suppliers): ?>
                    <?php foreach ($suppliers as $key => $value): ?>
                    <tr>
                        <td>
                            <?= $value->supplier_id ?>
                        </td>
                        <td>
                            <?= $value->first_name ?> <?= $value->last_name ?>
                        </td>
                        <td>
                            <?= $value->phone_number ?>
                        </td>
                        <td>
                            <?= $value->email ?>
                        </td>
                        <td>
                            <a href="<?= ROOT ?>/projects/remove_supplier/<?= $value->id ?>"><span
                                    data-feather="user-x" class="align-text-bottom mx-1 text-danger"
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