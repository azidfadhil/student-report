<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

  <link rel="icon" href="<?= base_url('assets/img/icon_tab.png') ?>">
  <title>Laporan MT - <?= $title ?></title>

  <!-- Custom fonts for this template-->
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
  <link href="<?= base_url('assets/vendor/sweetalert2/sweetalert2.min.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/vendor/select2/dist/css/select2.min.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/laporan-mt.css') ?>" rel="stylesheet">
</head>

<body class="bg-gradient-primary">
	<div class="container">
		<!-- Outer Row -->
		<div class="row justify-content-center">
			<div class="col-xl-10 col-lg-12 col-md-9">
				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body p-0">
						<!-- Nested Row within Card Body -->
						<div class="row">
							<div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
							<div class="col-lg-6">
								<div class="p-5">
									<!-- Title -->
									<div class="text-center">
										<h1 class="h4 text-gray-900 mb-4">Selamat Datang!</h1>
									</div>
									<!-- Form Login -->
									<form class="user" action="<?= base_url('auth/login') ?>" method="POST">
										<div class="form-group">
											<input type="email" class="form-control form-control-user" id="inputEmail" name="email" placeholder="Ketikkan Email" autocomplete="off" required>
										</div>
										<div class="form-group">
											<input type="password" class="form-control form-control-user" id="inputPassword" name="password" placeholder="Ketikkan Kata Sandi" autocomplete="off" required>
										</div>
										<button type="submit" class="btn btn-primary btn-user btn-block">Masuk</button>
									</form>
									<hr>
									<!-- Forget Password -->
									<div class="text-center">
										<a class="small" href="forgot-password.html">Lupa Password?</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Vendor Javascript -->
  <script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/chart.js/Chart.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/sweetalert2/sweetalert2.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/datatables/jquery.dataTables.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/select2/dist/js/select2.min.js') ?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/js/laporan-mt.js') ?>"></script>
  <script src="<?= base_url('assets/js/demo/chart-area-demo.js') ?>"></script>
  <script src="<?= base_url('assets/js/demo/chart-pie-demo.js') ?>"></script>
  <script src="<?= base_url('assets/js/demo/datatables-demo.js') ?>"></script>

  <?php if ($this->session->flashdata('icon')) :?>
  <script>
		Swal.fire({
			position: 'top',
			icon: '<?= $this->session->flashdata('icon') ?>',
			title: '<?= $this->session->flashdata('title') ?>',
			text: '<?= $this->session->flashdata('text') ?>',
			width: '24em',
			allowEscapeKey: false,
			allowEnterKey: false,
			showConfirmButton: false,
			timer: 2000,
		})
	</script>
  <?php endif; ?>

</body>
</html>