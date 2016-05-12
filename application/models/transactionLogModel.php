<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class transactionLogModel extends CI_Model
{
    var $table = "transactionLog";

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
        $q = $this->db->get($this->table);
        if ($q->num_rows() > 0) {
            return $q->result();
        }
        return array();
    }

//     function get_report($limit = null)
//     {
//         if ($limit != null) {
//             $this->db->limit($limit['limit'], $limit['offset']);
//         }
        
//         $q = $this->db->query("SELECT `transaction`.`transaction_id`, ABS(`cost`) as cst,`transaction`.`date_posted`, ABS(`unit`) as unt, `detail`.`name` as sam, `product`.`productName` as pam, `transaction`.`type` FROM `transaction` INNER JOIN `detail` ON `detail`.`type`=`transaction`.`type` INNER JOIN `product` ON `product`.`product_id`=`transaction`.`product_id`");
        
// //        $q = $this->db->get($this->table);
        
//         if ($q->num_rows() > 0) {
//             foreach ($q->result() as $row)
//             {
//                 $data[] = $row;
//             }
//         }
//         return $data;
//     }

    public function get_report($segment,$per_page)
    {
        
        // $data = array();

        $q = $this->db->query('SELECT `transaction`.`transaction_id`, ABS(`cost`) as cst,`transaction`.`date_posted`, ABS(`unit`) as unt, `detail`.`name` as sam, `product`.`productName` as pam, `transaction`.`type` FROM `transaction` INNER JOIN `detail` ON `detail`.`type`=`transaction`.`type` INNER JOIN `product` ON `product`.`product_id`=`transaction`.`product_id` LIMIT '.$per_page.', '.$segment);

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


    function add($data)
    {
        $this->db->insert($this->table, $data);
    }

    function update($data, $id)
    {
        $this->db->where("transactionLog_id", $id);
        $this->db->update($this->table, $data);
    }


    function delete($id)
    {
        $this->db->where("transactionLog_id", $id);
        $this->db->delete($this->table);
    }

    function dashboard3()
    {
        $query = $this->db->query("SELECT`transactionLog_id` FROM `navigation` order by transactionLog_id desc limit 1");
        if ($query->num_rows()) {
            foreach ($query->result() as $row) {
                echo $row->transactionLog_id;
            }

        }
    }

    function getById($id)
    {
        $this->db->where("transactionLog_id", $id);
        $q = $this->db->get($this->table);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return false;
    }

}


