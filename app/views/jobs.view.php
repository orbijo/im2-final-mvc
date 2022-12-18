<?php $data['page'] = 'jobs'; ?>
<?php $this->view('header', $data) ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	<h1 class="h2">Jobs</h1>
	<div class="btn-toolbar mb-2 mb-md-0">
		<a href="<?= ROOT ?>/jobs/add" class="btn btn-sm btn-outline-primary" role="button">
			<span data-feather="plus" class="align-text-bottom"></span>
			Add New Job
		</a>
	</div>
</div>

<div class="table-responsive">
	<table id="jobsTable" class="table table-striped table-sm">
		<thead>
			<tr>
				<th class="th-sm" scope="col">#</th>
				<th class="th-sm" scope="col">Job Title</th>
				<th class="th-sm" scope="col">Min Salary</th>
				<th class="th-sm" scope="col">Max Salary</th>
				<th class="th-sm" scope="col">Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php if ($jobs): ?>
			<?php foreach ($jobs as $key => $value): ?>
			<tr>
				<td>
					<?= $value->job_id ?>
				</td>
				<td>
					<?= $value->job_title ?>
				</td>
				<td>
					<?= $value->min_salary ?>
				</td>
				<td>
					<?= $value->max_salary ?>
				</td>
				<td>
					<a href="<?= ROOT ?>/jobs/edit/<?= $value->job_id ?>"><span data-feather="edit"
							class="align-text-bottom mx-1"></span></a>
					<a href="<?= ROOT ?>/jobs/delete/<?= $value->job_id ?>"><span data-feather="x"
							class="align-text-bottom mx-1 text-danger" onclick="return confirm('Are you sure you want to delete?')"></span></a>
				</td>
			</tr>
			<?php endforeach; ?>
			<?php endif; ?>
		</tbody>
	</table>
</div>
<?php $this->view('footer') ?>