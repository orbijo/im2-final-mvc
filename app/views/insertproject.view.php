<?php
 
  // CONNECTS TO DB USING CONSTANTS DEFINED AT config.php
$con = mysqli_connect("localhost", "root", "") or die("Cannot connect");
mysqli_select_db($con, 'construction_db');

//$query = SELECT * FROM `jobs` where `job_id` = 2;
//$result = mysql_query($query);
?>




<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Construction Admin Panel</title>

    <link href="<?=ROOT?>/assets/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="<?=ROOT?>/assets/css/dashboard.css" rel="stylesheet">
  </head>
  <body>
  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">Tugunon Construction</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="#">Sign out</a>
    </div>
  </div>
</header>
<div class="container-fluid">
  <div class="row">
  <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
				<div class="position-sticky pt-3 sidebar-sticky">
					<ul class="nav flex-column">
						<li class="nav-item">
							<a class="nav-link" href="home">
								<span data-feather="home" class="align-text-bottom"></span>
								Dashboard
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" href="<?=ROOT?>/projects">
								<span data-feather="layers" class="align-text-bottom"></span>
								Projects
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?=ROOT?>/clients">
								<span data-feather="users" class="align-text-bottom"></span>
								Clients
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?=ROOT?>/suppliers">
								<span data-feather="package" class="align-text-bottom"></span>
								Suppliers
							</a>
						</li>
					</ul>

					<h6
						class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
						<span>Manage</span>
					</h6>
					<ul class="nav flex-column mb-2">
						<li class="nav-item">
							<a class="nav-link" aria-current="page" href="<?=ROOT?>/workers">
								<span data-feather="users" class="align-text-bottom"></span>
								Workers
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?=ROOT?>/jobs">
								<span data-feather="clipboard" class="align-text-bottom"></span>
								Job Positions
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?=ROOT?>/locations">
								<span data-feather="map-pin" class="align-text-bottom"></span>
								Locations
							</a>
						</li>
					</ul>
				</div>
			</nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add Project</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        
        </div>
      </div>

      
      <div class="table-responsive">
          <tbody>
 <form method ="post" action = "insertproject"> 
          <div class="input-group">
            <span class="input-group-text">Project Name</span>
            <input type="text" aria-label="First name" name ="project_name" class="form-control">
          </div>
          <br>
          <div class="input-group">
            <span class="input-group-text">Start Date</span>
            <input type="text" aria-label="First name" name ="start_date" class="form-control">
          </div>
          <br>
          <div class="input-group">
            <span class="input-group-text">End Date</span>
            <input type="text" aria-label="First name" name ="end_date" class="form-control">
          </div>
          <br>
          <div class="input-group">
          <span class="input-group-text">Foreman</span>
            <select class="form-select" aria-label="Default select example" name ="foreman_id">
              <option selected>Open this select menu</option>
              <?php if ($foremans): ?>
                                <?php foreach ($foremans as $key => $value): ?>
                                <option value="<?= $value->worker_id?>">
                                    <?= $value->first_name ?> <?= $value->last_name ?>
                                </option>
                                <?php endforeach; ?>
                                <?php endif; ?>
            </select>
          </div>
          <br>
          <div class="input-group">
          <span class="input-group-text">Client</span>
            <select class="form-select" aria-label="Default select example" name ="client_id">
              <option selected>Open this select menu</option>
                                <?php if ($clients): ?>
                                <?php foreach ($clients as $key => $value): ?>
                                <option value="<?= $value->client_id ?>">
                                    <?= $value->first_name ?> <?= $value->last_name ?>
                                </option>
                                <?php endforeach; ?>
                                <?php endif; ?>
            </select>
          </div>
          <br>
          <div class="input-group">
            <span class="input-group-text">Budget</span>
            <input type="text" aria-label="First name" name ="budget" class="form-control">
          </div>
          <br>
          <div class="input-group">
            <span class="input-group-text">Location</span>
            <select class="form-select" aria-label="Default select example" name = "location_id">
              <option selected>Open this select menu</option>
              <option value="1">Cebu City, Cebu</option>
              <option value="2">Consolacion, Cebu</option>
              <option value="3">Buckingham Palace,Westminister, London</option>
              <option value="4">Abbey Road,Westminister, London</option>
              <option value="5">Sydney, New South Wales</option>
            </select>
          </div>
          <br>
          
          &emsp;&emsp; &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
          &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
          <button type="submit" name="insert" class="btn btn-outline-success" value = "submit">Insert</button>
          <a href="workers"><button type="button" class="btn btn-outline-danger">Cancel</button></a>
          </form>  
        </tbody>


        <?php 
          
          if(isset($_POST['insert']))
          {	 
            $project_name = $_POST['project_name'];
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            $foreman_id = $_POST['foreman_id']; 
            $client_id = $_POST['client_id']; 
            $budget = $_POST['budget']; 
            $sql = "INSERT INTO `projects` (project_name,start_date,end_date,foreman_id,client_id,budget)
            VALUES ('$project_name','$start_date','$end_date','$foreman_id','$client_id','$budget')";
            $query_run = mysqli_query($con, $sql);
            
            if ($query_run) {
              echo "New record created successfully !";
            } else {
              echo "Error: " . $sql . "
          " . mysqli_error($con);
            }
            mysqli_close($con);
          }
          
          
          ?>
        </table>
      </div>
    </main>
  </div>
</div>
<script src="<?=ROOT?>/assets/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
<script src="<?=ROOT?>/assets/js/dashboard.js"></script>
</body>
</html>