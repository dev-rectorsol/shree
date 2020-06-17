<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ERC extends CI_Controller {

	public function __construct(){
        parent::__construct();
        check_login_user();
       $this->load->model('common_model');
       $this->load->model('Erc_model');
    }
    public function index()
    {
    $data = array();
    $data['name'] = 'ERC';
		$data['designname'] = $this->Erc_model->get_design_name();
		$data['fresh_designname'] = $this->Erc_model->get_design_fresh_value();

    $data['main_content'] = $this->load->view('admin/master/erc/erc', $data, TRUE);
    $this->load->view('admin/index', $data);
    }
    public function getlist()
    {
		$designname = $this->Erc_model->get_design();
		header('Content-type: application/json');
		echo json_encode($designname);
	}

	 public function getDesignName()
    {
		$designname = $this->Erc_model->get_design_name();
// 		echo print_r($designname);exit;
        foreach($designname as $row ) {
        foreach($row as $value){
        $result_array[]= $value;
        }
    }


		header('Content-type: application/json');
		echo json_encode($result_array);
    }
     public function get_src_fabcode()
    {

		$fabcode = $this->Erc_model->get_src_fabcode_value();
		//echo print_r( $fabcode);exit;

        foreach($fabcode as $row ) {

        foreach($row as $value){
        $result_array[]= $value;
        }
        //echo  print_r($result_array);exit;

    }
		header('Content-type: application/json');
		echo json_encode($result_array);


    }

public function update()
    {

				$id=$_POST['id'];
				$status='';
				if(isset($_POST['designName'])){
					$data = array();
					$data['desName'] =$_POST['designName'];
					$data['updated_at'] = date('Y-m-d H:i:s');
					$data['created_at'] = date('Y-m-d H:i:s');
					//echo $data['desName'].$id;exit;
					$data_value= $this->Erc_model->get_erc_name($data['desName']);
					// echo $data_value;exit;
					if($data_value)
					{
						$status='Design already exits ';
						echo "<h4 style='color:red'>".$status." !!<h4>";
	  			 }
					 else
					{

						   $status = $this->Erc_model->Update($id,$data);
						   if($status=='true'){
					echo "<h4 style='color:green'>Success !!<h4>";
					}

					}
				}
				if(isset($_POST['designCode'])){
					$data = array();
					$data['desCode'] =$_POST['designCode'];
					$data['updated_at'] = date('Y-m-d H:i:s');
					$data['created_at'] = date('Y-m-d H:i:s');
					$status = $this->Erc_model->Update($id,$data);
					if($status=='true'){
					echo "<h4 style='color:green'>Success !!<h4>";
					}
				}
				if(isset($_POST['rate'])){
					$data = array();
					$data['rate'] =$_POST['rate'];
					$data['updated_at'] = date('Y-m-d H:i:s');
					$data['created_at'] = date('Y-m-d H:i:s');
					$status = $this->Erc_model->Update($id,$data);
					if($status=='true'){
					echo "<h4 style='color:green'>Success !!<h4>";
					}
				}





    }
		public function add_erc(){

			$data=array();

					$data=array(
					'desName' => "NULL",

					);
					$id =$this->Erc_model->insert($data,'erc');
					echo $id;

		}

    // public function Adduser(){
    //   	if ($_POST)
    // 		{
    //       $data=$this->input->post();
    //       $data['password']=md5($this->input->post('password'));
    // 			//print_r($data);
    // 			$this->Employee_model->add($data);
    // 			redirect(base_url('admin/Employee'));
    // 		}
    // }

		public function checkAvailable(){
				if ($_POST) {
					$output = '';
					$check = $this->security->xss_clean($_POST);
					$data = $this->Erc_model->get_ERC_set_exist($check);
					//echo print_r($data);exit;
						if($data){
							 echo 1;
						}else{
							echo 0;
						}
				}else{
						echo json_encode(array('error'=>true, 'msg'=>'somthing want wrong :('));
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
									$data['src']=$this->Erc_model->search1($data1);

						}else{
						if(isset($_POST['desName']) && $_POST['desName']!="" ){
							$data1['cat'][]='desName';
							$fab=$this->input->post('desName');
							$data1['Value'][]=$fab;
							$caption=$caption.'desName'." = ".$fab." ";
							}
							if(isset($_POST['desCode']) && $_POST['desCode']!="" ){
								$data1['cat'][]='desCode';
									$fab=$this->input->post('desCode');
								$data1['Value'][]=$fab;
								$caption=$caption.'desCode '." = ".$fab." ";
								}
								if(isset($_POST['rate']) && $_POST['rate']!="" ){
									 $data1['cat'][]='rate';
										$fab=$this->input->post('rate');
									 $data1['Value'][]=$fab;
									$caption=$caption.'rate'." = ".$fab." ";
									}


							$data['src']=$this->Erc_model->search1($data1);
						}
							if($data1['type']=='erc'){
								$data['caption']=$caption;
								$data['designname'] = $this->Erc_model->get_design_name();
	 		 		      $data['fresh_designname'] = $this->Erc_model->get_design_fresh_value();

	 		          $data['main_content'] = $this->load->view('admin/master/erc/erc_details', $data, TRUE);
								$this->load->view('admin/index', $data);
							}
											else{
												 $data['main_content'] = $this->load->view('admin/FRC/stock/search');
												 $this->load->view('admin/index', $data);
											}


								}
						}



  }
