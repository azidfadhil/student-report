<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class C_presensi extends CI_Controller {
  public function __construct() {
      parent::__construct();
      $this->load->model('M_presensi');
      if ($this->session->userdata('logged') != TRUE){
        redirect('auth');
      }
  }

  public function index() {
    $data["title"] = "Data Presensi";
    $data["mt"] = $this->M_presensi->getMT();

    $this->load->view('templates/V_header', $data);
    $this->load->view('templates/V_sidebar', $data);
    $this->load->view('templates/V_topbar', $data);
    if ($_SESSION['role'] == 'admin') {
      $data['presensi'] = $this->M_presensi->getAllPresensiAdmin();
      $this->load->view('admin/V_presensi', $data);
    } else {
      $nama_mt = $_SESSION['name'];
      $data['presensi'] = $this->M_presensi->getAllPresensiMT($nama_mt);
      $this->load->view('mt/V_presensi', $data);
    }
    $this->load->view('templates/V_footer', $data);
  }

  public function tambah() {
    $data['tgl_mengajar']   = $_POST['tgl_mengajar'];
    $data['nama_sekolah']   = $_POST['nama_sekolah'];
    $data['kelas']          = $_POST['kelas'];
    $data['file_presensi']  = $_FILES['file_presensi'];
    $data['jenis_mengajar'] = $_POST['jenis_mengajar'];
    $data['nama_mt']        = $_POST['master_trainer'];
    $data['created_by']     = $_SESSION['name'];

    // Membuat format nama MT
    $nama_mt_file = '';
    $nama_mt_yang_mengajar = '';

    foreach($data['nama_mt'] as $nmt) {
      $nama_mt_file .= "_" . $nmt;
      $nama_mt_yang_mengajar .= "," . $nmt;
    }
    $data['nama_mt_yang_mengajar'] = substr($nama_mt_yang_mengajar, 1);

    // Membuat format nama file untuk di check di database
    $tgl_nama_file = date_format(new DateTime($data['tgl_mengajar']), "ymd");
    $ext_file_presensi = pathinfo($data['file_presensi']['name'], PATHINFO_EXTENSION);
    $data['rename_file'] = $tgl_nama_file . '_' . $data['nama_sekolah'] . '_' . $data['kelas'] .  $nama_mt_file . '.' . $ext_file_presensi;

    // Check data already exist or doesn't
    $cek_data = $this->M_presensi->cekData($data['rename_file']);
    if ($cek_data->num_rows() > 0) {
      $this->session->set_flashdata('icon', 'error');
      $this->session->set_flashdata('title', 'Error!');
      $this->session->set_flashdata('text', 'Presensi sudah ada');
      redirect('data-presensi');
    }

    // Mengupload file presensi excel ke folder upload
    $folder_file_presensi = 'upload/presensi/';
    $nama_file_asli = $data['file_presensi']['name'];
    move_uploaded_file($data['file_presensi']["tmp_name"], $folder_file_presensi . $nama_file_asli);

    // Mengganti nama file yang sudah diupload
    $nama_file_yang_lama = $folder_file_presensi . $nama_file_asli;
    $nama_file_yang_baru = $folder_file_presensi . $data['rename_file'];
    rename($nama_file_yang_lama, $nama_file_yang_baru);

    // Menghitung jumlah row file presensi
    $excel = \PhpOffice\PhpSpreadsheet\IOFactory::load($nama_file_yang_baru); 
    $sheet = $excel->getActiveSheet();
    $highestRow = $sheet->getHighestDataRow();
    $data['jml_siswa'] = $highestRow - 1;
    
    $this->db->set('tgl_mengajar', $data['tgl_mengajar']);
    $this->db->set('nama_sekolah', $data['nama_sekolah']);
    $this->db->set('kelas', $data['kelas']);
    $this->db->set('nama_mt', $data['nama_mt_yang_mengajar']);
    $this->db->set('nama_file', $data['rename_file']);
    $this->db->set('jml_siswa', $data['jml_siswa']);
    $this->db->set('jenis_mengajar', $data['jenis_mengajar']);
    $this->db->set('created_by', $data['created_by']);
    $this->db->set('last_modified_by', $data['created_by']);

    if ($this->db->insert('presensi')) {
      $this->session->set_flashdata('icon', 'success');
      $this->session->set_flashdata('title', 'Success!');
      $this->session->set_flashdata('text', 'User berhasil dibuat');
      redirect('data-presensi');
    } else {
      $this->session->set_flashdata('icon', 'error');
      $this->session->set_flashdata('title', 'Error!');
      $this->session->set_flashdata('text', 'User gagal dibuat');
      redirect('data-presensi');
    }
  }

  public function lihatpresensi($id) {
    $data["title"] = "Data Presensi";
    $file_presensi = $this->M_presensi->getFilePresensi($id);
    $nama_file = $file_presensi[0]->nama_file;

    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    $spreadsheet = $reader->load(FCPATH . 'upload\presensi\\' . $nama_file);
    $worksheet = $spreadsheet->getActiveSheet();
    $jml_kolom_dan_baris = $worksheet->getHighestRowAndColumn();

    $alpha = array('A','B','C','D','E','F','G','H','I','J','K', 'L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
    $baris = $jml_kolom_dan_baris['row'];
    $kolom = array_search($jml_kolom_dan_baris['column'], $alpha) + 1;

    $data['worksheet'] = $worksheet;
    $data['kolom'] = $kolom;
    $data['baris'] = $baris;

    $this->load->view('templates/V_header', $data);
    $this->load->view('V_lihatpresensi', $data);
    $this->load->view('templates/V_footer', $data);
  }

  public function downloadpresensi($id) {
    $file_presensi = $this->M_presensi->getFilePresensi($id);
    $nama_file = $file_presensi[0]->nama_file;
    force_download(FCPATH . 'upload\presensi\\' . $nama_file, NULL);
  }

  public function editpresensi($id) {
    $data["title"] = "Edit Presensi";
    $data["mt"] = $this->M_presensi->getMT();
    $data["presensi"] = $this->M_presensi->getFilePresensi($id);

    $this->load->view('templates/V_header', $data);
    $this->load->view('templates/V_sidebar', $data);
    $this->load->view('templates/V_topbar', $data);
    $this->load->view('V_editpresensi', $data);
    $this->load->view('templates/V_footer', $data);
  }

  public function update($id) {
    $file_presensi = $this->M_presensi->getFilePresensi($id);

    $data['tgl_mengajar']     = $_POST['tgl_mengajar'];
    $data['nama_sekolah']     = $_POST['nama_sekolah'];
    $data['kelas']            = $_POST['kelas'];
    $data['file_presensi']    = $_FILES['file_presensi'];
    $data['jenis_mengajar']   = $_POST['jenis_mengajar'];
    $data['nama_mt']          = $_POST['master_trainer'];
    $data['last_modified_by'] = $_SESSION['name'];

    // Membuat format nama MT
    $nama_mt_file = '';
    $nama_mt_yang_mengajar = '';

    foreach($data['nama_mt'] as $nmt) {
      $nama_mt_file .= "_" . $nmt;
      $nama_mt_yang_mengajar .= "," . $nmt;
    }
    $data['nama_mt_yang_mengajar'] = substr($nama_mt_yang_mengajar, 1);

    if (!$data['file_presensi']['name']) {
      // Kalau file tidak berubah
      // Membuat format nama file untuk di check di database
      $tgl_nama_file = date_format(new DateTime($data['tgl_mengajar']), "ymd");
      $ext_file_presensi = pathinfo($file_presensi[0]->nama_file, PATHINFO_EXTENSION);
      $data['rename_file'] = $tgl_nama_file . '_' . $data['nama_sekolah'] . '_' . $data['kelas'] .  $nama_mt_file . '.' . $ext_file_presensi;

      // Mengupload file presensi excel ke folder upload
      $folder_file_presensi = 'upload/presensi/';
      $nama_file_yang_lama = $folder_file_presensi . $file_presensi[0]->nama_file;
      $nama_file_yang_baru = $folder_file_presensi . $data['rename_file'];
      rename($nama_file_yang_lama, $nama_file_yang_baru);

      $this->db->set('tgl_mengajar', $data['tgl_mengajar']);
      $this->db->set('nama_sekolah', $data['nama_sekolah']);
      $this->db->set('kelas', $data['kelas']);
      $this->db->set('nama_mt', $data['nama_mt_yang_mengajar']);
      $this->db->set('nama_file', $data['rename_file']);
      $this->db->set('jenis_mengajar', $data['jenis_mengajar']);
      $this->db->set('last_modified_by', $data['last_modified_by']);
      $this->db->where('id', $id);

      if ($this->db->update('presensi')) {
        $this->session->set_flashdata('icon', 'success');
        $this->session->set_flashdata('title', 'Success!');
        $this->session->set_flashdata('text', 'User berhasil dibuat');
        redirect('data-presensi');
      } else {
        $this->session->set_flashdata('icon', 'error');
        $this->session->set_flashdata('title', 'Error!');
        $this->session->set_flashdata('text', 'User gagal dibuat');
        redirect('data-presensi');
      }
    } else {
      // Kalau file berubah
      // Membuat format nama file untuk di check di database
      $tgl_nama_file = date_format(new DateTime($data['tgl_mengajar']), "ymd");
      $ext_file_presensi = pathinfo($data['file_presensi']['name'], PATHINFO_EXTENSION);
      $data['rename_file'] = $tgl_nama_file . '_' . $data['nama_sekolah'] . '_' . $data['kelas'] .  $nama_mt_file . '.' . $ext_file_presensi;

      // Check data already exist or doesn't
      $cek_data = $this->M_presensi->cekData($data['rename_file']);
      if ($cek_data->num_rows() > 0) {
        $this->session->set_flashdata('icon', 'error');
        $this->session->set_flashdata('title', 'Error!');
        $this->session->set_flashdata('text', 'Presensi sudah ada');
        redirect('data-presensi');
      }

      // Menghapus file presensi yang lama
      $nama_file = $file_presensi[0]->nama_file;
      $lokasi_file = FCPATH . 'upload\presensi\\' . $nama_file;

      if (unlink($lokasi_file)) {
        echo 'File ' . $nama_file . ' berhasil dihapus!';
      } else {
        echo 'Ada kesalahan ketika ingin menghapus file ' . $nama_file;
      }

      // Mengupload file presensi excel ke folder upload
      $folder_file_presensi = 'upload/presensi/';
      $nama_file_asli = $data['file_presensi']['name'];
      move_uploaded_file($data['file_presensi']["tmp_name"], $folder_file_presensi . $nama_file_asli);

      // Mengganti nama file yang sudah diupload
      $nama_file_yang_lama = $folder_file_presensi . $nama_file_asli;
      $nama_file_yang_baru = $folder_file_presensi . $data['rename_file'];
      rename($nama_file_yang_lama, $nama_file_yang_baru);

      // Menghitung jumlah row file presensi
      $excel = \PhpOffice\PhpSpreadsheet\IOFactory::load($nama_file_yang_baru); 
      $sheet = $excel->getActiveSheet();
      $highestRow = $sheet->getHighestDataRow();
      $data['jml_siswa'] = $highestRow - 1;

      $this->db->set('tgl_mengajar', $data['tgl_mengajar']);
      $this->db->set('nama_sekolah', $data['nama_sekolah']);
      $this->db->set('kelas', $data['kelas']);
      $this->db->set('nama_mt', $data['nama_mt_yang_mengajar']);
      $this->db->set('nama_file', $data['rename_file']);
      $this->db->set('jml_siswa', $data['jml_siswa']);
      $this->db->set('jenis_mengajar', $data['jenis_mengajar']);
      $this->db->set('last_modified_by', $data['last_modified_by']);
      $this->db->where('id', $id);

      if ($this->db->update('presensi')) {
        $this->session->set_flashdata('icon', 'success');
        $this->session->set_flashdata('title', 'Success!');
        $this->session->set_flashdata('text', 'User berhasil dibuat');
        redirect('data-presensi');
      } else {
        $this->session->set_flashdata('icon', 'error');
        $this->session->set_flashdata('title', 'Error!');
        $this->session->set_flashdata('text', 'User gagal dibuat');
        redirect('data-presensi');
      }
    }
  }

  public function hapus($id) {
    if (!isset($id)) show_404();

    $file_presensi = $this->M_presensi->getFilePresensi($id);
    $nama_file = $file_presensi[0]->nama_file;
    $lokasi_file = FCPATH . 'upload\presensi\\' . $nama_file;

    if (unlink($lokasi_file)) {
      echo 'File ' . $nama_file . ' berhasil dihapus!';
    } else {
      echo 'Ada kesalahan ketika ingin menghapus file ' . $nama_file;
    }

    if ($this->M_presensi->delete($id)) {
      $this->session->set_flashdata('icon', 'success');
      $this->session->set_flashdata('title', 'Success!');
      $this->session->set_flashdata('text', 'Presensi berhasil dihapus');
      redirect('data-presensi');
    }
  }
}