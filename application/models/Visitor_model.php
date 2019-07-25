<?php 
class Visitor_model extends CI_model {
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getVisitorToday(){
        return $this->db->query('SELECT COUNT(id_rm) as jumlah FROM rekam_medis WHERE YEAR(tanggal_periksa) = '.date('Y').' AND MONTH(tanggal_periksa) = '.date('m').' AND Day(tanggal_periksa) = '.date('d').'')->row();
    }
    
    public function getVisitorThisMonth(){
        return $this->db->query('SELECT COUNT(id_rm) as jumlah FROM rekam_medis WHERE YEAR(tanggal_periksa) = '.date('Y').' AND MONTH(tanggal_periksa) = '.date('m'))->row();
    }
    
    public function getVisitorThisYear(){
        return $this->db->query('SELECT COUNT(id_rm) as jumlah FROM rekam_medis WHERE YEAR(tanggal_periksa) = '.date('Y'))->row();
    }
    
    public function getVisitorGigiToday(){
        return $this->db->query('SELECT COUNT(id_rm) as jumlah FROM rekam_medis_pasien_gigi WHERE YEAR(tanggal_periksa) = '.date('Y').' AND MONTH(tanggal_periksa) = '.date('m').' AND Day(tanggal_periksa) = '.date('d').'')->row();
    }
    
    public function getVisitorGigiThisMonth(){
        return $this->db->query('SELECT COUNT(id_rm) as jumlah FROM rekam_medis_pasien_gigi WHERE YEAR(tanggal_periksa) = '.date('Y').' AND MONTH(tanggal_periksa) = '.date('m'))->row();
    }
    
    public function getVisitorGigiThisYear(){
        return $this->db->query('SELECT COUNT(id_rm) as jumlah FROM rekam_medis_pasien_gigi WHERE YEAR(tanggal_periksa) = '.date('Y'))->row();
    }
}
