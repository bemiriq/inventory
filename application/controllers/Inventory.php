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
	   // $this->load->model('supplierModel','supplier');
	   // $this->load->model('customerModel','customer');
	   $this->load->model('productNameModel','productName');
	   $this->load->model('transactionModel','transaction');
	   $this->load->model('productLogModel','productLog');
	   $this->load->model('transactionLogModel','transactionLog');
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
	   	$this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean');

		if($this->form_validation->run() == FALSE)
		{
		    //Field validation failed.  User redirected to login page
		    $this->load->view('login');
		    // echo 'incorrect password';
		}
		else
		{
			$result = $this->loginModel->login($this->input->post('username'), $this->input->post('password'));

			if($result)
			{
				
				$result = json_decode(json_encode($result),1);
				$this->session->set_userdata($result);
				redirect('inventory/dashboard');
			}
			else
			{
				echo '<p style="width: 300px; margin-right: auto; margin-left: auto; margin-top: 1%; color: #B22222"> Incorrect Username and Password </p>';
				$this->load->view('login');
			}
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

	 	$c=$this->session->all_userdata();
print_r($c);

	 	$data['action'] = ' Add';
	 	$data['posts']=$this->transaction->get_table();
	 	$this->load->view('admin/dashboard', $data);
	 	$this->footer();
	}

	public function addProduct()
	 {
	 	if($data = $this->input->post('product'))
		{
			$data['date_posted'] = date('Y-m-d H:i:s');
			if(isset($data['sum'])) {
				$data['cost']=$data['cost']/$data['stockIn'];
				unset($data['sum']);
			}
			$this->product->add($data);
			$this->productLog->add($data);
			$this->session->set_flashdata('message',"Product added successfully");
			redirect('inventory/addProduct');
		}
		else{
			$this->header();
			$data['action'] = 'Add';
			$this->load->view("admin/addEditProduct", $data);
			$this->footer();
		}
	 }

	public function addTransaction()
	 {
	 	if($data = $this->input->post('transaction'))
		{
			$data['date_posted'] = date('Y-m-d H:i:s');
			$this->transaction->add($data);
			$this->transactionLog->add($data);
			$this->session->set_flashdata('message',"Product added successfully");
			redirect('inventory/addTransaction');
		}
		else{
			$this->header();
			$data['action'] = 'Add';
			$this->load->view("admin/addEditTransaction", $data);
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

		if($data = $this->input->post('product'))
		{
			// $data['date_posted'] = date('Y-m-d H:i:s');
			
			$data = $_POST['product'];
			if(isset($data['sum'])) {
				$data['cost']=$data['cost']/$data['stockIn'];
				unset($data['sum']);
			}

			$data['date_posted'] = date('Y-m-d H:i:s');
			$this->product->update($data,$id);
			$this->productLog->add($data);
			$this->session->set_flashdata('message',"Product updated successfully");
			redirect("inventory/viewProduct");
			// echo '2';
		}

		// echo '3';
		$this->header();
		$this->footer();
		$data['action'] = 'Edit';
		$data['post'] = $post;
		$this->load->view("admin/addEditProduct", $data);
	}

	function editTransaction()
	{
		$id = $this->uri->segment(3);
		$post = $this->transaction->getById($id);

		if($data = $this->input->post('transaction'))
		{
			// $this->load->view('header');
			// $this->load->view('footer');
			$data = $_POST['transaction'];
			$data['date_posted'] = date('Y-m-d H:i:s');
			$this->transaction->update($data,$id);
			$this->transactionLog->add($data);
			$this->session->set_flashdata('message',"Transaction updated successfully");
			redirect("inventory/viewTransaction");
			// echo '2';
		}

		// echo '3';
		$this->header();
		$this->footer();
		$data['action'] = 'Edit';
		$data['post'] = $post;
		$this->load->view("admin/addEditTransaction",$data);
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

	function get_supplier_names(){
	    $this->load->model('transactionModel','transaction');
	    if (isset($_GET['term'])){
	      $q = strtolower($_GET['term']);
	      $this->transaction->get_name_supplier($q);
	    }
  	}

	 function get_customer_names(){
	    $this->load->model('transactionModel','transaction');
	    if (isset($_GET['term'])){
	      $q = strtolower($_GET['term']);
	      $this->transaction->get_name_customer($q);
	    }
	 }

	function get_product_names(){
	    $this->load->model('productModel','product');
	    if (isset($_GET['term'])){
	      $q = strtolower($_GET['term']);
	      $this->product->get_name_product($q);
	    }
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
