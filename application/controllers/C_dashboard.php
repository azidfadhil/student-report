<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_dashboard extends CI_Controller {
  public function __construct() {
      parent::__construct();
      $this->load->model('M_dashboard');
      if ($this->session->userdata('logged') != TRUE){
        redirect('auth');
      }
  }

  public function index() {

    $data["title"] = "Dashboard";
    $data['jml_siswa'] = 0;
    $data['jml_sekolah'] = 0;
    
    $this->load->view('templates/V_header', $data);
    $this->load->view('templates/V_sidebar', $data);
    $this->load->view('templates/V_topbar', $data);

    if ($_SESSION['role'] == 'admin') {
      // Data Total Siswa Admin
      if ($this->M_dashboard->getDataSiswaAdmin()->num_rows() > 0) {
        $jumlah_siswa = $this->M_dashboard->getDataSiswaAdmin()->result();
        foreach ($jumlah_siswa as $jsiswa) {
          $data['jml_siswa'] += $jsiswa->jml_siswa;
        } 
      }

      // Data Total Sekolah Admin
      if ($this->M_dashboard->getDataSekolahAdmin()->num_rows() > 0) {
        $jumlah_sekolah = $this->M_dashboard->getDataSekolahAdmin()->result();
        foreach ($jumlah_sekolah as $jsekolah) {
          $data['jml_sekolah'] += $jsekolah->jml_sekolah;
        }
      }
      $this->load->view('admin/V_dashboard', $data);
    } else {
      $nama_mt = $_SESSION['name'];
      // Data Total Siswa MT
      if ($this->M_dashboard->getDataSiswaMT($nama_mt)->num_rows() > 0) {
        $jumlah_siswa = $this->M_dashboard->getDataSiswaMT($nama_mt)->result();
        foreach ($jumlah_siswa as $jsiswa) {
          $data['jml_siswa'] += $jsiswa->jml_siswa;
        } 
      }

      // Data Total Sekolah MT
      if ($this->M_dashboard->getDataSekolahMT($nama_mt)->num_rows() > 0) {
        $jumlah_sekolah = $this->M_dashboard->getDataSekolahMT($nama_mt)->result();
        foreach ($jumlah_sekolah as $jsekolah) {
          $data['jml_sekolah'] += $jsekolah->jml_sekolah;
        }
      }
      $this->load->view('mt/V_dashboard', $data);
    }
    $this->load->view('templates/V_footer');
  }
}