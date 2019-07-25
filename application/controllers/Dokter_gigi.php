<?php 

class Dokter_gigi extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pasien_model');
		$this->load->model('periksa_model');
        $this->load->model('login_model');
	}

	public function index()
	{
        if($this->session->userdata('level')==="dokter-gigi") {
            $data['listPasienGigi'] = $this->periksa_model->getAllPeriksaGigi();
            $this->load->view('dokter_gigi/tindakan_view', $data);
        } else {
            redirect('page/index');
        }
	}

    public function ganti_password()
    {
        $data['user'] = $this->login_model->getUsername();
        $this->form_validation->set_rules('new', 'New', 'required|trim');
        $this->form_validation->set_rules('re_new', 'Retype New', 'required|trim|matches[new]');

        if($this->form_validation->run() == FALSE )
        {
            $this->load->view('dokter_gigi/ganti_password', $data);
        } else {
            $old = $this->login_model->cek_old();
            if($old == FALSE){
                $this->session->set_flashdata('error', 'Old password not match!');
                $this->load->view('dokter_gigi/ganti_password');
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
                    echo "<script>alert('Password yang dimasukkan tidak sama!');window.location='".base_url('dokter_gigi/ganti_password')."';</script>";
                }
            }   
            }
    }
	public function rekam_medis()
    {
        if($this->session->userdata('level')==="dokter-gigi") {
            $data['listRM'] = $this->pasien_model->getAllRMGigi();
            $this->load->view('dokter_gigi/rekam_medis_view', $data);
        } else {
            redirect('page/index');
        }
    }

    public function isi_rekam_medis($id)
    {
        if($this->session->userdata('level')==="dokter-gigi") {
            $data['listPasien'] = $this->periksa_model->getRMGigi($id);
            $data['listPasienRM'] = $this->periksa_model->getRMGigi2($id);
            $data['pemakaianObat'] = $this->periksa_model->getPemakaianObatGigi($id);
            $this->load->view('dokter_gigi/isi_rekam_medis_view', $data);
        } else {
            redirect('page/index');
        }
    }

    public function detail_rm_individu($id)
    {
        if($this->session->userdata('level')==="dokter-gigi") {
            $data['listPasien'] = $this->periksa_model->getRMGigi($id);
            $data['listPasienRM'] = $this->periksa_model->getRMGigi2($id);
            $data['pemakaianObat'] = $this->periksa_model->getPemakaianObatGigi($id);
            $this->load->view('dokter_gigi/detail_rm_individu', $data);
        } else {
            redirect('page/index');
        }
    }

    public function addTindakan($id_rm) 
    {
        if($this->session->userdata('level')==="dokter-gigi") {
        	$data['listAmbilObat'] = $this->pasien_model->getAllObat();
        	$data['tindakanGigi'] = $this->periksa_model->getTindakanGigi($id_rm);
        	$data['idRm'] = $id_rm;
            $this->load->view('dokter_gigi/add_tindakan_view', $data);
        } else {
            redirect('page/index');
        }
    }

    public function ondotogram($idRm){
        $data['gigiAll'] = $this->periksa_model->getAllGigi();
        $data['cekGigi'] = $this->periksa_model->cekGigi($idRm);
        
        $this->load->view('dokter_gigi/ondotogram', $data);
    }

    public function addTindakanGigiDb()
    {
        $data = array(
            'keluhan' => $this->input->post('keluhan'),
            'alergi_obat' => $this->input->post('alergi_obat'),
            'alergi_makanan' => $this->input->post('alergi_makanan'),
            'golongan_darah' => $this->input->post('golongan_darah'),
            'sistolik' => $this->input->post('sistolik'),
            'diastolik' => $this->input->post('diastolik'),
            'nadi' => $this->input->post('nadi'),
            'occlusi' => $this->input->post('occlusi'),
            'torus_palatinus' => $this->input->post('torus_palatinus'),
            'palatum' => $this->input->post('palatum'),
            'diastema' => $this->input->post('diastema'),
            'ket_diastema' => $this->input->post('ket_diastema'),
            'gigi_anomali' => $this->input->post('gigi_anomali'),
            'ket_gigi_anomali' => $this->input->post('ket_gigi_anomali'),
            'lain_lain' => $this->input->post('lain_lain'),
            'pemakaian_obat' => $this->input->post('pemakaian_obat'),
            'rujuk' => $this->input->post('rujuk'),
            'status_pasien' => $this->input->post('status_pasien')
        );

        // $jumlah_pemakaian_obat = sizeof($this->input->post('nama_obat'));
        // $pemakaian_obat = array();
        // for($i=0; $i < $jumlah_pemakaian_obat; $i++){
        //     $pemakaian_obat[$i]['id_rm'] = $this->input->post('id_rm');
        //     $pemakaian_obat[$i]['id_obat'] = $this->input->post('nama_obat')[$i];
        //     $pemakaian_obat[$i]['jumlah'] = $this->input->post('jumlah')[$i];
        //     $pemakaian_obat[$i]['dosis'] = $this->input->post('dosis')[$i];
        // };

        $kondisi['id_rm'] = $this->input->post('id_rm');
        $this->periksa_model->updateTindakanGigi($data, $kondisi);
        
        // $this->periksa_model->addPemakaianObatGigi($pemakaian_obat);
        echo "<script>alert('Anda Berhasil Menambah Data Tindakan');window.location='".base_url('dokter_gigi/index')."';</script>";
        // redirect('dokter_gigi/index');
    }

    public function pemeriksaanGigi()
    {
        $noGigi = $this->input->post('no_gigi');
        $idRm = $this->input->post('id_rm');
        $cek = $this->periksa_model->cekDataPemeriksaanGigi($noGigi,$idRm);

        $data = array(
            'id_gigi' => $noGigi,
            'id_rm' => $idRm,
            'keluhan' => $this->input->post('keluhan'),
            'perawatan' => $this->input->post('perawatan'),
            'kode_ICD_10' => $this->input->post('kode_ICD_10')
        );
        $where = array(
            'id_gigi' => $noGigi,
            'id_rm' => $idRm
        );

        if($cek == 0) $this->periksa_model->pemeriksaanGigi($data);
        else $this->periksa_model->updatePemeriksaanGigi($where,$data);
        
    }

    public function detail_obat($id)
    {
        if($this->session->userdata('level')==="dokter-gigi") {
            $data['listPasien'] = $this->periksa_model->getIdentitasPasienGigi($id);
            $data['listObat'] = $this->periksa_model->getPemakaianObatGigi($id);
            $this->load->view("dokter_gigi/isi_obat_view", $data);
        } else {
            redirect('page/index');
        }
    }

    public function detail_obat_individu($id)
    {
        if($this->session->userdata('level')==="dokter-gigi") {
            $data['listPasien'] = $this->periksa_model->getIdentitasPasienGigi($id);
            $data['listObat'] = $this->periksa_model->getPemakaianObatGigi($id);
            $this->load->view("dokter_gigi/isi_obat_individu_view", $data);
        } else {
            redirect('page/index');
        }
    }

    public function odontogram($idRm){
        if($this->session->userdata('level')==="dokter-gigi") {
            $data['listPasien'] = $this->periksa_model->getIdentitasPasienGigi($idRm);
            $data['gigiAll'] = $this->periksa_model->getAllGigi();
            $data['cekGigi'] = $this->periksa_model->cekGigi($idRm);
            $data['pemeriksaan_gigi'] = $this->periksa_model->detail_pemeriksaan_gigi($idRm);
            $this->load->view('dokter_gigi/odontogram_view', $data);
        } else {
            redirect('page/index');
        }
    }

     public function odontogram_individu($idRm){
        if($this->session->userdata('level')==="dokter-gigi") {
            $data['listPasien'] = $this->periksa_model->getIdentitasPasienGigi($idRm);
            $data['gigiAll'] = $this->periksa_model->getAllGigi();
            $data['cekGigi'] = $this->periksa_model->cekGigi($idRm);
            $data['pemeriksaan_gigi'] = $this->periksa_model->detail_pemeriksaan_gigi($idRm);
            $this->load->view('dokter_gigi/odontogram_individu_view', $data);
        } else {
            redirect('page/index');
        }
    }

    public function tambah_tindakan()
    {
        $data = array(
                'status_pasien' => $this->input->post('status_pasien'),
                );
        $kondisi['id_rm'] = $this->input->post('id_rm');
        $id = $this->input->post('id_rm');
        $this->pasien_model->updateStatusGigi($data, $kondisi);
        redirect("dokter_gigi/addTindakan/".$id);
    }
}