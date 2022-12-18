<?php $data['page'] = 'clients'; ?>
<?php $this->view('header', $data) ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	<h1 class="h2">Clients</h1>
	<div class="btn-toolbar mb-2 mb-md-0">
		<a href="<?= ROOT ?>/clients/add" class="btn btn-sm btn-outline-primary" role="button">
			<span data-feather="plus" class="align-text-bottom"></span>
			Add New Client
		</a>
	</div>
</div>

<div class="table-responsive">
	<table id="clientsTable" class="table table-striped table-sm">
		<thead>
			<tr>
				<th class="th-sm" scope="col">#</th>
				<th class="th-sm" scope="col">Name</th>
				<th class="th-sm" scope="col">Email</th>
				<th class="th-sm" scope="col">Phone Number</th>
				<th class="th-sm" scope="col">Address</th>
				<th class="th-sm" scope="col">Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php if ($clients): ?>
			<?php foreach ($clients as $key => $value): ?>
			<tr>
				<td>
					<?= $value->client_id ?>
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
				<td class="text-truncate">
					<?= $value->address ?>
				</td>
				<td>
					<a href="<?= ROOT ?>/clients/edit/<?= $value->client_id ?>"><span data-feather="edit"
							class="align-text-bottom mx-1"></span></a>
					<a href="<?= ROOT ?>/clients/delete/<?= $value->client_id ?>"><span data-feather="user-x"
							class="align-text-bottom mx-1 text-danger" onclick="return confirm('Are you sure you want to delete?')"></span></a>
				</td>
			</tr>
			<?php endforeach; ?>
			<?php endif; ?>
		</tbody>
	</table>
</div>
<?php $this->view('footer') ?>