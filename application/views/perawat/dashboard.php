
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
    <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
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
        <h2>Kunjungan Pasien</h2>
        <hr>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
            <h5 class="text-center">Pelayanan Dokter Umum</h5>
            <br>
              <div class="row">
              <div class="col-md-4" style="padding-right: 0">
                  <div class="card-header" style="background-color: #b5e7a0">
                    <?php 
                      setlocale(LC_ALL, 'IND');
                      $day = strftime('%d %B %Y');
                     ?>
                     <p class="category text-center" style="color: #000">Kunjungan Pasien Hari Ini (<?= $day; ?>)</p>
                  </div>
                  
                  <div class="card-body" style="background-color: #b5e7a0">
                  <?php 
                     echo '<h4 class="text-center" style="font-size: 50px">'.$visitorToday->jumlah.'</h4>'; 
                     ?>
                  </div>
                </div>
                <div class="col-md-4" style="padding: 0">
                  <div class="card-header" style="background-color: #b5e7a0">
                    <?php 
                      setlocale(LC_ALL, 'IND');
                      $bln = strftime('%B');
                     ?>
                     <p class="category text-center" style="color: #000">Kunjungan Pasien Bulan Ini (<?= $bln; ?>)</p>
                  </div>
                  
                  <div class="card-body" style="background-color: #b5e7a0">
                  <?php 
                     echo '<h4 class="text-center" style="font-size: 50px">'.$visitorThisMonth->jumlah.'</h4>'; 
                     // echo '<h4>Tahun ini: '.$visitorThisYear->jumlah.'</h4>'; 
                     
                     ?>
                  </div>
                </div>
                <div class="col-md-4" style="padding-left: 0">
                  <div class="card-header" style="background-color: #b5e7a0">
                    <?php 
                      setlocale(LC_ALL, 'IND');
                      $tahun = strftime('%Y');
                     ?>
                     <p class="category text-center" style="color: #000">Kunjungan Pasien Tahun Ini (<?= $tahun; ?>)</p>
                  </div>
                  
                  <div class="card-body" style="background-color: #b5e7a0">
                  <?php 
                     echo '<h4 class="text-center" style="font-size: 50px">'.$visitorThisYear->jumlah.'</h4>'; 
                     
                     ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
            <h5 class="text-center">Pelayanan Dokter Gigi</h5>
            <br>
              <div class="row">
                <div class="col-md-4" style="padding-right: 0">
                  <div class="card-header" style="background-color: #b1f9b6">
                    <?php 
                      setlocale(LC_ALL, 'IND');
                      $day = strftime('%d %B %Y');
                     ?>
                     <p class="category text-center" style="color: #000">Kunjungan Pasien Hari Ini (<?= $day; ?>)</p>
                     
                  </div>
                  <div class="card-body" style="background-color: #b1f9b6">
                  <?php 
                     
                     echo '<h4 class="text-center" style="font-size: 50px"> '.$visitorGigiToday->jumlah.'</h4>'; 
                     
                     ?>
                  </div>
                </div>
                <div class="col-md-4" style="padding: 0">
                  <div class="card-header" style="background-color: #b1f9b6">
                    <?php 
                      setlocale(LC_ALL, 'IND');
                      $bln = strftime('%B');
                     ?>
                     <p class="category text-center" style="color: #000">Kunjungan Pasien Bulan Ini (<?= $bln; ?>)</p>
                     
                  </div>
                  <div class="card-body" style="background-color: #b1f9b6">
                  <?php 
                     echo '<h4 class="text-center" style="font-size: 50px">'.$visitorGigiThisMonth->jumlah.'</h4>'; 
                     
                     ?>
                  </div>
                </div>
                <div class="col-md-4" style="padding-left: 0">
                  <div class="card-header" style="background-color: #b1f9b6">
                    <?php 
                      setlocale(LC_ALL, 'IND');
                      $tahun = strftime('%Y');
                     ?>
                     <p class="category text-center" style="color: #000">Kunjungan Pasien Tahun Ini (<?= $tahun; ?>)</p>
                     
                  </div>
                  <div class="card-body" style="background-color: #b1f9b6">
                  <?php 
                     echo '<h4 class="text-center" style="font-size: 50px">'.$visitorGigiThisYear->jumlah.'</h4>'; 
                     
                     ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <br>
          <form action="<?=base_url()?>manajemen/filter_tahun" method="post">
            <table>
                <tr>
                  <td class="text-center" width="5%">
                    <div class="form-group">Tahun :</div>
                  </td>
                  <td>
                    <div class="form-group" style="width: 150px;">
                      <select onchange="getTahun(this)" name="tahun" class="form-control" required >
                        <?php 
                            foreach($filterYear as $year) {
                        ?>
                         <option value="<?= $year->tahun; ?>"><?=$year->tahun; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </td>
                </tr>
            </table>
          </form>
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-chart-area"></i>
              Grafik Kunjungan Pasien</div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6" >
                  <div id="kunjungan_admin"></div>
                </div>
                <div class="col-md-6">
                  <div id="kunjungan_admin_gigi"></div>
                </div>
              </div>
            </div>
          </div>
          <br>
          <br>
          <h2>10 Besar Penyakit</h2>
          <hr>
          <form action="<?=base_url()?>manajemen/filter_tahun" method="post">
            <table>
                <tr>
                  <td class="text-center" width="5%">
                    <div class="form-group">Tahun :</div>
                  </td>
                  <td>
                    <div class="form-group" style="width: 150px;">
                      <select onchange="getTahunPenyakit(this)" name="tahun" class="form-control" required >
                        <?php 
                            foreach($filterYear as $year) {
                        ?>
                         <option value="<?= $year->tahun; ?>"><?=$year->tahun; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </td>
                </tr>
            </table>
          </form>
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-chart-area"></i>
              Grafik 10 Besar Penyakit</div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8" >
                  <div id="penyakit"></div>
                </div>
              </div>
            </div>
          </div>
          <br>
          <br>
          <h2>Penggunaan Obat</h2>
          <hr>
          <form action="<?=base_url()?>manajemen/filter_tahun" method="post">
            <table>
                <tr>
                  <td class="text-center" width="5%">
                    <div class="form-group">Tahun :</div>
                  </td>
                  <td>
                    <div class="form-group" style="width: 150px;">
                      <select onchange="getTahunObat(this)" name="tahun" class="form-control" required >
                        <?php 
                            foreach($filterYear as $year) {
                        ?>
                         <option value="<?= $year->tahun; ?>"><?=$year->tahun; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </td>
                </tr>
            </table>
          </form>
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-chart-area"></i>
              Grafik Penggunaan Obat</div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6" >
                  <div id="obat_admin"></div>
                </div>
                <div class="col-md-6">
                  <div id="obat_admin_gigi"></div>
                </div>
              </div>
            </div>
          </div>
          <script src="<?=base_url()?>assets/js/highcharts.js"></script>
          <script src="<?=base_url()?>assets/js/exporting.js"></script>
          <div id="testt">
          </div>
          <div id="testtt">
          </div>
          <div id="testtz">
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
    <script type="text/javascript">   
      var d = new Date();
      var n = d.getFullYear();
          var url = "<?=base_url('admin/getKunjunganPasienTahun/')?>"+n;
      $("#testt").load(url);
      function getTahun(data){
        var url = "<?=base_url('admin/getKunjunganPasienTahun/')?>"+data.value;

        console.log( url);
        $("#testt").load(url);
      };
    </script>
    <script type="text/javascript">   
      var d = new Date();
      var n = d.getFullYear();
          var url = "<?=base_url('admin/getObatTahun/')?>"+n;
      $("#testtt").load(url);
      function getTahunObat(data){
        var url = "<?=base_url('admin/getObatTahun/')?>"+data.value;

        console.log( url);
        $("#testtt").load(url);
      };
    </script>
    <script src="<?=base_url()?>assets/vendor/jquery/jquery.min.js"></script>
    <script type="text/javascript">  
    sessionStorage.clear();
  var d = new Date();
  var n = d.getFullYear();
          var url = "<?=base_url('admin/getPenyakitTahun/')?>"+n;
      $("#testtz").load(url);
    function getTahunPenyakit(data){
      var url = "<?=base_url('admin/getPenyakitTahun/')?>"+data.value;
      
      sessionStorage.setItem("year", data.value);

      console.log( url);
      $("#testtz").load(url);
    };
    </script>
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
