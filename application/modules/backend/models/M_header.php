<?php 
 
class M_header extends CI_Model{

    function get_kategori_all(){
        $query = $this->db->get('tbl_kategori');
        return $query->result_array();
    }
    public function jumlah_order(){   
    	$query = $this->db->get('tbl_order');
    	if($query->num_rows()>0){
      	return $query->num_rows();
    	}
    	else{
      	return 0;
    	}
	}
	public function jumlah_product(){   
    	$query = $this->db->get('tbl_produk');
    	if($query->num_rows()>0){
      	return $query->num_rows();
    	}
    	else{
      	return 0;
    	}
	}	
	public function jumlah_hubungikami(){
	 	$query = $this->db->get('tbl_hubungikami');
    	if($query->num_rows()>0){
      	return $query->num_rows();
    	}
    	else{
      	return 0;
    	}
    }
}