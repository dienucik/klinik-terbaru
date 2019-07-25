
		<select id="diagnosa" class="form-control nama_penyakit" name="nama_penyakit[]" placeholder="Masukkan nama penyakit" style="width: 1100px">
		    <option value="" disabled selected>Pilih Penyakit</option>
		    <?php 
		        foreach($listAmbilPenyakit->result() as $row) {
		    ?>

		    <option value="<?=$row->id_penyakit?>"><?=$row->nama_penyakit?></option>
		    <?php } ?>
		</select>
