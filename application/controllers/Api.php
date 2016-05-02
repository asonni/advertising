<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Api extends REST_Controller
{
  // public $id = 100;
  function __construct(){
    // Construct our parent class
    parent::__construct();
  }
  public function getAllAds_post(){
    $pageSize = $this->uri->segment(3);
    $currentPage = $this->uri->segment(4);
    $result = $this->Main_model->getAllAds($pageSize,$currentPage);
    $this->response($result);
  }
  public function addNewAd_post(){
    $data = $this->post('main_data');
    $result = $this->Main_model->insertAd($data);
    $this->response($result);
  }
  public function getAdByID_post(){
    $id = $this->post('id');
    $result = $this->Main_model->getAdByID($id);
    $this->response($result);
  }
  public function searchAdsByName_post(){
    $ads_name = $this->post('ads_name');
    $result = $this->Main_model->searchInAllAdsByName($ads_name);
    $this->response($result);
  }
  public function editAd_post(){
    $id = $this->uri->segment(3);
    $data = $this->post('editAdForm');
    $result = $this->Main_model->editAd($id,$data);
    $this->response($result);
  }
}