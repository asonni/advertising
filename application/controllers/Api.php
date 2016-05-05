<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Api extends REST_Controller{
  function __construct(){
    parent::__construct();
  }
  public function getCountAds_post(){
    $result = $this->Main_model->getCountAds();
    $this->response($result);
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
  public function getHiddenAdByID_post(){
    $id = $this->post('id');
    $result = $this->Main_model->getHiddenAdByID($id);
    $this->response($result);
  }
  public function getDeletedAdByID_post(){
    $id = $this->post('id');
    $result = $this->Main_model->getDeletedAdByID($id);
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
  public function deleteAd_delete(){
    $id = $this->uri->segment(3);
    $result = $this->Main_model->deleteAd($id);
    $this->response($result);
  }
  public function hideAd_post(){
    $id = $this->uri->segment(3);
    $result = $this->Main_model->hideAd($id);
    $this->response($result);
  }
  public function showAd_post(){
    $id = $this->uri->segment(3);
    $result = $this->Main_model->showAd($id);
    $this->response($result);
  }
  public function getCountDeletedAds_post(){
    $result = $this->Main_model->getCountDeletedAds();
    $this->response($result);
  }
  public function getAllDeletedAds_post(){
    $pageSize = $this->uri->segment(3);
    $currentPage = $this->uri->segment(4);
    $result = $this->Main_model->getAllDeletedAds($pageSize,$currentPage);
    $this->response($result);
  }
  public function getCountHiddenAds_post(){
    $result = $this->Main_model->getCountHiddenAds();
    $this->response($result);
  }
  public function getAllHiddenAds_post(){
    $pageSize = $this->uri->segment(3);
    $currentPage = $this->uri->segment(4);
    $result = $this->Main_model->getAllHiddenAds($pageSize,$currentPage);
    $this->response($result);
  }
}