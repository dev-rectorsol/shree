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
        <table class="table">
          <thead>
            <tr>
              <th><input type="checkbox" class="sub_chk" id="master"></th>
              <th>ORDER NUMBER</th>
              <th>TYPE</th>
              <th>DATA CATEGORY</th>
              <th>SESSION</th>
              <th>CUSTOMER NUMBER</th>
              <th>STATUS</th>
              <th>ORDER DATE</th>
              <th>ACTION</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($all_Order as $orders_value) { ?>
            <tr>
              <td><input type="checkbox" class="sub_chk" data-id="<?php echo $orders_value['order_id'] ?>"></td>
              <td><?php echo $orders_value['order_number'];?></td>
              <td><?php echo $orders_value['order_type'];?></td>
              <td><?php echo $orders_value['data_category'];?></td>
              <td><?php echo $orders_value['financial_year'];?></td>
              <td><?php echo $orders_value['customer_name'];?></td>
              <td><?php echo $orders_value['status'];?></td>
              <td><?php echo my_date_show($orders_value['order_date']);?></td>
              <td width="100">
                <a href="<?php echo base_url('admin/Orders/get_order_details/').$orders_value['order_id'] ?> ">
                    <i class="fas fa-eye"></i>
                </a>
                <a href="<?php echo '#'.$orders_value['order_id'];?>" class="text-center tip" data-toggle="modal" data-original-title="Edit">
                  <i class="fas fa-edit"></i>
                </a>
                <a class="text-danger text-center tip" href="javascript:void(0)" onclick="delete_detail(<?php echo $orders_value['order_id'];?>)" data-original-title="Delete">
                  <i class="mdi mdi-delete red"></i>
                </a>
              <div id="<?php echo $orders_value['order_id']; ?>" class="modal hide">
                <div class="modal-dialog" role="document ">
                  <div class="modal-content">
                  <form class="form-horizontal" method="post" action="<?php echo base_url('admin/Orders/edit_order_table/').$orders_value['order_id'] ?>" name="basic_validate" novalidate="novalidate">
                    <div class="modal-header">
                    <h5 class="modal-title">Edit Detail</h5>
                      <button data-dismiss="modal" class="close" type="button">×</button>

                    </div>
                    <div class="modal-body">
                      <div class="widget-content nopadding">
                        <div class="form-group row">
                          <label class="control-label col-sm-3">Customer Name</label>
                          <div class=" col-sm-9">
                            <input type="text" class="form-control" name="customer_name" value="<?php echo $orders_value['customer_name'];?>">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="control-label col-sm-3">Order_Type</label>
                          <div class=" col-sm-9">
                            <select name="order_type" class="form-control" id="selectType">
                              <option value="">Select Order Type</option>
                              <?php foreach ($all_order_type as $value): ?>
                              <option <?php if ($orders_value['order_type']==$value['orderType']) {
                              ?>selected<?php } ?> value="<?php echo $value['id'];?>"> <?php echo $value['orderType'];?></option>
                              <?php endforeach;?>

                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="control-label col-sm-3">Data  Category</label>
                          <div class=" col-sm-9">

                            <select name="data_category" class="form-control" id="Select_Category">
                              <option>Select Data Category</option>
                              <?php foreach ($data_cat as $value): ?>
                              <option <?php if ($orders_value['data_category']==$value['dataCategory']) {
                              ?>selected<?php } ?>  value="<?php echo $value['id'];?>"> <?php echo $value['dataCategory'];?></option>
                              <?php endforeach;?>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="control-label col-sm-3">Session</label>
                          <div class=" col-sm-9">
                            <select name="session" class="form-control" id='Select_Session'>
                              <option>Select Session</option>
                              <?php foreach ($all_session as $value): ?>
                              <option  <?php if ($orders_value['financial_year']==$value['financial_year']) {
                              ?>selected<?php } ?> value="<?php echo $value['id'];?>"> <?php echo $value['financial_year'];?></option>
                              <?php endforeach;?>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="control-label col-sm-3">Status</label>
                          <div class=" col-sm-9">
                          <input type="text" class="form-control" name="status" value="<?php echo $orders_value['status'];?>">
                          </div>
                        </div>
                      </div>

                      </div>

                    <div class="modal-footer">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                      <input type="submit" value="Update" class="btn btn-primary">
                      <!-- <input type="hidden" name="role" value="<?php echo $value->id;?>"> -->
                      <a data-dismiss="modal" class="btn" href="#">Cancel</a>
                    </div>
                  </form>
                  </div>
                  </div>
                </div>
              </td>
            </tr>
            <?php }?>
          </tbody>
        </table>
      </div>
    </div>

  </div>
</div>
</div>
<script>
function delete_detail(id)
{
  var del = confirm("Do you want to Delete");
  if (del == true)
  {
    var sureDel = confirm("Are you sure want to delete");
    if (sureDel == true)
    {
      window.location="<?php echo base_url()?>admin/Orders/deleteOrders/"+id;
    }

  }
}

</script>


<?php include('order_js.php');?>
