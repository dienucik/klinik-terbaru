
<?php 
$i = 1;
$bulan=null;
$jumlah=null;
if(isset($kunjungan_admin) and $kunjungan_admin): 
  foreach($kunjungan_admin as $row):
    $jumlah[]          =   $row->jumlah; 
    $bulan     =   "'".$row->bulan."', ".$bulan;

  endforeach; 

  $jumlah= array_reverse($jumlah);
endif; ?>

          <script type="text/javascript">
           Highcharts.chart('kunjungan_admin', {
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



<?php
$i = 1;
$bulan=null;
$jumlah=null;
if(isset($kunjungan_admin_gigi) and $kunjungan_admin_gigi): 
  foreach($kunjungan_admin_gigi as $row):
    $jumlah[]          =   $row->jumlah; 
    $bulan     =   "'".$row->bulan."', ".$bulan;

  endforeach; 

  $jumlah= array_reverse($jumlah);
endif; ?>

          <script type="text/javascript">
           Highcharts.chart('kunjungan_admin_gigi', {
              chart: {
                type: 'area'
              },
              title: {
                text: 'Kunjungan Pasien Pelayanan Dokter Gigi'
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


