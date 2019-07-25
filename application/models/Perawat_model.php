<?php 

class Perawat_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}

	public function getAllPerawat()
	{
		$this->db->from('perawat');
		return $this->db->get();
	}
	public function getPerawat($id)
    {
        $this->db->where('id_perawat', $id);
        $this->db->select("*");
        $this->db->from("perawat");

        return $this->db->get();
    }

    public function addPerawat($data)
    {
        $this->db->insert('perawat', $data);
    }
    
    public function updatePerawat($data, $kondisi)
    {
        $this->db->where($kondisi);
        $this->db->update('perawat', $data);
    }

    public function deletePerawat($id)
    {
        $this->db->where('id_perawat', $id);
        $this->db->delete('perawat');
    }
}