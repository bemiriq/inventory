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
        // SELECT `product_name`, `cost`,`date_posted` , sum(`stockIn`) from product group by `product_name`
//        $getData = $this->db->query("SELECT `product_id`,`product_name`, `cost`,`date_posted` , sum(`stockIn`) as total from product group by `product_name`");
//        $getData = $this->db->query("SELECT `transaction`.`cost`,`transaction`.`date_posted`, `transaction`.`unit`, `detail`.`name` as sam, `product`.`product_name` as pam, `transaction`.`type` FROM `transaction` INNER JOIN `detail` ON `detail`.`type`=`transaction`.`type` INNER JOIN `product` ON `product`.`product_id`=`transaction`.`product_id`");
        $getData = $this->db->query("SELECT `product_id`,`product_name`,`date_posted` FROM `product` WHERE `deleteProduct` = '0'");
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
        $this->db->select('product_name')->from('product');
        $query = $this->db->get();
        return $query->result_array();
    }


    function add($data)
    {
        $this->db->insert($this->table, $data);
    }

    function getProductName()
    {
        $query = $this->db->query("SELECT `product_id` FROM `transaction` order by product_id desc limit 1");
        if ($query->num_rows()) {
            foreach ($query->result() as $row) {
                return $row->product_id;
            }

        }
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

    function dashboard1()
    {
        $query = $this->db->query("SELECT `transaction_id` FROM transaction ORDER BY `transaction_id` DESC LIMIT 1");
        if ($query->num_rows()) {
            foreach ($query->result() as $row) {
                echo $row->transaction_id;
            }

        }
    }

    function dashboard2()
    {
        $query = $this->db->query("SELECT MAX(`unit`) as total FROM transaction");
        if ($query->num_rows()) {
            foreach ($query->result() as $row) {
                echo $row->total;
            }

        }
    }

    function dashboard3()
    {
        $query = $this->db->query("SELECT `product_id` FROM `product` ORDER BY `product_id` DESC LIMIT 1");
        if ($query->num_rows()) {
            foreach ($query->result() as $row) {
                echo $row->product_id;
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

    function getByName($name)
    {
        $this->db->where("product_name", $name);
        $q = $this->db->get($this->table);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return false;
    }

    // select * from product order by `product_id` desc limit 15
    function get_name_product($q)
    {
        $q = $this->db->query("SELECT distinct `product_name` FROM `product` where `deleteProduct` = '0' and product_name LIKE '%$q%'");
//        $q = $this->db->query("SELECT DISTINCT `product_name` as 'fetch' from `product` AND 'fetch' LIKE '%$q%' ");
        // $this->db->select('product_name')->from('transaction');
        // $q = $this->db->get();
        if ($q->num_rows() > 0) {
            foreach ($q->result_array() as $row) {
                $row_set[] = htmlentities(stripslashes($row['product_name'])); //build an array
            }
            echo json_encode($row_set); //format the array into json data
        }
    }

    public function getId($value)
    {
        $this->db->select('product_id');
        $this->db->from('product');
        $this->db->where('product_name', $value);
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            $row = (array)$query->row();
            return $row['product_id'];
            //echo 'Now it consists the home page function';
        }
        else
        {
            $data=array('product_name' => $value);
            $data['users_id'] = $this->user->users_id;
            $data['date_posted'] = date('Y-m-d H:i:s');
            // $data['users_id'] = $this->user->users_id; // user ko id

            $this->add($data);
            return $this->getId($value);

        }
    }

}


