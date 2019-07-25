<?php if(!defined('BASEPATH'))  exit('Hacking Attempt. Keluar dari sistem.');

class Page extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('login_model');
        $this->load->model("user_model");
        $this->load->model("pasien_model");
        $this->load->library('session');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|valid_username');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if($this->form_validation->run() == false) {
            $this->load->view('awal/login');
        }
    }

    public function ganti_password()
    {
        $data['user'] = $this->login_model->getUsername();

        // $this->form_validation->set_rules('old', 'Old', 'required|trim');
        $this->form_validation->set_rules('new', 'New', 'required|trim|matches[re_new]');
        $this->form_validation->set_rules('re_new', 'Retype New', 'required|trim|matches[new]');

        if($this->form_validation->run() == FALSE )
        {
            $this->load->view('super_admin/ganti_password', $data);
        } else {
            // $old = $this->input->post('old');
            $new = $this->input->post('new');
            $re_new = $this->input->post('re_new');

            if($new == $re_new)
            {
                $new_2 = md5($new);
                $this->db->set('password', $new_2);
                $this->db->where('username', $this->session->userdata('username'));
                $this->db->update('user');

                echo "<script>alert('Password berhasil berubah!');window.location='".base_url('page/index')."';</script>";
            } else {
                echo "<script>alert('Password yang dimasukkan tidak sama!');window.location='".base_url('page/ganti_password')."';</script>";
            }

            // if(!password_verify($old, $data['user']['password'])) 
            // {
            //     echo "<script>alert('Password lama salah!');window.location='".base_url('page/ganti_password')."';</script>";
            // } else {
            //         if($old == $new)
            //         {
            //             echo "<script>alert('Password baru tidak boleh sama dengan password lama!');window.location='".base_url('page/ganti_password')."';</script>";
            //         } else {
            //             $this->db->set('password', $new);
            //             $this->db->where('username', $this->session->userdata('username'));
            //             $this->db->update('user');

            //             echo "<script>alert('Password berhasil diubah!');window.location='".base_url('page/index')."';</script>";
            //         }
            //     }
            }
    }

    public function proses_login()
    {
        $user = $this->input->post('username', TRUE);
        $pass = md5($this->input->post('password', TRUE));

        $ceklogin = $this->login_model->login($user, $pass);
        
        if($ceklogin)
        {
            foreach($ceklogin as $row);
            $this->session->set_userdata('username', $row->username);
            $this->session->set_userdata('level', $row->level);

            if($this->session->userdata('level') == "perawat")
            {
                echo "<script>alert('Anda Berhasil Login Sebagai Perawat');window.location='".base_url('admin/index')."';</script>";
            } else if($this->session->userdata('level') == "dokter-umum")
                    {
                        echo "<script>alert('Anda Berhasil Login Sebagai Dokter Umum');window.location='".base_url('dokter/index')."';</script>";
                    } else if($this->session->userdata('level') == "dokter-gigi")
                     {
                        echo "<script>alert('Anda Berhasil Login Sebagai Dokter Gigi');window.location='".base_url('dokter_gigi/index')."';</script>";
                    } else if($this->session->userdata('level') == "super-admin") 
                    {
                        echo "<script>alert('Anda Berhasil Login Sebagai Super Admin');window.location='".base_url('super_admin/index')."';</script>";
                    } 
                    else {
                        echo "<script>alert('Anda Berhasil Login Sebagai Manajemen');window.location='".base_url('manajemen/index')."';</script>";
                    }
        } else {
            echo "<script>alert('Username atau password tidak tersedia!');window.location='".base_url('page/index')."';</script>";
        }
    }

    public function register()
    {
        if($this->input->post('register'))
        {
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
            $this->form_validation->set_rules('password', 'Confirm Password', 'required|min_length[5]|matches[password]');

            if($this->form_validation->run() == TRUE)
            {
                $data = array(
                    'username' => $this->input->post('username'),
                    'password' => md5($this->input->post('password')),
                    'level' => $this->input->post('level')
                );

                $this->db->insert('user', $data);

                $this->session->set_flashdata("success", "Akun anda berhasil dibuat. Anda sudah dapat melakukan login sekarang.");
                redirect("page/index", "refresh");
            }
        }

        $this->load->view('awal/register');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect("page/index", "refresh");
    }

    /*halaman user*/
    public function user()
    {
        $data['listUser'] = $this->user_model->getAllUser();
        $this->load->view('templates_admin/header');
        $this->load->view('user/user_view', $data);
        $this->load->view('templates_admin/footer');
    }

    public function addUser()
    {
        $this->load->view('templates_admin/header');
        $this->load->view('user/add_user_view');
        $this->load->view('templates_admin/footer');
    }

    public function addUserDb()
    {
        $data = array(
                'nama' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
                'level' => $this->input->post('level')
        );
        $this->user_model->addUser($data);
        redirect('page/user');
    }

    public function updateUser($id_user)
    {
        $data['user'] = $this->user_model->getUser($id_user);
        $this->load->view('templates_admin/header');
        $this->load->view('user/update_user_view', $data);
        $this->load->view('templates_admin/footer');
    }

    public function updateUserDb()
    {
        $data = array (
                'nama' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'level' => $this->input->post('level')
        );
        $kondisi['id_user'] = $this->input->post('id_user');
        $this->user_model->updateUser($data, $kondisi);
        redirect('page/user');
    }

    public function deleteUserDb($id_user)
    {
        $this->user_model->deleteUser($id_user);
        redirect('page/user');
    }

    public function lihat_antrian() 
    {
        $data['antrian'] = $this->pasien_model->getAllAntrian();
        $data['antrian_gigi'] = $this->pasien_model->getAllAntrianGigi();
        $data['antrian_selesai'] = $this->pasien_model->getAllAntrianSelesai();
        $data['antrian_gigi_selesai'] = $this->pasien_model->getAllAntrianGigiSelesai();
        $this->load->view('awal/antrian', $data);
    }


}