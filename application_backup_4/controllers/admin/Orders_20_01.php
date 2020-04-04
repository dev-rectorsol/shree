  <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Orders extends CI_Controller {

	public function __construct(){
        parent::__construct();
        //check_login_user();
       $this->load->model('common_model');
       $this->load->model('login_model');
       $this->load->model('Orders_model');
       $this->load->library('barcode');
	   $this->load->library('pdf');
    }
    public function index()
    {
       $data = array();
        // $data['page_title'] = 'User';
        $data['name'] = 'Orders';
		$data['all_session'] = $this->Orders_model->select('session');
		 $data['all_Order'] = $this->Orders_model->select('order_tb');
        $data['main_content'] = $this->load->view('admin/order/order', $data, TRUE);
        $this->load->view('admin/index', $data);
    }
    public function addOrders()
    {
       $data = array();
        // $data['page_title'] = 'User';
        $data['name'] = 'Add Orders';
        // $data['power'] = $this->common_model->get_all_power('user_power');
        $data['all_Order'] = $this->Orders_model->select('order_type');
		$data['all_session'] = $this->Orders_model->select('session');
		$data['old_barcode'] = $this->Orders_model->select('order_tb');
		$data['designcode'] = $this->Orders_model->select('order_tb');
			//	echo print_r(	$data['all_session']);exit;
        $data['main_content'] = $this->load->view('admin/order/addOrder', $data, TRUE);
        $this->load->view('admin/index', $data);
    }



    public function editOrders($id)
    {
      $data = array();
        $data['name'] = 'Edit Order';
        $data['power'] = $this->common_model->get_all_power('user_power');
        $data['data'] = $this->Orders_model->get_single_value($id,'order_tb');

        $data['main_content'] = $this->load->view('admin/order/edit_order', $data, TRUE);
        $this->load->view('admin/index', $data);
    }


   public function update_orders($id)
    {
      $data = array();
        $data['name'] = 'Update Order';
        $data['power'] = $this->common_model->get_all_power('user_power');
        $status= $this->input->post('status');
         $data['all_Order'] = $this->Orders_model->editOrder($id,$status);
         redirect(base_url('admin/Orders/getOrders'));

    }

    public function deleteOrders($id)
    {
      $this->Orders_model->OrdersDelete($id);
      redirect(base_url('admin/Orders'));
    }

    public function hideOrders($id)
    {
      $data=array(
        'status'=> '0'
      );
      $this->Orders_model->hideOrders($id,$data);
      redirect(base_url('admin/Orders/addOrders'));
    }
    public function showOrders($id)
    {
      // print_r($id); exit();
      $data=array(
        'status'=> '1'
      );
      $this->Orders_model->hideOrders($id,$data);
      redirect(base_url('admin/Orders/addOrders'));
    }

    public function getOrderProduct(){
      $data = array();
        $data['name'] = 'User';
        $data['power'] = $this->common_model->get_all_power('user_power');
         $data['all_Order'] = $this->Orders_model->getAllProduct();
        $data['main_content'] = $this->load->view('admin/order/product_order', $data, TRUE);
        $this->load->view('admin/index', $data);
    }
// 		public function get_old_barcode()
// 	    {
// 					if ($_POST) {
// 						$output = '';
// 						$data = $this->Orders_model->get_all_order($_POST['obc']);
// 						 // echo print_r($data);exit;
//
// 							$output .= '<div class="col-md-3">
// 									<label>Sr.No.</label>
// 									<input type="hidden" class="form-control"  name="parent_id" value="'.$data->id.'" id="">
// 								<input type="text" class="form-control" name="serial_number" value="'.$data->serial_number.'" id="" >
// 							</div>
//
// 							<div class="col-md-3">
// 									<label>Fabric Name</label>
// 									<input type="text" class="form-control" name="fabric_name" value="'.$data->fabric_name.'">
// 							</div>
//
// 							<div class="col-md-3">
// 									<label>Hsn</label>
// 									<input type="text" class="form-control" name="hsn" value="'.$data->hsn.'">
// 							</div>
//
// 							<div class="col-md-3">
// 									<label>Order Number</label>
// 									<input type="text" class="form-control" name="order_number"  value="'.$data->order_number.'">
// 							</div>
//
// 							<div class="col-md-3">
// 									<label>Customer Name</label>
// 									<input type="text" class="form-control" name="customer_name" value="'.$data->customer_name.'">
// 							</div>
// 							<div class="col-md-3">
// 									<label>Design Barcode</label>
// 									<input type="text" class="form-control" name="dbc" value="'.$data->dbc.'">
// 							</div>
// 							<div class="col-md-3">
// 									<label>Design Name</label>
// 									<input type="text" class="form-control" name="design_name" value="'.$data->design_name.'">
// 							</div>
// 							<div class="col-md-3">
// 									<label>Design Code</label>
// 									<input type="text" class="form-control" name="design_code" value="'.$data->design_code.'">
// 							</div>
//
// 							<div class="col-md-3">
// 									<label>Stitch</label>
// 									<input type="text" class="form-control" name="stitch" value="'.$data->stitch.'">
// 							</div>
// 							<div class="col-md-3">
// 									<label>Dye</label>
// 									<input type="text" class="form-control" name="dye" value="'.$data->dye.'">
// 							</div>
//
// 							<div class="col-md-3">
// 									<label>Matching</label>
// 									<input type="text" class="form-control" name="matching" value="'.$data->matching.'">
// 							</div>
//
// 							<div class="col-md-3">
// 									<label>Remark</label>
// 									<input type="text" class="form-control" name="remark" value="'.$data->remark.'">
// 							</div>
//
// 							<div class="col-md-3">
// 									<label>Quntity</label>
// 									<input type="text" class="form-control" name="quantity" value="'.$data->quantity.'">
// 							</div>
// 							<div class="col-md-3">
// 									<label>Unit</label>
// 									<input type="text" class="form-control" name="unit" value="'.$data->unit.'">
// 							</div>
//
// 							<div class="col-md-3">
// 									<label>Order Barcode</label>
// 									<input type="text" class="form-control" name="order_barcode" value="'.$data->order_barcode.'">
// 							</div>
//
// 							<div class="col-md-3">
// 									<label>priority</label>
// 									<input type="text" class="form-control" name="priority"  value="'.$data->priority.'">
// 							</div>
//
// 							<div class="col-md-3 align-center" ><br>
//                  <input type="hidden" id="get_csrf_hash" name="'.$this->security->get_csrf_token_name().'" value="'.$this->security->get_csrf_hash().'">
// 									<input type="submit" name="action" id="order_btn" class="btn btn-info btn-block"
// 											value="ORDER" />
// 							</div>
// ';
//
// 						echo json_encode($output);
// 					}else{
//
// 					}
//
// 	    }

			public function get_designcode()
				{
						if ($_POST) {
							$output = '';
							$data_value = $this->Orders_model->get_designcode_value($_POST['order_id']);
			    					 // echo print_r($data);exit;
             foreach($data_value as $data)
         {

								$output .= '

										<div class="col-sm-2"><label>Sr.No.</label> <input type="text" class="form-control" name="serial_number" value="'.$data['series_number'].'"></div>
										<div class="col-sm-2"><label>Customer Name</label>  <input type="text" class="form-control" name="customer_name[]" value="'.$data['customer_name'].'"></div>
										<div class="col-sm-1">  <label>Unit</label><input type="text" class="form-control" name="unit" value="'.$data['unit'].'"></div>
										<div class="col-sm-1">  <label>Quntity</label>  <input type="text" class="form-control" name="quantity" value="'.$data['quantity'].'"></div>
										<div class="col-md-1"><label>priority</label>  <input type="text" class="form-control" name="priority"  value="'.$data['priority'].'"></div>
										<div class="col-md-2"><label>Order Barcode</label>  <input type="text" class="form-control" name="order_barcode" value="'.$data['product_order_id'].'"></div>
										<div class="col-md-1"> <label>Remark</label>  <input type="text" class="form-control" name="remark" value="'.$data['remark'].'"></div>
										<div class="col-md-2"><label>Design Code</label>  <input type="text" class="form-control" name="design_code" value="'.$data['design_code'].'"></div>
										<div class="col-md-2"><label>Fabric Name</label><input type="text" class="form-control" name="fabric_name" value="'.$data['fabric_name'].'"></div>
										<div class="col-md-1"> <label>Hsn</label>  <input type="text" class="form-control" name="hsn" value="'.$data['hsn'].'"></div>
										<div class="col-md-2"> <label>Design Name</label> <input type="text" class="form-control" name="design_name" value="'.$data['design_name'].'"></div>
										<div class="col-md-1"> <label>Stitch</label> <input type="text" class="form-control" name="stitch" value="'.$data['stitch'].'"></div>
										<div class="col-md-1">  <label>Dye</label>   <input type="text" class="form-control" name="dye" value="'.$data['dye'].'"></div>
										<div class="col-md-3"> <label>Matching</label> <input type="text" class="form-control" name="matching" value="'.$data['matching'].'"></div>
                    <div class="col-md-2"><br><button type="button" name="remove"  class="btn btn-danger btn_remove">X</button></div></div>

		';

}
							echo json_encode($output);
						}else{

						}

				}


			// public function add_order_data()
			// {
			// 	if ($_POST)
			// 	{
			// 		$data=array(
			// 			'parent_id'=>$_POST['parent_id'],
			// 			'obc'=>$_POST['obc'],
			// 			'serial_number'=>$_POST['serial_number'],
			// 			'fabric_name'=>$_POST['fabric_name'],
			// 			'hsn'=>$_POST['hsn'],
			// 			'order_number'=>$_POST['order_number'],
			// 			'customer_name'=>$_POST['customer_name'],
			// 			'dbc'=>$_POST['dbc'],
			// 			'design_name'=>$_POST['design_name'],
			// 			'design_code'=>$_POST['design_code'],
			// 			'stitch'=>$_POST['stitch'],
			// 			'dye'=>$_POST['dye'],
			// 			'matching'=>$_POST['matching'],
			// 			'remark'=>$_POST['remark'],
			// 			'quantity'=>$_POST['quantity'],
			// 			'unit'=>$_POST['unit'],
			// 			'order_barcode'=>$_POST['order_barcode'],
			// 			'priority'=>$_POST['priority'],
			// 			'created_at'=>date('Y-m-d'),
			// 			'update_at'=>date('Y-m-d')
			//
			// 		);
			// 		// print_r($data);
			// 		$this->Orders_model->insert($data,'order_tb');
			// 		redirect(base_url('admin/Orders/addOrders'));
			//
			// 	}
			// }

// 			public function add_fresh_data()
// 			{
// 				if ($_POST)
// 				{
// 					 $count = implode(",", $_POST['value']);
// 					 // echo $count;exit;
//
// 						 //  echo "<pre>";
// 						 // echo print_r($row_data);exit;
//
//
// 					$data=array(
// 						'count' =>$count,
// 						'order_number'=>$_POST['order_number'],
// 						'customer_name'=>	$_POST["customer_name"],
// 						'order_date'=>date('Y-m-d'),
// 					);
// 					$order_number =	$this->Orders_model->insert($data,'order_table');
// 					// echo $order_number;exit;
// 					if($order_number)
// 					{
//           $co=count($_POST['value']);
// 						for($i=0;$i<$co;$i++){
// 							 // echo print_r($value);
// 							  $data=array(
// 								  	'order_id' => $order_number,
// 										'series_number'=>$_POST['serial_number'],
// 										'unit'=>$_POST['unit'],
// 										'quantity'=>$_POST['quantity'],
// 										'priority'=>$_POST['priority'],
// 										'order_barcode'=>$_POST['order_barcode'],
// 										'design_name'=>$_POST['design_name'],
// 										'design_code'=>$_POST['design_code'],
// 										'remark'=>$_POST['remark'],
// 										'fabric_name'=>$_POST['fabric_name'],
// 										'hsn'=>$_POST['hsn'],
// 										'stitch'=>$_POST['stitch'],
// 										'dye'=>$_POST['dye'],
// 										'matching'=>$_POST['matching']
// 									);
// 									// print_r($data);
// 									$this->Orders_model->insert($data,'order_product');
//
// 						}
//
//
// 			}
// 		}
// 			redirect(base_url('admin/Orders/addOrders'));
// }
public function add_fresh_data()
{
	if($_POST)
	{
	  	 // echo "<pre>";
		   // echo print_r($_POST);exit;

		$data=array(
			'order_number'=>$_POST['order_number'],
			'customer_name'=>$_POST['customer_name'],
			'order_date'=>date('Y-m-d')
		);
 // echo print_r($value);exit;
		$order_number =	$this->Orders_model->insert($data,'order_table');
		// echo $order_number;exit;
		if ($order_number) {
       $count = count($_POST['count']);
      // echo $count;exit;
		   // echo "<pre>";
			 // echo print_r($multiple);exit();
				// echo print_r($value);exit;

			for($i = 0; $i<$count; $i++){
						 // echo $value;exit;
					$data=array(
							// 'order_id' =>$order_number,
              'order_id' =>$order_number,
							'series_number' =>$_POST['serial_number'][$i],
							'unit' =>$_POST['unit'][$i],
							'quantity' =>$_POST['quantity'][$i],
							'priority' =>$_POST['priority'][$i],
							'order_barcode' =>$_POST['order_barcode'][$i],
							'design_name' =>$_POST['design_name'][$i],
							'design_code' =>$_POST['design_code'][$i],
							'remark' =>$_POST['remark'][$i],
							'fabric_name'=>$_POST['fabric_name'][$i],
							'hsn'=>$_POST['hsn'][$i],
							'stitch'=>$_POST['stitch'][$i],
							'dye'=>$_POST['dye'][$i],
							'matching'=>$_POST['matching'][$i]
						);
						 // echo print_r($value);exit;
						// print_r($data);
						$this->Orders_model->insert($data,'order_product');

}
}
           redirect(base_url('admin/Orders/addOrders'));
}

}

                public function design_print($id){
		     	$data['data'] = $this->Orders_model->get_single_value($id,'order_tb');

				$data['bar']=$ojbect = $this->barcode->getBarCode('$data->designCode');
				$data['bar']=$ojbect->getBarcodeHTML(2, 30, 'black');
						 // echo print_r($data['bar']);exit;
		     	$data['pdf'] = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		     	$this->load->view('admin/order/print', $data);
		     }

		       public function delete($id)
            {
                $this->Customer_model->delete($id);
                redirect(base_url('admin/Orders'));
            }

		     public function deleteorder(){
		     $ids = $this->input->post('ids');
		     $userid= explode(",", $ids);
		     foreach ($userid as $value) {
			 $this->db->delete('order_tb', array('id' => $value));
		}
	}

  }
