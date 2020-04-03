<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">

        <!-- **************** Product List *****************  -->
      <div class="col-md-12 bg-white" id="content_body">
        <div class="card">
                 <div class="card-body">
                     <h5 class="card-title">Order</h5>
                 </div>
                 <div class="row well">
                      &nbsp;&nbsp; &nbsp;&nbsp; <a type="button" class="btn btn-info pull-left delete_all  btn-danger" style="color:#fff;"><i class="mdi mdi-delete red"></i></a>&nbsp;

                 </div><br>
              <table class="table" >
                   <thead>
                     <tr>
                       <th><input type="checkbox" class="sub_chk" id="master"></th>
                       <th>Order Number</th>
                       <th>Customer Name</th>
                        <th>Status</th>
                       <th>Order Date</th>
                       <th>Action</th>
                     </tr>
                   </thead>
                <tbody>
                <?php foreach ($all_Order as $orders_value) { ?>
                        <tr class="gradeU order_row" id="<?php echo $orders_value['order_number']?>">
                        <td><input type="checkbox" class="sub_chk" data-id="<?php echo $orders_value['order_id'] ?>"></td>
                        <td><?php echo $orders_value['order_number'];?></td>

                        <td><?php echo $orders_value['customer_name'];?></td>
                        <!--<td><?php echo $orders_value['status'];?></td>-->
                        <td><?php echo my_date_show($orders_value['order_date']);?></td>
                        <td>

                          <a href="<?php echo '#'.$orders_value['order_id']; ?>" class="text-center tip" data-toggle="modal" data-original-title="Edit">
                          <i class="fas fa-edit blue"></i>
                          </a>

                            <a class="text-danger text-center" href="javascript:void(0)" onclick="delete_detail(<?php echo $orders_value['order_id'];?>)" ><abbr title="Delete">
                            <i class="mdi mdi-delete"></i></abbr></a>

                          <!-- <a class="text-center tip" class="text-center tip" target="_blank" href="<?php echo base_url('admin/Orders/design_print/').$orders_value['order_number'] ?>">
                            <i class="fa fa-print" aria-hidden="true"></i></a> -->
                        </td>
                       </a>
                    </tr>
                    <div id="<?php echo $orders_value['order_id']; ?>" class="modal hide" >
                        <div class="modal-dialog" role="document ">
                          <div class="modal-content">
                            <form class="form-horizontal" action="<?php echo base_url('admin/Orders/editOrders/').$orders_value['order_id'] ?>"  method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <h4 class="card-title">Edit order</h4><hr>
                                 <div class="modal-body">
                                 <div class="row" id="">
                                 <div class="col-md-9">
        								        	<label>Customer Name</label>
        								          <input type="text" class="form-control" name="customer_name" value="<?php echo $orders_value['customer_name'];?>" id="" >
        							          </div>

        							<div class="col-md-3 align-center" ><br>
                      <input type="hidden" id="get_csrf_hash" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
        						   <input type="submit" id="order_btn" class="btn btn-info btn-block" value="Edit Order" />
        							</div>
                                 </div>
                                 </div>
                            </div>
                            </form>

                          </div>
                        </div>
                   </div>

                <?php }?>


            </tbody>
  </table>
</div>
      </div>

    </div>
</div>
</div>

<script>
    function delete_detail(id) {
        var del = confirm("Do you want to Delete");
        if (del == true) {
            window.location = "<?php echo base_url()?>admin/Orders/deleteOrders/"+id;
        }
    }

</script>

<?php include('order_js.php');?>
