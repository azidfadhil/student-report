<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_presensi extends CI_Model {
  private $table = 'presensi';
  
  public function rules() {
    return [
      [
        'field' => 'tgl_mengajar',
        'label' => 'Tanggal Mengajar',
        'rules' => 'trim|required'
      ],
      [
        'field' => 'nama_sekolah',
        'label' => 'Nama Sekolah',
        'rules' => 'trim|required'
      ],
      [
        'field' => 'kelas',
        'label' => 'Kelas',
        'rules' => 'trim|required'
      ],
      [
        'field' => 'nama_mt',
        'label' => 'Nama MT',
        'rules' => 'trim|required'
      ],
      [
        'field' => 'nama_file',
        'label' => 'Nama File',
        'rules' => 'trim|required'
      ],
      [
        'field' => 'jml_siswa',
        'label' => 'Jumlah Siswa',
        'rules' => 'trim|required'
      ],
      [
        'field' => 'jenis_mengajar',
        'label' => 'Jenis Mengajar',
        'rules' => 'trim|required'
      ],
      [
        'field' => 'created_by',
        'label' => 'Dibuat Oleh',
        'rules' => 'trim|required'
      ],
      [
        'field' => 'last_modified_by',
        'label' => 'Terakhir Mengubah',
        'rules' => 'trim|required'
      ]
    ];
  }

  public function getAllPresensiAdmin() {
    $query = $this->db->query("SELECT * FROM presensi ORDER BY tgl_mengajar DESC, kelas ASC");
    return $query->result();
  }

  public function getAllPresensiMT($nama_mt) {
    $query = $this->db->query("SELECT * FROM presensi WHERE nama_mt LIKE '%$nama_mt%' ORDER BY tgl_mengajar DESC, kelas ASC");
    return $query->result();
  }

  public function getMT() {
    $query = $this->db->query("SELECT name FROM master_trainer WHERE role NOT IN ('admin') ORDER BY name ASC");
    return $query->result();
  }

  public function cekData($nama_file) {
    $result = $this->db->query("SELECT nama_file FROM presensi WHERE nama_file='$nama_file'");
    return $result;
  }

  public function getFilePresensi($id) {
    $result = $this->db->query("SELECT * FROM presensi WHERE id=$id");
    return $result->result();
  }
  
  public function delete($id) {
    return $this->db->delete($this->table, array('id' => $id));
  }
}