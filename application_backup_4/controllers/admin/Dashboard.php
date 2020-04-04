<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
        parent::__construct();
        check_login_user();
       $this->load->model('common_model');
       $this->load->model('login_model');
    }
    public function index()
    {  
        $data = array();
        $data['name'] = 'Dashboard';
        $data['power'] = $this->common_model->get_all_power('user_power');
    	 $role =  $this->session->userdata('role');
    	if ($role==101){
    	    // echo "hello";
    	$data['main_content'] = $this->load->view('admin/admin_home', $data, TRUE);
    	}else{
    	            $data['main_content'] = $this->load->view('admin/dis_home', $data, TRUE);
    
    	}
        $this->load->view('admin/index', $data);
    }

  }
