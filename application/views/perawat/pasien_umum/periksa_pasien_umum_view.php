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
    <link href="<?=base_url()?>assets/css/select2.min.css" rel="stylesheet" />

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

        [data-role="dynamic-fields"] > .form-inline [data-role="tambah_riwayat"] {
            display: none;
        }

        [data-role="dynamic-fields"] > .form-inline:last-child [data-role="tambah_riwayat"] {
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
        label {
          color: red;
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
        <h2>Data Pasien Dokter Umum</h2>
        <hr>
        <a class="btn btn-warning" href="<?=base_url()?>admin/pasien">Kembali</a>  
        <br>
        <br>
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Form Pengkajian Awal
          </div>
          <div class="card-body">
            <form action="<?=base_url()?>admin/periksaPasienDb/" method="post" id="frm_periksa">
              <div class="form-group">
                <label class="col-md-2 control-label" for="id_pasien" ></label>
                <div class="col-md-11">
                  <input class="form-control" type="hidden" name="id_pasien" id="id_pasien" value="<?php echo $periksa->id_pasien; ?>">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label" for="no_rekam_medis" style="color: black">Nomor Rekam Medis</label>
                <div class="col-md-11">
                  <input class="form-control" type="text" name="no_rekam_medis" id="no_rekam_medis" value="<?php echo $periksa->no_rekam_medis; ?>" readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label" for="nama_pasien" style="color: black">Nama Pasien</label>
                <div class="col-md-11">
                  <input class="form-control" type="text" name="nama_pasien" id="nama_pasien" value="<?php echo $periksa->nama_pasien; ?>" readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label" for="keluhan" style="color: black">Keluhan</label>
                <div class="col-md-11">
                  <textarea class="form-control" type="text" name="keluhan" id="keluhan" required></textarea>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-11" id="kustom" data-role="dynamic-fields">
                <button type="button" data-role="tambah_riwayat" class="btn btn-primary btn_add" id="add-more" >Tambah Riwayat</button>
                <button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#riwayatModal">Tambah
                Penyakit Baru</button>
                <br><br>
                <label for="riwayat_penyakit" style="color: black">Riwayat Penyakit</label>
                <h6 style="color: red; font-size: 14px;">*isi dengan "tidak ada" apabila tidak memiliki riwayat penyakit!</h6>
                <div class="form-inline">
                  <div id="listAmbilPenyakit" class="form-group"></div>
                  <span> &nbsp; </span>
                  <button class="btn btn-danger" data-role="hapus">
                      <span>X</span>
                  </button>
                </div> 
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label" for="alergi_obat" style="color: black">Alergi Obat</label>
                <div class="col-md-11">
                  <input class="form-control" type="text" name="alergi_obat" id="alergi_obat">
                </div>
              </div>
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-5">
                    <label class="col-md-5 control-label" for="berat_badan" style="color: black">Berat Badan (Kg)</label>
                    <div class="input-group mb-md col-md-12">
                      <input class="form-control" type="number" min="0" max="500" name="berat_badan" id="berat_badan" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label class="col-md-5 control-label" for="tinggi_badan" style="color: black">Tinggi Badan (cm)</label>
                    <div class="input-group mb-md col-md-12">
                      <input class="form-control" type="number" min="50" max="2700" name="tinggi_badan" id="tinggi_badan" required>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-5">
                    <label class="col-md-5 control-label" for="sistolik" style="color: black">Sistolik (mmHg)</label>
                    <div class="input-group mb-md col-md-12">
                      <input class="form-control" type="number" min="80" max="160" name="sistolik" id="sistolik" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label class="col-md-5 control-label" for="diastolik" style="color: black">Diastolik (mmHg)</label>
                    <div class="input-group mb-md col-md-12">
                      <input class="form-control" type="number" min="50" max="300" name="diastolik" id="diastolik" required>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-5">
                    <label class="col-md-5 control-label" for="nadi" style="color: black">Nadi (bpm)</label>
                    <div class="input-group mb-md col-md-12">
                      <input class="form-control" type="number" min="40" max="200" name="nadi" id="nadi" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label class="col-md-5 control-label" for="suhu" style="color: black">Suhu (°C)</label>
                    <div class="input-group mb-md col-md-12">
                      <input class="form-control" type="number" min="15" max="45" name="suhu" id="suhu" required>
                    </div>
                  </div>
                </div>
              </div>
              <h4>Penunjang</h4>
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-4">
                    <label class="col-md-9 control-label" for="kolesterol_tetap" style="color: black">Kolesterol Tetap (mg/dL)</label>
                    <div class="input-group mb-md col-md-12">
                      <input class="form-control" type="number" min="0" max="300" name="kolesterol_tetap" id="kolesterol_tetap" >
                    </div>
                  </div>
                  <div class="col-md-3">
                    <label class="col-md-9 control-label" for="gula_darah_sesaat" style="color: black">Gula Darah Sesaat (mg/dL)</label>
                    <div class="input-group mb-md col-md-12">
                      <input class="form-control" type="number" min="0" max="200" name="gula_darah_sesaat" id="gula_darah_sesaat" >
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label class="col-md-9 control-label" for="asam_urat" style="color: black">Asam Urat (mg/dL)</label>
                    <div class="input-group mb-md col-md-12">
                      <input class="form-control" type="number" min="0" max="9" name="asam_urat" id="asam_urat" >
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label" for="nama_dokter" style="color: black">Dokter</label>
                <div class="col-md-11">
                <?php 
                date_default_timezone_set('Asia/Jakarta');
                  foreach ($listAmbilDokter->result() as $row) {
                        $idDokter = NULL;
                        $namaDokter = 'Tidak ada dokter praktek sekarang';
                        
                        if (time() >= strtotime($row->waktu_mulai) && time() <= strtotime($row->waktu_selesai))
                        {
                            $idDokter = $row->id_dokter;
                            $namaDokter = $row->nama_dokter;
                            
                            break;
                        }
                  }
                  
                 ?>
                    <input class="form-control" type="text" name="nama_dokter" id="nama_dokter" value="<?php echo $namaDokter; ?>" readonly>
                    <input class="form-control" type="hidden" name="id_dokter" id="id_dokter" value="<?php echo $idDokter; ?>">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label" for="status_pasien" style="color: black">Status Pasien</label>
                <div class="col-md-11">
                  <input class="form-control" type="text" value="antri" name="status_pasien" id="status_pasien" readonly>
                </div>
              </div>
              <br>
              <br>
              <div class="text-center">
                    <button class="btn btn-success register_btn " name="register" onclick="return validasi()">Simpan</button>
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
    <!-- modal -->
    <div class="modal fade" id="riwayatModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button id="keluar" type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Masukkan Penyakit Baru</h4>
            </div>
            <div class="modal-body">
                <form class="col-lg-12" id="modal-forms-data" action="<?=base_url('admin/addRiwayatPenyakit')?>"
                    method="post">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="tambah_riwayat">Nama Penyakit</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="tambah_riwayat">
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-default">Submit</button>
            </div>
            </form>

        </div>
    </div>
</div>
<div class="modal fade" id="alergiModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button id="keluar" type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Masukkan Obat Baru</h4>
            </div>
            <div class="modal-body">
                <form class="col-lg-12" id="modal-forms-data-obat" action="<?=base_url('admin/addRiwayatAlergi')?>"
                    method="post">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="tambah_obat">Nama Obat</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="tambah_obat">
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-default">Submit</button>
            </div>
            </form>

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

    <script src="<?=base_url()?>assets/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.js"></script>

    <script type="text/javascript">
      $(document).ready(function() {
        $('.js-example-basic-multiple').select2();

      });
    </script>

    <script>

var frm = $('#modal-forms-data');
frm.submit(function(e) {
       //console.log('aa');
        e.preventDefault();

        $.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: frm.serialize(),
            success: function(data) {
                console.log('Submission was successful.');
                listAmbilPenyakit();
                $('#riwayatModal').modal('toggle')
            },
            error: function(data) {
              console.log('An error occurred.');
            },
        });
    });


listAmbilPenyakit();

function listAmbilPenyakit() {
    $("#listAmbilPenyakit").load("<?=base_url('admin/listAmbilPenyakit')?>");
}
</script>

<script>
    // Remove button click
            $(document).on(
                'click',
                '[data-role="dynamic-fields"] > .form-inline [data-role="hapus"]',
                function(e) {
                    e.preventDefault();
                    $(this).closest('.form-inline').remove();
                }
            );
            // Add button click
    
      $(document).on(
                'click',
                '[data-role="dynamic-fields"] > [data-role="tambah_riwayat"]',
                function(e) {
                    e.preventDefault();
                    if ($('.nama_order').length > 10) {
                        alert('Maksimal penyakit : 10');
                    } else {
                    var container = $(this).closest('[data-role="dynamic-fields"]');
                       // new_field_group = container.children().filter('.form-inline:first-child').clone();
                       // new_field_group.find('input').each(function(){
                       // $(this).val('');
                       // });
                    new_field_group = '';
                    new_field_group += '<div class="form-inline">';
                    new_field_group += '<div class="form-group">';
                    new_field_group += '<select id="riwayat" class="form-control nama_penyakit" name="nama_penyakit[]" placeholder="Masukkan nama penyakit" id="riwayat_penyakit" style="width: 1100px">';
                    new_field_group += '<option value="-">Masukkan Nama Penyakit</option>';
                    new_field_group += '<?php foreach($listAmbilPenyakit->result() as $row) { ?>';
                    new_field_group += '<option value="<?=$row->id_penyakit?>"><?=$row->nama_penyakit?></option>';
                    new_field_group += '<?php } ?>';
                    new_field_group += '</select>';
                    new_field_group += '</div>';
                    new_field_group += '<span> &nbsp; </span>';
                    new_field_group += '<button class="btn btn-danger" data-role="hapus">';
                    new_field_group += '<span>X</span>';
                    new_field_group += '</button>';
                    new_field_group += '</div>';

                    container.append(new_field_group);
                    }
                }
            );

</script>
</body>

</html>
