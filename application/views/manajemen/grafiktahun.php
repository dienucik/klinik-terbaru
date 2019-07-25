
<?php 
$i = 1;
$bulan=null;
$jumlah=null;
if(isset($kunjungan) and $kunjungan): 
  foreach($kunjungan as $row):
    $jumlah[]          =   $row->jumlah; 
    $bulan     =   "'".$row->bulan."', ".$bulan;

  endforeach; 

  $jumlah= array_reverse($jumlah);
endif; ?>

          <script type="text/javascript">
           Highcharts.chart('kunjungan', {
              chart: {
                type: 'area'
              },
              title: {
                text: 'Kunjungan Pasien Pelayanan Dokter Umum'
              },
              subtitle: {
                text: 'Klinik Sehat Kota Salatiga'
              },
              xAxis: {
                categories: [<?php echo $bulan ?>],
                tickmarkPlacement: 'on',
                title: {
                  text: 'Bulan'
                }
              },
              yAxis: {
                title: {
                  text: 'Total Kunjungan'
                },
                labels: {
                  formatter: function () {
                    return this.value;
                  }
                }
              },
              tooltip: {
                split: true,
                valueSuffix: ' orang'
              },
              plotOptions: {
                area: {
                  stacking: 'normal',
                  lineColor: '#666666',
                  lineWidth: 1,
                  marker: {
                    lineWidth: 1,
                    lineColor: '#666666'
                  }
                }
              },
              series: [{
                name: 'Jumlah Pasien',
                data: [<?php echo join($jumlah, ',') ?>]
              }]
            });
          </script>
<!-- 
<div id="tabel_kunjungan">
  <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>No</th>
          <th>Bulan</th>
          <th>Jumlah Pasien</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><?= $i++; ?></td>
          <td><?= $bulan; ?></td>
          <td><?= join($jumlah, ',') ?></td>
        </tr>
      </tbody>
    </table>
  </div>
</div> -->
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


    <link href="<?=base_url()?>assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?=base_url()?>assets/css/sb-admin.css" rel="stylesheet">
    <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
  </head>
<div id="tabel_kunjungan_gigi">
  <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>No</th>
          <th>Bulan</th>
          <th>Total Pengunjung</th>
        </tr>
      </thead>
      <tbody>
     
      <?php
      if(isset($kunjungan) and $kunjungan): 
        foreach($kunjungan as $row): ?>
        <tr>
          <td><?= $i++; ?></td>
          <td><?= $row->bulan; ?></td>
          <td><?= $row->jumlah; ?></td>
        </tr>
      <?php  endforeach;
        endif; ?>
      </tbody>
    </table>
  </div>
</div>

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


