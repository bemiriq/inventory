<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class transactionModel extends CI_Model 
{
  var $table = "transaction";
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
    $this->db->select('transactionName')->from('transaction');
    $query=$this->db->get();
    return $query->result_array();
}


  function add($data)
  {
    $this->db->insert($this->table,$data);
  }

  function update($data,$id)
  {
    $this->db->where("transaction_id",$id);
    $this->db->update($this->table,$data);
  }


  function delete($id)
  {
    $this->db->where("transaction_id",$id);
    $this->db->delete($this->table);
  }

  function dashboard3()
  {
    $query = $this->db->query("SELECT`transaction_id` FROM `navigation` order by transaction_id desc limit 1");
      if($query->num_rows()){
          foreach ($query->result() as $row)
         {
            echo $row->transaction_id;
         }
         
        }
  }

  function getById($id)
  {
    $this->db->where("transaction_id",$id);
    $q = $this->db->get($this->table);
    if($q->num_rows() > 0)
    {
      return $q->row();
    }
    return false;
  }

  public function cmsmodel(){

      $query = $this->db->query("SELECT transaction_name FROM navigation");

      if($query->num_rows()){
          foreach ($query->result() as $row)
         {
            echo $row->transaction_name .'</br>';
         }
         
        }
      }




}


