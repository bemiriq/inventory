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
	   $this->load->model('supplierModel','supplier');
	    $this->load->model('customerModel','customer');
	   $this->load->model('transactionModel','transaction');
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
	 	if($data = $this->input->post('add_product'))
		{
			$data['date_posted'] = date('Y-m-d H:i:s');
			if(isset($data['sum'])) {
				$data['cost']=$data['cost']/$data['stockIn'];
				unset($data['sum']);
			}
			$this->product->add($data);
			$this->session->set_flashdata('message',"Product added successfully");
			redirect('inventory/addProduct');
		}
		else{
			$this->header();
			$this->load->view("admin/addProduct");
			$this->footer();
		}
	 }

	public function addTransaction()
	 {
	 	if($data = $this->input->post('add_transaction'))
		{
			$data['date_posted'] = date('Y-m-d H:i:s');
			$this->transaction->add($data);
			$this->session->set_flashdata('message',"Product added successfully");
			redirect('inventory/addTransaction');
		}
		else{
			$this->header();
			$this->load->view("admin/addTransaction");
			$this->footer();
		}
	 }

	public function viewProduct(){
	 	$this->header();
		$this->footer();
		$data['posts']=$this->product->getAll();
		$this->load->view('admin/viewProduct',$data);
	}

	public function viewTransaction(){
	 	$this->header();
		$this->footer();
		$data['posts']=$this->transaction->getAll();
		$this->load->view('admin/viewTransaction',$data);
	}

	function editProduct()
	{
		$id = $this->uri->segment(3);
		$post = $this->product->getById($id);
		if(!$post)
		{
			// echo '1';
			redirect("stock/viewProduct");
		}

		if($data = $this->input->post('update_product'))
		{
			// $this->header();
			// $this->footer();
			$data = $_POST['post'];
			$this->product->update($data,$id);
			$this->session->set_flashdata('message',"Product updated successfully");
			redirect("inventory/viewProduct");
			// echo '2';
		}

		// echo '3';
		$this->header();
		$this->footer();
		$data['post'] = $post;
		$this->load->view("admin/editProduct",$data);
	}

	function editTransaction()
	{
		$id = $this->uri->segment(3);
		$post = $this->transaction->getById($id);
		if(!$post)
		{
			// echo '1';
			redirect("inventory/viewTransaction");
		}

		if($data = $this->input->post('update_transaction'))
		{
			// $this->load->view('header');
			// $this->load->view('footer');
			$data = $_POST['post'];
			$this->transaction->update($data,$id);
			$this->session->set_flashdata('message',"Transaction updated successfully");
			redirect("inventory/editTransaction");
			// echo '2';
		}

		// echo '3';
		$this->header();
		$this->footer();
		$data['post'] = $post;
		$this->load->view("admin/editTransaction",$data);
	}

	function deleteProduct()
	{
		$this->header();
		$this->footer();
		$id = $this->uri->segment(3);
		$this->product->delete($id);
		$this->session->set_flashdata('message',"Product deleted successfully");
		redirect("inventory/viewProduct");
	}

	function deleteTransaction()
	{
		$this->header();
		$this->footer();
		$id = $this->uri->segment(3);
		$this->transaction->delete($id);
		$this->session->set_flashdata('message',"Transaction deleted successfully");
		redirect("inventory/viewTransaction");
	}


	public function search(){
		// $this->header();
		// $this->footer();
		$this->get_names();
		$this->load->view('admin/search');
	}

	function get_names(){
    $this->load->model('supplierModel','supplier');
    if (isset($_GET['term'])){
      $q = strtolower($_GET['term']);
      $this->supplier->get_name($q);
    }
  }

}
