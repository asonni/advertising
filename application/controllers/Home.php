<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {
  // construct
  public function __construct(){
    parent::__construct();
  }
  public function index(){
    $this->load->view('layout/template');
  }
  public function adsList(){
    $this->load->view('adsList');
  }
  public function newAd(){
    $this->load->view('newAd');
  }
  public function readMore(){
  	$this->load->view('readMore');
  }
  public function editAd(){
    $this->load->view('editAd');
  }
  public function deleteModel(){
    $this->load->view('deleteModel');
  }
  public function hideModel(){
    $this->load->view('hideModel');
  }
  public function showModel(){
    $this->load->view('showModel');
  }
  public function adsHiddenList(){
    $this->load->view('adsHiddenList');
  }
  public function adsDeletedList(){
    $this->load->view('adsDeletedList');
  }
}