
<?php 
$i = 1;
$namaObat=null;
$total=null;
if(isset($obat) and $obat): 
  foreach($obat as $row):
    $total[]          =   $row->total; 
    $namaObat     =   "'".$row->namaObat."', ".$namaObat;

  endforeach; 

  $total= array_reverse($total);
endif; ?>

<script type="text/javascript">
  
Highcharts.chart('obat', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Penggunaan Obat Pelayanan Dokter Umum'
    },
    subtitle: {
        text: 'Klinik Sehat Kota Salatiga'
    },
    xAxis: {
        categories: [<?php echo $namaObat ?>],
        crosshair: true,
        title: {
          text: 'nama obat'
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Total'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y} buah</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Jumlah Penggunaan',
        data: [<?php echo join($total, ',') ?>]
    }]
});
</script>
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
<div id="tabel_obat">
  <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>No</th>
          <th class="text-center">Nama Obat</th>
          <th class="text-center" style="width: 30%">Total Penggunaan</th>
        </tr>
      </thead>
      <tbody>
     
      <?php
      if(isset($obat) and $obat): 
        foreach($obat as $row): ?>
        <tr>
          <td><?= $i++; ?></td>
          <td class="text-center"><?= $row->namaObat; ?></td>
          <td class="text-center"><?= $row->total; ?></td>
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

