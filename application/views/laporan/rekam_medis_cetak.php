<!-- Bootstrap core CSS-->
    <link href="<?=base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!--   <div class="wrapper">
    <div class="content"> -->
      <div class="card">
        <div class="card-header" align="center">
          <h2>Klinik Sehat Kota Salatiga</h2>
          <h5 style="padding-top: 0;">Jl. Argoboga No.58, Ledok, Argomulyo, Kota Salatiga, Jawa Tengah 50732</h5>
          <hr>
        </div>
        <div class="card-header" align="center">
          <h4 class="card-title">Catatan Rekam Medis Pasien</h4>
          <h5>Pelayanan Dokter Umum</h5>
        </div>
        <br>
        <table width="55%" border="0" align="center" cellpadding="1" cellspacing="1">
         <tr>
             <td width="300" height="21">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No Rekam Medis</td>
             <td width="4">:</td>
             <td width="274">&nbsp;&nbsp;&nbsp;&nbsp;<?= $listPasien->no_rekam_medis; ?></td>
         </tr>
         <tr>
             <td width="300" height="21">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No KTP</td>
             <td width="4">:</td>
             <td width="274">&nbsp;&nbsp;&nbsp;&nbsp;<?= $listPasien->no_KTP; ?></td>
         </tr>
         <tr>
             <td width="300" height="21">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama</td>
             <td width="4">:</td>
             <td width="400">&nbsp;&nbsp;&nbsp;&nbsp;<?= $listPasien->nama_pasien; ?></td>
         </tr>
         <tr>
             <td width="300" height="21">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tanggal Lahir</td>
             <td width="4">:</td>
             <td width="274">&nbsp;&nbsp;&nbsp;&nbsp;<?= $listPasien->tanggal_lahir; ?></td>
         </tr>
         <tr>
             <td width="300" height="21">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Jenis Kelamin</td>
             <td width="4">:</td>
             <td width="274">&nbsp;&nbsp;&nbsp;&nbsp;<?= $listPasien->jenis_kelamin; ?></td>
         </tr>
         <tr>
             <td width="300" height="21">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alamat</td>
             <td width="4">:</td>
             <td width="400">&nbsp;&nbsp;&nbsp;&nbsp;<?= $listPasien->alamat; ?></td>
         </tr>
         <tr>
             <td width="300" height="21">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No Telepon</td>
             <td width="4">:</td>
             <td width="274">&nbsp;&nbsp;&nbsp;&nbsp;<?= $listPasien->no_telp; ?></td>
         </tr>
         <tr>
             <td width="300" height="21">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Jenis Pasien</td>
             <td width="4">:</td>
             <td width="274">&nbsp;&nbsp;&nbsp;&nbsp;<?= $listPasien->jenis_pasien; ?></td>
         </tr>
         <tr>
             <td width="300" height="21">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No BPJS</td>
             <td width="4">:</td>
             <td width="274">&nbsp;&nbsp;&nbsp;&nbsp;<?= $listPasien->no_BPJS; ?></td>
         </tr>
         <tr>
             <td width="300" height="21">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No PLN</td>
             <td width="4">:</td>
             <td width="274">&nbsp;&nbsp;&nbsp;&nbsp;<?= $listPasien->no_PLN; ?></td>
         </tr>
    </table>
    <br><br>
    <div class="row">
      <div class="col">
        <table class="table table-bordered" width="100%" cellspacing="0" >
      <thead >
        <tr>
           <th>Tanggal Periksa</th>
            <th>Keluhan</th>
            <th>Berat Badan</th>
            <th>Tinggi Badan</th>
            <th>Sistolik</th>
            <th>Diastolik</th>
            <th>Nadi</th>
            <th>Suhu</th>
            <th>Kolesterol Tetap</th>
            <th>Gula Darah Sesaat</th>
            <th>Asam Urat</th>
            <th>Temuan Dokter</th>
            <th>Rujuk</th>
            <th>Dokter</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach($listPasienRM->result() as $row) {
    ?>
    <tr>
        <td><?=$row->tanggal_periksa; ?></td>
        <td><?=$row->keluhan;?></td>
        <td><?=$row->berat_badan;?></td>
        <td><?=$row->tinggi_badan;?></td>
        <td><?=$row->sistolik;?></td>
        <td><?=$row->diastolik;?></td>
        <td><?=$row->nadi;?></td>
        <td><?=$row->suhu;?></td>
        <td><?=$row->kolesterol_tetap;?></td>
        <td><?=$row->gula_darah_sesaat;?></td>
        <td><?= $row->asam_urat; ?></td>
        <td><?= $row->temuan_dokter; ?></td>
        <td><?= $row->rujuk; ?></td>
        <td><?= $row->nama_dokter; ?></td>
        <?php } ?>
        </tr>
      </tbody>
    </table>
      </div>
    </div>
    <br>  <br>  
    <div class="row">
       <div class="col-md-12">
         <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
           <thead>
             <tr>
              <th>Tanggal Periksa</th>
               <th>Diagnosis</th>
               <th>Resep</th>
             </tr>
           </thead>
           <tbody>
          <?php foreach ($listDiagnosa->result() as $row) { ?>
             <tr>
               <td><?= $row->tanggal_periksa; ?></td>
               <td><?= $row->nama_penyakit; ?></td>
               <td><?= $row->pemakaian_obat; ?></td>
               <?php } ?>
             </tr>
           </tbody>
         </table>
       </div> 
    </div>

      </div>
<!--     </div>
  </div> -->

      <script src="<?= base_url(); ?>assets/js/codejs.min.js"></script>
      
    <script type="text/javascript">
    $(document).ready(function(){
    setTimeout(function(){ 
     window.print();
      window.history.back();
     return false;
    
    }, 1400);
    });
    </script>
