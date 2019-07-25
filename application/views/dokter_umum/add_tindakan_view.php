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

        [data-role="dynamic-fields"] > .form-inline [data-role="tambah_diagnosa"] {
            display: none;
        }

        [data-role="dynamic-fields"] > .form-inline:last-child [data-role="tambah"] {
            display: inline-block;
        }

        [data-role="dynamic-fields"] > .form-inline:last-child [data-role="tambah_diagnosa"] {
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

    <!-- Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src='<?=base_url()?>assets/select2/dist/js/select2.min.js' type='text/javascript'></script>
    <script src="jquery-2.1.4.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

    <!-- CSS -->
    <link href='<?=base_url()?>assets/select2/dist/css/select2.min.css' rel='stylesheet' type='text/css'>

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
            <a class="dropdown-item" href="<?=base_url()?>dokter/ganti_password">Ganti Password</a>
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
            <a class="nav-link" href="<?php echo base_url();?>dokter/index">
                <i class="fas fa-fw fa-edit" style="color: white"></i>
                <span style="color: white">Data Pemeriksaan</span>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>dokter/rekam_medis">
                <i class="fas fa-fw fa-edit" style="color: white"></i>
                <span style="color: white">Data Rekam Medis</span>
            </a>
            </li>
        </ul>

      <div id="content-wrapper">
      <div class="container-fluid">
        <h2>Data Tindakan</h2>
        <hr>
        <?php 
        foreach($tindakan->result() as $detail){
        ?>
        <a class="btn btn-warning" href="<?=base_url()?>dokter/index">Kembali</a> 
        
        <br>
        <br>
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Form Tambah Tindakan
          </div>
          <div class="card-body">
          <a class="btn btn-info" id="rekam_medis" href="<?=base_url()?>dokter/detail_rm_individu/<?=$detail->no_rekam_medis?>">Rekam Medis</a>
            <form action="<?=base_url()?>dokter/addTindakanDb" method="post">
              <div class="form-group">
                <label class="col-md-2 control-label" for="id_rm"></label>
                <div class="col-md-11">
                  <input class="form-control" type="hidden" name="id_rm" id="id_rm" value="<?= $detail->id_rm;?>" >
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label" for="no_rekam_medis">Nomor Rekam Medis</label>
                <div class="col-md-11">
                  <input class="form-control" type="text" name="no_rekam_medis" id="no_rekam_medis" value="<?= $detail->no_rekam_medis;?>" readonly >
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label" for="nama_pasien">Nama Pasien</label>
                <div class="col-md-11">
                  <input class="form-control" type="text" value="<?= $detail->nama_pasien;?>" name="nama_pasien" id="nama_pasien" readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label" for="tanggal_periksa">Tanggal Periksa</label>
                <div class="col-md-11">
                  <input class="form-control" type="date" name="tanggal_periksa" id="tanggal_periksa"  value="<?= $detail->tanggal_periksa;?>" readonly>
                </div>
              </div>
              <h4>Anamnesis</h4>
              <div class="form-group">
                <label class="col-md-2 control-label" for="keluhan">Keluhan</label>
                <div class="col-md-11">
                  <input class="form-control" type="text" name="keluhan" id="keluhan"  value="<?= $detail->keluhan;?>" readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label" for="alergi_obat">Alergi Obat</label>
                <div class="col-md-11">
                  <input class="form-control" type="text" name="alergi_obat" id="alergi_obat"  value="<?= $detail->alergi_obat;?>">
                </div>
              </div>
              <h4>Pengkajian Awal</h4>
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-5">
                    <label class="col-md-5 control-label" for="berat_badan">Berat Badan (Kg)</label>
                    <div class="input-group mb-md col-md-12">
                      <input class="form-control" type="text" name="berat_badan" id="berat_badan" value="<?= $detail->berat_badan;?>">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label class="col-md-5 control-label" for="tinggi_badan">Tinggi Badan (cm)</label>
                    <div class="input-group mb-md col-md-12">
                      <input class="form-control" type="text" name="tinggi_badan" id="tinggi_badan" value="<?= $detail->tinggi_badan;?>">
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-5">
                    <label class="col-md-5 control-label" for="sistolik">Sistolik (mmHg)</label>
                    <div class="input-group mb-md col-md-12">
                      <input class="form-control" type="text" name="sistolik" id="sistolik" value="<?= $detail->sistolik;?>">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label class="col-md-5 control-label" for="diastolik">Diastolik (mmHg)</label>
                    <div class="input-group mb-md col-md-12">
                      <input class="form-control" type="text" name="diastolik" id="diastolik" value="<?= $detail->diastolik;?>">
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-5">
                    <label class="col-md-5 control-label" for="nadi">Nadi (bpm)</label>
                    <div class="input-group mb-md col-md-12">
                      <input class="form-control" type="text" name="nadi" id="nadi" value="<?= $detail->nadi;?>">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label class="col-md-5 control-label" for="suhu">Suhu (°C)</label>
                    <div class="input-group mb-md col-md-12">
                      <input class="form-control" type="text" name="suhu" id="suhu" value="<?= $detail->suhu;?>">
                    </div>
                  </div>
                </div>
              </div>
              <h4>Penunjang</h4>
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-4">
                    <label class="col-md-9 control-label" for="kolesterol_tetap">Kolesterol Tetap (mg/dL)</label>
                    <div class="input-group mb-md col-md-12">
                      <input class="form-control" type="number" min="0" max="300" name="kolesterol_tetap" id="kolesterol_tetap" value="<?= $detail->kolesterol_tetap;?>" readonly>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <label class="col-md-9 control-label" for="gula_darah_sesaat">Gula Darah Sesaat (mg/dL)</label>
                    <div class="input-group mb-md col-md-12">
                      <input class="form-control" type="number" min="0" max="200" name="gula_darah_sesaat" id="gula_darah_sesaat" value="<?= $detail->gula_darah_sesaat;?>" readonly>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label class="col-md-9 control-label" for="asam_urat">Asam Urat (mg/dL)</label>
                    <div class="input-group mb-md col-md-12">
                      <input class="form-control" type="number" min="0" max="9" name="asam_urat" id="asam_urat" value="<?= $detail->asam_urat;?>" readonly>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label" for="temuan_dokter">Hasil Pemeriksaan</label>
                <h6 class="col-md-2" style="color: red; font-size: 14px">*Wajib diisi</h6>
                <div class="col-md-11">
                  <textarea class="form-control" type="text" name="temuan_dokter" id="temuan_dokter"  value="<?= $detail->temuan_dokter;?>" required ></textarea>
                </div>
              </div>
              <h4>Diagnosis</h4>
              <h6 class="col-md-2" style="color: red; font-size: 14px">*Wajib diisi</h6>
              <div class="form-group">
                <div class="col-md-11" id="kustom" data-role="dynamic-fields">
                <button type="button" data-role="tambah_diagnosa" class="btn btn-primary btn_add" id="add-more" >Tambah Diagnosis</button>
                <button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#diagnosaModal">Tambah
                Penyakit Baru</button>
                <br><br>
                <div class="form-inline">
                  <div id="listAmbilPenyakit" class="form-group"></div>
                  <span> &nbsp; </span>
                  <button class="btn btn-danger" data-role="hapus">
                      <span>X</span>
                  </button>
                </div> 
                </div>
              </div>
              <h4>Pengobatan</h4>
              <div class="form-group">
                <div class="col-md-11">
                  <textarea class="form-control" type="text" name="pemakaian_obat" id="pemakaian_obat"  value="<?= $detail->pemakaian_obat;?>"></textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label" for="rujuk">Rujukan</label>
                <div class="col-md-11">
                  <input class="form-control" type="text" name="rujuk" id="rujuk"  value="<?= $detail->rujuk;?>" >
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label" for="id_dokter">Dokter</label>
                <div class="col-md-11">
                  <input class="form-control" type="text" name="id_dokter" id="id_dokter"  value="<?= $detail->nama_dokter;?>" readonly >
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label" for="status_pasien">Status Pasien</label>
                <div class="col-md-11">
                <input class="form-control" type="text" name="status_pasien" id="status_pasien"  value="<?= $detail->status_pasien;?>" readonly>
                </div>
              </div>
              <br>
              <br>
              <div class="text-center">
                    <button class="btn btn-success register_btn" id="register" name="register" onclick="return confirm('Yakin akan menambah data tindakan?')">Simpan</button>
              </div>
            </form>
            <?php } ?>
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

    <div class="modal fade" id="diagnosaModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button id="keluar" type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Masukkan Penyakit Baru</h4>
            </div>
            <div class="modal-body">
                <form class="col-lg-12" id="modal-forms-data" action="<?=base_url('dokter/addDiagnosa')?>"
                    method="post">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="tambah_diagnosa">Nama Penyakit</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="tambah_diagnosa">
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
    
    <script>
    // Remove button click
    
    var obcounter = 1;

    $(function() {
      $('select[name="nama_obat"]').on('change', function() {
        var nama_obat = $("option:selected", this).prop("value");
        $.ajax({
            type: "POST",
            url: ajax.php,
            data: {nama_obat: nama_obat},
            success: function(data) {
              $('select[name="satuan"]').html(data);
            }
        });
      });
    });
    
            $(document).on(
                'click',
                '[data-role="dynamic-fields"] > .form-inline [data-role="hapus"]',
                function(e) {
                    obcounter--;
                    e.preventDefault();
                    $(this).closest('.form-inline').remove();
                }
            );
            // Add button click
    
      $(document).on(
                'click',
                '[data-role="dynamic-fields"] > [data-role="tambah"]',
                function(e) {
                    obcounter++;
                    e.preventDefault();
                    if ($('.nama_order').length > 10) {
                        alert('Maksimal Obat : 10');
                    } else {
                    var container = $(this).closest('[data-role="dynamic-fields"]');
                       // new_field_group = container.children().filter('.form-inline:first-child').clone();
                       // new_field_group.find('input').each(function(){
                       // $(this).val('');
                       // });
                    new_field_group = '';
                    new_field_group += '<div class="form-inline">';
                    new_field_group += '<div class="form-group">';
                    new_field_group += '<select class="form-control nama_obat" name="nama_obat[]" onchange="getSatuan(this, '+ obcounter +')" placeholder="Masukkan nama obat" style="width: 270px" id="obat-'+obcounter+'">';
                    new_field_group += '<option value="-">Masukkan Nama Obat</option>';
                    new_field_group += '<?php foreach($listAmbilObat->result() as $row) { ?>';
                    new_field_group += '<option value="<?=$row->id_obat?>"><?=$row->nama_obat?></option>';
                    new_field_group += '<?php } ?>';
                    new_field_group += '</select>';
                    new_field_group += '</div>';
                    new_field_group += '<span> &nbsp; </span>';
                    new_field_group += '<div class="form-group">';
                    new_field_group += '<input type="text" class="form-control jumlah" name="jumlah[]" placeholder="Masukkan jumlah obat" style="width: 270px">';
                    new_field_group += '</div> ';
                    new_field_group += '<span> &nbsp; </span>';
                    new_field_group += '<div class="form-group">';
                    new_field_group += '<input type="text" class="form-control" id="satuan-'+obcounter+'" name="satuan" style="width: 270px" disabled>';
                    new_field_group += '</div> ';
                    new_field_group += '<span> &nbsp; </span>';
                    new_field_group += '<div class="form-group">';
                    new_field_group += '<input type="text" class="form-control dosis" name="dosis[]" placeholder="Masukkan dosis obat" style="width: 270px">';
                    new_field_group += '</div> ';
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
                $('#diagnosaModal').modal('toggle')
            },
            error: function(data) {
              console.log('An error occurred.');
            },
        });
    });


listAmbilPenyakit();

function listAmbilPenyakit() {
    $("#listAmbilPenyakit").load("<?=base_url('dokter/listAmbilPenyakit')?>");
}
</script>

<!-- bagian diagnosa -->
<script>
    // Remove button click
            $(document).on(
                'click',
                '[data-role="dynamic-fields"] > .form-inline [data-role="hapus"]',
                function(e) {
                    counter--;
                    e.preventDefault();
                    $(this).closest('.form-inline').remove();
                }
            );
            // Add button click
    
      $(document).on(
                'click',
                '[data-role="dynamic-fields"] > [data-role="tambah_diagnosa"]',
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
                    new_field_group += '<select id="diagnosa" class="form-control nama_penyakit" name="nama_penyakit[]" placeholder="Masukkan nama penyakit" style="width: 1100px">';
                    new_field_group += '<option value="" disabled selected>Pilih Penyakit</option>';
                    new_field_group += '<?php foreach($listAmbilPenyakit->result() as $row) { ?>';
                    new_field_group += '<option value="<?=$row->id_penyakit?>"><?=$row->nama_penyakit?></option>';
                    new_field_group += '<?php } ?>';
                    new_field_group += '</select>';
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

<script type="text/javascript">
   $(document).ready(function() {
  
     $("#register").click(function() {
       $("#status_pasien").val("sudah diperiksa");
     })
  
   });
</script>

<!-- <script type="text/javascript">
   $(document).ready(function() {
    var id = document.getElementById("no_rekam_medis");
     $("#rekam_medis").click(function() {
       redirect('<?=base_url()?>dokter/rekam_medis_pribadi/', id)
     })
  
   });
</script> -->



<script>
    //membuat array javascript untuk obat
    var jenis_obat = {
    <?php
    foreach($listAmbilObat->result() as $row) { 
            echo 'jenis_obat_'.$row->id_obat.': "'.$row->satuan.'",';
    }
    ?>
    };
    
    //fungsi mengubah satuan
    
    function getSatuan(el, obcounter) {
        $("#satuan-"+obcounter).val(jenis_obat['jenis_obat_'+el.value+'']);
    }
</script>


  </body>

</html>
