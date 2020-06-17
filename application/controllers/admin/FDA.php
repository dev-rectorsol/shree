<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class FDA extends CI_Controller {

		public function __construct(){
        parent::__construct();
		check_login_user();
        $this->load->model('Fabric_model');
        $this->load->model('Design_model');
	    $this->load->model('FDA_model');

    	}
    	public function index(){
	        $data = array();
	        $data['name']='Fabric Design Asign';
	        $data['fabric_data']=$this->FDA_model->get_fabric_name();

					$data['fabric_name']=$this->FDA_model->get_fda_fabric_name();
	        //echo print_r($data['fabric_data']);exit;
		      $data['main_content'] = $this->load->view('admin/FDA/asign', $data, TRUE);
  	      $this->load->view('admin/index', $data);
    	}


          public function delete($id)
        {
            $this->Fabric_model->delete($id);
            redirect(base_url('admin/Fabric'));
        }
  		public function delete_fda($id)
        {
            $this->FDA_model->delete($id);
            redirect($_SERVER['HTTP_REFERER']);
        }


			public function get_fabric_name_value()
				{
						if ($_POST) {
							$data=array();
							$data['fabric_type']=$_POST['fabricType'];
							$data['fabric_name']=$_POST['fabricName'];
							$data['data_value'] = $this->FDA_model->get_design_details($_POST['fabricType'], $data['fabric_name']);
							//
							$data['data'] = $this->load->view('admin/FDA/asign_page', $data, TRUE);
		  	      $this->load->view('admin/FDA/index', $data);
				      }
		  	}

				public function get_fda_group_list(){
						$data['data_value'] = $this->FDA_model->get_fda_group_list();
						$data['data'] = $this->load->view('admin/FDA/assign_result', $data, TRUE);
						$this->load->view('admin/FDA/index', $data);
				}

				public function get_fda_details($fabric_name)
					{
								$fabric_name = sanitize_url($fabric_name);
								$data=array();
								$data['name']='Fabric Design List';
								$data['fda_data']=$this->FDA_model->get_fda_data($fabric_name);
								$data['main_content'] = $this->load->view('admin/FDA/fda_list', $data, TRUE);
			   	      $this->load->view('admin/index', $data);

			  	}



	      	public function submit_value()
				  {
						if ($_POST) {
							$data=array();
							if (is_array($_POST['selected'])) {
								for($i = 0; $i < count($_POST['selected']); $i++){
									$data=array(
										'fabric_type' =>$_POST['fabric_type'],
										'fabric_name' =>$_POST['fabric_name'],
										'design_id' =>$_POST['selected'][$i],
									);
									$insert_id=	$this->FDA_model->insert($data,'fda_table');
									if ($insert_id) {
										echo json_encode(array('error' => 0, 'msg' => 'Assign Design Success'));
									}else {
										echo json_encode(array('error' => 1, 'msg' => 'Assign Design Faild'));
									}
							}
            }
					}
				}

				public function filter1()
											{
										$data1=array();
										$this->security->xss_clean($_POST);
												if ($_POST) {
										//	echo"<pre>";	print_r($_POST); exit;
												$data1['from']=$this->input->post('date_from');
												$data1['to']=$this->input->post('date_to');
												$data1['search']=$this->input->post('search');
												$data1['type']=$this->input->post('type');
												$data['from']=$data1['from'];
												$data['to']=$data1['to'];
												$data['type']=$data1['type'];
												$caption='Search Result For : ';
														if($data1['search']=='simple'){
															if($_POST['searchByCat']!="" || $_POST['searchValue']!=""){
																$data1['cat']=$this->input->post('searchByCat');
																$data1['Value']=$this->input->post('searchValue');
																$caption=$caption.$data1['cat']." = ".$data1['Value']." ";
															}
														$data['data_value']=$this->FDA_model->search1($data1);

											}else{

												if(isset($_POST['designName']) && $_POST['designName']!="" ){
													$data1['cat'][]='designName';
														$fab=$this->input->post('designName');
													$data1['Value'][]=$fab;
													$caption=$caption.'designName '." = ".$fab." ";
													}
														if(isset($_POST['desCode']) && $_POST['desCode']!="" ){
														$data1['cat'][]='desCode';
														$fab=$this->input->post('desCode');
														$data1['Value'][]=$fab;
														$caption=$caption.'desCode'." = ".$fab." ";
														}
														if(isset($_POST['stitch']) && $_POST['stitch']!="" ){
															$data1['cat'][]='stitch';
															$fab=$this->input->post('stitch');
															$data1['Value'][]=$fab;
															$caption=$caption.'stitch'." = ".$fab." ";
															}
															if(isset($_POST['dye']) && $_POST['dye']!="" ){
															$data1['cat'][]='dye';
															$fab=$this->input->post('dye');
															$data1['Value'][]=$fab;
															$caption=$caption.'dye'." = ".$fab." ";
															}
															if(isset($_POST['designOn']) && $_POST['designOn']!="" ){
																$data1['cat'][]='designOn';
																$fab=$this->input->post('designOn');
																$data1['Value'][]=$fab;
																$caption=$caption.'designOn'." = ".$fab." ";
																}
																if(isset($_POST['fabric_name']) && $_POST['fabric_name']!="" ){
																$data1['cat'][]='fabric_name';
																$fab=$this->input->post('fabric_name');
																$data1['Value'][]=$fab;
																$caption=$caption.'fabric_name'." = ".$fab." ";
																}
																if(isset($_POST['fabric_type']) && $_POST['fabric_type']!="" ){
																	$data1['cat'][]='fabric_type';
																	$fab=$this->input->post('fabric_type');
																	$data1['Value'][]=$fab;
																	$caption=$caption.'fabric_type'." = ".$fab." ";
																	}
											      	$data['data_value']=$this->FDA_model->search1($data1);
											}
												if($data1['type']=='show'){
													$data['caption']=$caption;
													$data['fabric_data']=$this->FDA_model->get_fabric_name();
													$data['fabric_name']=$this->FDA_model->get_fda_fabric_name();
													$data['main_content'] = $this->load->view('admin/FDA/assign_result_details', $data, TRUE);
													$this->load->view('admin/index', $data);

												}	elseif($data1['type']=='show_details'){
																$data['caption']=$caption;

																$data['main_content'] = $this->load->view('admin/FDA/asign_pageDetails', $data, TRUE);
											  	      $this->load->view('admin/index', $data);
															}
																else{
																	 $data['main_content'] = $this->load->view('admin/FRC/stock/search');
																	 $this->load->view('admin/index', $data);
																}


													}
											}




	}


 ?>
