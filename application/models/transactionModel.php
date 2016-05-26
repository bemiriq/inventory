<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

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
        if ($limit != null) {
            $this->db->limit($limit['limit'], $limit['offset']);
        }
        
        $q = $this->db->query("SELECT `transaction`.`transaction_id`,ABS(`cost`) as cst,`transaction`.`date_posted`, ABS(`unit`) as unt, `detail`.`name` as sam, `product`.`product_name` as pam, `transaction`.`type` FROM `transaction` INNER JOIN `detail` ON `detail`.`detail_id`=`transaction`.`detail_id` INNER JOIN `product` ON `product`.`product_id`=`transaction`.`product_id` WHERE `deleteTransaction` = '0'");
        
//        $q = $this->db->get($this->table);
        
        if ($q->num_rows() > 0) {
            return $q->result();
        }
        return array();
    }

    function get_front_table($limit = null)
    {
        if ($limit != null) {
            $this->db->limit($limit['limit'], $limit['offset']);
        }
        // SELECT `product_name`, `cost`,`date_posted` , sum(`stockIn`) from product group by `product_name`
        $getData = $this->db->query("SELECT `transaction_id`,`deleteTransaction`, ABS(`cost`) as cst,`transaction`.`date_posted`, ABS(`unit`) as unt, `detail`.`name` as sam, `product`.`product_name` as pam, `transaction`.`type` FROM `transaction` INNER JOIN `detail` ON `detail`.`type`=`transaction`.`type` INNER JOIN `product` ON `product`.`product_id`=`transaction`.`product_id` ORDER by transaction_id DESC LIMIT 10");

        if ($getData->num_rows() > 0) {
            return $getData->result();
        }
        return array();
    }

    function get_table($limit = null)
    {
        if ($limit != null) {
            $this->db->limit($limit['limit'], $limit['offset']);
        }
        // SELECT `product_name`, `cost`,`date_posted` , sum(`stockIn`) from product group by `product_name`
        $getData = $this->db->query("SELECT `transaction`.`transaction_id`,`transaction`.`cost`,`transaction`.`date_posted`, `transaction`.`unit`, `detail`.`name` as sam, `product`.`product_name` as pam, `transaction`.`type` FROM `transaction` INNER JOIN `detail` ON `detail`.`type`=`transaction`.`type` INNER JOIN `product` ON `product`.`product_id`=`transaction`.`product_id` WHERE `deleteTransaction` = '0'");
        
        $getData = $this->db->get($this->table);

        if ($getData->num_rows() > 0) {
            return $getData->result();
        }
        return array();
    }

    function get_report($limit = null)
    {
        if ($limit != null) {
            $this->db->limit($limit['limit'], $limit['offset']);
        }
        
        $q = $this->db->query("SELECT transaction_id,ABS(`cost`) as cst,`transaction`.`date_posted`, ABS(`unit`) as unt, `transaction`.`product_id`, `detail`.`name` as sam, `product`.`product_name` as pam, `transaction`.`type` FROM `transaction` INNER JOIN `detail` ON `detail`.`detail_id`=`transaction`.`detail_id` INNER JOIN `product` ON `product`.`product_id`=`transaction`.`product_id` WHERE deleteTransaction = '0'");
        
//        $q = $this->db->get($this->table);
        
        if ($q->num_rows() > 0) {
            return $q->result();
        }
        return array();
    }

    function countAll()
    {
        
        return $this->db->count_all($this->table);
    }

    function get_fichas()
    {
        $this->db->select('transactionName')->from('transaction');
        $query = $this->db->get();
        return $query->result_array();
    }

//    function add($data)
//    {
//        $this->db->insert($this->table,$data);
//    }

    function addNew($data)
    {
        $length = array_unique(array_map('count', $data));
        if (count($length) == 1) {
            $length = current($length);
            $keys = array_keys($data);
            $res = array();
            for($i = 0; $i < $length; $i++)
                foreach($keys as $key)
                    $res[$i][$key] =  $data[$key][$i];
            $this->db->insert_batch('try', $res);
        }
        else {
            // incorrect data
            return false;
        }
        return true;

    }

    function update($data, $id)
    {
        $this->db->where("transaction_id", $id);
        $this->db->update($this->table, $data);
    }


    function deleted($data, $id)
    {
        $this->db->where("transaction_id", $id);
        $this->db->update($this->table, $data);
    }

//    function dashboard1()
//    {
//        $query = $this->db->query("SELECT `transaction_id` FROM `transaction` ORDER BY `transaction_id` DESC LIMIT 1");
//        if ($query->num_rows()) {
//            foreach ($query->result() as $row) {
//                echo $row->transaction_id;
//            }
//
//        }
//    }
//
//    function dashboard2()
//    {
//        $query = $this->db->query("SELECT MAX(`trasanction_id`) AS highestTransaction FROM `transaction`");
//        if ($query->num_rows()) {
//            foreach ($query->result() as $row) {
//                echo $row->highestTransaction;
//            }
//
//        }
//    }

    function getById($id)
    {
        $this->db->where("transaction_id", $id);
        $q = $this->db->get($this->table);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return false;
    }

    function get_name_supplier($q)
    {
//        $q = $this->db->query("SELECT distinct `name` FROM `detail` where `type` = 1");
        $q = $this->db->query("SELECT distinct `name` FROM `batch` where name LIKE '%$q%'");
//        $q = $this->db->query("SELECT distinct `name` FROM `batch` and name LIKE '%$q%'");
        if ($q->num_rows() > 0) {
            foreach ($q->result_array() as $row) {
                $row_set[] = htmlentities(stripslashes($row['name'])); //build an array
            }
            echo json_encode($row_set); //format the array into json data
        }
    }

    function get_name_customer($q)
    {
        $q = $this->db->query("SELECT distinct `name` FROM `detail` where `type` = 2");
        // $this->db->select('customerName')->from('transaction');
        // $q = $this->db->get();
        if ($q->num_rows() > 0) {
            foreach ($q->result_array() as $row) {
                $row_set[] = htmlentities(stripslashes($row['name'])); //build an array
            }
            echo json_encode($row_set); //format the array into json data
        }
    }


    function get_price($q)
    {
        $q = $this->db->query("SELECT `product_id`,SUM(`unit`) as total FROM `transaction` where `product_id` = 22");
        // $this->db->select('customerName')->from('transaction');
        // $q = $this->db->get();
        if ($q->num_rows() > 0) {
            foreach ($q->result_array() as $row) {
                $row_set[] = htmlentities(stripslashes($row['total'])); //build an array
            }
            echo json_encode($row_set); //format the array into json data
        }
    }
}


