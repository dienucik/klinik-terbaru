<?php 

class Dokter_model extends Ci_model {
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllDokter()
    {
        $this->db->from('dokter');
        return $this->db->get();
    }

    public function getDokter($id)
    {
        $this->db->where('id_dokter', $id);
        $this->db->select("*");
        $this->db->from("dokter");

        return $this->db->get();
    }

    public function addDokter($data)
    {
        $this->db->insert('dokter', $data);
    }
    
    public function updateDokter($data, $kondisi)
    {
        $this->db->where($kondisi);
        $this->db->update('dokter', $data);
    }

    public function deleteDokter($id)
    {
        $this->db->where('id_dokter', $id);
        $this->db->delete('dokter');
    }
}