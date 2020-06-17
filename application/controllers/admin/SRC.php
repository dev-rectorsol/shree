<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SRC extends CI_Controller {

	public function __construct(){
        parent::__construct();
        check_login_user();
       $this->load->model('common_model');
       $this->load->model('Customer_model');
       $this->load->model('Src_model');
    }
    public function index()
    {
        $data = array();
        $data['name'] = 'SRC';
				$data['febName'] = $this->Src_model->get_fabric_name();
				$data['fresh_fabricname'] = $this->Src_model->get_fabric_fresh_value();

				//echo print_r($data['$febName']);exit;
        $data['main_content'] = $this->load->view('admin/master/src/src', $data, TRUE);
        $this->load->view('admin/index', $data);
	}
	public function getlist()
    {
		$febName = $this->Src_model->get_fabric();
		foreach ($febName as $key => $value) {
			$data[]= $value;
		}
		header('Content-type: application/json');
		echo json_encode($data);
	}

	public function getfabricName()
    {
		$febName = $this->Src_model->get_fabric_name();
       foreach($febName as $row ) {

        foreach($row as $value){
        $result_array[]= $value;
        }

	}
		header('Content-type: application/json');
		echo json_encode($result_array);
}
	public function getErcCode()
    {

		$febName = $this->Src_model->get_Erc_Code();

       foreach($febName as $row) {

        foreach($row as $value){
        $result_array[]= $value;
        }

	}
		header('Content-type: application/json');
		echo json_encode($result_array);
}

public function update()
    {
		$id=$_POST['id'];
		if(isset($_POST['fName'])){
			$data = array();
			$data['fabName'] =$_POST['fName'];
 			$data['updated_at'] = date('Y-m-d H:i:s');
			$data['created_at'] = date('Y-m-d H:i:s');
			$data_value= $this->Src_model->get_src_name($data['fabName']);
// 			echo print_r($data_value);
 			 if(isset($id))
 			 {
 			      $status = $this->Src_model->Update($id,$data);
 			 }
		}
		if(isset($_POST['purchase'])){
			$data = array();
			$data['purchase'] =$_POST['purchase'];
			$status = $this->Src_model->Update($id,$data);
		}
		if(isset($_POST['fcode'])){
			$data = array();
			$data['fabCode'] =$_POST['fcode'];
		  $data['updated_at'] = date('Y-m-d H:i:s');
			$data['created_at'] = date('Y-m-d H:i:s');
			$status = $this->Src_model->Update($id,$data);
		}
		if(isset($_POST['srate'])){
			$data = array();
			$data['sale_rate'] =$_POST['srate'];
			$data['updated_at'] = date('Y-m-d H:i:s');
			$data['created_at'] = date('Y-m-d H:i:s');
			$status = $this->Src_model->Update($id,$data);
		}

		    $data['fabName']=$this->Src_model->get_fab_name_value('src');
		  //  echo print_r( $data['fabName']);exit;
		    $fabName=$data['fabName']->fabName;
				$fabCode=$data['fabName']->fabCode;
		   // echo $fabCode;exit;

			if(isset($_POST['purchase'])){
			$data = array();
			$data['purchase'] =$_POST['purchase'];
			$status = $this->Src_model->Update_fabric($fabName,$data);
		  }
		  if(isset($_POST['fcode'])){
			$data = array();
			$data['Code'] =$_POST['fcode'];
			$status = $this->Src_model->Update_fabric($fabName,$data);
		}
			if(isset($_POST['srate'])){
			$data = array();
			$data['sale_rate'] =$_POST['srate'];
		    $status = $this->Src_model->Update_fabric($fabName,$data);
		}
		if(isset($_POST['srate'])){
			$data = array();
			$data['saleRate'] =$_POST['srate'];
		  $status = $this->Src_model->Update_design($fabName,$fabCode,$data);
		}
		if($status=='true'){
			echo "success";
		}
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
				$data = $this->Src_model->get_SRC_set_exist($check);
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
    	public function add_src(){

			$data=array();

					$data=array(

						'fabName' => 'NULL',

					);
					$id = $this->Src_model->insert($data,'src');
			echo $id;
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
								$data['src']=$this->Src_model->search1($data1);

					}else{
					if(isset($_POST['fabName']) && $_POST['fabName']!="" ){
						$data1['cat'][]='fabName';
						$fab=$this->input->post('fabName');
						$data1['Value'][]=$fab;
						$caption=$caption.' fabName'." = ".$fab." ";
						}
						if(isset($_POST['purchase']) && $_POST['purchase']!="" ){
							$data1['cat'][]='purchase';
								$fab=$this->input->post('purchase');
							$data1['Value'][]=$fab;
							$caption=$caption.'purchase '." = ".$fab." ";
							}
							if(isset($_POST['fabCode']) && $_POST['fabCode']!="" ){
								 $data1['cat'][]='fabCode';
									$fab=$this->input->post('fabCode');
								 $data1['Value'][]=$fab;
								$caption=$caption.'fabCode'." = ".$fab." ";
								}
								if(isset($_POST['sale_rate']) && $_POST['sale_rate']!="" ){
								$data1['cat'][]='sale_rate';
								$fab=$this->input->post('sale_rate');
								$data1['Value'][]=$fab;
								$caption=$caption.'sale_rate'." = ".$fab." ";
								}

						$data['src']=$this->Src_model->search1($data1);
					}
						if($data1['type']=='src'){
							$data['caption']=$caption;
							$data['febName'] = $this->Src_model->get_fabric_name();
							$data['fresh_fabricname'] = $this->Src_model->get_fabric_fresh_value();
							//echo print_r($data['$febName']);exit;
			        $data['main_content'] = $this->load->view('admin/master/src/src_details', $data, TRUE);
							$this->load->view('admin/index', $data);
						}
										else{
											 $data['main_content'] = $this->load->view('admin/FRC/stock/search');
											 $this->load->view('admin/index', $data);
										}


							}
					}


  }
