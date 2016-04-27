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
    $result = $this->Main_model->getAllAds();
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
}