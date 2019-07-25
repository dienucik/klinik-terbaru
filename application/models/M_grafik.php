<?php
class M_grafik extends CI_Model{
 
 	function get_kunjungan_pasien($tahun)
 	{
 		$query = $this->db->query("SELECT MONTHNAME(tanggal_periksa) as bulan, COUNT(id_rm) as jumlah FROM rekam_medis where YEAR(tanggal_periksa) = '$tahun' GROUP BY MONTHNAME(tanggal_periksa) ORDER BY FIELD(bulan,'January','February','March','April','May','June','July','August','September','October','November','December')");
         
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
 	}

    function get_kunjungan_pasien_gigi($tahun)
    {
        $query = $this->db->query("SELECT MONTHNAME(tanggal_periksa) as bulan, COUNT(id_rm) as jumlah FROM rekam_medis_pasien_gigi where YEAR(tanggal_periksa) = '$tahun' GROUP BY MONTHNAME(tanggal_periksa) ORDER BY FIELD(bulan,'January','February','March','April','May','June','July','August','September','October','November','December')");
         
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

    function get_obat($tahun){
       $query = $this->db->query("SELECT obat.nama_obat AS namaObat, SUM(pemakaian_obat.jumlah) AS total FROM pemakaian_obat JOIN obat ON pemakaian_obat.id_obat = obat.id_obat JOIN rekam_medis ON pemakaian_obat.id_rm = rekam_medis.id_rm WHERE YEAR(rekam_medis.tanggal_periksa) = '$tahun' GROUP BY namaObat ORDER BY total desc, namaObat");

		if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

    function get_obat_gigi($tahun){
       $query = $this->db->query("SELECT obat.nama_obat AS namaObat, SUM(pemakaian_obat_gigi.jumlah) AS total FROM pemakaian_obat_gigi JOIN obat ON pemakaian_obat_gigi.id_obat = obat.id_obat JOIN rekam_medis_pasien_gigi ON pemakaian_obat_gigi.id_rm = rekam_medis_pasien_gigi.id_rm WHERE YEAR(rekam_medis_pasien_gigi.tanggal_periksa) = '$tahun' GROUP BY namaObat ORDER BY total desc, namaObat");

        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

    function get_penyakit($tahun){
       $query = $this->db->query("SELECT penyakit.nama_penyakit AS nama, count(diagnosa.id_penyakit) AS total FROM diagnosa JOIN rekam_medis ON rekam_medis.id_rm = diagnosa.id_rm JOIN penyakit ON diagnosa.id_penyakit = penyakit.id_penyakit JOIN pasien ON rekam_medis.id_pasien = pasien.id_pasien WHERE YEAR(rekam_medis.tanggal_periksa) = '$tahun' GROUP BY nama ORDER BY total desc, rekam_medis.tanggal_periksa desc");

        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

    public function filter()
	{
		$query = $this->db->query("SELECT DISTINCT YEAR(tanggal_periksa) AS tahun FROM rekam_medis WHERE YEAR(tanggal_periksa) IS NOT NULL ORDER BY tahun DESC");

		if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
	}

    public function get_kunjungan_hari_ini_umum()
    {
        $query = $this->db->query("SELECT COUNT(id_rm) as jumlah FROM rekam_medis WHERE YEAR(tanggal_periksa) = '$year' AND MONTHNAME(tanggal_periksa) = '$bln' AND DAY(tanggal_periksa) = '$hari'");

        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
}
