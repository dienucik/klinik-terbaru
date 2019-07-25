<?php 

class Penyakit_model extends Ci_model {
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllPenyakit()
    {
        $this->db->from('penyakit');
        return $this->db->get();
    }

    public function getPenyakit($id)
    {
        $this->db->where('id_penyakit', $id);
        $this->db->select("*");
        $this->db->from("penyakit");

        return $this->db->get();
    }

    public function addPenyakit($data)
    {
        $this->db->insert('penyakit', $data);
    }
    
    public function updatePenyakit($data, $kondisi)
    {
        $this->db->where($kondisi);
        $this->db->update('penyakit', $data);
    }

    public function deletePenyakit($id)
    {
        $this->db->where('id_penyakit', $id);
        $this->db->delete('penyakit');
    }
}