 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job_work_type_model extends CI_Model {

	public function add($data)
	{
		$this->db->insert('job_work_type', $data);
		return $this->db->insert_id();
	}

  public function insert($data,$table){
 			$this->db->insert($table,$data);
 			return $this->db->insert_id();
 	}
	public function get()
	{

		$this->db->join("jobtypeconstant",'job_work_type.id=jobtypeconstant.jobId');
		$this->db->order_by('job_work_type.id','desc');
		$rec=$this->db->get('job_work_type');
		return $rec->result();

    }
    public function getType()
	{
        $this->db->select('distinct(type)');
		$rec=$this->db->get('job_work_type');
		return $rec->result();

	}

	public function getfabricType()
	{
        $this->db->select('distinct(fabricType)');
		$rec=$this->db->get('fabric');
		return $rec->result();

	}
	public function update($id,$data)
	{
		// print_r($data);
		// print_r($id);
		$this->db->where('id', $id);
		$this->db->update('jobtypeconstant', $data);
		return true;
	}
	public function delete($id)
	{
    //  echo $id;exit;
		  $this->db->where('id', $id);
     	$this->db->delete('jobtypeconstant');
	}
	public function search($searchByCat,$searchValue)
	{
		$this->db->select('job_work_type.id,type,job,rate,unit');
		$this->db->from('job_work_type');
		$this->db->join("jobtypeconstant",'job_work_type.id=jobtypeconstant.jobId');
		$this->db->like($searchByCat, $searchValue);
		$rec=$this->db->get();
	//print_r($this->db->last_query());exit;
		return $rec->result_array();
		// print_r($searchValue);
		// print_r($this->db->last_query());

	}


}

/* End of file Branch_model.php */
/* Location: ./application/models/Branch_model.php */
 ?>
