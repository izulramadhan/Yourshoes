<?php 
 
 
class Crud extends MY_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('M_data');
		$this->load->model('M_header');
		$this->load->helper(array('form', 'url'));
 
	}
 
	function tambah_aksi(){
		$config['upload_path']          = '././gambar/product/'; //direktori
		$config['allowed_types']        = 'gif|jpg|png'; // file yang di perbolehkan
 
		$this->load->library('upload', $config);
 
		if ( ! $this->upload->do_upload('berkas')){
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('product/v_insert_product', $error);
		}else{
			$this->upload->data("file_name");
		}
		$product_id		= $this->input->post('product_id');
		$vendor_id 		= $this->input->post('vendor_id');
		$product_name 	= $this->input->post('product_name');
		$product_price 	= $this->input->post('product_price');
		$product_desc 	= $this->input->post('product_desc');
		$category 		= $this->input->post('category');
		$stok 			= $this->input->post('stok');
		$foto = $this->upload->data("file_name");
		$data = array(
			'nama_produk' => $product_name,
			'deskripsi' => $product_desc,
			'harga' => $product_price,
			'gambar' => $foto,
			'kategori' => $category,
			'stok' => $stok
			);
		$this->M_data->input_data($data,'tbl_produk');
 		$this->session->set_flashdata('message', 'Data berhasil ditambahkan');
		redirect('backend/Page/product');
	}

    function insert_product(){
     	$data['judul'] = "Tambah Produk";
     	$data['products'] = $this->M_data->tampil_data();
      	$this->render_backend('product/v_insert_product', $data);
    }

	function hapus($id_produk){
		$where = array('id_produk' => $id_produk);
		$this->M_data->hapus_data($where,'tbl_produk');
 		$this->session->set_flashdata('hapus', 'Data berhasil dihapus');
		redirect('backend/Page/product');
	}

	function edit($id_produk){
	$data['judul']="Edit Produk";
	$where = array('id_produk' => $id_produk);
	$data['user'] = $this->M_data->edit_data($where,'tbl_produk')->result();
    $this->render_backend('product/v_edit', $data);
	}

	function update(){
	$config['upload_path']          = '././././gambar/product/'; //direktori
	$config['allowed_types']        = 'gif|jpg|png'; // file yang di perbolehkan

 	$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('berkas')){
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('product/v_edit', $error);
		}else{
			$this->upload->data("file_name");
		}
	$id		= $this->input->post('id_produk');
	$nama	= $this->input->post('nama_produk');
	$desk	= $this->input->post('deskripsi');
	$har	= $this->input->post('harga');
	$gam	= $this->upload->data("file_name");
	$kat	= $this->input->post('kategori');
	$stok	= $this->input->post('stok');
	$data = array(
		'nama_produk' => $nama,
		'deskripsi' => $desk,
		'harga' => $har,
		'gambar' => $gam,
		'kategori' => $kat,
		'stok' => $stok
	);
 
	$where = array(
		'id_produk' => $id
	);
 
		$this->M_data->update_product($where,$data,'tbl_produk');
 		$this->session->set_flashdata('message', 'Data berhasil diubah');
		redirect('backend/Page/product');
	}

	function aksi_upload(){
		$config['upload_path']          = '././././files';
		$config['allowed_types']        = '*'; // file yang di perbolehkan
 
		$this->load->library('upload', $config);
 
		if ( ! $this->upload->do_upload('berkas')){
			$error = array('error' => $this->upload->display_errors());
    		$this->session->set_flashdata('error',$error['error']);
			redirect('Page/upload', 'refresh');
		}else{
			$this->upload->data("file_name");
 			$this->session->set_flashdata('message', 'File berhasil diupload');
			redirect('backend/Page/upload');
		}
	}
	function detail($id){
        $data['judul']="Detail Order";
		$where = array('order_id' => $id);
		$where2 = array('id_order' => $id);
		$data['jumlah_total'] = $this->M_data->sum($where);
		$data['user'] = $this->M_data->detail_order($where);
		$data['mail'] = $this->M_data->get_email($where2);
		$data['id_order'] = $id;
      	$this->render_backend('page/v_detail_order', $data);
	}
	function detailService($id){
        $data['judul']="Detail Service";
		$where = array('id' => $id);
		$data['user'] = $this->M_data->detail_service($where);
		$data['id_order'] = $id;
    	$this->render_backend('page/v_detail_service', $data);
	}
	function replyService($id){
        $data['judul']="Balas Service";
		$where = array('id' => $id);
		$data['user'] = $this->M_data->detail_service($where);
		$data['id_order'] = $id;
    	$this->render_backend('page/v_reply_service', $data);
	}
	function balasService(){
		 $id = $this->input->post('id');
		 $pesan = $this->input->post('pesan');
		 $reply = $this->input->post('reply');
		 // Konfigurasi email
		 $config = [
		 'mailtype' => 'html',
		 'charset' => 'utf-8',
		 'protocol' => 'smtp',
		 'smtp_host' => 'ssl://smtp.gmail.com',
		 'smtp_user' => 'bachtiarnuryogipratama@gmail.com', // Ganti dengan email gmail kamu
		 'smtp_pass' => 'merdeka17', // Password gmail kamu
		 'smtp_port' => 465,
		 'crlf' => "\r\n",
		 'newline' => "\r\n"
		 ];
		 // Load library email dan konfigurasinya
		 $this->load->library('email', $config);
		 // Email dan nama pengirim
		 $this->email->from('no-reply@yourshoes.com', 'yourshoes.com | YourShoes');
		 // Email penerima
		 $this->email->to('bachtiarnuryogipratama@gmail.com'); // Ganti dengan email tujuan kamu
		 // Lampiran email, isi dengan url/path file
		 $this->email->attach('File.png');
		 // Subject email
		 $this->email->subject('[YourShoes] - Balasan Pesan');
		 // Isi email
		 $this->email->message("Reply : $reply");
		 // Tampilkan pesan sukses atau error
		 if ($this->email->send()) {
			$data = array(
				'reply' => $reply,
				'status' => 'Sudah Dibalas'
				);
				 $where = array(
					'id' => $id
				);
			$this->M_data->update_hubungikami($where,$data,'tbl_hubungikami');
	 		$this->session->set_flashdata('message', 'Pesan Terkirim');
			redirect('backend/Page/service');
		 } else {
		 $this->session->set_flashdata('hapus', 'Error! email tidak dapat dikirim.');
			redirect('backend/Page/service');
		 }
	}
	function hapus_customer($id){
		$where = array('id_user' => $id);
		$this->M_data->hapus_user($where,'user_cust');
 		$this->session->set_flashdata('hapus', 'Data berhasil dihapus');
		redirect('backend/Page/customer');
	}
        function hapus_produk(){
        $data['judul'] = "Riwayat Produk Terhapus";
        //config
        $config['base_url']="http://localhost/EcommerceTA/backend/Crud/hapus_produk/";
        $config['total_rows']=$this->M_data->jumlah_hapus_product();
        $config['per_page']=10;
        //styling
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['attributes'] = ['class' => 'page-link'];
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        //initialize
        $this->pagination->initialize($config);
 		$data['order'] = $this->M_header->jumlah_order();
 		$data['product'] = $this->M_header->jumlah_product();
 		$data['service'] = $this->M_header->jumlah_hubungikami();
        $data['start'] = $this->uri->segment(4);
        $data['pagination'] = $this->pagination->create_links();
        $data['products'] = $this->M_data->tampil_hapus_data($config['per_page'], $data['start']);
        $this->load->view('templates/header', $data); 
        $this->load->view('product/v_hapus_product',$data);
        $this->load->view('templates/footer');
        }
        public function prosesOrder($id){
		 $jumlah_total = $this->input->post('jumlah_total');
		 $alamatemail = $this->input->post('email');
		 $nama = $this->input->post('nama');
		 // Konfigurasi email
		 $config = [
		 'mailtype' => 'html',
		 'charset' => 'utf-8',
		 'protocol' => 'smtp',
		 'smtp_host' => 'ssl://smtp.gmail.com',
		 'smtp_user' => 'bachtiarnuryogipratama@gmail.com', // Ganti dengan email gmail kamu
		 'smtp_pass' => 'merdeka17', // Password gmail kamu
		 'smtp_port' => 465,
		 'crlf' => "\r\n",
		 'newline' => "\r\n"
		 ];
		 // Load library email dan konfigurasinya
		 $this->load->library('email', $config);
		 // Email dan nama pengirim
		 $this->email->from('no-reply@yourshoes.com', 'yourshoes.com | YourShoes');
		 // Email penerima
		 $this->email->to($alamatemail); // Ganti dengan email tujuan kamu
		 // Lampiran email, isi dengan url/path file
		 $this->email->attach('File.png');
		 // Subject email
		 $this->email->subject('[YourShoes] - Transaksi Pemesanan Berhasil');
		 // Isi email
		 $this->email->message("Hallo $nama <br> 
		 	Pesanan anda senilai $jumlah_total telah kami verifikasi <br> 
		 	Terimakasih telah berbelanja di <strong><a href='https://yourshoes.com/home' target='_blank' rel='noopener'>YourShoes</a></strong> <br> 
		 	Pesanan anda sedang disiapkan untuk segera kami kirim.");
		 // Tampilkan pesan sukses atau error
		 if ($this->email->send()) {
			 $data = array(
			'status' => 'Sudah Diproses',
			);
			 $where = array(
				'id_order' => $id
			);
		 $this->M_data->update_order($where,$data,'tbl_order');
		 $this->session->set_flashdata('message', 'Sukses! email berhasil dikirim.');
			redirect('backend/Page/order');
		 } else {
		 $this->session->set_flashdata('hapus', 'Error! email tidak dapat dikirim.');
			redirect('backend/Page/order');
		 }
	}
 
}