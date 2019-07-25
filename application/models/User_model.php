<?php 

class User_model extends CI_model {
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllUser()
    {
        $this->db->from('user');
        return $this->db->get();
    }

    public function getUser($id)
    {
        $this->db->where('id_user', $id);
        $this->db->select("*");
        $this->db->from("user");

        return $this->db->get();
    }

    public function addUser($data)
    {
        $this->db->insert('user', $data);
    }
    
    public function updateUser($data, $kondisi)
    {
        $this->db->where($kondisi);
        $this->db->update('user', $data);
    }

    public function deleteUser($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('user');
    }

    public function getIDDokter($id_dokter){
        return $this->db->get_where('dokter', ["id_dokter" => $id_dokter])->row();
    }

    public function getIDPerawat($id_perawat){
        return $this->db->get_where('perawat', ["id_perawat" => $id_perawat])->row();
    }

    public function getIDManajemen($id_manajemen){
        return $this->db->get_where('manajemen', ["id_manajemen" => $id_manajemen])->row();
    }

    public function save()
    {
        $pass = md5($this->input->post('new'));
        $data = array(
            'usr_password' => $pass
            );
        $this->db->where('id_user', $this->session->userdata('id_user'));
        $this->db->update('user', $data);
    }

    public function cek_old()
    {
        $old = md5($this->input->post('old'));
        $this->db->where('password', $old);
        $query = $this->db->get('user');
        return $query->result();
    }
}