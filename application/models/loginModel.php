<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class loginModel extends CI_Model
{
    function login($username, $password)
    {

        $this->db->select('users_id, username, password, name');
        $this->db->from('users');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return (array)$query->row();
            //echo 'Now it consists the home page function';
        } else false;
        {
            return false;
        }
    }


}

