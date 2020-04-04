<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Job_work_type extends CI_Controller {

		public function __construct(){
        parent::__construct();
				check_login_user();
         $this->load->model('Job_work_type_model');
         $this->load->model('common_model');
				 if ($_SESSION['role']!=101)
        	redirect(base_url('admin/Dashboard'));

    	}


    	public function index(){
	        $data = array();
	        $data['name']='Job Work Type';
            $data['work_type']=$this->Job_work_type_model->get();
					// echo "<pre>";
					// echo print_r($data['work_type']);exit;
            $data['type']=$this->Job_work_type_model->getType();
            $data['fabtype']=$this->Job_work_type_model->getfabricType();
	        $data['main_content'] = $this->load->view('admin/master/job_work_type/jobworktype', $data, TRUE);
			$this->load->view('admin/index', $data);
        }

        public function addType(){
            if ($_POST)
    		{
              $data=array();
              $data['type']=$this->input->post('type');
                // $data['parent']=$this->input->post('parent');
            //   $data1['unit']=$this->input->post('unit');
            $data1= array();
            //   $data1['jobId']= $this->Job_work_type_model->add($data);
            //   echo $data1['jobId'];exit;
              $arr=$this->input->post('tabledata');
              $str=explode(",",$arr);
              echo "<pre>";
            //   echo print_r($str);exit;
            //   for ($i=0; $i <count($str) ; $i++) 
            foreach($str as $value)
              {
            //   if($i%2==0){
            //      $job[]= $str[$i];
            //   }else{
            //      $rate[]= $str[$i];
            //   }
            $count=0;
            if($count <=3){
                 switch($count){
                          case 1:
                              $data1['job']=$value;
                              echo $data1['job'];
                              break;
                              case 2:
                                $data1['rate'] =$value; 
                                break;
                                  case 3:
                                    $data1['unit'] =$value; 
                                    echo $data1['unit'];
                                    break;
                      }
                       //echo $data1['unit'];exit;
                 $count++; 
                 $recod=array();
                 if($count==3){
                          $recod[]=$data1;
                          unset($temp);
                      }
                      echo print_r($recod);exit;
            }
            
            echo print_r($data1);exit;
              }

             
              for($i=0; $i <count($job) ; $i++){
                $data1['job']=$job[$i];
                $data1['rate']=$rate[$i];
                $data1['unit'] =$str[$i]; 
                echo print_r($data1);exit;
                $this->Job_work_type_model->insert('jobtypeconstant',$data1);
              }
    			redirect(base_url('admin/Job_work_type'));

    		}
        }
        
        public function edit($id){
            if ($_POST)
    		{
                $data=array();
                // $data['type']=$this->input->post('type');
                // $data['parent']=$this->input->post('parent');
                $data['rate']=$this->input->post('rate');
                $data['job']=$this->input->post('job');


    			$this->Job_work_type_model->update($id,$data);
    			redirect(base_url('admin/Job_work_type'));

    		}

        }

        public function delete($id)
        {
            $this->Job_work_type_model->delete($id);
            redirect(base_url('admin/Job_work_type'));
        }

	 public function deletejob(){
					 $ids = $this->input->post('ids');
					 // echo $ids;exit;
					 $userid= explode(",", $ids);
					 // echo print_r($userid);exit;
					 foreach ($userid as $value) {

					 $this->db->delete('jobtypeconstant', array('id' => $value));
					}
				}
        public function filter()
        {
            $data=array();
            if ($_POST) {
              $searchByCat=$this->input->post('searchByCat');
              $searchValue=$this->input->post('searchValue');
                $output = "";
                $data=$this->Job_work_type_model->search($searchByCat,$searchValue);
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
	/* End of file Dashboard.php */
	/* Location: ./application/controllers/admin/Dashboard.php */
 ?>
