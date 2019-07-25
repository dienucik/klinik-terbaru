<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Klinik Sehat Kota Salatiga</title>

    <!-- Bootstrap core CSS-->
    <link href="<?=base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="<?=base_url()?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="<?=base_url()?>assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?=base_url()?>assets/css/sb-admin.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark static-top" style="background-color: #4f915f">

      <a class="navbar-brand mr-1" href="#">Klinik Sehat Kota Salatiga</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-12">
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="<?=base_url()?>admin/ganti_password">Ganti Password</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
          </div>
        </li>
      </ul>

    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
        <ul class="sidebar navbar-nav" style="background-color: #153d1f; font-size: 20px;">
            <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>admin/index">
                <i class="fas fa-fw fa-tachometer-alt" style="color: white"></i>
                <span style="color: white">Home</span>
            </a>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder" style="color: white"></i>
            <span style="color: white">Pelayanan Dokter Umum</span>
            </a>
              <div class="dropdown-menu" aria-labelledby="pagesDropdown" style="font-size: 17px">
                <h6 class="dropdown-header">Pilih Menu:</h6>
                <a class="dropdown-item" href="<?php echo base_url();?>admin/pasien">Data Pasien</a>
                <a class="dropdown-item" href="<?php echo base_url();?>admin/periksa">Data Pengkajian Awal</a>
                <a class="dropdown-item" href="<?php echo base_url();?>admin/rekam_medis">Data Rekam Medis</a>
              </div>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder" style="color: white"></i>
            <span style="color: white">Pelayanan Dokter Gigi</span>
            </a>
              <div class="dropdown-menu" aria-labelledby="pagesDropdown" style="font-size: 17px">
                <h6 class="dropdown-header">Pilih Menu:</h6>
                <a class="dropdown-item" href="<?php echo base_url();?>admin/pasien_gigi">Data Pasien</a>
                <a class="dropdown-item" href="<?php echo base_url();?>admin/pemeriksaanGigi">Data Pengkajian Awal</a>
                <a class="dropdown-item" href="<?php echo base_url();?>admin/rekam_medis_pasien_gigi">Data Rekam Medis</a>
              </div>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="<?= base_url();?>admin/penyakit">
                <i class="fas fa-fw fa-edit" style="color: white"></i>
                <span style="color: white">Data Penyakit</span>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="<?= base_url();?>admin/obat">
                <i class="fas fa-fw fa-edit" style="color: white"></i>
                <span style="color: white">Data Obat</span>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="<?= base_url();?>admin/dokter">
                <i class="fas fa-fw fa-edit" style="color: white"></i>
                <span style="color: white">Data Dokter</span>
            </a>
            </li>
        </ul>

      <div id="content-wrapper">

        <div class="container-fluid">
        <h2>Data Pasien Dokter Gigi</h2>
        <hr>
        <a class="btn btn-warning" href="<?=base_url()?>admin/pasien_gigi">Kembali</a>  
        <br>
        <br>
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Form Tambah Pasien
          </div>
          <div class="card-body">
            <form action="<?=base_url()?>admin/addPasienGigiDb" method="post">
              <div class="form-group">
                <label class="col-md-2 control-label" for="no_rekam_medis">Nomor Rekam Medis</label>
                <div class="col-md-11">
                  <input class="form-control" type="text" name="no_rekam_medis" id="no_rekam_medis" value="<?= $kode; ?>" readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label" for="no_KTP">Nomor KTP</label>
                <div class="col-md-11">
                  <input class="form-control" type="text" name="no_KTP" id="no_KTP" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label" for="nama_pasien">Nama Pasien</label>
                <div class="col-md-11">
                  <input class="form-control" type="text" name="nama_pasien" id="nama_pasien" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label" for="tanggal_lahir">Tanggal Lahir</label>
                <div class="col-md-11">
                  <input class="form-control" type="date" name="tanggal_lahir" id="tanggal_lahir" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label" for="jenis_kelamin">Jenis Kelamin</label>
                <br>
                <div class="col-md-11">
                  <div class="form-inline">
                    <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="laki-laki">Laki-Laki
                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="perempuan">Perempuan
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label" for="alamat">Alamat</label>
                <div class="col-md-11">
                  <textarea class="form-control" rows="3" name="alamat" id="alamat"></textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label" for="no_telp">Nomor Telepon</label>
                <div class="col-md-11">
                  <input class="form-control" type="text" name="no_telp" id="no_telp" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label" for="jenis_pasien">Jenis Pasien</label>
                <br>
                <div class="col-md-11">
                  <input type="radio" class="second" name="jenis_pasien" id="jenis_pasien_umum" value="umum">Umum
                  &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" class="second" name="jenis_pasien" id="jenis_pasien_BPJS" value="BPJS">BPJS
                  &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" class="second" name="jenis_pasien" id="jenis_pasien_PLN" value="PLN">PLN
                </div>
              </div>
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-5">
                    <label class="col-md-5 control-label" for="no_BPJS">Nomor BPJS</label>
                    <div class="col-md-12">
                      <input class="form-control" type="text" name="no_BPJS" id="no_BPJS">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label class="col-md-5 control-label" for="no_PLN">Nomor PLN</label>
                    <div class="col-md-12">
                      <input class="form-control" type="text" name="no_PLN" id="no_PLN">
                    </div>
                  </div>
              </div>
              <br>
              <br>
              <div class="text-center">
                    <button class="btn btn-success register_btn " name="register" onclick="return confirm('Yakin akan menambah data pasien?')">Simpan</button>
              </div>
            </form>
          </div>
        </div>
        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer" style="background-color: #4f915f; height: 30px">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span style="color: white">Copyright © Dien NoorFawziah P-Teknik Informatika UII 2019</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Anda yakin akan keluar?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Silahkan pilih tombol logout untuk keluar dari sistem ini.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="<?php echo base_url();?>page/logout">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?=base_url()?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?=base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?=base_url()?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="<?=base_url()?>assets/vendor/datatables/jquery.dataTables.js"></script>
    <script src="<?=base_url()?>assets/vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?=base_url()?>assets/js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="<?=base_url()?>assets/js/demo/datatables-demo.js"></script>

    <script type="text/javascript">
      $(document).ready(function() {
        if($("#jenis_pasien_umum").click(function() {
        document.getElementById("no_BPJS").disabled = true;
        document.getElementById("no_PLN").disabled = true;
        }));

        if($("#jenis_pasien_BPJS").click(function() {
        document.getElementById("no_BPJS").disabled = false;
        document.getElementById("no_PLN").disabled = true;
        }));

        if($("#jenis_pasien_PLN").click(function() {
        document.getElementById("no_BPJS").disabled = true;
        document.getElementById("no_PLN").disabled = false;
        }));
        
      });
    </script>
  </body>

</html>
