<!DOCTYPE html>
<html lang="en">
<head>
	<title>Klinik Sehat Kota Salatiga</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/login/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/login/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-89 p-b-200">
				<form class="login100-form validate-form" action="" method="post" onSubmit="return validasi()">
					<span class="login100-form-title p-b-70">
						Klinik Sehat Kota Salatiga
					</span>
					<span class="login100-form-avatar">
						<img src="<?=base_url()?>assets/login/images/login.jpg" alt="AVATAR">
					</span>
					<br><br>
					<div class="wrap-input100">
					<div class="row">
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h5>Pelayanan Dokter Umum</h5>
					<br><br>
					<div class="col-md-6">
						<table class="table table-bordered" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>No Antrian</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								foreach ($antrian->result() as $row) { ?>
								<tr>
									<td><?= $i++; ?></td>
									<td><?= $row->status_pasien; ?></td>
									<?php } ?>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="col-md-6">
						<table class="table table-bordered" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>No Antrian</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								foreach ($antrian_selesai->result() as $row) { ?>
								<tr>
									<td><?= $i++; ?></td>
									<td><?= $row->status_pasien; ?></td>
									<?php } ?>
								</tr>
							</tbody>
						</table>
					</div>
					</div>
					<br><br>
					<div class="row">
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h5>Pelayanan Dokter Gigi</h5>
					<br><br>
					<div class="col-md-6">
						<table class="table table-bordered" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>No Antrian</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								foreach ($antrian_gigi->result() as $row) { ?>
								<tr>
									<td><?= $i++; ?></td>
									<td><?= $row->status_pasien; ?></td>
									<?php } ?>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="col-md-6">
						<table class="table table-bordered" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>No Antrian</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								foreach ($antrian_gigi_selesai->result() as $row) { ?>
								<tr>
									<td><?= $i++; ?></td>
									<td><?= $row->status_pasien; ?></td>
									<?php } ?>
								</tr>
							</tbody>
						</table>
					</div>
					</div>
					
					</div>
					<br><br>
					<div class="container-login100-form-btn">
						<a type="submit" href="<?=base_url()?>page/index" class="login100-form-btn">
							Kembali
						</a>
					</div>
					<br>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="<?=base_url()?>assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>assets/login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>assets/login/vendor/bootstrap/js/popper.js"></script>
	<script src="<?=base_url()?>assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>assets/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>assets/login/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?=base_url()?>assets/login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>assets/login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>assets/login/js/main.js"></script>


</body>
</html>