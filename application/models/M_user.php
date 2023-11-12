<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model {
  private $table = 'master_trainer';
  
  public function rules() {
    return [
      [
        'field' => 'email',
        'label' => 'Email',
        'rules' => 'trim|required'
      ],
      [
        'field' => 'password',
        'label' => 'Password',
        'rules' => 'trim|required|min_length[6]'
      ],
      [
        'field' => 'name',
        'label' => 'Nama Lengkap',
        'rules' => 'trim|required'
      ],
      [
        'field' => 'no_hp',
        'label' => 'No HP',
        'rules' => 'trim|required|numeric'
      ],
      [
        'field' => 'role',
        'label' => 'Role',
        'rules' => 'trim|required'
      ]
    ];
  }

  public function getAll() {
    $this->db->from($this->table);
    $this->db->order_by('name ASC', 'id ASC');
    $query = $this->db->get();
    return $query->result();
  }

  public function getById($id) {
    return $this->db->get_where($this->table, ['id' => $id])->row();
  }

  public function save() {
    $data = array(
      "email" => $this->input->post('email'),
      "password" => $this->input->post('password'),
      "name" => $this->input->post('name'),
      "no_hp" => $this->input->post('no_hp'),
      "role" => $this->input->post('role')
    );
    return $this->db->insert($this->table, $data);
  }

  public function update($id) {
    $data = array(
      "email" => $this->input->post('email'),
      "password" => $this->input->post('password'),
      "name" => $this->input->post('name'),
      "no_hp" => $this->input->post('no_hp'),
      "role" => $this->input->post('role')
    );
    return $this->db->update($this->table, $data, array('id' => $id));
  }

  public function delete($id) {
    return $this->db->delete($this->table, array('id' => $id));
  }
}