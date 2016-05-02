<?php
class Main_model extends CI_Model{
  public function getAllAds($pageSize,$currentPage){
    $currentPage -= 1;
    $start = $pageSize * $currentPage;
    $this->db->select("id,ads_name,ads_description,ads_date");
    $this->db->from('posts');
    $this->db->order_by("ads_date", "desc");
    $this->db->limit($pageSize,$start);
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
  public function searchInAllAdsByName($adsName){
    $this->db->select("id,ads_name,ads_description,ads_date");
    $this->db->from('posts');
    $this->db->like('ads_name', $adsName);
    $this->db->order_by("ads_date", "desc");
    $query = $this->db->get();
    return $query->result();
  }
  public function editAd($id,$data){
    $this->db->where('id', $id);
    $query = $this->db->update('posts', $data);
    return $query;
  }
}