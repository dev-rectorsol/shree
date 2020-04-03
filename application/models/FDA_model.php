<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FDA_model extends CI_Model {


      public function insert($data,$table){
      $this->db->insert($table,$data);
      return $this->db->insert_id();
    }

      function edit_option($action, $id, $table){
        $this->db->where('id',$id);
        $this->db->update($table,$action);
        return;
    }

 public function add($data)
 {
   $this->db->insert('fabric', $data);
 }

 public function get_fabric_name()
 {
   $this->db->select('fabricType,fabricName,fabricCode');
   $this->db->from('fabric');
   $query = $this->db->get();
   $query = $query->result_array();
   return $query;
 }
 public function get_fda_fabric_name()
 {
   $this->db->select('*');
   $this->db->group_by('fabric_id');
   $this->db->from('fda_table');
   $query = $this->db->get();
   $query = $query->result_array();
   return $query;
 }
 public function get_fda_data($fab_id)
 {
   $this->db->select('*');
   $this->db->from('fda_table');
   $this->db->join('design ','design.id = fda_table.design_id','inner');
   $this->db->where('fabric_id',$fab_id);
   $query = $this->db->get();
   //echo $this->db->last_query();exit;
   $query = $query->result_array();
   return $query;
 }


 public function get_design_details($fabricType)
  {
    // echo $fabricType;exit;
    $this->db->select('*');
    $this->db->from('design');
    $this->db->where('designOn',$fabricType);
    $this->db->where('details_status',1);
    $query = $this->db->get();
    // echo $this->db->last_query();
    $query = $query->result_array();

    return $query;
  }
 public function edit($id,$data)
 {
   // print_r($data);
   // print_r($id);
   $this->db->where('id', $id);
   $this->db->update('fabric', $data);
   return true;
 }
 public function delete($id)
 {
   $this->db->where('id', $id);
     $this->db->delete('fda_table');
 }
 public function search($searchByCat,$searchValue)
 {
   $this->db->select('*');
   $this->db->from('fabric');
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
