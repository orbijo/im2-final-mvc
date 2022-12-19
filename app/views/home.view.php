<?php $data['page'] = 'home'; ?>
<?php $this->view('header', $data) ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Dashboard</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
      <span data-feather="calendar" class="align-text-bottom"></span>
      This year
    </button>
  </div>
</div>

<div class="row">

  <div class="col-4">
    <h1 class="h5">Projects Ending This Month</h1>
    <div class="list-group">
      <?php if ($urgent): ?>
      <?php foreach ($urgent as $key => $value): ?>
      <a href="<?= ROOT ?>/projects/manage/<?= $value->project_id ?>" class="list-group-item list-group-item-action">
        <?= $value->project_name ?>
      </a>
      <?php endforeach; ?>
      <?php endif; ?>
    </div>

  </div>

  <div class="col-8">
    <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
    <h1 class="h5 text-center">Ongoing Projects</h1>
  </div>

</div>



<h2>Workers With The Most Amount Of Projects</h2>
<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Salary</th>
        <th scope="col">Project Count</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($hardworking): ?>
      <?php foreach ($hardworking as $key => $value): ?>
      <tr>
        <td><?=$value->worker_id?></td>
        <td><a href="<?=ROOT?>/workers/edit/<?=$value->worker_id?>"><?=$value->first_name?> <?=$value->last_name?></a></td>
        <td><?=$value->salary?></td>
        <td><?=$value->project_count?></td>
      </tr>
      <?php endforeach; ?>
      <?php endif; ?>
    </tbody>
  </table>
</div>
<script>
  var project_data = <?php echo json_encode($projects_chart); ?>;
  var monthdata = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
  var year = new Date();
  var floor = new Date(year.getFullYear() + '-1-1');
  var ceiling = new Date(year.getFullYear() + '-12-31');

  project_data.forEach(element => {
    var start = new Date(element.start_date);
    var end = new Date(element.end_date);
    if (end > floor) {
      if (start < floor) {
        start = floor;
      }
      if (end > ceiling) {
        end = ceiling;
      }
      i = start.getMonth();
      while (i <= end.getMonth()) {
        monthdata[i]++;
        i++;
      }
    }
  });

</script>
<?php $this->view('footer') ?>