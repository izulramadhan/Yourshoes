<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_productTerhapus extends CI_Model {

  function getData($postData=null){

      $response = array();

      ## Read value
      $draw = $postData['draw'];
      $start = $postData['start'];
      $rowperpage = $postData['length']; // Rows display per page
      $columnIndex = $postData['order'][0]['column']; // Column index
      $columnName = $postData['columns'][$columnIndex]['data']; // Column name
      $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
      $searchValue = $postData['search']['value']; // Search value

      ## Search 
      $searchQuery = "";
      if($searchValue != ''){
          $searchQuery = " (nama_produk like '%".$searchValue."%' or 
                nama_kategori like '%".$searchValue."%' or 
                deskripsi like '%".$searchValue."%' ) ";
      }


      ## Total number of records without filtering
      $this->db->select('count(*) as allcount');
      $records = $this->db->from('hapus_produk')
      ->join('tbl_kategori', 'hapus_produk.kategori=tbl_kategori.id')
      ->get()
      ->result();
      $totalRecords = $records[0]->allcount;

      ## Total number of record with filtering
      $this->db->select('count(*) as allcount');
      if($searchQuery != '')
      $this->db->where($searchQuery);
      $records = $this->db->from('hapus_produk')
      ->join('tbl_kategori', 'hapus_produk.kategori=tbl_kategori.id')
      ->get()
      ->result();
      $totalRecordwithFilter = $records[0]->allcount;

      
      ## Fetch records
      $this->db->select('*');
      if($searchQuery != '')
      $this->db->where($searchQuery);
      $this->db->order_by($columnName, $columnSortOrder);
      $this->db->limit($rowperpage, $start);
      $records = $this->db->from('hapus_produk')
      ->join('tbl_kategori', 'hapus_produk.kategori=tbl_kategori.id')
      ->get()
      ->result();

      $data = array();
      foreach($records as $record ){
         
          $data[] = array( 
              "id_produk"=>++$start,
              "nama_produk"=>$record->nama_produk,
              "harga"=>$record->harga,
              "deskripsi"=>$record->deskripsi,
              "nama_kategori"=>$record->nama_kategori,
              "tgl_hapus"=>$record->tgl_hapus,
              "user"=>$record->user,
              "no"=>$record->id_produk
          ); 
      }

      ## Response
      $response = array(
          "draw" => intval($draw),
          "iTotalRecords" => $totalRecords,
          "iTotalDisplayRecords" => $totalRecordwithFilter,
          "aaData" => $data
      );

      return $response; 
  }

}