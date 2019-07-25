<?php 

class Super_admin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model("pasien_model");
        $this->load->model("periksa_model");
        $this->load->model("penyakit_model");
        $this->load->model("obat_model");
        $this->load->model("dokter_model");
        $this->load->model("perawat_model");
        $this->load->model("manajemen_model");
        $this->load->model("user_model");
        $this->load->model('m_grafik');
        $this->load->model('login_model');
	}

	public function index()
	{
        if($this->session->userdata('level')==="super-admin") {
            $data['listUser'] = $this->user_model->getAllUser();
        $this->load->view('super_admin/dashboard', $data);
    } else {
        redirect('page/index');
    }
        
	}

	public function getPenyakitTahun($tahun){
        $data['penyakit_admin']=$this->m_grafik->get_penyakit($tahun);
        // var_dump($data['kunjungan']);
        $this->load->view('super_admin/grafik_penyakit_tahun',$data);
    }
    /* halaman tentang penyakit*/
    public function penyakit()
    {
        if($this->session->userdata('level')==="super-admin") {
            $data['listPenyakit'] = $this->penyakit_model->getAllPenyakit();
            $this->load->view('super_admin/penyakit/penyakit_view', $data);
        } else {
            redirect('page/index');
        }
    }

    public function addPenyakit()
    {
        if($this->session->userdata('level')==="super-admin") {
            $this->load->view('super_admin/penyakit/add_penyakit_view');
        } else {
            redirect('page/index');
        }
    }

    public function addPenyakitDb()
    {
            $data = array(
                    'nama_penyakit' => $this->input->post('nama_penyakit')
            );
            $this->penyakit_model->addPenyakit($data);
            echo "<script>alert('Anda Berhasil Menambah Data Penyakit');window.location='".base_url('super_admin/penyakit')."';</script>";
            // redirect('super_admin/penyakit');
    }

    public function updatePenyakit($id_penyakit)
    {
        if($this->session->userdata('level')==="super-admin") {
            $data['penyakit'] = $this->penyakit_model->getPenyakit($id_penyakit);
            $this->load->view('super_admin/penyakit/edit_penyakit_view', $data);
        } else {
            redirect('page/index');
        }
    }

    public function updatePenyakitDb()
    {
        $data = array (
                'nama_penyakit' => $this->input->post('nama_penyakit')
        );
        $kondisi['id_penyakit'] = $this->input->post('id_penyakit');
        $this->penyakit_model->updatePenyakit($data, $kondisi);
        echo "<script>alert('Anda Berhasil Mengubah Data Penyakit');window.location='".base_url('super_admin/penyakit')."';</script>";
        // redirect('super_admin/penyakit');
    }

    public function deletePenyakitDb($id_penyakit)
    {
        $this->penyakit_model->deletePenyakit($id_penyakit);
        echo "<script>alert('Anda Berhasil Menghapus Data Penyakit');window.location='".base_url('super_admin/penyakit')."';</script>";
        // redirect('super_admin/penyakit');
    }

/* halaman tentang obat*/    
    public function obat()
    {
        if($this->session->userdata('level')==="super-admin") {
            $data['listObat'] = $this->obat_model->getAllObat();
            $data['listObat_kosong'] = $this->obat_model->getAllObatStokKosong();
            $this->load->view('super_admin/obat/obat_view', $data);
        } else {
            redirect('page/index');
        }
    }

    public function addObat()
    {
        if($this->session->userdata('level')==="super-admin") {
            $this->load->view('super_admin/obat/add_obat_view');
        } else {
            redirect('page/index');
        }
    }

    public function addObatDb()
    {
        $data = array(
                'nama_obat' => $this->input->post('nama_obat'),
                'stok_obat' => $this->input->post('stok_obat'),
                'sediaan' => $this->input->post('sediaan')
        );
        $this->obat_model->addObat($data);
        echo "<script>alert('Anda Berhasil Menambah Data Obat');window.location='".base_url('super_admin/obat')."';</script>";
        // redirect('super_admin/obat');
    }

    public function updateObat($id_obat)
    {
        if($this->session->userdata('level')==="super-admin") {
            $data['obat'] = $this->obat_model->getObat($id_obat);
            $this->load->view('super_admin/obat/edit_obat_view', $data);
        } else {
            redirect('page/index');
        }
    }

    public function updateObatDb()
    {
        $data = array (
                'nama_obat' => $this->input->post('nama_obat'),
                'stok_obat' => $this->input->post('stok_obat'),
                'sediaan' => $this->input->post('sediaan')
        );
        $kondisi['id_obat'] = $this->input->post('id_obat');
        $this->obat_model->updateObat($data, $kondisi);
        echo "<script>alert('Anda Berhasil Mengubah Data Obat');window.location='".base_url('super_admin/obat')."';</script>";
        // redirect('super_admin/obat');
    }

    public function deleteObatDb($id_obat)
    {
        $this->obat_model->deleteObat($id_obat);
        echo "<script>alert('Anda Berhasil Menghapus Data Obat');window.location='".base_url('super_admin/obat')."';</script>";
        // redirect('super_admin/obat');
    }

    /* halaman tentang dokter*/

    public function dokter()
    {
        if($this->session->userdata('level')==="super-admin") {
            $data['listDokter'] = $this->dokter_model->getAllDokter();
            $this->load->view('super_admin/dokter/dokter_view', $data);
        } else {
            redirect('page/index');
        }
    }

    public function addDokter()
    {
        if($this->session->userdata('level')==="super-admin") {
            $this->load->view('super_admin/dokter/add_dokter_view');
        } else {
            redirect('page/index');
        }
    }

    public function addDokterDb()
    {
        $data = array(
                'no_KTP' => $this->input->post('no_KTP'),
                'sip' => $this->input->post('sip'),
                'nama_dokter' => $this->input->post('nama_dokter'),
                'alamat' => $this->input->post('alamat'),
                'no_telp' => $this->input->post('no_telp'),
                'waktu_mulai' => $this->input->post('waktu_mulai'),
                'waktu_selesai' => $this->input->post('waktu_selesai')
        );
        $this->dokter_model->addDokter($data);
        echo "<script>alert('Anda Berhasil Menambah Data Dokter');window.location='".base_url('super_admin/dokter')."';</script>";
        // redirect('super_admin/dokter');
    }

    public function updateDokter($id_dokter)
    {
        if($this->session->userdata('level')==="super-admin") {
            $data['dokter'] = $this->dokter_model->getDokter($id_dokter);
            $this->load->view('super_admin/dokter/edit_dokter_view', $data);
        } else {
            redirect('page/index');
        }
    }

    public function updateDokterDb()
    {
        $data = array (
                'no_KTP' => $this->input->post('no_KTP'),
                'sip' => $this->input->post('sip'),
                'nama_dokter' => $this->input->post('nama_dokter'),
                'alamat' => $this->input->post('alamat'),
                'no_telp' => $this->input->post('no_telp'),
                'waktu_mulai' => $this->input->post('waktu_mulai'),
                'waktu_selesai' => $this->input->post('waktu_selesai')
        );
        $kondisi['id_dokter'] = $this->input->post('id_dokter');
        $this->dokter_model->updateDokter($data, $kondisi);
        echo "<script>alert('Anda Berhasil Mengubah Data Dokter');window.location='".base_url('super_admin/dokter')."';</script>";
        // redirect('super_admin/dokter');
    }

    public function deleteDokterDb($id_dokter)
    {
        $this->dokter_model->deleteDokter($id_dokter);
        echo "<script>alert('Anda Berhasil Menghapus Data Dokter');window.location='".base_url('super_admin/dokter')."';</script>";
        // redirect('super_admin/index');
    }

    /* halaman tentang perawat*/

    public function perawat()
    {
        if($this->session->userdata('level')==="super-admin") {
            $data['listPerawat'] = $this->perawat_model->getAllPerawat();
            $this->load->view('super_admin/perawat/perawat_view', $data);
        } else {
            redirect('page/index');
        }
    }

    public function addPerawat()
    {
        if($this->session->userdata('level')==="super-admin") {
            $this->load->view('super_admin/perawat/add_perawat_view');
        } else {
            redirect('page/index');
        }
    }

    public function addPerawatDb()
    {
        $data = array(
                'no_KTP' => $this->input->post('no_KTP'),
                'nama_perawat' => $this->input->post('nama_perawat'),
                'alamat' => $this->input->post('alamat'),
                'no_telp' => $this->input->post('no_telp')
        );
        $this->perawat_model->addPerawat($data);
        echo "<script>alert('Anda Berhasil Menambah Data Perawat');window.location='".base_url('super_admin/perawat')."';</script>";
        // redirect('super_admin/perawat');
    }

    public function updatePerawat($id_perawat)
    {
        if($this->session->userdata('level')==="super-admin") {
            $data['perawat'] = $this->perawat_model->getPerawat($id_perawat);
            $this->load->view('super_admin/perawat/edit_perawat_view', $data);
        } else {
            redirect('page/index');
        }
    }

    public function updatePerawatDb()
    {
        $data = array (
                'no_KTP' => $this->input->post('no_KTP'),
                'nama_perawat' => $this->input->post('nama_perawat'),
                'alamat' => $this->input->post('alamat'),
                'no_telp' => $this->input->post('no_telp')
        );
        $kondisi['id_perawat'] = $this->input->post('id_perawat');
        $this->perawat_model->updatePerawat($data, $kondisi);
        echo "<script>alert('Anda Berhasil Mengubah Data Perawat');window.location='".base_url('super_admin/perawat')."';</script>";
        // redirect('super_admin/index');
    }

    public function deletePerawatDb($id_perawat)
    {
        $this->perawat_model->deletePerawat($id_perawat);
        echo "<script>alert('Anda Berhasil Menghapus Data Perawat');window.location='".base_url('super_admin/perawat')."';</script>";
        // redirect('super_admin/index');
    }

    /* halaman tentang manajemen*/

    public function manajemen()
    {
        if($this->session->userdata('level')==="super-admin") {
            $data['listManajemen'] = $this->manajemen_model->getAllManajemen();
            $this->load->view('super_admin/manajemen/manajemen_view', $data);
        } else {
            redirect('page/index');
        }
    }
    public function addManajemen()
    {
        if($this->session->userdata('level')==="super-admin") {
            $this->load->view('super_admin/manajemen/add_manajemen_view');
        } else {
            redirect('page/index');
        }
    }

    public function addManajemenDb()
    {
        $data = array(
                'no_KTP' => $this->input->post('no_KTP'),
                'nama_manajemen' => $this->input->post('nama_manajemen'),
                'alamat' => $this->input->post('alamat'),
                'no_telp' => $this->input->post('no_telp')
        );
        $this->manajemen_model->addManajemen($data);
        echo "<script>alert('Anda Berhasil Menambah Data Manajemen');window.location='".base_url('super_admin/manajemen')."';</script>";
        // redirect('super_admin/manajemen');
    }

    public function updateManajemen($id_manajemen)
    {
        if($this->session->userdata('level')==="super-admin") {
            $data['manajemen'] = $this->manajemen_model->getManajemen($id_manajemen);
            $this->load->view('super_admin/manajemen/edit_manajemen_view', $data);
        } else {
            redirect('page/index');
        }
    }

    public function updateManajemenDb()
    {
        $data = array (
                'no_KTP' => $this->input->post('no_KTP'),
                'nama_manajemen' => $this->input->post('nama_manajemen'),
                'alamat' => $this->input->post('alamat'),
                'no_telp' => $this->input->post('no_telp')
        );
        $kondisi['id_manajemen'] = $this->input->post('id_manajemen');
        $this->manajemen_model->updateManajemen($data, $kondisi);
        echo "<script>alert('Anda Berhasil Mengubah Data Manajemen');window.location='".base_url('super_admin/manajemen')."';</script>";
        // redirect('super_admin/index');
    }

    public function deleteManajemenDb($id_manajemen)
    {
        $this->manajemen_model->deleteManajemen($id_manajemen);
        echo "<script>alert('Anda Berhasil Menghapus Data Manajemen');window.location='".base_url('super_admin/manajemen')."';</script>";
        // redirect('super_admin/index');
    }

    /*halaman user*/
    public function user()
    {
        if($this->session->userdata('level')==="super-admin") {
            $data['listUser'] = $this->user_model->getAllUser();
            $this->load->view('super_admin/user/user_view', $data);
        } else {
            redirect('page/index');
        }
    }

    public function addUser($id_dokter)
    {
        if($this->session->userdata('level')==="super-admin") {
            $data['dokter'] = $this->user_model->getIDDokter($id_dokter);
            $this->load->view('super_admin/user/add_user_dokter_view', $data);
        } else {
            redirect('page/index');
        }
    }

    public function addUser2($id_perawat)
    {
        if($this->session->userdata('level')==="super-admin") {
            $data['perawat'] = $this->user_model->getIDPerawat($id_perawat);
            $this->load->view('super_admin/user/add_user_perawat_view', $data);
        } else {
            redirect('page/index');
        }
    }

    public function addUser3($id_manajemen)
    {
        if($this->session->userdata('level')==="super-admin") {
            $data['manajemen'] = $this->user_model->getIDManajemen($id_manajemen);
            $this->load->view('super_admin/user/add_user_manajemen_view', $data);
        } else {
            redirect('page/index');
        }
    }

    public function addUserDb()
    {
        $data = array(
                'id_dokter' => $this->input->post('id_dokter'),
                'nama' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
                'level' => $this->input->post('level')
        );
        $this->user_model->addUser($data);
        echo "<script>alert('Anda Berhasil Menambah Akun Untuk Dokter');window.location='".base_url('super_admin/index')."';</script>";
        // redirect('super_admin/index');
    }

    public function addUser2Db()
    {
        $data = array(
                'id_perawat' => $this->input->post('id_perawat'),
                'nama' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
                'level' => $this->input->post('level')
        );
        $this->user_model->addUser($data);
         echo "<script>alert('Anda Berhasil Menambah Akun Untuk Perawat');window.location='".base_url('super_admin/index')."';</script>";
        // redirect('super_admin/index');
    }

    public function addUser3Db()
    {
        $data = array(
                'id_manajemen' => $this->input->post('id_manajemen'),
                'nama' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
                'level' => $this->input->post('level')
        );
        $this->user_model->addUser($data);
         echo "<script>alert('Anda Berhasil Menambah Akun Untuk Manajemen');window.location='".base_url('super_admin/index')."';</script>";
        // redirect('super_admin/index');
    }

        public function updateUser($id_user)
    {
        if($this->session->userdata('level')==="super-admin") {
            $data['user'] = $this->user_model->getUser($id_user);
            $this->load->view('super_admin/user/edit_user_view', $data);
        } else {
            redirect('page/index');
        }
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
         echo "<script>alert('Anda Berhasil Mengubah Akun');window.location='".base_url('super_admin/index')."';</script>";
        // redirect('super_admin/index');
    }

    public function deleteUserDb($id_user)
    {
        $this->user_model->deleteUser($id_user);
         echo "<script>alert('Anda Berhasil Menghapus Data User');window.location='".base_url('super_admin/index')."';</script>";
        redirect('super_admin/index');
    }

    public function kunjungan_pasien()
    {
        if($this->session->userdata('level')==="super-admin"){
            $data['filterYear'] = $this->m_grafik->filter();
            $this->load->view('super_admin/kunjungan_pasien_view',$data);
        } else {
            redirect('page/index');
        }
    }

    public function obat_grafik()
    {
        if($this->session->userdata('level')==="super-admin"){
            $data['filterYear'] = $this->m_grafik->filter();
            $this->load->view('super_admin/penggunaan_obat_view',$data);
        } else {
            redirect('page/index');
        }
    }

    public function penyakit_grafik()
    {
        if($this->session->userdata('level')==="super-admin"){
            $data['filterYear'] = $this->m_grafik->filter();
            $this->load->view('super_admin/10_besar_penyakit',$data);
        } else {
            redirect('page/index');
        }
    }

    public function ganti_password()
    {
        $data['user'] = $this->login_model->getUsername();

        // $this->form_validation->set_rules('old', 'Old', 'required|trim');
        $this->form_validation->set_rules('new', 'New', 'required|trim');
        $this->form_validation->set_rules('re_new', 'Retype New', 'required|trim|matches[new]');

        if($this->form_validation->run() == FALSE )
        {
            $this->load->view('super_admin/ganti_password', $data);
        } else {
            $old = $this->login_model->cek_old();
            if($old == FALSE){
                $this->session->set_flashdata('error', 'Old password not match!');
                $this->load->view('super_admin/ganti_password');
            } else {
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
                    echo "<script>alert('Password yang dimasukkan tidak sama!');window.location='".base_url('super_admin/ganti_password')."';</script>";
                }
            }   
            }
    }

    

}