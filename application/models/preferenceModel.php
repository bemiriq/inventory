<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class preferenceModel extends CI_Model
{
    var $table = "preference";

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
        $q = $this->db->get($this->table);
        if ($q->num_rows() > 0) {
            return $q->result();
        }
        return array();
    }

    function countAll()
    {
        return $this->db->count_all($this->table);
    }

    function add($data)
    {
        unset($data['type']);
        unset($data['batch_id']);
        unset($data['unit']);
        unset($data['cost']);
        $length = array_unique(array_map('count', $data));
        if (count($length) > 0) {
            $length = current($length);
            $keys = array_keys($data);

            $res = array();
            for($i = 0; $i < $length; $i++)
                foreach($keys as $key)
                    $res[$i][$key] =  $data[$key][$i];
            $this->db->insert_batch($this->table, $res);
//            $this->db->insert_batch('transaction', $res);
        }
        else {
            // incorrect data
            return false;
        }
        return true;
//        $this->db->insert($this->table, $data);
    }

    function update($data, $id)
    {
        $query = $this->db->query("SELECT COUNT(discount) as Count, (COUNT(discount) / (SELECT COUNT(total_amount) FROM batch)) AS Percentage FROM preference GROUP BY discount");
        if ($query->num_rows()) {
            foreach ($query->result() as $row) {
                echo $row->preference_id;
            }

        }
//        $this->db->where("preference_id", $id);
//        $this->db->update($this->table, $data);
    }


    function delete($id)
    {
        $this->db->where("preference_id", $id);
        $this->db->delete($this->table);
    }

    function get_name($q)
    {
        $this->db->select('name')->from('preference');
        $q = $this->db->get();
        if ($q->num_rows() > 0) {
            foreach ($q->result_array() as $row) {
                $row_set[] = htmlentities(stripslashes($row['name'])); //build an array
            }
            echo json_encode($row_set); //format the array into json data
        }
    }

    function dashboard3()
    {
        $query = $this->db->query("SELECT`preference_id` FROM `preference` order by preference_id desc limit 1");
        if ($query->num_rows()) {
            foreach ($query->result() as $row) {
                echo $row->preference_id;
            }

        }
    }

    function getById($id)
    {
        $this->db->where("preference_id", $id);
        $q = $this->db->get($this->table);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return false;
    }

    public function getType($type)
    {
        $this->db->select('type');
        $this->db->from('preference');
        $this->db->where('name', $type);
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            $row = (array)$query->row();
//            return $row['type'];
            return $row['type'];
            //echo 'Now it consists the home page function';
        }
        else
        {
            $data=array('name' => $type);
            $data['type'] = '2';
            $data['date_posted'] = date('Y-m-d H:i:s');
            $data['users_id'] = $this->user->users_id; // user ko id

            $this->add($data);
            return $this->getType($type);

        }
    }

    public function getSellType($type)
    {
        $this->db->select('type');
        $this->db->from('preference');
        $this->db->where('name', $type);
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            $row = (array)$query->row();
//            return $row['type'];
            return $row['type'];
            //echo 'Now it consists the home page function';
        }
        else
        {
            $data=array('name' => $type);
            $data['type'] = '1';
            $data['date_posted'] = date('Y-m-d H:i:s');
            $data['users_id'] = $this->user->users_id; // user ko id

            $this->add($data);
            return $this->getSellType($type);

        }
    }

    public function getpreference($preference)
    {
        $this->db->select('preference_id');
        $this->db->from('preference');
        $this->db->where('name', $preference);
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            $row = (array)$query->row();
//            return $row['type'];
            return $row['preference_id'];
            //echo 'Now it consists the home page function';
        }
        else
        {
            $data=array('name' => $preference);
            $data['date_posted'] = date('Y-m-d H:i:s');
            $data['users_id'] = $this->user->users_id; // user ko id

            $this->add($data);
            return $this->getType($preference);

        }
    }

}


