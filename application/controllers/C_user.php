<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_user extends CI_Controller {
  public function __construct() {
      parent::__construct();
      $this->load->model('M_user');
      if ($this->session->userdata('logged') != TRUE){
        redirect('auth');
      }
  }

  public function index() {
    $data["title"] = "Data User";
    $data["user"] = $this->M_user->getAll();
    $this->load->view('templates/V_header', $data);
    $this->load->view('templates/V_sidebar', $data);
    $this->load->view('templates/V_topbar', $data);
    $this->load->view('admin/V_user', $data);
    $this->load->view('templates/V_footer');
  }

  public function tambah() {
    $user = $this->M_user;
    $validation = $this->form_validation;
    $validation->set_rules($user->rules());
    if ($validation->run()) {
      $user->save();
      $this->session->set_flashdata('icon', 'success');
      $this->session->set_flashdata('title', 'Success!');
      $this->session->set_flashdata('text', 'User berhasil dibuat');
      redirect('data-user');
    } else {
      $this->session->set_flashdata('icon', 'error');
      $this->session->set_flashdata('title', 'Error!');
      $this->session->set_flashdata('text', 'User gagal dibuat');
      redirect('data-user');
    }
  }

  public function edit($id) {
    $data["title"] = "Data User";
    $data["user"] = $this->M_user->getById($id);
    $this->load->view('templates/V_header', $data);
    $this->load->view('templates/V_sidebar', $data);
    $this->load->view('templates/V_topbar', $data);
    $this->load->view('admin/V_edit', $data);
    $this->load->view('templates/V_footer');
  }

  public function update($id) {
    $user = $this->M_user;
    $validation = $this->form_validation;
    $validation->set_rules($user->rules());

    if ($validation->run()) {
      $user->update($id);
      $this->session->set_flashdata('icon', 'success');
      $this->session->set_flashdata('title', 'Success!');
      $this->session->set_flashdata('text', 'User berhasil diupdate');
      redirect('data-user');
    } else {
      $this->session->set_flashdata('icon', 'error');
      $this->session->set_flashdata('title', 'Error!');
      $this->session->set_flashdata('text', 'User gagal diupdate');
      redirect('data-user');
    }
  }

  public function hapus($id) {
    if (!isset($id)) show_404();
    if ($this->M_user->delete($id)) {
      $this->session->set_flashdata('icon', 'success');
      $this->session->set_flashdata('title', 'Success!');
      $this->session->set_flashdata('text', 'User berhasil dihapus');
      redirect('data-user');
    }
  }
}