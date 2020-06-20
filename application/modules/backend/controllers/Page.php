<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Page extends MY_Controller {
	 public function __construct(){
 		parent::__construct();
        $this->load->model('M_data');
		$this->load->helper(array('form', 'url', 'directory'));
	}
     public function home(){
    	 $data['judul'] = "Dashboard";
         $data['kategori'] = $this->M_data->get_kategori_all();  		 
    	 $data['total_user'] = $this->M_data->jumlah_user();
    	 $data['total_customer'] = $this->M_data->jumlah_customer();
    	 $data['total_product'] = $this->M_data->jumlah_product();
         $data['total_order'] = $this->M_data->jumlah_order();
    	 // function render_backend tersebut dari file core/MY_Controller.php
    	 $this->render_backend('v_home', $data); // load view home.php
     }
     public function upload(){
     	$data['judul'] = "Upload File";
     	$this->render_backend('page/v_uploadfile', $data);
     } 
     public function order(){
     	$this->authenticated();
    	 if($this->session->userdata('role') != 'admin') // Jika user yg login bukan admin
    	 show_404();
    	 $data['judul'] = "Order";
    	 $this->render_backend('page/v_order', $data);
     }
     public function customer(){
     	$this->authenticated();
    	 if($this->session->userdata('role') != 'admin') // Jika user yg login bukan admin
    	 show_404();
    	 $data['judul'] = "Customer";
    	 $this->render_backend('page/v_customer', $data);
     }
     public function product(){
     $data['judul'] = "Produk";
     $this->render_backend('product/v_product', $data);
     } 
     public function category(){
     	$data['judul'] = "category";
        $kategori =($this->uri->segment(4))?$this->uri->segment(4):0;
        $data['id'] = $kategori;
        $data['nama_kategori'] = $this->M_data->get_nama_kategori($kategori);
     	$this->render_backend('product/v_category', $data);
     }
     public function service(){
     	$data['judul'] = "Customer Service";
     	$this->render_backend('page/v_service', $data);
     } 
     public function pengguna(){
     // Panggil fungsi authenticated yg ada pada core/MY_Controller.php
     $this->authenticated();
     if($this->session->userdata('role') != 'admin') // Jika user yg login bukan admin
     show_404(); // Redirect ke halaman 404 Not found
     // function render_backend tersebut dari file core/MY_Controller.php
     $this->render_backend('pengguna'); // load view pengguna.php
     }
}