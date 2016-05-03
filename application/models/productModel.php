<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class productModel extends CI_Model 
{
  var $table = "product";
  // var $table = "postmenu";

  function __construct()
  {
    parent::__construct();
    // $this->table = 'postmenu';
  }

  function getAll($limit = null)
  {
    if($limit != null)
    {
      $this->db->limit($limit['limit'],$limit['offset']);
    }
    $q = $this->db->get($this->table);
    if($q->num_rows() > 0)
    {
      return $q->result();
    }
    return array();
  }

  function countAll()
  {
    return $this->db->count_all($this->table);
  }

function get_fichas() {
    $this->db->select('productName')->from('product');
    $query=$this->db->get();
    return $query->result_array();
}


  function add($data)
  {
    $this->db->insert($this->table,$data);
  }

  function update($data,$id)
  {
    $this->db->where("category_id",$id);
    $this->db->update($this->table,$data);
  }


  function delete($id)
  {
    $this->db->where("category_id",$id);
    $this->db->delete($this->table);
  }

  function dashboard3()
  {
    $query = $this->db->query("SELECT`category_id` FROM `navigation` order by category_id desc limit 1");
      if($query->num_rows()){
          foreach ($query->result() as $row)
         {
            echo $row->category_id;
         }
         
        }
  }

  function getById($id)
  {
    $this->db->where("category_id",$id);
    $q = $this->db->get($this->table);
    if($q->num_rows() > 0)
    {
      return $q->row();
    }
    return false;
  }

  public function cmsmodel(){

      $query = $this->db->query("SELECT category_name FROM navigation");

      if($query->num_rows()){
          foreach ($query->result() as $row)
         {
            echo $row->category_name .'</br>';
         }
         
        }
      }




}


