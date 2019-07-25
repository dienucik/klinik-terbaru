<?php 

class Obat_model extends Ci_model {
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllObat()
    {
        $this->db->select("*");
        $this->db->from('obat');
        $this->db->where('stok_obat > 0');
        return $this->db->get();
    }

    public function getAllObatStokKosong()
    {
        $this->db->select("*");
        $this->db->from('obat');
        $this->db->where('stok_obat = 0');
        return $this->db->get();
    }

    public function getObat($id)
    {
        $this->db->where('id_obat', $id);
        $this->db->select("*");
        $this->db->from("obat");

        return $this->db->get();
    }

    public function addObat($data)
    {
        $this->db->insert('obat', $data);
    }
    
    public function updateObat($data, $kondisi)
    {
        $this->db->where($kondisi);
        $this->db->update('obat', $data);
    }

    public function deleteObat($id)
    {
        $this->db->where('id_obat', $id);
        $this->db->delete('obat');
    }
}