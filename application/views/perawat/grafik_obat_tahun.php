<?php 
$i = 1;
$namaObat=null;
$total=null;
if(isset($obat_admin) and $obat_admin): 
  foreach($obat_admin as $row):
    $total[]          =   $row->total; 
    $namaObat     =   "'".$row->namaObat."', ".$namaObat;

  endforeach; 

  $total= array_reverse($total);
endif; ?>

<script type="text/javascript">
  
Highcharts.chart('obat_admin', {
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

<?php 
$i = 1;
$namaObat=null;
$total=null;
if(isset($obat_admin_gigi) and $obat_admin_gigi): 
  foreach($obat_admin_gigi as $row):
    $total[]          =   $row->total; 
    $namaObat     =   "'".$row->namaObat."', ".$namaObat;

  endforeach; 

  $total= array_reverse($total);
endif; ?>

<script type="text/javascript">
  
Highcharts.chart('obat_admin_gigi', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Penggunaan Obat Pelayanan Dokter Gigi'
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
