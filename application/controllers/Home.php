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
  public function advertinigList(){
    $this->load->view('adsList');
  }
  public function add_ad(){
    $this->load->view('add_ad');
  }
  public function show_description(){
  	$this->load->view('show_desc');
  }
}