<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frc_model extends CI_Model {


      public function insert($data,$table){
      $this->db->insert($table,$data);
      return $this->db->insert_id();
    }

      function edit_option($action, $id, $table){
        $this->db->where('id',$id);
        $this->db->update($table,$action);
        return;
    }
    function update($action, $id,$column, $table){
        $this->db->where($id,$column);
        $this->db->update($table,$action);
        return;
    }

 public function add($data)
 {
   $this->db->insert('fabric', $data);
 }

 public function get_fabric_name()
 {
   $this->db->select('id ,fabricType, fabricName, fabricCode');
   $this->db->from('fabric');
   $query = $this->db->get();
   $query = $query->result_array();
   return $query;
 }

public function get($data)
 {
   $this->db->select("fabric_challan.*,sb1.subDeptName as sub1,sb2.subDeptName as sub2");
   $this->db->from('fabric_challan');
   $this->db->where("challan_type", $data['type']);
   if($data['from']==$data['to']){
    $this->db->where('fabric_challan.challan_date ', $data['from']); 
   }else{
    $this->db->where('fabric_challan.challan_date >=', $data['from']);
   $this->db->where('fabric_challan.challan_date <=', $data['to']);
   }
  $this->db->join('sub_department sb1','sb1.id=fabric_challan.challan_from  ','left');
 $this->db->join('sub_department sb2','sb2.id=fabric_challan.challan_to  ','left');
   $query = $this->db->get();
   $query = $query->result_array();
   return $query;
   
 }
 public function get_summary($data)
 {
   $this->db->select("sum(total_amount) as Tamount,sum(total_tc) as Totaltc");
   $this->db->select("fabric_type as fabtype,sum(total_quantity) as qty,sum(total_amount) as amount,sum(total_tc) as tc");
   $this->db->from('fabric_challan');
   $this->db->where("challan_type", $data['type']);
   if($data['from']==$data['to']){
    $this->db->where('fabric_challan.challan_date ', $data['from']); 
   }else{
    $this->db->where('fabric_challan.challan_date >=', $data['from']);
   $this->db->where('fabric_challan.challan_date <=', $data['to']);
   }
  $this->db->group_by('fabric_type');
   $query = $this->db->get();
   $query = $query->result_array();
   return $query;
   
 }
 public function get_frc_by_id($id)
 {
   $this->db->select("fabric_challan.*,sb1.subDeptName as sub1,sb2.subDeptName as sub2");
   $this->db->from('fabric_challan');
   
   $this->db->where("fc_id", $id);
  $this->db->join('sub_department sb1','sb1.id=fabric_challan.challan_from  ','left');
 $this->db->join('sub_department sb2','sb2.id=fabric_challan.challan_to  ','left');
   $query = $this->db->get();
   $query = $query->result_array();
   return $query;
   
 }
public function get_by_id($id)
 {
   $this->db->select("*");
   $this->db->from('fabric_stock_received');
  
   $this->db->where("fabric_challan_id", $id);
$this->db->join('fabric','fabric.id=fabric_stock_received.fabric_id','inner');
 
 
   $query = $this->db->get();//echo"<pre>"; print_r($query);exit;
   $query = $query->result_array();
   return $query;
   
 }

 public function get_stock($data)
 {
   $this->db->select("*");
   $this->db->from('fabric_stock_received');
   $this->db->where("isStock", 1);
   if($data['from']==$data['to']){
    $this->db->where('fabric_stock_received.created_date ', $data['from']); 
   }else{
    $this->db->where('fabric_stock_received.created_date >=', $data['from']);
   $this->db->where('fabric_stock_received.created_date <=', $data['to']);
   }
$this->db->join('fabric','fabric.id=fabric_stock_received.fabric_id','inner');
 $this->db->order_by('length(parent_barcode),parent_barcode'); 
   $query = $this->db->get();
    //echo"<pre>"; print_r($query);exit;
   $query = $query->result_array();
   return $query;
   
 }
  public function get_tc()
 {
   $this->db->select("*");
   $this->db->from('fabric_stock_received');
   $where = "(tc!='' OR tc!=0)  and isTc=0 and challan_type='recieve' ";
    $this->db->or_where($where);
    
    $this->db->join('fabric','fabric.id=fabric_stock_received.fabric_id','inner');
    $this->db->group_by('parent_barcode');
   $query = $this->db->get();
   //echo"<pre>"; print_r($query);exit;
   $query = $query->result_array();
   return $query;
   
 }
 public function tc_summary()
 {
   
   $this->db->select("fabric_type as fabtype, fabric.fabricName as fabric,sum(current_stock)  as qty, sum(tc) as tc ");
   $this->db->from('fabric_stock_received');
    $where = "(tc!='' OR tc!=0)  and isTc=0 and challan_type='recieve' ";
    $this->db->or_where($where);
    $this->db->group_by('fabric.fabricName','fabric_type');
    $this->db->join('fabric','fabric.id=fabric_stock_received.fabric_id','inner');
    
   $query = $this->db->get();
   //echo"<pre>"; print_r($query);exit;
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
 public function search($data)
 {
   //echo"<pre>";	print_r( $data); exit;
                if($data['type']=="recieve" || $data['type']=="return" ){
                  $this->db->select('*');
                $this->db->from('fabric_challan');

                $this->db->like($data['cat'], $data['Value']);
                $this->db->where("challan_type", $data['type']);
                  $this->db->join('sub_department','sub_department.id=fabric_challan.challan_from','inner');
                }elseif($data['type']=="stock"){
                  $this->db->select('*');
                $this->db->from('fabric_stock_received');
                
                if(!is_array($data['cat']) ){
                  if($data['cat']!=""){
                    $this->db->where($data['cat'], $data['Value']);
                  }
                  
                }else{
                  $count =count($data['cat']);
                  for($i=0;$i<$count;$i++){
                    $this->db->like($data['cat'][$i], $data['Value'][$i]);
                  }
                }
                
                 $this->db->where("isStock", 1);
                  $this->db->join('fabric','fabric.id=fabric_stock_received.fabric_id','inner');
                }elseif($data['type']=="pbc"){
                  $this->db->select('*');
                $this->db->from('fabric_stock_received');
                $this->db->like($data['cat'], $data['Value']);
                $this->db->where("isSecond",1);
                $this->db->join('fabric','fabric.id=fabric_stock_received.fabric_id','inner');
                $this->db->order_by('parent_barcode'); 
                }elseif($data['type']=="tc") {
                  $this->db->select("*");
                $this->db->from('fabric_stock_received');
                $this->db->like($data['cat'], $data['Value']);
                $where = "(tc!='' OR tc!=0)  ";
                  $this->db->or_where($where);
                  
                  $this->db->join('fabric','fabric.id=fabric_stock_received.fabric_id','inner');
                  $this->db->group_by('parent_barcode');
                  }
   
   $rec=$this->db->get();
 //print_r($this->db->last_query());exit;
   return $rec->result_array();
  
 }
 

public function select($table)
 {
   $this->db->select('*');
   $this->db->from($table);
   
   $rec=$this->db->get();
   return $rec->result_array();
 

 }
  public function get_fabric_recieve($id)
  {
    $this->db->select('*');
    $this->db->from('fabric_challan');
    $this->db->where('fc_id',$id);
    $this->db->join('sub_department','sub_department.id=fabric_challan.challan_from','inner');
 
    $rec=$this->db->get();
    
    // print_r($this->db->last_query());
    return $rec->result_array();
  }
 public function select_PBC()
 {
   $this->db->select('*');
   $this->db->from('fabric_stock_received');
   $this->db->where("isSecond",1);
   $this->db->join('fabric','fabric.id=fabric_stock_received.fabric_id','inner');
   $this->db->order_by('parent_barcode','counter'); 
   $rec=$this->db->get();
  // echo $this->db->last_query();exit;
   return $rec->result_array();
 

 }
 
 public function select_PBC_by_id($pbc)
 {
   $this->db->select('*');
   $this->db->from('fabric_stock_received');
   $this->db->where("fsr_id",$pbc);
  
   $rec=$this->db->get();
  //  echo $this->db->last_query();exit;
   return $rec->result_array();
 

 }
public function getPBC_deatils($id)
 {
   $this->db->select('*');
   $this->db->from("fabric_stock_received");
   $this->db->where("parent_barcode",$id);
   $this->db->where("isStock",1);
   $this->db->join('fabric','fabric.id=fabric_stock_received.fabric_id','inner');
   $rec=$this->db->get(); 
   return $rec->result_array();
 

 }
 public function getPBC_by_godown($id)
 {
   $this->db->select('*');
   $this->db->from("fabric_stock_received");
   $this->db->where("parent_barcode",$id);
   $this->db->where("isStock",1);
   $this->db->join('fabric','fabric.id=fabric_stock_received.fabric_id','inner');
$this->db->join('fabric_challan','fabric_challan.fc_id=fabric_stock_received.fabric_challan_id','inner');
$rec=$this->db->get(); 
//print_r($rec->result_array());exit;   
   return $rec->result_array();
 

 }
 public function getPBC_by_type($col,$id)
 {
   $this->db->select('*');
   $this->db->from("fabric_stock_received");
   $this->db->where($col,$id);
   $this->db->where("isStock",1);
   $this->db->join('fabric','fabric.id=fabric_stock_received.fabric_id','inner');
   $rec=$this->db->get(); 
   return $rec->result_array();
 

 }
public function getfabric_details($id)
 {
   $this->db->select('fabric.fabricType,fabric.fabHsnCode,hsn.unit');
   $this->db->from("fabric");
   $this->db->where("fabric.id",$id);
   $this->db->join('hsn','fabric.fabHsnCode=hsn.hsn_code','left');
   $rec=$this->db->get(); 
  //  print_r($rec);exit;
   return $rec->result_array();
 

 }	
public function getCount($type)
 {
   $this->db->select('Max(counter) as count');
   $this->db->from("fabric_stock_received");
   $this->db->where("challan_type",$type);
   $rec=$this->db->get(); 
  //  print_r($rec);exit;
   return $rec->result_array();
 

 }	
public function getId($type)
 {
   $this->db->select('Max(counter) as count');
   $this->db->from("fabric_challan");
    $this->db->where("challan_type", $type);
   $rec=$this->db->get(); 
  //  print_r($rec);exit;
   return $rec->result_array();
 

 }
 public function getCount_by_id($id)
 {
   $this->db->select('Max(counter) as count');
   $this->db->from("fabric_stock_received");
   $this->db->where("parent",$id);
   $this->db->where("isSecond",1);
   $rec=$this->db->get(); 
  //  print_r($rec);exit;
   return $rec->result_array();
 

 }

 
 

  public function get_stock_value_by_id($id)
  {
    $this->db->select('*');
    $this->db->from('fabric_stock_received');
    $this->db->join('fabric','fabric.id=fabric_stock_received.fabric_id','inner');
    $this->db->where('fsr_id',$id);
    $rec=$this->db->get(); //print_r($rec);exit;
    return $rec->row();

  }
}

/* End of file Branch_model.php */
/* Location: ./application/models/Branch_model.php */
?>
