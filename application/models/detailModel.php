<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class detailModel extends CI_Model
{
    var $table = "detail";

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

    function add($name)
    {
        $this->db->insert($this->table, $name);
    }

    function update($data, $id)
    {
        $this->db->where("detail_id", $id);
        $this->db->update($this->table, $data);
    }


    function delete($id)
    {
        $this->db->where("detail_id", $id);
        $this->db->delete($this->table);
    }

    function get_name($q)
    {
        $this->db->select('name')->from('detail');
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
        $query = $this->db->query("SELECT`detail_id` FROM `detail` order by detail_id desc limit 1");
        if ($query->num_rows()) {
            foreach ($query->result() as $row) {
                echo $row->detail_id;
            }

        }
    }

    function getById($id)
    {
        $this->db->where("detail_id", $id);
        $q = $this->db->get($this->table);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return false;
    }

    public function getType($type)
    {
        $this->db->select('type');
        $this->db->from('detail');
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
        $this->db->from('detail');
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

    public function getDetail($detail)
    {
        $this->db->select('detail_id');
        $this->db->from('detail');
        $this->db->where('name', $detail);
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            $row = (array)$query->row();
//            return $row['type'];
            return $row['detail_id'];
            //echo 'Now it consists the home page function';
        }
        else
        {
            $data=array('name' => $detail);
            $data['date_posted'] = date('Y-m-d H:i:s');
            $data['users_id'] = $this->user->users_id; // user ko id

            $this->add($data);
            return $this->getType($detail);

        }
    }

}


