
<?php
$i = 1; 
$nama=null;
$total=null;
if(isset($penyakit) and $penyakit): 
  foreach($penyakit as $row):
    $total[]          =   $row->total; 
    $nama     =   "'".$row->nama."', ".$nama;

  endforeach; 

  $total= array_reverse($total);
endif; ?>

<script type="text/javascript">
Highcharts.chart('penyakit', {
    chart: {
        type: 'column'
    },
    title: {
        text: '10 Besar Penyakit'
    },
    subtitle: {
        text: 'Klinik Sehat Kota Salatiga'
    },
    xAxis: {
        categories: [<?php echo $nama ?>],
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
            '<td style="padding:0"><b>{point.y} orang</b></td></tr>',
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
        name: 'Jumlah',
        data: [<?php echo join($total, ',') ?>]
    }]
});
</script>


<div id="tabel_penyakit">
  <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Penyakit</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>
     
      <?php
      if(isset($penyakit) and $penyakit): 
        foreach($penyakit as $row): ?>
        <tr>
          <td><?= $i++; ?></td>
          <td><?= $row->nama; ?></td>
          <td><?= $row->total; ?></td>
        </tr>
      <?php  endforeach;
        endif; ?>
      </tbody>
    </table>
  </div>
</div>
