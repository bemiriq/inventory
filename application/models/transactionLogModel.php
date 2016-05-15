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

        $q = $this->db->query('SELECT transaction_id,ABS(`cost`) as cst,`transaction`.`date_posted`, ABS(`unit`) as unt, `transaction`.`product_id`, `detail`.`name` as sam, `product`.`productName` as pam, `transaction`.`type` FROM `transaction` INNER JOIN `detail` ON `detail`.`detail_id`=`transaction`.`detail_id` INNER JOIN `product` ON `product`.`product_id`=`transaction`.`product_id` WHERE deleteTransaction = 0 LIMIT '.$segment.', '.$per_page);

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
        $query = $this->db->query("SELECT`transactionLog_id` FROM `transaction` order by transaction_id desc limit 1");
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

    public function reporttable(){

        if ($data = $this->input->post('date_posted'))
        {
            $dateposted1=$_POST['date_posted'][0];
            $dateposted2=$_POST['date_posted'][1];
            // $SP=mysql_real_escape_string($categoryname);
            $query = $this->db->query("SELECT transaction_id,ABS(`cost`) as cst,`transaction`.`date_posted`, ABS(`unit`) as unt, `transaction`.`product_id`, `detail`.`name` as sam, `product`.`productName` as pam, `transaction`.`type` FROM `transaction` INNER JOIN `detail` ON `detail`.`detail_id`=`transaction`.`detail_id` INNER JOIN `product` ON `product`.`product_id`=`transaction`.`product_id` WHERE `transaction`.`date_posted` BETWEEN '$dateposted1' AND '$dateposted2'");

            if($query->num_rows()){
                foreach ($query->result() as $row)
                {
                    if($row->type === '1'){
                       $type = 'Seller';
                    }
                    else{
                        $type = 'Buyer';
                    }

                   echo '<tr><td>'. $row->sam .'</td>'.'<td>'.$type .'</td>'.'<td>' . $row->pam .'</td>'.'<td>'. $row->unt .'</td>'.'<td>'.  $row->cst .'</td>'.'<td>'. $row->date_posted.'</td></tr>';
                }

            }
            else{
                echo '<hr><p style="color:#3fa9f5;">'. "Lately there are no transactions on those days." .'</p><hr>';
            }
        }
    }



}


