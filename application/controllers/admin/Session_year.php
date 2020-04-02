<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Session_year extends CI_Controller {


			public function __construct(){
        parent::__construct();
				check_login_user();
        $this->load->model('Session_model');
				if ($_SESSION['role']!=101)
        	redirect(base_url('admin/Dashboard'));
    	}
    	public function index(){
	        $data = array();
					$data['name']='Session Year';
	        $data['session_data']=$this->Session_model->get();
					$data['main_content'] = $this->load->view('admin/master/session/index', $data, TRUE);
					$this->load->view('admin/index', $data);
    	}
    	public function addSession()
    	{
    		if ($_POST)
    		{
    		    $data=array(
    				'financial_year'=>$_POST['financial_year'],

    			);
    		//	$data=$this->input->post('financial_year');
    			// print_r($data);exit;
    			$this->Session_model->add($data);
    			redirect(base_url('admin/Session_year'));

    		}
    	}
        public function edit($id)
        {
            if ($_POST) {

    		    $data=array(
    				'financial_year'=>$_POST['financial_year'],

    			);
                // print_r($data);
                $this->Session_model->edit($id,$data);
                redirect(base_url('admin/Session_year'));

            }
        }
        public function delete($id)
        {
            $this->Session_model->delete($id);
            redirect(base_url('admin/Session_year'));
        }
				public function delete_session_data(){
					$ids = $this->input->post('ids');
					 $userid= explode(",", $ids);
					 foreach ($userid as $value) {
							$this->db->delete('session', array('id' => $value));
					}
				}



        public function filter()
        {
            $data=array();
            if ($_POST) {
              $searchByCat=$this->input->post('searchByCat');
              $searchValue=$this->input->post('searchValue');
                $output = "";
                $data=$this->Session_model->search($searchByCat,$searchValue);
                foreach ($data as $value) {
                                // echo print_r($value);exit;
                    $output .= "<tr id='tr_".$value['id']."'>";
                     $output .="<td><input type='checkbox' class='sub_chk' data-id=".$value['id']."></td>";
                     
                    foreach ($value as $temp) {
                        $output .= "<td>".$temp."</td>";
                     }
                   $output .= "<td><a href='#".$value['id']."' class='text-center tip' data-toggle='modal' data-original-title='Edit'><i class='fas fa-edit blue'></i></a>
                    <a class='text-danger text-center tip' href='javascript:void(0)' onclick='delete_detail(".$value['id'].")' data-original-title='Delete'><i class='mdi mdi-delete red' ></i></a>
                    </td>";
                $output .= "</tr>";
                            }
              echo json_encode($output);
            }
        }



	}

	/* End of file Branch_detail.php */
	/* Location: ./application/controllers/admin/Branch_detail.php */

 ?>
