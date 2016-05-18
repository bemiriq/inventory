<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller
{

    private $user;

    function __construct()
    {
        parent::__construct();
        //echo "FOUND MODEL";
        // $this->load->library('session');
        $this->load->model('loginModel', '', TRUE);
        $this->load->model('productModel', 'product');
        // $this->load->model('supplierModel','supplier');
        // $this->load->model('customerModel','customer');
        $this->load->model('productNameModel', 'productName');
        $this->load->model('transactionModel', 'transaction');
        $this->load->model('detailModel', 'detail');
        $this->load->model('batchModel', 'batch');
        $this->load->model('productLogModel', 'productLog');
        $this->load->model('transactionLogModel', 'transactionLog');

        $this->load->library('pagination');

        $this->user = (object)$this->session->all_userdata();
        if (empty($this->user->username)) {
            redirect('auth/login');
        }
    }

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */

    public function index()
    {
        redirect('inventory/dashboard');
    }


    public function header()
    {
        $this->load->view('header');
    }

    public function footer()
    {
        $this->load->view('footer');
    }

    public function dashboard()
    {
        $this->header();
        $data['posts'] = $this->transaction->get_front_table();
        $this->load->view('admin/dashboard', $data);
        $this->footer();
    }


    public function reportTransaction(){
        //pagination settings
        $config['base_url'] = site_url('inventory/reportTransaction');
        $page = $this->uri->segment(3);
        if(is_null($page))
        {
            redirect($config['base_url'].'/1');
        }
        $config['total_rows'] = $this->transaction->countAll();
        $config['per_page'] = 10;
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = ceil($choice);

//        echo $config["num_links"];

        //config for bootstrap pagination class integration
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;

//        echo $data['page'];

        //call the model function to get the department data
        $data['posts'] = $this->transactionLog->get_report($data['page'],$config['per_page']);
        // $data['posts'] = $this->transactionLog->get_report();           
        $data['pagination'] = $this->pagination->create_links();

//        print_r($data['posts']);
        //load the department_view
        $this->header();
        $data['action'] = ' Report';
        // $data['posts'] = $this->transactionLog->get_report();
        // $this->load->view('admin/reportTransaction', $data);
        $this->footer();
        $this->cmsmodel();
        $this->load->view('admin/reportTransaction', $data);
    }

    function cmsmodel()
    {
        // $data['posts']=$this->post1->getall();
        $data = array(
            'dateposted' => $this->input->post('date_posted')
        );
    }

    public function addProduct()
    {
        if ($data = $this->input->post('product')) {
            $data['date_posted'] = date('Y-m-d H:i:s');
            $data['users_id'] = $this->user->users_id;
            $this->product->add($data);
            $this->productLog->add($data);
            $this->session->set_flashdata('message', "Product added successfully");
            redirect('inventory/addProduct');
        } else {
            $this->header();
            $data['action'] = 'Add';
            $this->load->view("admin/addEditProduct", $data);
            $this->footer();
        }
//        $q = $this->user->users_id;
//        echo $q;

    }

    public function buyProduct()
    {

        if ($data = $this->input->post('buyproduct')) {
            $data['date_posted'] = date('Y-m-d H:i:s');

            if(empty($data['batch_id']))
            {
                $this->insertBatch();
            }

            if (isset($data['sum'])) {
                $data['cost'] = $data['cost'] / $data['unit'];
                unset($data['sum']);
            }

            $data['users_id'] = $this->user->users_id;

            $data['product_id'] = $this->product->getId($data['productName'] );
            unset($data['productName']);

            $data['type'] = $this->detail->getType($data['name'] );
            $data['detail_id'] = $this->detail->getDetail($data['name'] );
            unset($data['name']);

//            if ($name = $this->input->post('buyproduct')) {
//                $name['date_posted'] = date('Y-m-d H:i:s');
//                $name['users_id'] = $this->user->users_id;
//                unset($name['productName']);
//                unset($name['unit']);
//                unset($name['cost']);
//                $this->detail->add($name);
//
//                //$name['type'] = $this->product->getType($name['name'] );
//            }

            $this->transaction->add($data);
            $this->transactionLog->add($data);

//            $this->productLog->add($data);
            $this->session->set_flashdata('message', $data);

            echo $data['cost'];
//            $this->session->set_flashdata('message', "Product bought successfully", $data['cost']);
//            echo $this->session->flashdata('message');
            echo $data;
            var_dump($data);
            redirect('inventory/buyProduct');
        } else {
            $this->header();
            $data['action'] = 'Buy';
            $this->load->view("admin/buyProduct", $data);
            $this->footer();
        }
//        $q = $this->user->users_id;
//        echo $q;

    }

    public function insertBatch()
    {
        if ($data = $this->input->post('buyproduct')) {
            $data['created_on'] = date('Y-m-d H:i:s');
            if (isset($data['sum'])) {
                $data['cost'] = $data['cost'] / $data['unit'];
                unset($data['sum']);
            }
            $data['product_id'] = $this->product->getId($data['productName'] );
            unset($data['productName']);
            unset($data['product_id']);
//            unset($data['batch_id']);
            unset($data['productName']);
            unset($data['name']);
            unset($data['unit']);
            unset($data['cost']);
            $this->batch->add($data);
        }
    }

    public function sellProduct()
    {
        if ($data = $this->input->post('sellProduct')) {
            $data['date_posted'] = date('Y-m-d H:i:s');
            if (isset($data['sum'])) {
                $data['cost'] = $data['cost'] / $data['unit'];
                unset($data['sum']);
            }
            if (isset($data['unit'])) {
                $data['unit'] = $data['unit'] * -1;
            }
            if (isset($data['cost'])) {
                $data['cost'] = $data['cost'] * -1;
            }
            $data['users_id'] = $this->user->users_id;

            $data['product_id'] = $this->product->getId($data['productName'] );
            unset($data['productName']);

            $data['type'] = $this->detail->getSellType($data['name'] );
            $data['detail_id'] = $this->detail->getDetail($data['name'] );
            unset($data['name']);

            $this->transaction->add($data);
            $this->transactionLog->add($data);
            $this->session->set_flashdata('message', "Product sold successfully");
            redirect('inventory/sellProduct');
        } else {
            $this->header();
            $data['action'] = 'Sell';
            $this->load->view("admin/sellProduct", $data);
            $this->footer();
        }

    }


    public function viewProduct()
    {
        $this->header();
        $this->footer();
        $data['posts'] = $this->product->getAll();
        $this->load->view('admin/viewProduct', $data);
    }

    public function viewTransaction()
    {
        $this->header();
        $this->footer();
        $data['posts'] = $this->transaction->getAll();
        $this->load->view('admin/viewTransaction', $data);
    }

    function editProduct()
    {
        $id = $this->uri->segment(3);
        $post = $this->product->getById($id);

        if ($data = $this->input->post('product')) {
            // $data['date_posted'] = date('Y-m-d H:i:s');

            $data = $_POST['product'];
            if (isset($data['sum'])) {
                $data['cost'] = $data['cost'] / $data['stockIn'];
                unset($data['sum']);
            }

            $data['date_posted'] = date('Y-m-d H:i:s');
            $this->product->update($data, $id);
            $this->productLog->add($data);
            $this->session->set_flashdata('message', "Product updated successfully");
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
        // $data['name'] = $this->product->getName($data['detail_id'] );
        // unset($data['detail_id']);

        if ($data = $this->input->post('transaction')) {
            // $this->load->view('header');
            // $this->load->view('footer');
            $data = $_POST['transaction'];
            if (isset($data['sum'])) {
                $data['cost'] = $data['cost'] / $data['unit'];
                unset($data['sum']);
            }
            $data['date_posted'] = date('Y-m-d H:i:s');
            $data['users_id'] = $this->user->users_id;

            // $data['product_id'] = $this->product->getId($data['productName'] );
            // unset($data['productName']);

            $data['detail_id'] = $this->detail->getType($data['name'] );
            unset($data['name']);

            $this->transaction->update($data, $id);
            $this->transactionLog->add($data);
            $this->session->set_flashdata('message', "Transaction updated successfully");
            redirect("inventory/viewTransaction");
            // echo '2';
        }

        // echo '3';
        $this->header();
        $this->footer();
        $data['action'] = 'Edit';
        $data['post'] = $post;
        $this->load->view("admin/addEditTransaction", $data);
    }

    function deleteProduct()
    {
        $id = $this->uri->segment(3);
        $post = $this->product->getById($id);
        if ($data = $this->input->post('deleteP')) {
            // $this->load->view('header');
            // $this->load->view('footer');
            $data = $_POST['deleteP'];
            $data['users_id'] = $this->user->users_id;
            // var_dump($data);
            $this->product->deleted($data, $id);
            $this->session->set_flashdata('message', "Product deleted successfully");
            redirect("inventory/viewProduct");
        }
        // $this->product->delete($data, $id);
        $this->header();
        $this->footer();
        // $this->session->set_flashdata('message', "Product deleted successfully");
        redirect("admin/viewProduct");
    }

    function deleteTransaction()
    {
        $id = $this->uri->segment(3);
        $post = $this->transaction->getById($id);
        if ($data = $this->input->post('deleteT')) {
            // $this->load->view('header');
            // $this->load->view('footer');
            $data = $_POST['deleteT'];
            $data['users_id'] = $this->user->users_id;
            // var_dump($data);
            $this->transaction->deleted($data, $id);
            $this->session->set_flashdata('message', "Transaction deleted successfully");
            redirect("inventory/viewTransaction");
        }
        // $this->product->delete($data, $id);
        $this->header();
        $this->footer();
        $this->session->set_flashdata('message', "Product deleted successfully");
        redirect("admin/viewTransaction");
    }


    public function search()
    {
        // $this->header();
        // $this->footer();
        $this->get_names();
        $this->load->view('admin/search');
    }

    function get_supplier_names()
    {
        $this->load->model('transactionModel', 'transaction');
        if (isset($_GET['term'])) {
            $q = strtolower($_GET['term']);
            $this->transaction->get_name_supplier($q);
        }
    }

    function get_customer_names()
    {
        $this->load->model('transactionModel', 'transaction');
        if (isset($_GET['term'])) {
            $q = strtolower($_GET['term']);
            $this->transaction->get_name_customer($q);
        }
    }

    function get_product_names()
    {
        $this->load->model('productModel', 'product');
        if (isset($_GET['term'])) {
            $q = strtolower($_GET['term']);
            $this->product->get_name_product($q);
        }
    }

    function get_price()
    {
        $this->load->model('transactionModel', 'transaction');
        if (isset($_GET['term'])) {
            $q = strtolower($_GET['term']);
            $this->transaction->get_price($q);
        }
    }

}
