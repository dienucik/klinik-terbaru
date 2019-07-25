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
            <a class="dropdown-item" href="<?=base_url()?>super_admin/ganti_password">Ganti Password</a>
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
            <a class="nav-link" href="<?php echo base_url();?>super_admin/index">
                <i class="fas fa-fw fa-tachometer-alt" style="color: white"></i>
                <span style="color: white">Home</span>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>super_admin/penyakit">
                <i class="fas fa-fw fa-edit" style="color: white"></i>
                <span style="color: white">Data Penyakit</span>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>super_admin/obat">
                <i class="fas fa-fw fa-edit" style="color: white"></i>
                <span style="color: white">Data Obat</span>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>super_admin/kunjungan_pasien">
                <i class="fas fa-fw fa-chart-area" style="color: white"></i>
                <span style="color: white">Kunjungan Pasien</span>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>super_admin/penyakit_grafik">
                <i class="fas fa-fw fa-chart-area" style="color: white"></i>
                <span style="color: white">10 Besar Penyakit</span>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>super_admin/obat_grafik">
                <i class="fas fa-fw fa-chart-area" style="color: white"></i>
                <span style="color: white">Penggunaan Obat</span>
            </a>
            </li>
        </ul>

      <div id="content-wrapper">

        <div class="container-fluid">
        <h2>Data Dokter</h2>
        <hr>
        <a class="btn btn-success" href="<?=base_url()?>super_admin/index">Kembali</a>
        <a class="btn btn-warning" href="<?=base_url()?>super_admin/addDokter"><i class="fa fa-fw fa-plus"></i>Tambah Data Dokter</a>
        <br>
        <br>
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Tabel Data Dokter</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>No KTP</th>
                      <th>SIP</th>
                      <th>Nama Dokter</th>
                      <th>Alamat</th>
                      <th>No Telepon</th>
                      <th>Waktu Mulai</th>
                      <th>Waktu Selesai</th>
                      <th>Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i = 1;
                    foreach($listDokter->result() as $row) {
                ?>
                <tr>
                    <td><?=$i++;?></td>
                    <td><?= $row->no_KTP; ?></td>
                    <td><?= $row->sip; ?></td>
                    <td><?=$row->nama_dokter;?></td>
                    <td><?=$row->alamat;?></td>
                    <td><?=$row->no_telp;?></td>
                    <td><?= $row->waktu_mulai; ?></td>
                    <td><?= $row->waktu_selesai; ?></td>
                    <td align="center">
                        <a class="btn btn-primary btn-sm" href="<?=base_url()?>super_admin/addUser/<?=$row->id_dokter?>">Buat Akun</a>
                        <a class="btn btn-success btn-sm" href="<?=base_url()?>super_admin/updateDokter/<?=$row->id_dokter?>"><i class="fa fa-fw fa-edit"></i></a>
                        <a class="btn btn-danger btn-sm" href="<?=base_url()?>super_admin/deleteDokterDb/<?=$row->id_dokter?>" onclick="return confirm('Yakin akan menghapus data dokter?')"><i class="fa fa-fw fa-trash"></i></a>
                    </td>
                    <?php } ?>
                    </tr>
                  </tbody>
                </table>
              </div>
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

  </body>

</html>
