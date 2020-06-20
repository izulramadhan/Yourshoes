<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datatable extends CI_Controller {
  public function __construct(){
    parent::__construct();
    $this->load->helper('url');
    // Load model
    $this->load->model('M_product');
    $this->load->model('M_order');
    $this->load->model('M_customer');
    $this->load->model('M_category');
    $this->load->model('M_service');
  }
  public function prodList(){
    // POST data
    $postData = $this->input->post();
    // Get data
    $data = $this->M_product->getData($postData);
    echo json_encode($data);
  }
  public function order(){
    // POST data
    $postData = $this->input->post();
    // Get data
    $data = $this->M_order->getData($postData);
    echo json_encode($data);
  }
  public function customer(){
    // POST data
    $postData = $this->input->post();
    // Get data
    $data = $this->M_customer->getData($postData);
    echo json_encode($data);
  }
  public function category(){
    // POST data
    $postData = $this->input->post();
    // Get data
    $data = $this->M_category->getData($postData);
    echo json_encode($data);
  }
  public function service(){
    // POST data
    $postData = $this->input->post();
    // Get data
    $data = $this->M_service->getData($postData);
    echo json_encode($data);
  }

}