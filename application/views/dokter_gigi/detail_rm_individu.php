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

    <script src="<?=base_url()?>assets/vendor/jquery/jquery.min.js"></script>

    <style>
     [data-role="dynamic-fields"] > .form-inline + .form-inline {
            margin-top: 0.5em;
        }

        [data-role="dynamic-fields"] > .form-inline [data-role="tambah"] {
            display: none;
        }

        [data-role="dynamic-fields"] > .form-inline:last-child [data-role="tambah"] {
            display: inline-block;
        }

        [data-role="dynamic-fields"] > .form-inline:last-child [data-role="hapus"] {
            display: none;
        }

        table.dataTable tr th.select-checkbox.selected::after {
            content: "✔";
            margin-top: 6px;
            margin-left: -4px;
            text-align: center;
            text-shadow: rgb(176, 190, 217) 1px 1px, rgb(176, 190, 217) -1px -1px, rgb(176, 190, 217) 1px -1px, rgb(176, 190, 217) -1px 1px;
        }
    </style>


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
            <a class="dropdown-item" href="<?=base_url()?>dokter_gigi/ganti_password">Ganti Password</a>
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
            <a class="nav-link" href="<?php echo base_url();?>dokter_gigi/index">
                <i class="fas fa-fw fa-edit" style="color: white"></i>
                <span style="color: white">Data Pemeriksaan</span>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>dokter_gigi/rekam_medis">
                <i class="fas fa-fw fa-edit" style="color: white"></i>
                <span style="color: white">Data Rekam Medis</span>
            </a>
            </li>
        </ul>

      <div id="content-wrapper">

        <div class="container-fluid">
        <h2>Data Rekam Medis</h2>
        <hr>
        <a class="btn btn-warning"  onclick="history.back(-1)">Kembali</a>
        <table width="39%" border="0" align="center" cellpadding="1" cellspacing="1">
         <tr>
             <td width="141" height="21">No Rekam Medis</td>
             <td width="4">:</td>
             <td width="274"><?= $listPasien->no_rekam_medis; ?></td>
         </tr>
         <tr>
             <td width="141" height="21">No KTP</td>
             <td width="4">:</td>
             <td width="274"><?= $listPasien->no_KTP; ?></td>
         </tr>
         <tr>
             <td width="141" height="21">Nama</td>
             <td width="4">:</td>
             <td width="274"><?= $listPasien->nama_pasien; ?></td>
         </tr>
         <tr>
             <td width="141" height="21">Tanggal Lahir</td>
             <td width="4">:</td>
             <td width="274"><?= $listPasien->tanggal_lahir; ?></td>
         </tr>
         <tr>
             <td width="141" height="21">Jenis Kelamin</td>
             <td width="4">:</td>
             <td width="274"><?= $listPasien->jenis_kelamin; ?></td>
         </tr>
         <tr>
             <td width="141" height="21">Alamat</td>
             <td width="4">:</td>
             <td width="274"><?= $listPasien->alamat; ?></td>
         </tr>
         <tr>
             <td width="141" height="21">No Telepon</td>
             <td width="4">:</td>
             <td width="274"><?= $listPasien->no_telp; ?></td>
         </tr>
         <tr>
             <td width="141" height="21">Jenis Pasien</td>
             <td width="4">:</td>
             <td width="274"><?= $listPasien->jenis_pasien; ?></td>
         </tr>
         <tr>
             <td width="141" height="21">No BPJS</td>
             <td width="4">:</td>
             <td width="274"><?= $listPasien->no_BPJS; ?></td>
         </tr>
         <tr>
             <td width="141" height="21">No PLN</td>
             <td width="4">:</td>
             <td width="274"><?= $listPasien->no_PLN; ?></td>
         </tr>
    </table>
    <br>
    <br>
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Tabel Data Rekam Medis</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Tanggal Periksa</th>
                        <th>Keluhan</th>
                        <th>Alergi Obat</th>
                        <th>Alergi Makanan</th>
                        <th>Golongan Darah</th>
                        <th>Sistolik</th>
                        <th>Diastolik</th>
                        <th>Nadi</th>
                        <th>Occlusi</th>
                        <th>Torus Palatinus</th>
                        <th>Torus Mandibularis</th>
                        <th>Palatum</th>
                        <th>Diastema</th>
                        <th>Keterangan Diastema</th>
                        <th>Gigi Anomali</th>
                        <th>Keterangan Gigi Anomali</th>
                        <th>Lain-lain</th>
                        <th>Odontogram</th>
                        <th>Penggunaan Obat</th>
                        <th>Dokter</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach($listPasienRM->result() as $row) {
                ?>
                <tr>
                    <td><?= $row->tanggal_periksa; ?></td>
                    <td><?=$row->keluhan;?></td>
                    <td><?=$row->alergi_obat;?></td>
                    <td><?=$row->alergi_makanan;?></td>
                    <td><?=$row->golongan_darah;?></td>
                    <td><?=$row->sistolik;?></td>
                    <td><?=$row->diastolik;?></td>
                    <td><?=$row->nadi;?></td>
                    <td><?=$row->occlusi;?></td>
                    <td><?=$row->torus_palatinus;?></td>
                    <td><?=$row->torus_mandibularis;?></td>
                    <td><?= $row->palatum; ?></td>
                    <td><?= $row->diastema; ?></td>
                    <td><?= $row->ket_diastema; ?></td>
                    <td><?= $row->gigi_anomali; ?></td>
                    <td><?= $row->ket_gigi_anomali; ?></td>
                    <td><?=$row->lain_lain;?></td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="<?=base_url()?>dokter_gigi/odontogram_individu/<?=$row->id_rm?>">Detail Odontogram</a>
                    </td>
                    <td>
<!--                      <?php foreach ($pemakaianObat->result() as $obat) { ?>
                      <?= $obat->nama_obat; ?>, <?= $obat->jumlah; ?>, <?= $obat->dosis; ?><br>
                     <?php } ?> -->
                     <a class="btn btn-primary btn-sm" href="<?=base_url()?>dokter_gigi/detail_obat_individu/<?=$row->id_rm?>">Detail Obat</a>
                    </td>
                    <td><?= $row->id_dokter; ?></td>
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
