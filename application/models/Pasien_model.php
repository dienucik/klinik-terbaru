<?php 
class Pasien_model extends CI_model {
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllPasien()
    {
        $this->db->from("pasien");
        $this->db->order_by('no_rekam_medis', 'DESC');
        return $this->db->get();
    }

    public function getAllPasienGigi()
    {
        $this->db->from("rekam_medis_pasien_gigi");
        return $this->db->get();
    }

    public function getAllPasienGigi2()
    {
        $this->db->from("pasien_gigi");
        $this->db->order_by('no_rekam_medis', 'DESC');
        return $this->db->get();
    }

    public function getID($id){
        return $this->db->get_where('pasien', ["id_pasien" => $id])->row();
    }

    public function getIDGigi($id){
        return $this->db->get_where('pasien_gigi', ["id_pasien" => $id])->row();
    }
    
    public function getPasien($id)
    {
        $this->db->where('id_pasien', $id);
        $this->db->select("*");
        $this->db->from("pasien");

        return $this->db->get();
    }

    public function getPasienGigi($id)
    {
        $this->db->where('id_pasien', $id);
        $this->db->select("*");
        $this->db->from("pasien_gigi");

        return $this->db->get();
    }

    public function addPasien($data)
    {
        $this->db->insert('pasien', $data);
        // $lastId = $this->db->insert_id();
    }

     public function addPasienGigi($data)
    {
        $this->db->insert('pasien_gigi', $data);
        // $lastId = $this->db->insert_id();
    }

    public function join()
    {
        $this->db->select('pasien.no_rekam_medis');
        $this->db->from('pasien');
        $this->db->join('rekam_medis', 'pasien.id_pasien=rekam_medis.id_pasien');
        $this->db->where('pasien.id_pasien');
        $query = $this->db->get(); 
        return $query->row();
    }

    public function updatePasien($data, $kondisi)
    {   
        $this->db->where($kondisi);
        $this->db->update('pasien', $data);
    }

    public function updateStatus($data, $kondisi)
    {   
        $this->db->where($kondisi);
        $this->db->update('rekam_medis', $data);
    }

    public function updatePasienGigi($data, $kondisi)
    {   
        $this->db->where($kondisi);
        $this->db->update('pasien_gigi', $data);
    }

    public function updateStatusGigi($data, $kondisi)
    {   
        $this->db->where($kondisi);
        $this->db->update('rekam_medis_pasien_gigi', $data);
    }

    public function deletePasien($id)
    {
        $this->db->where('id_pasien', $id);
        $this->db->delete('pasien');
    }

    public function deletePasienGigi($id)
    {
        $this->db->where('id_pasien', $id);
        $this->db->delete('pasien_gigi');
    }
    
    public function kode(){
        $this->db->select('RIGHT(pasien.no_rekam_medis,2) as no_rekam_medis', FALSE);
        $this->db->order_by('no_rekam_medis','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('pasien');  //cek dulu apakah ada sudah ada kode di tabel.    
        if($query->num_rows() <> 0){      
            //cek kode jika telah tersedia    
            $data = $query->row();      
            $kode = intval($data->no_rekam_medis) + 1; 
        } else{      
            $kode = 1;  //cek jika kode belum terdapat pada table
        }
            $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);    
            $kodetampil = "0"."0".$batas;  //format kode
            return $kodetampil;  
    }

    public function kodeGigi(){
        $this->db->select('RIGHT(pasien_gigi.no_rekam_medis,2) as no_rekam_medis', FALSE);
        $this->db->order_by('no_rekam_medis','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('pasien_gigi');  //cek dulu apakah ada sudah ada kode di tabel.    
        if($query->num_rows() <> 0){      
            //cek kode jika telah tersedia    
            $data = $query->row();      
            $kode = intval($data->no_rekam_medis) + 1; 
        } else{      
            $kode = 1;  //cek jika kode belum terdapat pada table
        }
            $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);    
            $kodetampil = "G"."0".$batas;  //format kode
            return $kodetampil;  
    }

    public function getAllPenyakit()
    {
        $this->db->from("penyakit");
        return $this->db->get();
    }

    public function getAllObat()
    {
       $this->db->select("*");
        $this->db->from('obat');
        $this->db->where('stok_obat > 0');
        return $this->db->get();
    }

    public function getAllDokterUmum()
    {
        $query = $this->db->select("id_dokter, nama_dokter, waktu_mulai, waktu_selesai")
                        ->from("dokter")
                        ->where("jenis_dokter LIKE '%umum%'")
                        ->get();
        return $query;

    }

    public function getAllDokterGigi()
    {
        $this->db->select("id_dokter, nama_dokter");
        $this->db->from("dokter");
        $this->db->where("jenis_dokter LIKE '%gigi%'");
        return $this->db->get();
    }

    public function getRekam()
    {
        $this->db->from("pasien");
        $this->db->order_by('no_rekam_medis', 'DESC');
        return $this->db->get();
    }

    public function getAllRMGigi()
    {
        $this->db->from("pasien_gigi");
        $this->db->order_by('no_rekam_medis', 'DESC');
        return $this->db->get();
    }

    // public function getAllRMGigi2()
    // {
    //    $query = $this->db->select("*")
    //             ->from("rekam_medis_pasien_gigi")
    //             ->join("pasien_gigi", "pasien_gigi.id_pasien = rekam_medis_pasien_gigi.id_pasien")
    //             ->get();
    //     return $query;
    // }

    public function getIsiRM1($id)
    {
       $query = $this->db->select("*")
                ->from("pasien_gigi")
                ->where("pasien_gigi.no_rekam_medis", $id)
                ->get();
        return $query->row();
    }

    public function getIsiRM2($id)
    {
       $query = $this->db->select("*")
                ->from("rekam_medis_pasien_gigi")
                ->join("pasien_gigi", "pasien_gigi.id_pasien = rekam_medis_pasien_gigi.id_pasien")
                ->where("pasien_gigi.no_rekam_medis", $id)
                ->get();
        return $query;
    }

    public function addPenyakit($data){
        $this->db->insert('penyakit', $data);
    }

    public function addAlergi($data){
        $this->db->insert('obat', $data);
    }

    public function getAllAntrian()
    {
        $query = $this->db->select("*")
                ->from("pasien")
                ->join("rekam_medis", "pasien.id_pasien = rekam_medis.id_pasien")
                ->join("dokter", "dokter.id_dokter = rekam_medis.id_dokter")
                ->where("status_pasien in ('antri', 'sedang diproses') and tanggal_periksa = date(now())")
                ->get();
        return $query;
    }
    public function getAllAntrianGigi()
    {
        $query = $this->db->select("*")
                ->from("pasien_gigi")
                ->join("rekam_medis_pasien_gigi", "pasien_gigi.id_pasien = rekam_medis_pasien_gigi.id_pasien")
                ->where("status_pasien in ('antri', 'sedang diproses') and tanggal_periksa = date(now())")
                ->get();
        return $query;
    }

    public function getAllAntrianSelesai()
    {
        $query = $this->db->select("*")
                ->from("pasien")
                ->join("rekam_medis", "pasien.id_pasien = rekam_medis.id_pasien")
                ->join("dokter", "dokter.id_dokter = rekam_medis.id_dokter")
                ->where("status_pasien = 'sudah diperiksa' and tanggal_periksa = date(now())")
                ->get();
        return $query;
    }

     public function getAllAntrianGigiSelesai()
    {
        $query = $this->db->select("*")
                ->from("pasien_gigi")
                ->join("rekam_medis_pasien_gigi", "pasien_gigi.id_pasien = rekam_medis_pasien_gigi.id_pasien")
                ->where("status_pasien = 'sudah diperiksa' and tanggal_periksa = date(now())")
                ->get();
        return $query;
    }

}
