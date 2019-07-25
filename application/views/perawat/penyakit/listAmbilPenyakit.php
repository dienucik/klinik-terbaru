
	<select id="riwayat" class="form-control nama_penyakit" name="nama_penyakit[]" placeholder="Masukkan nama penyakit" id="riwayat_penyakit" style="width: 1100px">
                          <option value="">Masukkan Nama Penyakit</option>
                           <?php foreach($listAmbilPenyakit->result() as $row) { ?>
                              <option value="<?=$row->id_penyakit?>"><?=$row->nama_penyakit?></option>
                           <?php } ?>
                      </select>


                      