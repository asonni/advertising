<?php
class Main_model extends CI_Model{
  public function getAllAds(){
    $this->db->select("id,ads_name,ads_description,ads_date");
    $this->db->from('posts');
    $query = $this->db->get();
    return $query->result();
  }
  public function insertAd($data){
    $query = $this->db->insert('posts',$data);
    return $query;
  }
  public function getAdByID($id){
    $this->db->select("id,ads_name,ads_description,ads_date"); 
    $this->db->from('posts');   
    $this->db->where('id', $id);
    $query = $this->db->get()->result();
    return $query;
  }
}