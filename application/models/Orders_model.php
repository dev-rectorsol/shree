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
public function get_design_name()
 {
   $this->db->select('distinct(designName)');
   $this->db->from('design');
   $query = $this->db->get();
   $query = $query->result_array();
   return $query;
 }
 public function get_order($order_id)
 {

   $this->db->select('*');
   $this->db->from('order_table');
   $this->db->join('order_product ','order_table.order_id = order_product.order_id','inner');
   $this->db->where('order_table.order_id', $order_id);
   $query = $this->db->get();
   $query = $query->result_array();
   return $query;
 }
 public function get_order_complete()
 {

   $this->db->select('*');
   $this->db->from('order_product');
   $this->db->where('status', 0);
   $query = $this->db->get();
   $query = $query->result_array();
   return $query;
 }
 public function get_order_pending()
 {

   $this->db->select('*');
   $this->db->from('order_product');
   $this->db->where('status', 1);
   $query = $this->db->get();
   $query = $query->result_array();
   return $query;
 }
 public function get_order_count()
 {

        $this->db->select('count(*) as total');
        $this->db->select('(SELECT count(order_id)
                            FROM order_product
                            WHERE (status = 1)
                            )
                            AS pending',TRUE);

        $this->db->select('(SELECT count(order_id)
                            FROM order_product
                            WHERE (status = 0)
                            )
                            AS complete',TRUE);

         $this->db->from('order_product');
   
   $query = $this->db->get();
  
   return $query->result_array();
 }
  public function checkorder($order){

        $this->db->select('*');

        $this->db->from('order_table');

        $this->db->where('order_number', $order);

        $this->db->limit(1);

        $query = $this->db->get();

        if($query->num_rows() == 1) {

            return $query->result();

        }else{

            return false;

        }

    }
 public function get_design_code()
 {
   $this->db->select('distinct(designCode)');
   $this->db->from('design');
   $query = $this->db->get();
   $query = $query->result_array();
   return $query;
 }
 public function get_unit()
 {
   $this->db->select('distinct(unitName)');
   $this->db->from('unit');
   $query = $this->db->get();
   $query = $query->result_array();
   return $query;
 }
       public function OrdersDelete($id)
					{
						$this->db->where('product_order_id', $id);
						$this->db->delete('order_product');
					}

				public function OrdersDelete_table($id)
						{
							$this->db->where('order_id', $id);
							$this->db->delete('order_table');

						}

		public function Pending_Orders_Count()
			{
				$this->db->where('status', "pending");
				$res=$this->db->get('orders');
				return $res->num_rows();

			}

			function get_order_value(){
				$sql = 'SELECT order_table.order_id order_id, order_table.order_number order_number, order_table.customer_name customer_name, order_table.status status, order_table.order_date order_date, data_category.dataCategory data_category, session.financial_year financial_year, order_type.orderType  order_type  FROM order_table
								INNER JOIN data_category ON order_table.data_category = data_category.id
								INNER JOIN session ON session.id = order_table.session
								INNER JOIN order_type ON order_type.id = order_type.id
								GROUP BY order_table.order_number';
				$query = $this->db->query($sql);
				$query = $query->result_array();
				return $query;
	    }


		function select($table){
				$this->db->select('*');
				$this->db->from($table);
				$this->db->join('order_table', 'order_table.order_number = order_table.order_number');
				$query = $this->db->get();
				$query = $query->result_array();
				return $query;

                 }

		function select_order_product($id){
				$this->db->select('product_order_id,order_id,series_number,customer_name,unit,quantity,priority,order_barcode,remark,design_code,fabric_name,hsn,design_name,stitch,dye,matching');
				$this->db->from('order_product');
				$this->db->where('order_id',$id);
				$this->db->order_by('order_id','DESC');
				$query = $this->db->get();
				$query = $query->result_array();
				return $query;
		         }

    	function select_order_type($table){
				$this->db->select('*');
				$this->db->from($table);
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
		function edit_order($action, $id, $table){
				$this->db->where('order_id',$id);
				$this->db->update($table,$action);
				return;
		}

      function get_single_value($id,$table){
        $this->db->select('*');
        $this->db->from($table);
				$this->db->join('order_table', 'order_table.order_number = order_table.order_number');
        $this->db->where('product_order_id',$id);
        $query = $this->db->get();
				//echo $this->db->last_query();exit;
        $query = $query->row();
        return $query;
    }



	function get_order_number($name){
			$this->db->select('order_number');
			$this->db->from('order_table');
			$this->db->like('order_number', $name);
			$query = $this->db->get();
			$query = $query->result_array();
			return $query;
    }
    // function getLastId(){
		//     			$this->db->select("order_id");
		//     			$this->db->from('order_product');
		//     			$this->db->order_by('order_id','DESC');
		//     			$this->db->limit(1);
		//     			$query = $this->db->get();
		//     			$query = $query->row();
		//     			return $query;
		//     		}
		function getLastId(){
							$this->db->select("order_number,customer_name	");
							$this->db->from('order_table');
							$this->db->order_by('order_id','DESC');
							$this->db->limit(1);
							$query = $this->db->get();
							$query = $query->row();
							return $query;
						}
						function get_prm_data($order_number){
											$this->db->select('');
											$this->db->from('order_product');
										  $this->db->where('order_id',$order_number);
											$query = $this->db->get();
											$query = $query->result_array();
											return $query;
										}



		  function get_order_detail_value($id,$table){
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where('order_id',$id);
			$query = $this->db->get();
			//echo $this->db->last_query();exit;
			$query = $query->result_array();
			return $query;
	}

	public function update($id,$data)
	{
		 // print_r($designName);
		 // print_r($data);exit;
		$this->db->where('product_order_id', $id);
		$this->db->update('order_product', $data);
		return true;
	}

	public function get_order_by_id($order_id)
	 	{

	   $this->db->select('*');
	   $this->db->from('order_table');
	   $this->db->join('order_product ','order_table.order_id = order_product.order_id','inner');
	   $this->db->where('order_table.order_number', $order_id);
	   $query = $this->db->get();
	   $query = $query->result_array();
	   return $query;
	 	}

		public function last_id(){
		   $this->db->select('max(id) AS last_id');
		   $this->db->from('order_product');
			 $query = $this->db->get();
		   $query = $query->row();
			 return $query->last_id;
		}
}
