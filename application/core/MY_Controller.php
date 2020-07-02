<?php if ( ! defined('BASEPATH')) exit('No direct script access
allowed');
class MY_Controller extends CI_Controller{
 public function __construct(){
 parent::__construct();
 $this->load->model('M_header');
 $this->authenticated(); // Panggil fungsi authenticated
 	}
 public function authenticated(){ // Fungsi ini berguna untuk mengecek apakah user sudah login atau belum
 if($this->input->cookie('authenticated')){
 	if ($this->input->cookie('authenticated')=='true') {
 	$this->session->userdata('authenticated');
 	}
 }
 if($this->uri->segment(2) != 'Auth' && $this->uri->segment(2) != ''){
 if( ! $this->session->userdata('authenticated')) // Jika tidak ada / artinya belum login
 redirect('Multiuser/Auth'); // Redirect ke halaman login
 	}
 }
 public function render_login($content, $data = NULL){
 $data['judul'] = "Login";
 $data['contentnya'] = $this->load->view($content, $data, TRUE);
 $this->load->view('template/login/index', $data);
 }
 public function render_register($content, $data = NULL){
 $data['judul'] = "Register";
 $data['contentnya'] = $this->load->view($content, $data, TRUE);
 $this->load->view('template/register/index', $data);
 }
 public function render_backend($content, $data = NULL){
 $data['kategori'] = $this->M_header->get_kategori_all();
 $data['order'] = $this->M_header->jumlah_order();
 $data['product'] = $this->M_header->jumlah_product();
 $data['service'] = $this->M_header->jumlah_hubungikami();
 $data['headernya'] = $this->load->view('templates/header', $data, TRUE);
 $data['contentnya'] = $this->load->view($content, $data, TRUE);
 $data['footernya'] = $this->load->view('templates/footer', $data, TRUE);
 $this->load->view('templates/index', $data);
 }
}