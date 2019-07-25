<!-- Bootstrap core CSS-->
    <link href="<?=base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
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
          <h5>Pelayanan Dokter Gigi</h5>
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
                        <th>Ket Diastema</th>
                        <th>Gigi Anomali</th>
                        <th>Ket Gigi Anomali</th>
                        <th>Lain-lain</th>
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
                    <td><?= $row->id_dokter; ?></td>
                    <?php } ?>
                    </tr>
                  </tbody>
                </table>
      </div>
    </div>
    <br><br>
    <h4 align="center">Odontogram</h4>
    <br><br>   
    <div class="row">
            <div class="col-md-2"></div>

            <div class="col-md-10">
              <?php 
                        $gigi = array_fill(1, 53, 'gigi_normal');
                        foreach($cekGigi as $rowGigi):
                            $gigi[$rowGigi->id_gigi] = $rowGigi->kode_ICD_10;
                        endforeach;
                         $i=1; foreach($gigiAll as $gs):?>
                            <?php if($i <= 16):?>
                                <?php if($i == 1): ?>
                                <div class="form-inline">
                                    <div class="row">
                                <?php endif; ?>
                                 <div class="col-sm-0.5">
                                 <label><?=$gs->nomor_gigi?></label>
                                    <img id="tesModal" data-toggle="modal" data-gigi-id="<?=$i?>" data-target="#myModal" src="<?=base_url()?>assets/gambar_gigi/<?=$gigi[$i]?>.PNG" style="width: 60px;cursor:pointer">
                                    
                                </div>
                                <?php if($i == 16): ?> 
                                    </div>
                                </div>
                                <?php endif;?>
                             <?php elseif($i <= 26):?>
                                <?php if($i == 17): ?>
                                <div class="form-inline">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="row">
                                <?php endif; ?>
                                 <div class="col-sm-0.5">
                                 <label><?=$gs->nomor_gigi?></label>
                                    <img data-toggle="modal" data-gigi-id="<?=$i?>" data-target="#myModal" src="<?=base_url()?>assets/gambar_gigi/<?=$gigi[$i]?>.PNG" style="width: 60px;cursor:pointer">
                                    
                                </div>
                                <?php if($i == 26): ?> 
                                    </div>
                                </div>
                                <?php endif;?>
                             <?php elseif($i <= 36):?>
                                <?php if($i == 27): ?>
                                <div class="form-inline">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="row">
                                <?php endif; ?>
                                 <div class="col-sm-0.5">
                                 <br>
                                    <img data-toggle="modal" data-gigi-id="<?=$i?>" data-target="#myModal" src="<?=base_url()?>assets/gambar_gigi/<?=$gigi[$i]?>.PNG" style="width: 60px;cursor:pointer">
                                    <label><?=$gs->nomor_gigi?></label>
                                </div>
                                <?php if($i == 36): ?> 
                                    </div>
                                </div>
                                <?php endif;?>
                             <?php elseif($i <= 52):?>
                                <?php if($i == 37): ?>
                                <div class="form-inline">
                                    <div class="row">
                                <?php endif; ?>
                                 <div class="col-sm-0.5">
                                    <img data-toggle="modal" data-gigi-id="<?=$i?>" data-target="#myModal" src="<?=base_url()?>assets/gambar_gigi/<?=$gigi[$i]?>.PNG" style="width: 60px;cursor:pointer">
                                    <label><?=$gs->nomor_gigi?></label>
                                </div>
                                <?php if($i == 52): ?> 
                                    </div>
                                </div>
                                <?php endif;?>
                            <?php endif; ?>
                        <?php $i++; endforeach;?>
            </div>
            </div>
            <br><br>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Periksa</th>
                            <th>Nomor Gigi</th>
                            <th>Keluhan</th>
                            <th>Perawatan</th>
                            <th>Kode ICD 10</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $i = 1;
                    foreach ($pemeriksaan_gigi->result() as $row) { ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $row->tanggal_periksa; ?></td>
                            <td><?= $row->nomor_gigi; ?></td>
                            <td><?= $row->keluhan; ?></td>
                            <td><?= $row->perawatan; ?></td>
                            <td><?= $row->kode_ICD_10; ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
    <div class="row">
       <div class="col-md-12">
       <br><br>
       <h4 align="center">Resep Obat</h4>
       <br>
           <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
               <thead>
                   <tr>
                       <th>Tanggal Periksa</th>
                       <th>Resep</th>
                   </tr>
               </thead>
               <tbody>
                   <?php foreach ($listObat->result() as $row) { ?>
                   <tr>
                        <td><?= $row->tanggal_periksa; ?></td>
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
