<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller {

	function __construct()
	 {
	   parent::__construct();
	   //echo "FOUND MODEL";
	   // $this->load->library('session');
	   $this->load->model('loginModel','',TRUE);
	   $this->load->model('productModel','product');
	   // $this->load->model('stockModel','post1');

	 }
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		//This method will have the credentials validation

		// the code below here is for the logout function 
		$this->load->library('session');
		// end of the logout function code
		$this->load->helper('form'); 
		// $this->load->library('session');
	   	$this->load->library('form_validation');
	   	// $this->post->pop_room_type($data, 'room_type');
	  	$this->form_validation->set_rules('username', 'username', 'trim|required|xss_clean');
	   	$this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean|callback_check_database');

		if($this->form_validation->run() == FALSE)
		{
		    //Field validation failed.  User redirected to login page
		    $this->load->view('login');
		    // echo 'incorrect password';
		}
		else
		   {

		   }
		
	}

	 function check_database($password)
	 {
	   //Field validation succeeded.  Validate against database
	    
	   $username = $this->input->post('username');
	   

	   //query the database
	   $result = $this->loginModel->login($username, $password);

	   if($result)
	   {
	     // echo 'Correct Password';
	     $this->dashboard();
	     
	   }
	   else
	   {
	       echo '<p style="width: 300px; margin-right: auto; margin-left: auto; margin-top: 1%; color: #B22222"> Incorrect Username and Password </p>';
	       $this->load->view('login');
	   }
	 }

	public function header(){
	 	$this->load->view('header');
	}

	public function footer(){
	 	$this->load->view('footer');
	}

	public function dashboard(){
	 	$this->header();
	 	$this->load->view('admin/dashboard');
	 	$this->footer();
	}

	public function addProduct()
	 {
	 	if(@$_POST['add_product'])
		{
			$data = $_POST['post'];
			$data['date_posted'] = date('Y-m-d H:i:s');
			$this->product->add($data);
			$this->session->set_flashdata('message',"Product added successfully");
			$this->header();
			$this->load->view("admin/addProduct");
			$this->footer();
		}
		else{
			$this->header();
			$this->load->view("admin/addProduct");
			$this->footer();
		}
	 }

	public function viewProduct(){
	 	$this->header();
		$this->footer();
		$data['posts']=$this->product->getAll();
		$this->load->view('admin/viewProduct',$data);
	}

}
