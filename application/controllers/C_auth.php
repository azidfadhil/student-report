<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_auth extends CI_Controller {
  public function __construct() {
      parent::__construct();
      $this->load->model('M_auth');
  }

  public function index() {
    if ($this->session->userdata('logged') != TRUE){
      $data['title'] = "Login";
      $this->load->view('V_login', $data);
    } else {
      redirect('dashboard');
    }
  }

  public function login() {
    $email = $this->input->post('email');
    $password = $this->input->post('password');

    $cek_email = $this->M_auth->check_email($email);
    if ($cek_email->num_rows() > 0) {
      $cek_password = $this->M_auth->check_password($email, $password);
      if ($cek_password->num_rows() > 0) {
        $account = $cek_password->row_array();
        $this->session->set_userdata('logged', TRUE);
        $this->session->set_userdata('user', $email);
        if ($account['role'] == 'admin') {
          $this->session->set_userdata('role', $account['role']);
          $this->session->set_userdata('id', $account['id']);
          $this->session->set_userdata('name', $account['name']);
          redirect('dashboard');
        } else {
          $this->session->set_userdata('role', $account['role']);
          $this->session->set_userdata('id', $account['id']);
          $this->session->set_userdata('name', $account['name']);
          redirect('dashboard');
        }
      } else {
        $this->session->set_flashdata('icon', 'error');
        $this->session->set_flashdata('title', 'Error!');
        $this->session->set_flashdata('text', 'Password salah');
        redirect('auth');
      }
    } else {
      $this->session->set_flashdata('icon', 'error');
      $this->session->set_flashdata('title', 'Error!');
      $this->session->set_flashdata('text', 'Akun tidak ditemukan');
      redirect('auth');
    }
  }

  public function logout() {
    $this->session->sess_destroy();
    redirect('auth');
	}
}