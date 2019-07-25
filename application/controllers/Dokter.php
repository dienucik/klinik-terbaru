<?php 

class Dokter extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("periksa_model");
        $this->load->model("pasien_model");
        $this->load->model("login_model");
    }

    public function index()
    {
        if($this->session->userdata('level')==="dokter-umum") {
            $data['listPeriksaD'] = $this->periksa_model->getAllPeriksa();
            $this->load->view('dokter_umum/tindakan_view', $data);
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
            $this->load->view('dokter_umum/ganti_password', $data);
        } else {
            $old = $this->login_model->cek_old();
            if($old == FALSE){
                $this->session->set_flashdata('error', 'Old password not match!');
                $this->load->view('dokter_umum/ganti_password');
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
                    echo "<script>alert('Password yang dimasukkan tidak sama!');window.location='".base_url('dokter/ganti_password')."';</script>";
                }
            }   
            }
    }

    public function addTindakan($id_rm)
    {
        if($this->session->userdata('level')==="dokter-umum") {
            $data['listPasien'] = $this->pasien_model->getID($id_rm);
            $data['listAmbilPenyakit'] = $this->pasien_model->getAllPenyakit();
            $data['listAmbilObat'] = $this->pasien_model->getAllObat();
            $data['tindakan'] = $this->periksa_model->getTindakan($id_rm);
            $this->load->view('dokter_umum/add_tindakan_view', $data);
        } else {
            redirect('page/index');
        }
    }

    public function listAmbilPenyakit(){
        $data['listAmbilPenyakit'] = $this->pasien_model->getAllPenyakit();
        $this->load->view('dokter_umum/listAmbilPenyakit', $data);
    }

    public function listAmbilDiagnosa(){
        $data['listAmbilDiagnosa'] = $this->pasien_model->getDiagnosa();
        $this->load->view('dokter_umum/listAmbilDiagnosa', $data);
    }

    public function addRiwayatPenyakit(){
        $tambah = array(
            'nama_penyakit' => $this->input->post('tambah_diagnosa')
        );
        $this->pasien_model->addPenyakit($tambah);

    }

    public function addTindakanDb()
    {
        $data = array(
            'keluhan' => $this->input->post('keluhan'),
            'riwayat_penyakit' =>$this->input->post('riwayat_penyakit'),
            'alergi_obat' => $this->input->post('alergi_obat'),
            'berat_badan' => $this->input->post('berat_badan'),
            'tinggi_badan' => $this->input->post('tinggi_badan'),
            'sistolik' => $this->input->post('sistolik'),
            'diastolik' => $this->input->post('diastolik'),
            'nadi' => $this->input->post('nadi'),
            'suhu' => $this->input->post('suhu'),
            'pemakaian_obat' => $this->input->post('pemakaian_obat'),
            'temuan_dokter' => $this->input->post('temuan_dokter'),
            'rujuk' => $this->input->post('rujuk'),
            'status_pasien' => $this->input->post('status_pasien')
        );

        $jumlah_pemakaian_penyakit = sizeof($this->input->post('nama_penyakit'));
        $diagnosa_penyakit = array();
        for($i=0; $i < $jumlah_pemakaian_penyakit; $i++){  
            $diagnosa_penyakit[$i]['id_rm'] = $this->input->post('id_rm');
            // $diagnosa_penyakit[$i]['id_pasien'] = $this->input->post('id_pasien')[$i];
            $diagnosa_penyakit[$i]['id_penyakit'] = $this->input->post('nama_penyakit')[$i];
        };

        // $jumlah_pemakaian_obat = sizeof($this->input->post('nama_obat'));
        // $pemakaian_obat = array();
        // for($i=0; $i < $jumlah_pemakaian_obat; $i++){
        //     $pemakaian_obat[$i]['id_rm'] = $this->input->post('id_rm');
        //     // $pemakaian_obat[$i]['id_pasien'] = $this->input->post('id_pasien')[$i];
        //     $pemakaian_obat[$i]['id_obat'] = $this->input->post('nama_obat')[$i];
        //     $pemakaian_obat[$i]['jumlah'] = $this->input->post('jumlah')[$i];
        //     $pemakaian_obat[$i]['dosis'] = $this->input->post('dosis')[$i];
        // };

        $kondisi['id_rm'] = $this->input->post('id_rm');
        $this->periksa_model->updateTindakan($data, $kondisi);
        
        $this->periksa_model->addDiagnosa($diagnosa_penyakit);

        // $this->periksa_model->addPemakaianObat($pemakaian_obat);
        echo "<script>alert('Anda Berhasil Menambahkan Data Tindakan');window.location='".base_url('dokter/index')."';</script>";
        // redirect('dokter/index');
    }

    public function rekam_medis()
    {
        if($this->session->userdata('level')==="dokter-umum") {
            $data['listRekamMedis'] = $this->pasien_model->getRekam();
            $this->load->view('dokter_umum/rekam_medis_view', $data);
        } else {
            redirect('page/index');
        }
    }

    public function detail_rm($id)
    {
        if($this->session->userdata('level')==="dokter-umum") {
            $data['listPasien'] = $this->periksa_model->getRM($id);
            $data['listPasienRM'] = $this->periksa_model->getRMM($id);
            $data['pemakaianObat'] = $this->periksa_model->getPemakaianObat($id);
            $this->load->view('dokter_umum/isi_rekam_medis_view', $data);
        } else {
            redirect('page/index');
        }
    }

    public function detail_rm_individu($id)
    {
        if($this->session->userdata('level')==="dokter-umum") {
            $data['listPasien'] = $this->periksa_model->getRM($id);
            $data['listPasienRM'] = $this->periksa_model->getRMM($id);
            $data['pemakaianObat'] = $this->periksa_model->getPemakaianObat($id);
            $this->load->view('dokter_umum/isi_rekam_medis_individu_view', $data);
        } else {
            redirect('page/index');
        }
    }

    public function pemakaianObat($id)
    {
        if($this->session->userdata('level')==="dokter-umum") {
            $data['listPasien'] = $this->periksa_model->getIdentitasPasien($id);
            $data['listObat'] = $this->periksa_model->getPemakaianObat($id);
            $data['listDiagnosa'] = $this->periksa_model->getDiagnosa($id);
            $this->load->view("dokter_umum/isi_obat_view", $data);
        } else {
            redirect('page/index');
        }
    }

    public function pemakaianObat_individu($id)
    {
        if($this->session->userdata('level')==="dokter-umum") {
            $data['listPasien'] = $this->periksa_model->getIdentitasPasien($id);
            $data['listObat'] = $this->periksa_model->getPemakaianObat($id);
            $data['listDiagnosa'] = $this->periksa_model->getDiagnosa($id);
            $this->load->view("dokter_umum/isi_obat_individu_view", $data);
        } else {
            redirect('page/index');
        }
    }

    public function addDiagnosa(){
        $tambah = array(
            'nama_penyakit' => $this->input->post('tambah_diagnosa')
        );
        $this->pasien_model->addPenyakit($tambah);

    }

    public function rekam_medis_pribadi($id)
    {
        if($this->session->userdata('level')==="dokter-umum") {
            $data['listPasien'] = $this->periksa_model->getRM_pribadi($id);
            $data['listPasienRM'] = $this->periksa_model->getRMM_pribadi($id);
            // $data['pemakaianObat'] = $this->periksa_model->getPemakaianObat($id);
            $this->load->view('dokter_umum/rm_pribadi', $data);
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
        $this->pasien_model->updateStatus($data, $kondisi);
        redirect("dokter/addTindakan/".$id);
    }
    
}