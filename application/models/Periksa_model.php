<?php 

class Periksa_model extends Ci_model {
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllPeriksa()
    {
        $query = $this->db->select("*")
                ->from("pasien")
                ->join("rekam_medis", "pasien.id_pasien = rekam_medis.id_pasien")
                ->join("dokter", "dokter.id_dokter = rekam_medis.id_dokter")
                ->where("status_pasien in ('antri', 'sedang diproses') ")
                ->get();
        return $query;
    }

     public function getAllPeriksaGigi()
    {
        $query = $this->db->select("*")
                ->from("pasien_gigi")
                ->join("rekam_medis_pasien_gigi", "pasien_gigi.id_pasien = rekam_medis_pasien_gigi.id_pasien")
                ->where("status_pasien in ('antri', 'sedang diproses')")
                ->get();
        return $query;
    }

    public function getTindakan($id)
    {
        $query = $this->db->select("pasien.no_rekam_medis as no_rekam_medis, pasien.nama_pasien as nama_pasien, rekam_medis.id_rm as id_rm, rekam_medis.tanggal_periksa as tanggal_periksa, rekam_medis.keluhan as keluhan, rekam_medis.alergi_obat as alergi_obat, rekam_medis.berat_badan as berat_badan, rekam_medis.tinggi_badan as tinggi_badan, rekam_medis.sistolik as sistolik, rekam_medis.diastolik as diastolik, rekam_medis.nadi as nadi, rekam_medis.suhu as suhu, rekam_medis.kolesterol_tetap as kolesterol_tetap, rekam_medis.gula_darah_sesaat as gula_darah_sesaat, rekam_medis.asam_urat as asam_urat, rekam_medis.temuan_dokter as temuan_dokter, rekam_medis.ket_diagnosa as ket_diagnosa, rekam_medis.status_pasien as status_pasien, rekam_medis.pemakaian_obat as pemakaian_obat, rekam_medis.rujuk as rujuk, dokter.nama_dokter as nama_dokter")
                ->from("rekam_medis")
                ->join("pasien", "pasien.id_pasien = rekam_medis.id_pasien")
                ->join("dokter", "dokter.id_dokter = rekam_medis.id_dokter")
                ->where('rekam_medis.id_rm', $id)
                ->get();
        return $query;
    }

    public function getTindakanGigi($id)
    {
        $query = $this->db->select("*")
                ->from("rekam_medis_pasien_gigi")
                ->join("pasien_gigi", "pasien_gigi.id_pasien = rekam_medis_pasien_gigi.id_pasien")
                ->where('rekam_medis_pasien_gigi.id_rm', $id)
                ->get();
        return $query;
    }

    public function addPeriksa($data)
    { 
        $this->db->insert('rekam_medis', $data);
    }

    public function addPeriksaGigi($data)
    { 
        $this->db->insert('rekam_medis_pasien_gigi', $data);
    }

    public function updateTindakan($data, $kondisi)
    {
        $this->db->where($kondisi);
        $this->db->update('rekam_medis', $data);
    }

    public function updateTindakanGigi($data, $kondisi)
    {
        $this->db->where($kondisi);
        $this->db->update('rekam_medis_pasien_gigi', $data);
    }

    public function addPemakaianObat($data)
    {
        $this->db->insert_batch('pemakaian_obat', $data);
    }

    public function addPemakaianObatGigi($data)
    {
        $this->db->insert_batch('pemakaian_obat_gigi', $data);
    }

    public function addRiwayatPenyakit($data)
    {
        $this->db->insert_batch('riwayat_penyakit', $data);
    }

    public function getRiwayat($id)
    {
        $query = $this->db->select("riwayat_penyakit.id_penyakit as penyakit")
                        ->from("riwayat_penyakit")
                        ->join("pasien", "pasien.id_pasien = riwayat_penyakit.id_pasien")
                        ->join("penyakit", "penyakit.id_penyakit = riwayat_penyakit.id_penyakit")
                        ->where("pasien.id_pasien", $id)
                        ->get();
        return $query;
        
    }

    public function addDiagnosa($data)
    {
        $this->db->insert_batch('diagnosa', $data);
    }

    public function tindakan($data1, $data2)
    {
        $this->db->insert('rekam_medis', $data1);
        $this->db->insert('pemakaian_obat', $data2);
    }

    public function cekGigi($idRm){
        $this->db->select('*');
        $this->db->from('gigi');
        $this->db->join('pemeriksaan_gigi', 'gigi.id_gigi = pemeriksaan_gigi.id_gigi');
        $this->db->where('id_rm',$idRm);
        return $this->db->get()->result();
    }

    public function getAllGigi(){
        $this->db->select('*');
        $this->db->from('gigi');
        return $this->db->get()->result();
    }

    public function pemeriksaanGigi($data)
    {
        $this->db->insert('pemeriksaan_gigi', $data);
    }

    public function updatePemeriksaanGigi($where,$data)
    {
        $this->db->where($where);
        $this->db->update('pemeriksaan_gigi', $data);
    }
    public function getRM($id)
    {
       $query = $this->db->select("*")
                ->from("pasien")
                ->where("pasien.no_rekam_medis", $id)
                ->get();
        return $query->row();
    }

    //  public function getRMM($id)
    // {
    //    $query = $this->db->select(" rekam_medis.id_rm as id_rm, rekam_medis.tanggal_periksa as tanggal_periksa, rekam_medis.keluhan as keluhan, rekam_medis.berat_badan as berat_badan, rekam_medis.tinggi_badan as tinggi_badan, rekam_medis.sistolik as sistolik, rekam_medis.diastolik as diastolik, rekam_medis.nadi as nadi, rekam_medis.suhu as suhu, rekam_medis.kolesterol_tetap as kolesterol_tetap, rekam_medis.gula_darah_sesaat as gula_darah_sesaat, rekam_medis.asam_urat as asam_urat, rekam_medis.temuan_dokter as temuan_dokter, rekam_medis.ket_diagnosa as ket_diagnosa, rekam_medis.pemakaian_obat as pemakaian_obat, rekam_medis.rujuk as rujuk, dokter.nama_dokter as nama_dokter")
    //             ->from("rekam_medis")
    //             ->join("pasien", "pasien.id_pasien = rekam_medis.id_pasien")
    //             ->join("dokter", "dokter.id_dokter = rekam_medis.id_dokter")
    //             ->where("pasien.no_rekam_medis", $id)
    //             ->get();
    //     return $query;
    // }

    public function getRMM($id)
    {
       $query = $this->db->select("*")
                ->from("diagnosa")
                ->join("rekam_medis", "rekam_medis.id_rm = diagnosa.id_rm")
                ->join("pasien", "pasien.id_pasien = rekam_medis.id_pasien")
                ->join("dokter", "dokter.id_dokter = rekam_medis.id_dokter")
                ->join("penyakit", "penyakit.id_penyakit = diagnosa.id_penyakit")
                ->where("pasien.no_rekam_medis", $id)
                ->get();
        return $query;
    }

    public function getDiagnosa($id)
    {
        $query = $this->db->select("*")
                ->from("diagnosa")
                ->join("rekam_medis", "rekam_medis.id_rm = diagnosa.id_rm")
                ->join("penyakit", "penyakit.id_penyakit = diagnosa.id_penyakit")
                // ->join("pasien", "pasien.id_pasien = diagnosa.id_pasien")
                ->where("rekam_medis.id_rm", $id)
                ->get();
        return $query;
    }

    public function getPemakaianObat($id)
    {
        $query = $this->db->select("*")
                ->from("pemakaian_obat")
                ->join("rekam_medis", "rekam_medis.id_rm = pemakaian_obat.id_rm")
                ->join("obat", "obat.id_obat = pemakaian_obat.id_obat")
                // ->join("pasien", "pasien.id_pasien = pemakaian_obat.id_pasien")
                ->where("rekam_medis.id_rm", $id)
                ->get();
        return $query;
    }

    public function getPemakaianObatGigi($id)
    {
        $query = $this->db->select("*")
                ->from("pemakaian_obat_gigi")
                ->join("rekam_medis_pasien_gigi", "rekam_medis_pasien_gigi.id_rm = pemakaian_obat_gigi.id_rm")
                ->join("obat", "obat.id_obat = pemakaian_obat_gigi.id_obat")
                // ->join("pasien_gigi", "pasien_gigi.id_pasien = pemakaian_obat_gigi.id_pasien")
                ->where("rekam_medis_pasien_gigi.id_rm", $id)
                ->get();
        return $query;
    }

    public function getRMGigi($id)
    {
       $query = $this->db->select("*")
                ->from("pasien_gigi")
                ->where("pasien_gigi.no_rekam_medis", $id)
                ->get();
        return $query->row();
    }

    public function getRMGigi2($id)
    {
       $query = $this->db->select("*")
                ->from("rekam_medis_pasien_gigi")
                ->join("pasien_gigi", "pasien_gigi.id_pasien = rekam_medis_pasien_gigi.id_pasien")
                ->where("pasien_gigi.no_rekam_medis", $id)
                ->get();
        return $query;
    }

     public function deletePemeriksaan($id)
    {
        $this->db->where('id_rm', $id);
        $this->db->delete('rekam_medis');
    }

      public function deletePemeriksaanGigi($id)
    {
        $this->db->where('id_rm', $id);
        $this->db->delete('rekam_medis_pasien_gigi');
    }

    public function getIdentitasPasien($id)
    {
       $query = $this->db->select("*")
                ->from("pasien")
                ->join("rekam_medis", "rekam_medis.id_pasien = pasien.id_pasien")
                ->where("rekam_medis.id_rm", $id)
                ->get();
        return $query->row();
    }

    public function getIdentitasPasienGigi($id)
    {
       $query = $this->db->select("*")
                ->from("pasien_gigi")
                ->join("rekam_medis_pasien_gigi", "rekam_medis_pasien_gigi.id_pasien = pasien_gigi.id_pasien")
                ->where("rekam_medis_pasien_gigi.id_rm", $id)
                ->get();
        return $query->row();
    }

    public function cekDataPemeriksaanGigi($idGigi,$idRM){
        $this->db->select("*");
        $this->db->from("pemeriksaan_gigi");
        $this->db->where("id_gigi", $idGigi);
        $this->db->where("id_rm", $idRM);
        return $this->db->get()->num_rows();
    }

    public function detail_pemeriksaan_gigi($id)
    {
       $query = $this->db->select("gigi.nomor_gigi as nomor_gigi, pemeriksaan_gigi.keluhan as keluhan, pemeriksaan_gigi.perawatan as perawatan, pemeriksaan_gigi.kode_ICD_10 as kode_ICD_10 ")
                ->from("pemeriksaan_gigi")
                ->join("rekam_medis_pasien_gigi", "pemeriksaan_gigi.id_rm = rekam_medis_pasien_gigi.id_rm")
                ->join("gigi", "gigi.id_gigi = pemeriksaan_gigi.id_gigi")
                ->where("rekam_medis_pasien_gigi.id_rm", $id)
                ->get();
        return $query;
    }


     public function getRMCetak($id)
    {
       $query = $this->db->select("*")
                ->from("pasien")
                ->where("pasien.id_pasien", $id)
                ->get();
        return $query->row();
    }

    public function getRMCetak_tanggal($id)
    {
       $query = $this->db->select("rekam_medis.id_rm, pasien.no_rekam_medis, pasien.no_KTP, pasien.nama_pasien, pasien.tanggal_lahir, pasien.jenis_kelamin, pasien.alamat, pasien.no_telp, pasien.jenis_pasien, pasien.no_BPJS, pasien.no_PLN")
                ->from("rekam_medis")
                ->join("pasien", "rekam_medis.id_pasien = pasien.id_pasien")
                ->where("rekam_medis.id_rm", $id)
                ->get();
        return $query->row();
    }

     public function getRMMCetak($id)
    {
       $query = $this->db->select("rekam_medis.id_rm as id_rm, rekam_medis.tanggal_periksa as tanggal_periksa, rekam_medis.keluhan as keluhan, rekam_medis.berat_badan as berat_badan, rekam_medis.tinggi_badan as tinggi_badan, rekam_medis.sistolik as sistolik, rekam_medis.diastolik as diastolik, rekam_medis.nadi as nadi, rekam_medis.suhu as suhu, rekam_medis.kolesterol_tetap as kolesterol_tetap, rekam_medis.gula_darah_sesaat as gula_darah_sesaat, rekam_medis.asam_urat as asam_urat, rekam_medis.temuan_dokter as temuan_dokter, rekam_medis.rujuk as rujuk, dokter.nama_dokter as nama_dokter")
                ->from("rekam_medis")
                ->join("pasien", "pasien.id_pasien = rekam_medis.id_pasien")
                ->join("dokter", "dokter.id_dokter = rekam_medis.id_dokter")
                ->where("pasien.id_pasien", $id)
                ->get();
        return $query;
    }

    public function getRMMCetak_tanggal($id)
    {
       $query = $this->db->select("rekam_medis.id_rm as id_rm, rekam_medis.tanggal_periksa as tanggal_periksa, rekam_medis.keluhan as keluhan, rekam_medis.berat_badan as berat_badan, rekam_medis.tinggi_badan as tinggi_badan, rekam_medis.sistolik as sistolik, rekam_medis.diastolik as diastolik, rekam_medis.nadi as nadi, rekam_medis.suhu as suhu, rekam_medis.kolesterol_tetap as kolesterol_tetap, rekam_medis.gula_darah_sesaat as gula_darah_sesaat, rekam_medis.asam_urat as asam_urat, rekam_medis.temuan_dokter as temuan_dokter, rekam_medis.rujuk as rujuk, dokter.nama_dokter as nama_dokter")
                ->from("rekam_medis")
                ->join("pasien", "pasien.id_pasien = rekam_medis.id_pasien")
                ->join("dokter", "dokter.id_dokter = rekam_medis.id_dokter")
                ->where("rekam_medis.id_rm", $id)
                ->get();
        return $query;
    }
    public function getPemakaianObatCetak($id)
    {
        $query = $this->db->select("rekam_medis.tanggal_periksa, penyakit.nama_penyakit, diagnosa.id_penyakit, rekam_medis.ket_diagnosa, rekam_medis.pemakaian_obat")
                ->from("diagnosa")
                ->join("rekam_medis", "diagnosa.id_rm = rekam_medis.id_rm")
                ->join("penyakit", "diagnosa.id_penyakit = penyakit.id_penyakit")
                // ->join("pasien", "pasien.id_pasien = pemakaian_obat.id_pasien")
                ->where("rekam_medis.id_pasien", $id)
                ->get();
        return $query;
    }

    public function getPemakaianObatCetak_tanggal($id)
    {
        $query = $this->db->select("*")
                ->from("rekam_medis")

                // ->join("pasien", "pasien.id_pasien = pemakaian_obat.id_pasien")
                ->where("rekam_medis.id_rm", $id)
                ->get();
        return $query;
    }

    public function getDiagnosaCetak($id)
    {
        $query = $this->db->select("*")
                ->from("diagnosa")
                ->join("rekam_medis", "rekam_medis.id_rm = diagnosa.id_rm")
                ->join("penyakit", "penyakit.id_penyakit = diagnosa.id_penyakit")
                // ->join("pasien", "pasien.id_pasien = diagnosa.id_pasien")
                ->where("rekam_medis.id_pasien", $id)
                ->get();
        return $query;
    }

    public function getDiagnosaCetak_tanggal($id)
    {
        $query = $this->db->select("*")
                ->from("diagnosa")
                ->join("rekam_medis", "rekam_medis.id_rm = diagnosa.id_rm")
                ->join("penyakit", "penyakit.id_penyakit = diagnosa.id_penyakit")
                // ->join("pasien", "pasien.id_pasien = diagnosa.id_pasien")
                ->where("rekam_medis.id_rm", $id)
                ->get();
        return $query;
    }

    public function getRMGigiCetak($id)
    {
       $query = $this->db->select("*")
                ->from("pasien_gigi")
                ->where("pasien_gigi.id_pasien", $id)
                ->get();
        return $query->row();
    }

    public function getRMGigiCetak_tanggal($id)
    {
       $query = $this->db->select("rekam_medis_pasien_gigi.id_rm, pasien_gigi.no_rekam_medis, pasien_gigi.no_KTP, pasien_gigi.nama_pasien, pasien_gigi.tanggal_lahir, pasien_gigi.jenis_kelamin, pasien_gigi.alamat, pasien_gigi.no_telp, pasien_gigi.jenis_pasien, pasien_gigi.no_BPJS, pasien_gigi.no_PLN")
                ->from("rekam_medis_pasien_gigi")
                ->join("pasien_gigi", "rekam_medis_pasien_gigi.id_pasien = pasien_gigi.id_pasien")
                ->where("rekam_medis_pasien_gigi.id_rm", $id)
                ->get();
        return $query->row();
    }

    public function getRMGigi2Cetak($id)
    {
       $query = $this->db->select("*")
                ->from("rekam_medis_pasien_gigi")
                ->join("pasien_gigi", "pasien_gigi.id_pasien = rekam_medis_pasien_gigi.id_pasien")
                ->where("pasien_gigi.id_pasien", $id)
                ->get();
        return $query;
    }

    public function getRMGigi2Cetak_tanggal($id)
    {
       $query = $this->db->select("*")
                ->from("rekam_medis_pasien_gigi")
                ->join("pasien_gigi", "pasien_gigi.id_pasien = rekam_medis_pasien_gigi.id_pasien")
                ->where("rekam_medis_pasien_gigi.id_rm", $id)
                ->get();
        return $query;
    }

    public function getPemakaianObatGigiCetak($id)
    {
        $query = $this->db->select("*")
                ->from("rekam_medis_pasien_gigi")
                // ->join("pasien_gigi", "pasien_gigi.id_pasien = pemakaian_obat_gigi.id_pasien")
                ->where("rekam_medis_pasien_gigi.id_pasien", $id)
                ->get();
        return $query;
    }

    public function getPemakaianObatGigiCetak_tanggal($id)
    {
        $query = $this->db->select("*")
                ->from("rekam_medis_pasien_gigi")
                // ->join("pasien_gigi", "pasien_gigi.id_pasien = pemakaian_obat_gigi.id_pasien")
                ->where("rekam_medis_pasien_gigi.id_rm", $id)
                ->get();
        return $query;
    }

    public function detail_pemeriksaan_gigi_cetak($id)
    {
       $query = $this->db->select("*")
                ->from("pemeriksaan_gigi")
                ->join("rekam_medis_pasien_gigi", "pemeriksaan_gigi.id_rm = rekam_medis_pasien_gigi.id_rm")
                ->join("gigi", "gigi.id_gigi = pemeriksaan_gigi.id_gigi")
                ->where("rekam_medis_pasien_gigi.id_pasien", $id)
                ->get();
        return $query;
    }

    public function detail_pemeriksaan_gigi_cetak_tanggal($id)
    {
       $query = $this->db->select("*")
                ->from("pemeriksaan_gigi")
                ->join("rekam_medis_pasien_gigi", "pemeriksaan_gigi.id_rm = rekam_medis_pasien_gigi.id_rm")
                ->join("gigi", "gigi.id_gigi = pemeriksaan_gigi.id_gigi")
                ->where("rekam_medis_pasien_gigi.id_rm", $id)
                ->get();
        return $query;
    }

        public function cekGigiCetak($id){
        $this->db->select('*');
        $this->db->from('gigi');
        $this->db->join('pemeriksaan_gigi', 'gigi.id_gigi = pemeriksaan_gigi.id_gigi');
        $this->db->join('rekam_medis_pasien_gigi', 'rekam_medis_pasien_gigi.id_rm = pemeriksaan_gigi.id_rm');
        $this->db->where('rekam_medis_pasien_gigi.id_pasien',$id);
        return $this->db->get()->result();
    }

    public function getRM_pribadi($id)
    {
       $query = $this->db->select("*")
                ->from("pasien")
                ->where("pasien.no_rekam_medis", $id)
                ->get();
        return $query->row();
    }

     public function getRMM_pribadi($id)
    {
       $query = $this->db->select(" rekam_medis.id_rm as id_rm, rekam_medis.tanggal_periksa as tanggal_periksa, rekam_medis.keluhan as keluhan, rekam_medis.berat_badan as berat_badan, rekam_medis.tinggi_badan as tinggi_badan, rekam_medis.sistolik as sistolik, rekam_medis.diastolik as diastolik, rekam_medis.nadi as nadi, rekam_medis.suhu as suhu, rekam_medis.kolesterol_tetap as kolesterol_tetap, rekam_medis.gula_darah_sesaat as gula_darah_sesaat, rekam_medis.asam_urat as asam_urat, rekam_medis.temuan_dokter as temuan_dokter, rekam_medis.rujuk as rujuk, dokter.nama_dokter as nama_dokter")
                ->from("rekam_medis")
                ->join("pasien", "pasien.id_pasien = rekam_medis.id_pasien")
                ->join("dokter", "dokter.id_dokter = rekam_medis.id_dokter")
                ->where("rekam_medis.id_rm", $id)
                ->get();
        return $query;
    }

    public function getPengkajianAwal($id)
    {
        $query = $this->db->select("*")
                ->from("pasien")
                ->join("rekam_medis", "pasien.id_pasien = rekam_medis.id_pasien")
                ->where("rekam_medis.id_rm", $id)
                ->get();
        return $query;
    }

    public function updatePengkajianAwal($data, $kondisi)
    {   
        $this->db->where($kondisi);
        $this->db->update('rekam_medis', $data);
    }

    public function getPengkajianAwalGigi($id)
    {
        $query = $this->db->select("*")
                ->from("pasien_gigi")
                ->join("rekam_medis_pasien_gigi", "pasien_gigi.id_pasien = rekam_medis_pasien_gigi.id_pasien")
                ->where("rekam_medis_pasien_gigi.id_rm", $id)
                ->get();
        return $query;
    }

    public function updatePengkajianAwalGigi($data, $kondisi)
    {   
        $this->db->where($kondisi);
        $this->db->update('rekam_medis_pasien_gigi', $data);
    }

}