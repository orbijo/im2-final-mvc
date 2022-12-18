<?php $data['page'] = 'workers'; ?>
<?php $this->view('header', $data) ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	<h1 class="h2">Workers</h1>
	<div class="btn-toolbar mb-2 mb-md-0">
		<a href="<?= ROOT ?>/workers/add" class="btn btn-sm btn-outline-primary" role="button">
			<span data-feather="plus" class="align-text-bottom"></span>
			Add New Worker
		</a>
	</div>
</div>

<div class="table-responsive">
	<table id="workerTable" class="table table-striped table-sm">
		<thead>
			<tr>
				<th class="th-sm" scope="col">#</th>
				<th class="th-sm" scope="col">Name</th>
				<th class="th-sm" scope="col">Email</th>
				<th class="th-sm" scope="col">Phone Number</th>
				<th class="th-sm" scope="col">Job</th>
				<th class="th-sm" scope="col">Hire Date</th>
				<th class="th-sm" scope="col">Salary</th>
				<th class="th-sm" scope="col">Address</th>
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
					<?= $value->first_name . ' ' . $value->last_name ?>
				</td>
				<td>
					<?= $value->email ?>
				</td>
				<td>
					<?= $value->phone_number ?>
				</td>
				<td>
					<?= $value->job_title ?>
				</td>
				<td>
					<?= date("F j, Y", strtotime($value->hire_date)) ?>
				</td>
				<td>
					<?= $value->salary ?>
				</td>
				<td class="text-truncate">
					<?= $value->address ?>
				</td>
				<td>
					<a href="<?= ROOT ?>/workers/edit/<?= $value->worker_id ?>"><span data-feather="edit"
							class="align-text-bottom mx-1"></span></a>
					<a href="<?= ROOT ?>/workers/delete/<?= $value->worker_id ?>"><span data-feather="user-x"
							class="align-text-bottom mx-1 text-danger" onclick="return confirm('Are you sure you want to delete?')"></span></a>
				</td>
			</tr>
			<?php endforeach; ?>
			<?php endif; ?>
		</tbody>
	</table>
</div>
<?php $this->view('footer') ?>