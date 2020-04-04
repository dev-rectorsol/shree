<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Orders_model extends CI_Model {

    public function allOrder()
		{
			$this->db->select('*');
            $this->db->from('orders');
            $this->db->order_by("id", "desc");
			$rec= $this->db->get();
			return $rec->result();

		}
		public function get_order($id)
		{

            $this->db->where('id',$id);

			$rec= $this->db->get('orders');
			// print_r($rec->result());exit;
			return $rec->result();

		}
		
       public function OrdersDelete($id)
		{
			$this->db->where('id', $id);
			$this->db->delete('order_tb');

		}
		
	
		public function Orders_Count()
		{
			$this->db->select('count(*) as total');
			$this->db->select('(SELECT count(id)
                            FROM orders
                            WHERE (status = "pending")
                            )
                            AS Pending_order',TRUE);

        $this->db->select('(SELECT count(id)
                            FROM orders
                            WHERE (status = "Processing")
                            )
                            AS Processing_order',TRUE);

        $this->db->select('(SELECT count(id)
                            FROM orders
                            WHERE (status = "Completed")
                            )
                            AS Completed_order',TRUE);
			 $this->db->from('orders');
        $query = $this->db->get();
        $query = $query->row();
			return $query;
		}

		public function Pending_Orders_Count()
		{
			$this->db->where('status', "pending");
			$res=$this->db->get('orders');
			return $res->num_rows();

		}
		public function getAllProduct()
		{
			$this->db->select('*');
            $this->db->from('customer_order');
            $this->db->order_by("customer_order_id", "desc");
			$rec= $this->db->get();
			return $rec->result();

		}
		
		
		function select($table){
				$this->db->select();
				$this->db->from($table);
				$this->db->order_by('id','ASC');
				$query = $this->db->get();
				$query = $query->result_array();
				return $query;

    }

      public function delete($id)
		{
			$this->db->where('id', $id);
	     	$this->db->delete('order_tb');
		}



		public function find_data($design_code)
		{
			$this->db->select('*');
			$this->db->from('order');
		  $this->db->where('obc',$$design_code);

			$rec=$this->db->get();
			return $rec->result_array();
			// print_r($searchValue);
			// print_r($this->db->last_query());
		}

		function get_all_order($obc){
		        $this->db->select('*');
		        $this->db->from('order_tb');
		        $this->db->where('obc', $obc);
		        $query = $this->db->get();
		        $query = $query->row();
		        return $query;


}


      function get_designcode_value($order_id){

				$this->db->select('*');
				$this->db->from('order_product');
				$this->db->where('order_id', $order_id);
				$query = $this->db->get();
				$query = $query->result_array();
			// echo $this->db->last_query();exit;
				return $query;
}
  
       public function insert($data,$table){
			$this->db->insert($table,$data);
			return $this->db->insert_id();
	}
	
	  function edit_option($action, $id, $table){
        $this->db->where('id',$id);
        $this->db->update($table,$action);
        return;
    }
    
      function get_single_value($id,$table){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('id',$id);
        $query = $this->db->get();
        $query = $query->row();
        return $query;
    }

    }
