<?php 

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("pasien_model");
        $this->load->model("periksa_model");
        $this->load->model("penyakit_model");
        $this->load->model("obat_model");
        $this->load->model("dokter_model");
        $this->load->model("Visitor_model");
        $this->load->model("m_grafik");
        $this->load->model("login_model");
        
    }
/*halaman dashboard*/
    public function index()
    {
        if($this->session->userdata('level')==="perawat"){
            $data['filterYear'] = $this->m_grafik->filter();
            $data['visitorToday'] = $this->Visitor_model->getVisitorToday();
            $data['visitorThisMonth'] = $this->Visitor_model->getVisitorThisMonth();
            $data['visitorThisYear'] = $this->Visitor_model->getVisitorThisYear();
            $data['visitorGigiToday'] = $this->Visitor_model->getVisitorGigiToday();
            $data['visitorGigiThisMonth'] = $this->Visitor_model->getVisitorGigiThisMonth();
            $data['visitorGigiThisYear'] = $this->Visitor_model->getVisitorGigiThisYear();
            $this->load->view('perawat/dashboard', $data);
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
            $this->load->view('perawat/ganti_password', $data);
        } else {
            $old = $this->login_model->cek_old();
            if($old == FALSE){
                $this->session->set_flashdata('error', 'Old password not match!');
                $this->load->view('perawat/ganti_password');
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
                    echo "<script>alert('Password yang dimasukkan tidak sama!');window.location='".base_url('admin/ganti_password')."';</script>";
                }
            }   
            }
    }

    public function getKunjunganPasienTahun($tahun){
        $data['kunjungan_admin']=$this->m_grafik->get_kunjungan_pasien($tahun);
        $data['kunjungan_admin_gigi']=$this->m_grafik->get_kunjungan_pasien_gigi($tahun);
        // var_dump($data['kunjungan']);
        $this->load->view('perawat/grafikTahun',$data);
    }

    public function getObatTahun($tahun){
        $data['obat_admin']=$this->m_grafik->get_obat($tahun);
        $data['obat_admin_gigi']=$this->m_grafik->get_obat_gigi($tahun);
        // var_dump($data['kunjungan']);
        $this->load->view('perawat/grafik_obat_tahun',$data);
    }

    public function getPenyakitTahun($tahun){
        $data['penyakit']=$this->m_grafik->get_penyakit($tahun);
        // var_dump($data['kunjungan']);
        $this->load->view('perawat/grafik_penyakit_tahun',$data);
    }

/*halaman tambah data pasien */
    public function pasien()
    {
        if($this->session->userdata('level')==="perawat"){
            $data['listPasien'] = $this->pasien_model->getAllPasien();
            $this->load->view('perawat/pasien_umum/pasien_umum_view', $data);
        } else {
            redirect('page/index');
        }
    }
    public function addPasien()
    {
        if($this->session->userdata('level')==="perawat"){
            $data['kode'] = $this->pasien_model->kode();
            $this->load->view('perawat/pasien_umum/add_pasien_umum_view', $data);
         } else {
            redirect('page/index');
        }
    }

    public function addPasienDb()
    {
        $data = array(
                'no_rekam_medis' => $this->input->post('no_rekam_medis'),
                'no_KTP' => $this->input->post('no_KTP'),
                'nama_pasien' => $this->input->post('nama_pasien'),
                'tanggal_lahir' => date_format(date_create($this->input->post('tanggal_lahir')), 'Y-m-d'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'alamat' => $this->input->post('alamat'),
                'no_telp' => $this->input->post('no_telp'),
                'jenis_pasien' => $this->input->post('jenis_pasien'),
                'no_BPJS' => $this->input->post('no_BPJS'),
                'no_PLN' => $this->input->post('no_PLN')
                );
        $this->pasien_model->addPasien($data);
        echo "<script>alert('Anda Berhasil Menambahkan Data Pasien Dokter Umum');window.location='".base_url('admin/pasien')."';</script>";
        // redirect('admin/pasien');
    }

/* halaman update data pasien*/
    public function updatePasien($id_pasien)
    {
        if($this->session->userdata('level')==="perawat"){ 
            $data['pasien'] = $this->pasien_model->getPasien($id_pasien);
            $this->load->view('perawat/pasien_umum/edit_pasien_umum_view', $data);
        } else {
            redirect('page/index');
        }
    }

    public function updatePasienDb()
    {
        $data = array(
                'no_KTP' => $this->input->post('no_KTP'),
                'nama_pasien' => $this->input->post('nama_pasien'),
                'tanggal_lahir' => date_format(date_create($this->input->post('tanggal_lahir')), 'Y-m-d'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'alamat' => $this->input->post('alamat'),
                'no_telp' => $this->input->post('no_telp'),
                'jenis_pasien' => $this->input->post('jenis_pasien'),
                'no_BPJS' => $this->input->post('no_BPJS'),
                'no_PLN' => $this->input->post('no_PLN')
                );
        $kondisi['id_pasien'] = $this->input->post('id_pasien');
        $this->pasien_model->updatePasien($data, $kondisi);
        echo "<script>alert('Anda Berhasil Mengubah Data Pasien Dokter Umum');window.location='".base_url('admin/pasien')."';</script>";
        // redirect('admin/pasien');
    }
/* hapus data pasien*/
    public function deletePasienDb($id_pasien)
    {
        $this->pasien_model->deletePasien($id_pasien);
        echo "<script>alert('Anda Berhasil Menghapus Data Pasien Dokter Umum');window.location='".base_url('admin/pasien')."';</script>";
        // redirect('admin/pasien');
    }

/* halaman tentang penyakit*/
    public function penyakit()
    {
        if($this->session->userdata('level')==="perawat"){
            $data['listPenyakit'] = $this->penyakit_model->getAllPenyakit();
            $this->load->view('perawat/penyakit/penyakit_view', $data);
        } else {
            redirect('page/index');
        }
    }

    public function addPenyakit()
    {
        if($this->session->userdata('level')==="perawat"){
            $this->load->view('perawat/penyakit/add_penyakit_view');
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
        echo "<script>alert('Anda Berhasil Menambahkan Data Penyakit');window.location='".base_url('admin/penyakit')."';</script>";
        // redirect('admin/penyakit');
    }

    public function updatePenyakit($id_penyakit)
    {
        if($this->session->userdata('level')==="perawat"){
            $data['penyakit'] = $this->penyakit_model->getPenyakit($id_penyakit);
            $this->load->view('perawat/penyakit/edit_penyakit_view', $data);
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
        echo "<script>alert('Anda Berhasil Mengubah Data Penyakit');window.location='".base_url('admin/penyakit')."';</script>";
        // redirect('admin/penyakit');
    }

    public function deletePenyakitDb($id_penyakit)
    {
        $this->penyakit_model->deletePenyakit($id_penyakit);
        echo "<script>alert('Anda Berhasil Mengubah Data Penyakit');window.location='".base_url('admin/penyakit')."';</script>";
        // redirect('admin/penyakit');
    }

/* halaman tentang obat*/    
    public function obat()
    {
        if($this->session->userdata('level')==="perawat"){
            $data['listObat'] = $this->obat_model->getAllObat();
            $data['listObat_kosong'] = $this->obat_model->getAllObatStokKosong();
            $this->load->view('perawat/obat/obat_view', $data);
        } else {
            redirect('page/index');
        }
    }

    public function addObat()
    {
        if($this->session->userdata('level')==="perawat"){
            $this->load->view('perawat/obat/add_obat_view');
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
        echo "<script>alert('Anda Berhasil Menambahkan Data Obat');window.location='".base_url('admin/obat')."';</script>";
        // redirect('admin/obat');
    }

    public function updateObat($id_obat)
    {
        if($this->session->userdata('level')==="perawat"){
            $data['obat'] = $this->obat_model->getObat($id_obat);
            $this->load->view('perawat/obat/edit_obat_view', $data);
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
        echo "<script>alert('Anda Berhasil Mengubah Data Obat');window.location='".base_url('admin/obat')."';</script>";
        // redirect('admin/obat');
    }

    public function deleteObatDb($id_obat)
    {
        $this->obat_model->deleteObat($id_obat);
        echo "<script>alert('Anda Berhasil Menghapus Data Obat');window.location='".base_url('admin/obat')."';</script>";
        // redirect('admin/obat');
    }

/* halaman tentang dokter*/
    public function dokter()
    {
        if($this->session->userdata('level')==="perawat"){
            $data['listDokter'] = $this->dokter_model->getAllDokter();
            $this->load->view('perawat/dokter/dokter_view', $data);
        } else {
            redirect('page/index');
        }
    }

    public function addDokter()
    {
        if($this->session->userdata('level')==="perawat"){
            $this->load->view('perawat/dokter/add_dokter_view');
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
        echo "<script>alert('Anda Berhasil Menambahkan Data Dokter');window.location='".base_url('admin/dokter')."';</script>";
        // redirect('admin/dokter');
    }

    public function updateDokter($id_dokter)
    {
        if($this->session->userdata('level')==="perawat"){
            $data['dokter'] = $this->dokter_model->getDokter($id_dokter);
            $this->load->view('perawat/dokter/edit_dokter_view', $data);
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
        echo "<script>alert('Anda Berhasil Mengubah Data Dokter');window.location='".base_url('admin/dokter')."';</script>";
        // redirect('admin/dokter');
    }

    public function deleteDokterDb($id_dokter)
    {
        $this->dokter_model->deleteDokter($id_dokter);
        echo "<script>alert('Anda Berhasil Menghapus Data Dokter');window.location='".base_url('admin/dokter')."';</script>";
        // redirect('admin/dokter');
    }

/* halaman pengkajian awal atau periksa pasien */
    public function periksaPasien($id)
    {
        if($this->session->userdata('level')==="perawat"){
            $data['periksa'] = $this->pasien_model->getID($id);
            $data['listAmbilPenyakit'] = $this->pasien_model->getAllPenyakit();
            $data['listAmbilObat'] = $this->pasien_model->getAllObat();
            $data['listAmbilDokter'] = $this->pasien_model->getAllDokterUmum();
            $this->load->view('perawat/pasien_umum/periksa_pasien_umum_view', $data);
        } else {
            redirect('page/index');
        }
    }

    public function listAmbilPenyakit(){
        $data['listAmbilPenyakit'] = $this->pasien_model->getAllPenyakit();
        $this->load->view('perawat/penyakit/listAmbilPenyakit', $data);
    }

    public function addRiwayatPenyakit(){
        $tambah = array(
            'nama_penyakit' => $this->input->post('tambah_riwayat')
        );
        $this->pasien_model->addPenyakit($tambah);

    }
    
    public function periksaPasienDb()
    {
        $data = array(
            'id_pasien' => $this->input->post('id_pasien'),
            'keluhan' => $this->input->post('keluhan'),
            'alergi_obat' => $this->input->post('alergi_obat'),
            'berat_badan' => $this->input->post('berat_badan'),
            'tinggi_badan' => $this->input->post('tinggi_badan'),
            'sistolik' => $this->input->post('sistolik'),
            'diastolik' => $this->input->post('diastolik'),
            'suhu' => $this->input->post('suhu'),
            'nadi' => $this->input->post('nadi'),
            'kolesterol_tetap' => $this->input->post('kolesterol_tetap'),
            'gula_darah_sesaat' => $this->input->post('gula_darah_sesaat'),
            'asam_urat' => $this->input->post('asam_urat'),
            'id_dokter' => $this->input->post('id_dokter'),
            'status_pasien' => $this->input->post('status_pasien'),
            'tanggal_periksa' => date('Y-m-d')
    );
        $jumlah_pemakaian_penyakit = sizeof($this->input->post('nama_penyakit'));
        $riwayat_penyakit = array();
        for($i=0; $i < $jumlah_pemakaian_penyakit; $i++){
            $riwayat_penyakit[$i]['id_pasien'] = $this->input->post('id_pasien');
            $riwayat_penyakit[$i]['id_penyakit'] = $this->input->post('nama_penyakit')[$i];
        };

        $this->periksa_model->addRiwayatPenyakit($riwayat_penyakit);

        $this->periksa_model->addPeriksa($data);
        echo "<script>alert('Anda Berhasil Menambahkan Data Pengkajian Awal Dokter Umum');window.location='".base_url('admin/periksa')."';</script>";
        // redirect('admin/periksa');
    }


/* halaman pemeriksaan bagian admin */
    public function periksa()
    {
        if($this->session->userdata('level')==="perawat"){
            $data['listPeriksa'] = $this->periksa_model->getAllPeriksa();
            $this->load->view('perawat/pasien_umum/pengkajian_awal_view', $data);
        } else {
            redirect('page/index');
        }
    }

    public function updatePengkajianAwal($id)
    {
        if($this->session->userdata('level')==="perawat"){
            $data['awal'] = $this->periksa_model->getPengkajianAwal($id);
            $this->load->view('perawat/pasien_umum/edit_pengkajian_awal_view', $data);
        } else {
            redirect('page/index');
        }
    }

    public function updatePengkajianAwalDb()
    {
        $data = array(
                'keluhan' => $this->input->post('keluhan'),
                'alergi_obat' => $this->input->post('alergi_obat'),
                'berat_badan' => $this->input->post('berat_badan'),
                'tinggi_badan' => $this->input->post('tinggi_badan'),
                'sistolik' => $this->input->post('sistolik'),
                'diastolik' => $this->input->post('diastolik'),
                'nadi' => $this->input->post('nadi'),
                'suhu' => $this->input->post('suhu'),
                'kolesterol_tetap' => $this->input->post('kolesterol_tetap'),
                'gula_darah_sesaat' => $this->input->post('gula_darah_sesaat'),
                'asam_urat' => $this->input->post('asam_urat')
                );
        $kondisi['id_rm'] = $this->input->post('id_rm');
        $this->periksa_model->updatePengkajianAwal($data, $kondisi);
        echo "<script>alert('Anda Berhasil Mengubah Data Pengkajian Awal Dokter Umum');window.location='".base_url('admin/periksa')."';</script>";
        // redirect('admin/pasien_gigi');
    }

    public function addPeriksa()
    {
        if($this->session->userdata('level')==="perawat"){
            $this->load->view('periksa/add_periksa_view');
        } else {
            redirect('page/index');
        }
    }

    public function addPeriksaDb()
    {
        $data = array(
            'id_pasien' => $this->input->post('id_pasien'),
            'keluhan' => $this->input->post('keluhan'),
            'alergi_obat' => $this->input->post('alergi_obat'),
            'riwayat_penyakit' => $this->input->post('riwayat_penyakit'),
            'berat_badan' => $this->input->post('berat_badan'),
            'tinggi_badan' => $this->input->post('tinggi_badan'),
            'sistolik' => $this->input->post('sistolik'),
            'diastolik' => $this->input->post('diastolik'),
            'suhu' => $this->input->post('suhu'),
            'tanggal_periksa' => date('Y-m-d')
    );
    $this->periksa_model->addPeriksa($data);
    redirect('admin/periksa');
    }

    public function deletePemeriksaanDb($id_rm)
    {
        $this->periksa_model->deletePemeriksaan($id_rm);
        echo "<script>alert('Anda Berhasil Menghapus Data Pemeriksaan');window.location='".base_url('admin/periksa')."';</script>";
        // redirect('admin/periksa');
    }

/*halaman tentang rekam medis*/
    public function rekam_medis()
    {
        if($this->session->userdata('level')==="perawat"){
            $data['listRM'] = $this->pasien_model->getRekam();
            $this->load->view('perawat/pasien_umum/rekam_medis_view', $data);
        } else {
            redirect('page/index');
        }
    }

    public function addRm($id)
    {
        if($this->session->userdata('level')==="perawat"){
            $data['listPasien'] = $this->periksa_model->getRM($id);
            $data['listPasienRM'] = $this->periksa_model->getRMM($id);
            $data['diagnosa'] = $this->periksa_model->getDiagnosa($id);
            $data['pemakaianObat'] = $this->periksa_model->getPemakaianObat($id);
            $this->load->view('perawat/pasien_umum/isi_rekam_medis_view', $data);
        } else {
            redirect('page/index');
        } 
    }

    public function cetak_rekam_medis($id)
    {
         if($this->session->userdata('level')==="perawat"){
            $data['listPasien'] = $this->periksa_model->getRMCetak($id);
            $data['listPasienRM'] = $this->periksa_model->getRMMCetak($id);
            $data['listObat'] = $this->periksa_model->getPemakaianObatCetak($id);
            $data['listDiagnosa'] = $this->periksa_model->getDiagnosaCetak($id);
            $this->load->view('laporan/rekam_medis_cetak', $data);
        } else {
            redirect('page/index');
        } 
    }

    public function cetak_rekam_medis_pertanggal($id)
    {
         if($this->session->userdata('level')==="perawat"){
            $data['listPasien'] = $this->periksa_model->getRMCetak_tanggal($id);
            $data['listPasienRM'] = $this->periksa_model->getRMMCetak_tanggal($id);
            $data['listObat'] = $this->periksa_model->getPemakaianObatCetak_tanggal($id);
            $data['listDiagnosa'] = $this->periksa_model->getDiagnosaCetak_tanggal($id);
            $this->load->view('laporan/rekam_medis_cetak_tanggal', $data);
        } else {
            redirect('page/index');
        } 
    }

    public function pemakaianObat($id)
    {
        if($this->session->userdata('level')==="perawat"){
            $data['listPasien'] = $this->periksa_model->getIdentitasPasien($id);
            $data['listObat'] = $this->periksa_model->getPemakaianObat($id);
            $data['listDiagnosa'] = $this->periksa_model->getDiagnosa($id);
            $this->load->view("perawat/pasien_umum/isi_obat_view", $data);
        } else {
            redirect('page/index');
        }
    }

    public function diagnosa($id)
    {
        if($this->session->userdata('level')==="perawat"){
            $data['listPasien'] = $this->periksa_model->getIdentitasPasien($id);
            $data['listDiagnosa'] = $this->periksa_model->getDiagnosa($id);
            $this->load->view("perawat/pasien_umum/isi_diagnosa_view", $data);
        } else {
            redirect('page/index');
        }
    }


/*halaman tentang pasien dokter gigi*/
    public function pasien_gigi()
    {
        if($this->session->userdata('level')==="perawat"){
            $data['listPasienGigi'] = $this->pasien_model->getAllPasienGigi2();
            $this->load->view('perawat/pasien_gigi/pasien_gigi_view', $data);
        } else {
            redirect('page/index');
        }
    }

    public function addPasienGigi()
    {
        if($this->session->userdata('level')==="perawat"){
            $data['kode'] = $this->pasien_model->kodeGigi();
            $this->load->view('perawat/pasien_gigi/add_pasien_gigi_view', $data);
        } else {
            redirect('page/index');
        }
    }

    public function addPasienGigiDb()
    {
        $data = array(
                'no_rekam_medis' => $this->input->post('no_rekam_medis'),
                'no_KTP' => $this->input->post('no_KTP'),
                'nama_pasien' => $this->input->post('nama_pasien'),
                'tanggal_lahir' => date_format(date_create($this->input->post('tanggal_lahir')), 'Y-m-d'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'alamat' => $this->input->post('alamat'),
                'no_telp' => $this->input->post('no_telp'),
                'jenis_pasien' => $this->input->post('jenis_pasien'),
                'no_BPJS' => $this->input->post('no_BPJS'),
                'no_PLN' => $this->input->post('no_PLN')
                );
        $this->pasien_model->addPasienGigi($data);
        echo "<script>alert('Anda Berhasil Menghapus Data Pasien Dokter Gigi');window.location='".base_url('admin/pasien_gigi')."';</script>";
        // redirect('admin/pasien_gigi');
    }

    public function updatePasienGigi($id_pasien)
    {
        if($this->session->userdata('level')==="perawat"){
            $data['pasien'] = $this->pasien_model->getPasienGigi($id_pasien);
            $this->load->view('perawat/pasien_gigi/edit_pasien_gigi_view', $data);
        } else {
            redirect('page/index');
        }
    }

    public function updatePasienGigiDb()
    {
        $data = array(
                'no_KTP' => $this->input->post('no_KTP'),
                'nama_pasien' => $this->input->post('nama_pasien'),
                'tanggal_lahir' => date_format(date_create($this->input->post('tanggal_lahir')), 'Y-m-d'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'alamat' => $this->input->post('alamat'),
                'no_telp' => $this->input->post('no_telp'),
                'jenis_pasien' => $this->input->post('jenis_pasien'),
                'no_BPJS' => $this->input->post('no_BPJS'),
                'no_PLN' => $this->input->post('no_PLN')
                );
        $kondisi['id_pasien'] = $this->input->post('id_pasien');
        $this->pasien_model->updatePasienGigi($data, $kondisi);
        echo "<script>alert('Anda Berhasil Mengubah Data Pasien Dokter Gigi');window.location='".base_url('admin/pasien_gigi')."';</script>";
        // redirect('admin/pasien_gigi');
    }

    public function deletePasienGigiDb($id_pasien)
    {
        $this->pasien_model->deletePasienGigi($id_pasien);
        echo "<script>alert('Anda Berhasil Menghapus Data Pasien Dokter Gigi');window.location='".base_url('admin/pasien_gigi')."';</script>";
        redirect('admin/pasien_gigi');
    }

    /* halaman pengkajian awal atau periksa pasien */
    public function periksaPasienGigi($id)
    {
        if($this->session->userdata('level')==="perawat"){
            $data['periksa'] = $this->pasien_model->getIDGigi($id);
            $data['listAmbilObat'] = $this->pasien_model->getAllObat();
            $data['listAmbilDokter'] = $this->pasien_model->getAllDokterGigi();
            $this->load->view('perawat/pasien_gigi/periksa_pasien_gigi_view', $data);
        } else {
            redirect('page/index');
        }
    }
    
    public function periksaPasienGigiDb()
    {
        $data = array(
            'id_pasien' => $this->input->post('id_pasien'),
            'keluhan' => $this->input->post('keluhan'),
            'alergi_obat' => $this->input->post('alergi_obat'),
            'alergi_makanan' => $this->input->post('alergi_makanan'),
            'golongan_darah' => $this->input->post('golongan_darah'),
            'sistolik' => $this->input->post('sistolik'),
            'diastolik' => $this->input->post('diastolik'),
            'nadi' => $this->input->post('nadi'),
            'id_dokter' => $this->input->post('id_dokter'),
            'status_pasien' => $this->input->post('status_pasien'),
            'tanggal_periksa' => date('Y-m-d')
    );
    $this->periksa_model->addPeriksaGigi($data);
    echo "<script>alert('Anda Berhasil Menambahkan Data Pengkajian Awal Dokter Gigi');window.location='".base_url('admin/pemeriksaanGigi')."';</script>";
    // redirect('admin/pemeriksaanGigi');
    }

    /* halaman pemeriksaan gigi bagian admin */
    public function pemeriksaanGigi()
    {
        if($this->session->userdata('level')==="perawat"){
            $data['listPeriksa'] = $this->periksa_model->getAllPeriksaGigi();
            $this->load->view('perawat/pasien_gigi/pengkajian_awal_view', $data);
        } else {
            redirect('page/index');
        }
    }

    public function updatePengkajianAwalGigi($id)
    {
        if($this->session->userdata('level')==="perawat"){
            $data['awal_gigi'] = $this->periksa_model->getPengkajianAwalGigi($id);
            $this->load->view('perawat/pasien_gigi/edit_pengkajian_awal_view', $data);
        } else {
            redirect('page/index');
        }
    }

    public function updatePengkajianAwalGigiDb()
    {
        $data = array(
                'keluhan' => $this->input->post('keluhan'),
                'alergi_obat' => $this->input->post('alergi_obat'),
                'alergi_makanan' => $this->input->post('alergi_makanan'),
                'golongan_darah' => $this->input->post('golongan_darah'),
                'sistolik' => $this->input->post('sistolik'),
                'diastolik' => $this->input->post('diastolik'),
                'nadi' => $this->input->post('nadi')
                );
        $kondisi['id_rm'] = $this->input->post('id_rm');
        $this->periksa_model->updatePengkajianAwalGigi($data, $kondisi);
        echo "<script>alert('Anda Berhasil Mengubah Data Pengkajian Awal Dokter Gigi');window.location='".base_url('admin/pemeriksaanGigi')."';</script>";
        // redirect('admin/pasien_gigi');
    }

    public function deletePemeriksaanGigiDb($id_rm)
    {
        $this->periksa_model->deletePemeriksaanGigi($id_rm);
        echo "<script>alert('Anda Berhasil Menghapus Data Pemeriksaan Dokter Gigi');window.location='".base_url('admin/pemeriksaanGigi')."';</script>";
        // redirect('admin/pemeriksaanGigi');
    }

    public function odontogram($idRm){
        if($this->session->userdata('level')==="perawat"){
            $data['listPasien'] = $this->periksa_model->getIdentitasPasienGigi($idRm);
            $data['gigiAll'] = $this->periksa_model->getAllGigi();
            $data['cekGigi'] = $this->periksa_model->cekGigi($idRm);
            $data['pemeriksaan_gigi'] = $this->periksa_model->detail_pemeriksaan_gigi($idRm);
            $this->load->view('perawat/pasien_gigi/odontogram_view', $data);
        } else {
            redirect('page/index');
        }
    }

    /*halaman tentang rekam medis gigi*/
    public function rekam_medis_pasien_gigi()
    {
        if($this->session->userdata('level')==="perawat"){
            $data['listRM'] = $this->pasien_model->getAllRMGigi();
            $this->load->view('perawat/pasien_gigi/rekam_medis_view', $data);
        } else {
            redirect('page/index');
        }
    }

    public function addRMGigi($id)
    {
        if($this->session->userdata('level')==="perawat"){
            $data['listPasien'] = $this->periksa_model->getRMGigi($id);
            $data['listPasienRM'] = $this->periksa_model->getRMGigi2($id);
            $this->load->view('perawat/pasien_gigi/isi_rekam_medis_view', $data);
        } else {
            redirect('page/index');
        }
    }

    public function cetak_rekam_medis_gigi($id)
    {
         if($this->session->userdata('level')==="perawat"){
            $data['listPasien'] = $this->periksa_model->getRMGigiCetak($id);
            $data['listPasienRM'] = $this->periksa_model->getRMGigi2Cetak($id);
            $data['listObat'] = $this->periksa_model->getPemakaianObatGigiCetak($id);
            $data['gigiAll'] = $this->periksa_model->getAllGigi();
            $data['cekGigi'] = $this->periksa_model->cekGigiCetak($id);
            $data['pemeriksaan_gigi'] = $this->periksa_model->detail_pemeriksaan_gigi_cetak($id);
            $this->load->view('laporan/rekam_medis_gigi_cetak', $data);
        } else {
            redirect('page/index');
        } 
    }

    public function cetak_rekam_medis_gigi_tanggal($id)
    {
         if($this->session->userdata('level')==="perawat"){
            $data['listPasien'] = $this->periksa_model->getRMGigiCetak_tanggal($id);
            $data['listPasienRM'] = $this->periksa_model->getRMGigi2Cetak_tanggal($id);
            $data['listObat'] = $this->periksa_model->getPemakaianObatGigiCetak_tanggal($id);
            $data['gigiAll'] = $this->periksa_model->getAllGigi();
            $data['cekGigi'] = $this->periksa_model->cekGigiCetak($id);
            $data['pemeriksaan_gigi'] = $this->periksa_model->detail_pemeriksaan_gigi_cetak_tanggal($id);
            $this->load->view('laporan/rekam_medis_gigi_cetak', $data);
        } else {
            redirect('page/index');
        } 
    }

    public function pemakaianObatGigi($id)
    {
        if($this->session->userdata('level')==="perawat"){
            $data['listPasien'] = $this->periksa_model->getIdentitasPasienGigi($id);
            $data['listObat'] = $this->periksa_model->getPemakaianObatGigi($id);
            $this->load->view("perawat/pasien_gigi/isi_obat_view", $data);
        } else {
            redirect('page/index');
        }
    }
}
