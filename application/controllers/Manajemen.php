<?php 

class Manajemen extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_grafik');
		$this->load->model('login_model');
	}

	public function index()
	{
		if($this->session->userdata('level')==="manajemen"){
			$data['filterYear'] = $this->m_grafik->filter();
        	$this->load->view('manajemen/kunjungan_pasien_view',$data);
		} else {
			redirect('page/index');
		}
        
	}

	public function kunjungan_gigi()
	{
		if($this->session->userdata('level')==="manajemen"){
			$data['filterYear'] = $this->m_grafik->filter();
        	$this->load->view('manajemen/kunjungan_pasien_gigi_view',$data);
		} else {
			redirect('page/index');
		}
        
	}

	public function obat()
	{
		if($this->session->userdata('level')==="manajemen"){
	        $data['filterYear'] = $this->m_grafik->filter();
	        $this->load->view('manajemen/penggunaan_obat_view',$data);
	    } else {
	    	redirect('page/index');
	    }
	}

	public function obat_gigi()
	{
		if($this->session->userdata('level')==="manajemen"){
	        $data['filterYear'] = $this->m_grafik->filter();
	        $this->load->view('manajemen/penggunaan_obat_gigi_view',$data);
	    } else {
	    	redirect('page/index');
	    }
	}

	public function penyakit()
	{
		if($this->session->userdata('level')==="manajemen"){
	        $data['filterYear'] = $this->m_grafik->filter();
	        $this->load->view('manajemen/10_besar_penyakit',$data);
	    } else {
	    	redirect('page/index');
	    }
	}

	public function getKunjunganPasienTahun($tahun){
		$data['kunjungan']=$this->m_grafik->get_kunjungan_pasien($tahun);
		// var_dump($data['kunjungan']);
		$this->load->view('manajemen/grafiktahun',$data);
	}

	public function getKunjunganPasienGigiTahun($tahun){
		$data['kunjungan_gigi']=$this->m_grafik->get_kunjungan_pasien_gigi($tahun);
		// var_dump($data['kunjungan']);
		$this->load->view('manajemen/grafiktahungigi',$data);
	}

	public function getObatTahun($tahun){
		$data['obat']=$this->m_grafik->get_obat($tahun);
		
		// var_dump($data['kunjungan']);
		$this->load->view('manajemen/grafik_obat_tahun',$data);
	}

	public function getObatGigiTahun($tahun)
	{
		$data['obat_gigi']=$this->m_grafik->get_obat_gigi($tahun);
		$this->load->view('manajemen/grafik_obat_gigi_tahun', $data);
	}

	public function getPenyakitTahun($tahun){
		$data['penyakit']=$this->m_grafik->get_penyakit($tahun);
		// var_dump($data['kunjungan']);
		$this->load->view('manajemen/grafik_penyakit_tahun',$data);
	}

	public function ganti_password()
    {
        $data['user'] = $this->login_model->getUsername();

        // $this->form_validation->set_rules('old', 'Old', 'required|trim');
        $this->form_validation->set_rules('new', 'New', 'required|trim');
        $this->form_validation->set_rules('re_new', 'Retype New', 'required|trim|matches[new]');

        if($this->form_validation->run() == FALSE )
        {
            $this->load->view('manajemen/ganti_password', $data);
        } else {
            $old = $this->login_model->cek_old();
            if($old == FALSE){
                $this->session->set_flashdata('error', 'Old password not match!');
                $this->load->view('manajemen/ganti_password');
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
                    echo "<script>alert('Password yang dimasukkan tidak sama!');window.location='".base_url('manajemen/ganti_password')."';</script>";
                }
            }   
            }
    }

     public function cetak_penyakit()
    {
         if($this->session->userdata('level')==="manajemen"){
            $this->load->view('laporan/cetak_penyakit');
        } else {
            redirect('page/index');
        } 
    }

    public function cetak_obat_umum()
    {
         if($this->session->userdata('level')==="manajemen"){
            $this->load->view('laporan/cetak_obat_umum');
        } else {
            redirect('page/index');
        } 
    }

    public function cetak_obat_gigi()
    {
         if($this->session->userdata('level')==="manajemen"){
            $this->load->view('laporan/cetak_obat_gigi');
        } else {
            redirect('page/index');
        } 
    }

    public function cetak_kunjungan_umum()
    {
         if($this->session->userdata('level')==="manajemen"){
            $this->load->view('laporan/cetak_kunjungan_umum');
        } else {
            redirect('page/index');
        } 
    }

     public function cetak_kunjungan_gigi()
    {
         if($this->session->userdata('level')==="manajemen"){
            $this->load->view('laporan/cetak_kunjungan_gigi');
        } else {
            redirect('page/index');
        } 
    }

}