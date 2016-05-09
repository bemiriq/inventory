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

  function get_table($limit = null)
  {
    if($limit != null)
    {
      $this->db->limit($limit['limit'],$limit['offset']);
    }
    // SELECT `productName`, `cost`,`date_posted` , sum(`stockIn`) from product group by `productName`
    $getData = $this->db->query("SELECT `productName`, `stockSell`, `supplierName`, `customerName`, `cost`, `totalStockBuy` from transaction order by `transaction_id` desc limit 15");
    // $getData = $this->db->get($this->table);
    // $q = $this->db->get($this->table);
    if($getData->num_rows() > 0)
    {
      return $getData->result();
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

  function dashboard1()
  {
    $query = $this->db->query("SELECT `transaction_id` FROM `transaction` ORDER BY `transaction_id` DESC LIMIT 1");
      if($query->num_rows()){
          foreach ($query->result() as $row)
         {
            echo $row->transaction_id;
         }
         
        }
  }

  function dashboard2()
  {
    $query = $this->db->query("SELECT MAX(`totalStockBuy`) AS highestTransaction FROM `transaction`");
      if($query->num_rows()){
          foreach ($query->result() as $row)
         {
            echo $row->highestTransaction;
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

  function get_name_supplier($q){
    $q = $this->db->query("SELECT distinct `supplierName` FROM `transaction`");
    // $this->db->select('supplierName')->from('transaction');
    // $q = $this->db->get();
    if($q->num_rows() > 0){
      foreach ($q->result_array() as $row){
        $row_set[] = htmlentities(stripslashes($row['supplierName'])); //build an array
      }
      echo json_encode($row_set); //format the array into json data
    }
  }

  function get_name_customer($q){
    $q = $this->db->query("SELECT distinct `customerName` FROM `transaction`");
    // $this->db->select('customerName')->from('transaction');
    // $q = $this->db->get();
    if($q->num_rows() > 0){
      foreach ($q->result_array() as $row){
        $row_set[] = htmlentities(stripslashes($row['customerName'])); //build an array
      }
      echo json_encode($row_set); //format the array into json data
    }
  }


}


