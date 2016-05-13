<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class productModel extends CI_Model
{
    var $table = "product";

    // var $table = "postmenu";

    function __construct()
    {
        parent::__construct();
        $this->user = (object)$this->session->all_userdata();
        if (empty($this->user->username)) {
            redirect('auth/login');
        }
        // $this->table = 'postmenu';
    }

    function getAll($limit = null)
    {
        if ($limit != null) {
            $this->db->limit($limit['limit'], $limit['offset']);
        }
        // SELECT `productName`, `cost`,`date_posted` , sum(`stockIn`) from product group by `productName`
//        $getData = $this->db->query("SELECT `product_id`,`productName`, `cost`,`date_posted` , sum(`stockIn`) as total from product group by `productName`");
//        $getData = $this->db->query("SELECT `transaction`.`cost`,`transaction`.`date_posted`, `transaction`.`unit`, `detail`.`name` as sam, `product`.`productName` as pam, `transaction`.`type` FROM `transaction` INNER JOIN `detail` ON `detail`.`type`=`transaction`.`type` INNER JOIN `product` ON `product`.`product_id`=`transaction`.`product_id`");
       $getData = $this->db->query("SELECT `product_id`,`productName`,`date_posted` FROM `product` WHERE `deleteProduct` = '0'");
       // $getData = $this->db->get($this->table);
        // $getData = $this->db->get($this->table);
        // $q = $this->db->get($this->table);
        if ($getData->num_rows() > 0) {
            return $getData->result();
        }
        return array();
    }

    function countAll()
    {
        return $this->db->count_all($this->table);
    }

    function get_fichas()
    {
        $this->db->select('productName')->from('product');
        $query = $this->db->get();
        return $query->result_array();
    }


    function add($data)
    {
        $this->db->insert($this->table, $data);
    }

    function update($data, $id)
    {
        $this->db->where("product_id", $id);
        $this->db->update($this->table, $data);
    }


    function deleted($data, $id)
    {
        $this->db->where("product_id", $id);
        $this->db->update($this->table, $data);
    }

    // function delete($id)
    // {
    //     $this->db->where("product_id", $id);
    //     $this->db->delete($this->table);
    // }

    function dashboard3()
    {
        $query = $this->db->query("SELECT sum(`stockIn`) as total from product");
        if ($query->num_rows()) {
            foreach ($query->result() as $row) {
                echo $row->total;
            }

        }
    }

    function dashboard4()
    {
        $query = $this->db->query("SELECT `users_id` FROM `users` ORDER BY `users_id` DESC LIMIT 1");
        if ($query->num_rows()) {
            foreach ($query->result() as $row) {
                echo $row->users_id;
            }

        }
    }

    function getById($id)
    {
        $this->db->where("product_id", $id);
        $q = $this->db->get($this->table);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return false;
    }

    // select * from product order by `product_id` desc limit 15
    function get_name_product($q)
    {
        $q = $this->db->query("SELECT distinct `productName` FROM `product` where `deleteProduct` = '0' ");
        // $this->db->select('productName')->from('transaction');
        // $q = $this->db->get();
        if ($q->num_rows() > 0) {
            foreach ($q->result_array() as $row) {
                $row_set[] = htmlentities(stripslashes($row['productName'])); //build an array
            }
            echo json_encode($row_set); //format the array into json data
        }
    }

    public function getId($value)
    {
        $this->db->select('product_id');
        $this->db->from('product');
        $this->db->where('productName', $value);
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            $row = (array)$query->row();
            return $row['product_id'];
            //echo 'Now it consists the home page function';
        }
        else
        {
            $data=array('productName' => $value);
            $data['users_id'] = $this->user->users_id;
            $data['date_posted'] = date('Y-m-d H:i:s');
            // $data['users_id'] = $this->user->users_id; // user ko id

            $this->add($data);
            return $this->getId($value);

        }
    }

}


