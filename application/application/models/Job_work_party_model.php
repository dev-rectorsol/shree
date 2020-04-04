 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job_work_party_model extends CI_Model {

	public function add($data)
	{
		$this->db->insert('job_work_party', $data);
	}
	public function get()
	{
		$rec=$this->db->get('job_work_party');
		return $rec->result();

	}
		public function job_work_name()
	{
		$this->db->select('DISTINCT(type)');
     $rec=$this->db->get('job_work_type');
		return $rec->result();
	}
  // public function subDept()
  // {
  //   $this->db->select('subDeptName');
  //   $rec=$this->db->get('sub_department');
  //   return $rec->result();
  // }

	public function edit($id,$data)
	{
		// print_r($data);
		// print_r($id);
		$this->db->where('id', $id);
		$this->db->update('job_work_party', $data);
		return true;
	}
	public function delete($id)
	{
		$this->db->where('id', $id);
     	$this->db->delete('job_work_party');
	}
	public function search($searchByCat,$searchValue)
	{
		$this->db->select('*');
		$this->db->from('job_work_party');
		$this->db->like($searchByCat, $searchValue);
		$rec=$this->db->get();
		return $rec->result_array();
		// print_r($searchValue);
		// print_r($this->db->last_query());

	}


}

/* End of file Branch_model.php */
/* Location: ./application/models/Branch_model.php */
 ?>
