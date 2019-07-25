<?php 

class Login_model extends CI_Model {
    public function login($user,$pass)
    {
        $this->db->select('username, password, level');
        $this->db->from('user');
        $this->db->where('username', $user);
        $this->db->where('password', $pass);
        $this->db->limit(1);

        $query = $this->db->get();

        if($query->num_rows() == 1)
        {
            return $query->result();
        } else {
            return false;
        }
    }

    public function logout($date, $id)
        {
            $this->db->where('user.id_user', $id);
            $this->db->update('user', $date);
        }

    public function getUsername()
    {
        return $this->db->get_where('user', ["id_user" => $this->session->userdata('username')])->row_array();
    }

    public function save()
    {
        $pass = md5($this->input->post('new'));
        $data = array(
                    'password' => $pass
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