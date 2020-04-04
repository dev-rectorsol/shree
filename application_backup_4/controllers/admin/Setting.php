<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting extends CI_Controller {

	public function __construct(){
        parent::__construct();
        check_login_user();
       $this->load->model('common_model');
       $this->load->model('login_model');
       if ($_SESSION['role']!=101)
        	redirect(base_url('admin/Dashboard'));
    }
    public function index()
    {
        $data = array();
        $data['name'] = 'Setting';
        $data['power'] = $this->common_model->get_all_power('user_power');
        
        $data['main_content'] = $this->load->view('admin/Setting', $data, TRUE);
        
        $this->load->view('admin/index', $data);
    }

  }