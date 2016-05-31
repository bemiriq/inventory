<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class batchModel extends CI_Model
{
    var $table = "batch";

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

    function countAll()
    {
        return $this->db->count_all($this->table);
    }

    function add($data)
    {
        $this->db->insert($this->table, $data);
    }

    function update($data, $id)
    {
        $this->db->where("batch_id", $id);
        $this->db->update($this->table, $data);
    }

    function updateAll($data, $getBatch)
    {
//        SELECT sum(unit*cost) as total_amount from transaction where `batch_id` = 1
        $sql = "UPDATE batch SET `total_amount` = (SELECT sum(`unit`*`cost`) from transaction where `batch_id` = $getBatch) where `batch_id`=$getBatch";
//        $this->db->where("batch_id", $id);
        $this->db->query($sql, $data);

    }


    function delete($id)
    {
        $this->db->where("batch_id", $id);
        $this->db->delete($this->table);
    }

    function get_name($q)
    {
        $this->db->select('batchName')->from('batch');
        $q = $this->db->get();
        if ($q->num_rows() > 0) {
            foreach ($q->result_array() as $row) {
                $row_set[] = htmlentities(stripslashes($row['batchName'])); //build an array
            }
            echo json_encode($row_set); //format the array into json data
        }
    }

    function dashboard3()
    {
        $query = $this->db->query("SELECT`batch_id` FROM `navigation` order by batch_id desc limit 1");
        if ($query->num_rows()) {
            foreach ($query->result() as $row) {
                echo $row->batch_id;
            }

        }
    }

    function getById($id)
    {
        $this->db->where("batch_id", $id);
        $q = $this->db->get($this->table);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return false;
    }

    function insert_id()
    {
//        var_dump($this->db->last_query());
        $last_id = $this->db->insert_id();
        return $last_id;
    }

    function insert_id_new()
    {
//        var_dump($this->db->last_query());
        $last_id = $this->db->insert_id();
        return $last_id;
    }

    function insert_id_name()
    {
//        var_dump($this->db->last_query());
        $last_id = $this->db->insert_id();
        return $last_id;
    }

}


