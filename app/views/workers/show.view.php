<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="generator" content="Hugo 0.104.2">
	<title>Construction Admin Panel</title>

	<link href="<?= ROOT ?>/assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?= ROOT ?>/assets/css/form-validation.css" rel="stylesheet">

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
	<link href="<?= ROOT ?>/assets/css/dashboard.css" rel="stylesheet">
</head>

<body>

	<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
		<a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">Tugunon Construction</a>
		<button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
			data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
			aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search"
			aria-label="Search">
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
							<a class="nav-link" href="<?= ROOT ?>/home">
								<span data-feather="home" class="align-text-bottom"></span>
								Dashboard
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?= ROOT ?>/projects">
								<span data-feather="layers" class="align-text-bottom"></span>
								Projects
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">
								<span data-feather="users" class="align-text-bottom"></span>
								Customers
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">
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
							<a class="nav-link active" aria-current="page" href="<?= ROOT ?>/workers">
								<span data-feather="users" class="align-text-bottom"></span>
								Workers
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">
								<span data-feather="clipboard" class="align-text-bottom"></span>
								Job Positions
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">
								<span data-feather="map-pin" class="align-text-bottom"></span>
								Locations
							</a>
						</li>
					</ul>
				</div>
			</nav>

			<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
				<div
					class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
					<h1 class="h2">Edit Worker Information</h1>
				</div>

				<?php if ($worker): ?>
				<form class="needs-validation px-5" novalidate>
					<div class="row g-3">
						<div class="col-sm-6">
							<label for="firstName" class="form-label">First name</label>
							<input type="text" class="form-control" id="firstName"
								placeholder="<?= $worker->first_name ?>" value="<?= $worker->first_name ?>" required>
							<div class="invalid-feedback">
								Valid first name is required.
							</div>
						</div>

						<div class="col-sm-6">
							<label for="lastName" class="form-label">Last name</label>
							<input type="text" class="form-control" id="lastName"
								placeholder="<?= $worker->last_name ?>" value="<?= $worker->last_name ?>" required>
							<div class="invalid-feedback">
								Valid last name is required.
							</div>
						</div>

						<div class="col-12">
							<label for="email" class="form-label">Email <span
									class="text-muted">(Optional)</span></label>
							<input type="email" class="form-control" id="email" placeholder="<?= $worker->email ?>"
								value="<?= $worker->email ?>">
							<div class="invalid-feedback">
								Please enter a valid email address.
							</div>
						</div>

						<div class="col-12">
							<label for="username" class="form-label">Phone Number</label>
							<div class="input-group has-validation">
								<input type="text" class="form-control" id="phonenumber"
									placeholder="<?= $worker->phone_number ?>" value="<?= $worker->phone_number ?>"
									required>
								<div class="invalid-feedback">
									Phone number is required.
								</div>
							</div>
						</div>

						<div class="col-12">
							<label for="address" class="form-label">Address</label>
							<input type="text" class="form-control" id="address" placeholder="<?= $worker->address ?>"
								value="<?= $worker->address ?>" required>
							<div class="invalid-feedback">
								Please enter an address.
							</div>
						</div>

						<div class="col-md-5">
							<label for="country" class="form-label">Country</label>
							<select class="form-select" id="country" required>
								<option value="">Choose...</option>
								<?php if ($countries): ?>
								<?php foreach ($countries as $key => $value): ?>
								<?php if ($worker->country_id == $value->country_id): ?>
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

						<div class="col-md-4">
							<label for="state_province" class="form-label">State/Province</label>
							<select class="form-select" id="state_province" required>
								<option value="">Choose...</option>
								<?php foreach ($state_provinces as $key => $value): ?>
									<?php if ($value->state_province == $worker->state_province): ?>
									<option selected value="<?= $value->state_province ?>">
										<?= $value->state_province ?>
									</option>
									<?php elseif($value->country_id == $worker->country_id): ?>
									<option value="<?= $value->state_province ?>">
										<?= $value->state_province ?>
									</option>
									<?php endif; ?>
								<?php endforeach; ?>
							</select>
							<div class="invalid-feedback">
								Please provide a valid state.
							</div>
						</div>

						<div class="col-md-3">
							<label for="postal_code" class="form-label">Zip</label>
							<input type="text" class="form-control" id="<?= $worker->postal_code ?>"
								placeholder="<?= $worker->postal_code ?>" value="<?= $worker->postal_code ?>" required>
							<div class="invalid-feedback">
								Zip code required.
							</div>
						</div>
					</div>

					<hr class="my-4">

					<button class="w-100 btn btn-primary btn-lg" type="submit">Edit</button>
				</form>
				<?php else: ?>
				<div class="d-flex justify-content-center">
					<div class="alert alert-danger" role="alert">
						The worker you are looking for does not exist!
					</div>
				</div>
				<?php endif; ?>

			</main>
		</div>
	</div>

	<script src="<?= ROOT ?>/assets/js/bootstrap.bundle.min.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
		integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE"
		crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
		integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha"
		crossorigin="anonymous"></script>
	<script src="<?= ROOT ?>/assets/js/dashboard.js"></script>
	<script src="<?= ROOT ?>/assets/js/form-validation.js"></script>
	<script src="<?= ROOT ?>/assets/js/jquery-3.6.2.min.js"></script>
	<script src="<?= ROOT ?>/assets/js/forms.js"></script>
	<script>
		var data = <?php echo json_encode($state_provinces); ?>;
	</script>
	<script>
		$(document).ready(function () {

			$('#country').change(function () {
				$("#state_province").html('<option value="">Choose...</option>');
				var val = $(this).val();
				data.forEach(element => {
					if (val == element.country_id) {
						$("#state_province").append('<option value="' + element.state_province + '">' + element.state_province + '</option>');
					}
				});
			});
		})
	</script>
</body>

</html>