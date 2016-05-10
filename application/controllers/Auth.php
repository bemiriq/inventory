<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('loginModel', '', TRUE);
        // the code below here is for the logout function
        $this->load->library('session');

        // end of the logout function code
        $this->load->helper('form');
        // $this->load->library('session');
        $this->load->library('form_validation');
    }

    public function login()
    {
        $loggen_in_user = $this->session->userdata('username');
        if (!empty($loggen_in_user)) {
            redirect('inventory');
        }

        //This method will have the credentials validation

        // $this->post->pop_room_type($data, 'room_type');
        $this->form_validation->set_rules('username', 'username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            //Field validation failed.  User redirected to login page
            $this->load->view('login');
            // echo 'incorrect password';
        } else {
            $result = $this->loginModel->login($this->input->post('username'), $this->input->post('password'));

            if ($result) {
                $this->session->set_userdata($result);
                redirect('inventory/dashboard');
            } else {
                echo '<p style="width: 300px; margin-right: auto; margin-left: auto; margin-top: 1%; color: #B22222"> Incorrect Username and Password </p>';
                $this->load->view('login');
            }
        }

    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }
}