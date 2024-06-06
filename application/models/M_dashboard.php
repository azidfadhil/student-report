<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_dashboard extends CI_Model {
  private $table = 'presensi';

  public function getDataSiswaAdmin() {
    $query = $this->db->query("SELECT jml_siswa FROM presensi");
    return $query;
  }

  public function getDataSekolahAdmin() {
    $query = $this->db->query("SELECT COUNT(DISTINCT(nama_sekolah)) AS jml_sekolah FROM presensi");
    return $query;
  }

  public function getDataSiswaMT($nama_mt) {
    $query = $this->db->query("SELECT jml_siswa FROM presensi WHERE nama_mt LIKE '%$nama_mt%'");
    return $query;
  }

  public function getDataSekolahMT($nama_mt) {
    $query = $this->db->query("SELECT COUNT(DISTINCT(nama_sekolah)) AS jml_sekolah FROM presensi WHERE nama_mt LIKE '%$nama_mt%'");
    return $query;
  }

  public function getAllDataSiswaPerBulan() {
    $query = $this->db->query("SELECT 
                                 MONTH(tgl_mengajar) AS bulan, 
                                 SUM(jml_siswa) AS jml_siswa
                               FROM presensi
                               GROUP BY MONTH(tgl_mengajar)
                               ORDER BY bulan ASC
                              ");
    return $query;
  }

  public function getDataSiswaPerBulan($nama_mt) {
    $query = $this->db->query("SELECT 
                                 MONTH(tgl_mengajar) AS bulan, 
                                 SUM(jml_siswa) AS jml_siswa
                               FROM presensi
                               WHERE nama_mt LIKE '%$nama_mt%'
                               GROUP BY MONTH(tgl_mengajar)
                               ORDER BY bulan ASC
                              ");
    return $query;
  }
}