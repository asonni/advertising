<?php
class Main_model extends CI_Model{
  public function getCountAds(){
    $this->db->from('posts');
    $this->db->where('ads_publishing',1,'status',1);
    $query = $this->db->get();
    return $query->num_rows();
  }
  public function getAllAds($pageSize,$currentPage){
    $currentPage -= 1;
    $start = $pageSize * $currentPage;
    $this->db->select("id,ads_name,ads_description,ads_date");
    $this->db->from('posts');
    $this->db->where('ads_publishing',1,'status',1);
    $this->db->order_by("ads_date","desc");
    $this->db->limit($pageSize,$start);
    $query = $this->db->get();
    return $query->result();
  }
  public function insertAd($data){
    $query = $this->db->insert('posts',$data);
    return $query;
  }
  public function getAdByID($id){
    $this->db->select("id,ads_name,ads_description,ads_date,ads_type_id,ads_publishing"); 
    $this->db->from('posts');   
    $this->db->where('id',$id,'status',1);
    $query = $this->db->get()->result();
    return $query;
  }
  public function getHiddenAdByID($id){
    $this->db->select("id,ads_name,ads_description,ads_date,ads_type_id,ads_publishing"); 
    $this->db->from('posts');   
    $this->db->where('id',$id,'ads_publishing',0,'status',1);
    $query = $this->db->get()->result();
    return $query;
  }
  public function getDeletedAdByID($id){
    $this->db->select("id,ads_name,ads_description,ads_date,ads_type_id,ads_publishing"); 
    $this->db->from('posts');   
    $this->db->where('id',$id,'status',0);
    $query = $this->db->get()->result();
    return $query;
  }
  public function searchInAllAdsByName($adsName){
    $this->db->select("id,ads_name,ads_description,ads_date");
    $this->db->from('posts');
    $this->db->where('ads_publishing',1);
    $this->db->where('status',1);
    $this->db->like('ads_name',$adsName);
    $this->db->order_by("ads_date","desc");
    $query = $this->db->get();
    return $query->result();
  }
  public function editAd($id,$data){
    $this->db->where('id',$id,'status',1);
    $query = $this->db->update('posts',$data);
    return $query;
  }
  public function deleteAd($id){
    $this->db->where('id',$id,'status',1);
    $this->db->set('status',0);
    $query = $this->db->update('posts');
    return $query;
  }
  public function hideAd($id){
    $this->db->where('id',$id);
    $this->db->where('ads_publishing',1);
    $this->db->where('status',1);
    $this->db->set('ads_publishing',0);
    $query = $this->db->update('posts');
    return $query;
  }
  public function showAd($id){
    $this->db->where('id',$id);
    $this->db->where('ads_publishing',0);
    $this->db->where('status',1);
    $this->db->set('ads_publishing',1);
    $query = $this->db->update('posts');
    return $query;
  }
  public function getCountDeletedAds(){
    $this->db->from('posts');
    $this->db->where('ads_publishing',1);
    $this->db->where('status',0);
    $query = $this->db->get();
    return $query->num_rows();
  }
  public function getAllDeletedAds($pageSize,$currentPage){
    $currentPage -= 1;
    $start = $pageSize * $currentPage;
    $this->db->select("id,ads_name,ads_description,ads_date");
    $this->db->from('posts');
    $this->db->where('ads_publishing',1);
    $this->db->where('status',0);
    $this->db->order_by("ads_date","desc");
    $this->db->limit($pageSize,$start);
    $query = $this->db->get();
    return $query->result();
  }
  public function getCountHiddenAds(){
    $this->db->from('posts');
    $this->db->where('ads_publishing',0);
    $this->db->where('status',1);
    $query = $this->db->get();
    return $query->num_rows();
  }
  public function getAllHiddenAds($pageSize,$currentPage){
    $currentPage -= 1;
    $start = $pageSize * $currentPage;
    $this->db->select("id,ads_name,ads_description,ads_date");
    $this->db->from('posts');
    $this->db->where('ads_publishing',0);
    $this->db->where('status',1);
    $this->db->order_by("ads_date","desc");
    $this->db->limit($pageSize,$start);
    $query = $this->db->get();
    return $query->result();
  }
}