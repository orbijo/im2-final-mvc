<?php $data['page'] = 'projects'; ?>
<?php $this->view('header', $data) ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	<h1 class="h2">Projects</h1>
	<div class="btn-toolbar mb-2 mb-md-0">
		<a href="<?= ROOT ?>/projects/add" class="btn btn-sm btn-outline-primary mx-1" role="button">
			<span data-feather="plus" class="align-text-bottom"></span>
			Add New Project
		</a>
	</div>
</div>

<div class="table-responsive">
	<table id="jobsTable" class="table table-striped table-sm">
		<thead>
			<tr>
				<th class="th-sm" scope="col">#</th>
				<th class="th-sm" scope="col">Project Name</th>
				<th class="th-sm" scope="col">Duration</th>
				<th class="th-sm" scope="col">Budget</th>
				<th class="th-sm" scope="col">Foreman</th>
				<th class="th-sm" scope="col">Client</th>
				<th class="th-sm" scope="col">Location</th>
				<th class="th-sm" scope="col">Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php if ($projects): ?>
			<?php console_log($projects) ?>
			<?php foreach ($projects as $key => $value): ?>
			<tr>
				<td>
					<?= $value->project_id ?>
				</td>
				<td>
					<?= $value->project_name ?>
				</td>
				<td>
					<?= get_date($value->start_date) . ' - ' . get_date($value->end_date) ?>
				</td>
				<td>
					<?= $value->budget ?>
				</td>
				<td>
					<?= $value->foremanFname . ' ' . $value->foremanLname ?>
				</td>
				<td>
					<?= $value->clientFname . ' ' . $value->clientLname ?>
				</td>
				<td>
					<?= $value->city . ' (' . $value->postal_code . ') ' . $value->state_province ?>
				</td>
				<td>
					<a href="<?= ROOT ?>/projects/manage/<?= $value->project_id ?>"><span data-feather="tool"
							class="align-text-bottom mx-1 text-success"></span></a>
					<a href="<?= ROOT ?>/projects/edit/<?= $value->project_id ?>"><span data-feather="edit"
							class="align-text-bottom mx-1"></span></a>
					<a href="<?= ROOT ?>/projects/delete/<?= $value->project_id ?>"><span data-feather="x"
							class="align-text-bottom mx-1 text-danger"
							onclick="return confirm('Are you sure you want to delete?')"></span></a>
				</td>
			</tr>
			<?php endforeach; ?>
			<?php endif; ?>
		</tbody>
	</table>
</div>

<?php $this->view('footer') ?>