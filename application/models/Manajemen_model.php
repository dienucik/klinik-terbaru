<?php 

class Manajemen_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}

	public function getAllManajemen()
	{
		$this->db->from('manajemen');
		return $this->db->get();
	}
	public function getManajemen($id)
    {
        $this->db->where('id_manajemen', $id);
        $this->db->select("*");
        $this->db->from("manajemen");

        return $this->db->get();
    }

    public function addManajemen($data)
    {
        $this->db->insert('manajemen', $data);
    }
    
    public function updateManajemen($data, $kondisi)
    {
        $this->db->where($kondisi);
        $this->db->update('manajemen', $data);
    }

    public function deleteManajemen($id)
    {
        $this->db->where('id_manajemen', $id);
        $this->db->delete('manajemen');
    }
}