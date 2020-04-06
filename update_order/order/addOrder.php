<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <form method="post" action="<?php echo base_url('admin/Orders/add_new_order')?>">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><i class="fa fa-plus"></i> Create Order</h5>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-3">
                  <label>Order Type</label>
                  <select name="order_type" class="form-control" id="selectType">
                    <option value="">Select Order Type</option>
                    <?php foreach ($all_Order as $value): ?>
                    <option value="<?php echo $value['id'];?>"> <?php echo $value['orderType'];?></option>
                    <?php endforeach;?>
                  </select>
                </div>

                <div class="col-md-3">
                  <label>Session</label>
                  <select name="session" class="form-control" id='Select_Session'>
                    <option>Select Session</option>
                    <?php foreach ($all_session as $value): ?>
                    <option value="<?php echo $value['id'];?>"> <?php echo $value['financial_year'];?></option>
                    <?php endforeach;?>
                  </select>
                </div>

                <div class="col-md-3">
                  <label>Data Category</label>
                  <select name="category" class="form-control" id="Select_Category">
                    <option>Select Data Category</option>
                    <?php foreach ($data_cat as $value): ?>
                    <option value="<?php echo $value['id'];?>"> <?php echo $value['dataCategory'];?></option>
                    <?php endforeach;?>
                  </select>
                </div>
                <div class="col-md-3"> <br>

                  <button type="button" name="add_more" id="add_order" class="btn btn-success btn-md">Select Order Type</button>
                </div>
              </div>
            </div>
          </div>
          <br>
          <div id="fresh_form" class="card overflow-auto">
            <div class="card-header">
              <h5 class="card-title"><i class="fa fa-plus"></i> Enter Fresh Order Details</h5>
              <div class='pull-right' id='msg'>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-3">
                  <label>ORDER NUMBER</label>
                  <input type="text" class="form-control" name="order_number" id="order_number">
                </div>
                <div class="col-md-3">
                  <label>CUSTOMER NAME</label>
                  <input type="text" class="form-control" name="customer_name" placeholder="">
                </div>
              </div>
              <hr>
              <table class="remove_datatable">
                <thead>
                  <th>#</th>
                  <th>Unit</th>
                  <th>Quantity</th>
                  <th>priority</th>
                  <th>Order Barcode</th>
                  <th>Remark</th>
                  <th>Fabric Name</th>
                  <th>Hsn</th>
                  <th>Design Name</th>
                  <th>Design Code</th>
                  <th>Stitch</th>
                  <th>Dye</th>
                  <th>Matching</th>
                  <th>Option</th>
                </thead>
                <tbody id="fresh_data">
                  <tr>
                    <td><input type="text" class="form-control" name="serial_number[]" value="1"></td>
                    <td><input type="text" name="unit[]" class="form-control" value=""></td>
                    <td><input type="text" class="form-control" name="quantity[]" value=""></td>
                    <td> <input type="text" class="form-control" name="priority[]" value=""></td>
                    <td> <input type="text" class="form-control" name="order_barcode[]" value=""></td>
                    <td><input type="text" class="form-control" name="remark[]" value=""></td>
                    <td> <input type="text" name="fabric_name[]" class="form-control" value=""></td>
                    <td><input type="text" class="form-control" name="hsn[]" value=""></td>
                    <td><input type="text" name="design_name[]" class="form-control" value=""></td>
                    <td> <input type="text" name="design_code[]" class="form-control" value=""></td>
                    <td><input type="text" class="form-control" name="stitch[]" value=""></td>
                    <td> <input type="text" class="form-control" name="dye[]" value=""></td>
                    <td><input type="text" class="form-control" name="matching[]" value=""></td>
                    <td> <button type="button" name="add_more" id="add_more" class="btn btn-success">+</button></td>
                  </tr>
                </tbody>
              </table>
              <div class="col-md-3 align-center"><br>
                <input type="hidden" id="get_csrf_hash" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                <input type="submit" name="action" id="order_btn" class="btn btn-info btn-block" value="ORDER " />
              </div>
            </div>
          </div>
        </form>
        <br>
        <form method="post" id="order_form" action="<?php echo base_url('admin/Orders/add_fresh_data')?>">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><i class="fa fa-plus"></i> Enter PRM Order Details</h5>
            </div>
            <div class="modal-body">
              <div class="row overflow-auto" id="fresh_data">
                <div class="col-md-1">
                  <label>Sr.No.</label>
                  <input type="text" class="form-control" name="serial_number[]" value="" id="">
                </div>
                <div class="col-md-2">
                  <label>Customer Name</label>
                  <input type="text" class="form-control" name="customer_name" value="">
                </div>
                <div class="col-md-1">
                  <label>Unit</label>
                  <input type="text" class="form-control" name="unit[]" value="">
                </div>
                <div class="col-md-1">
                  <label>Quantity</label>
                  <input type="text" class="form-control" name="quantity[]" value="">
                </div>
                <div class="col-md-1">
                  <label>priority</label>
                  <input type="text" class="form-control" name="priority[]" value="">
                </div>
                <div class="col-md-2">
                  <label>Order Barcode</label>
                  <input type="text" class="form-control" name="order_barcode[]" value="">
                </div>
                <div class="col-md-1">
                  <label>Remark</label>
                  <input type="text" class="form-control" name="remark[]" value="">
                </div>
                <div class="col-md-2">
                  <label>Fabric Name</label>
                  <input type="text" class="form-control" name="fabric_name[]" value="">
                </div>
                <div class="col-md-1">
                  <label>Hsn</label>
                  <input type="text" class="form-control" name="hsn[]" value="">
                </div>
                <div class="col-md-2">
                  <label>Design Name</label>
                  <input type="text" class="form-control" name="design_name[]" value="">
                </div>
                <div class="col-md-2">
                  <label>Design Code</label>
                  <input type="text" class="form-control" name="design_code[]" value="">
                </div>
                <div class="col-md-1">
                  <label>Stitch</label>
                  <input type="text" class="form-control" name="stitch[]" value="">
                </div>
                <div class="col-md-1">
                  <label>Dye</label>
                  <input type="text" class="form-control" name="dye[]" value="">
                </div>
                <div class="col-md-2">
                  <label>Matching</label>
                  <input type="text" class="form-control" name="matching[]" value="">
                </div>
                <button type="button" name="add_more" id="add_more" class="btn btn-success float-right">+</button>
              </div>
              <hr>
              <div id="repeater">
              </div>
              <div class="col-md-3 align-center"><br>
                <input type="hidden" id="get_csrf_hash" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                <input type="submit" name="action" id="order_btn2" class="btn btn-info btn-block" value="ORDER " />
              </div>
            </div>
          </div>
        </form><br>
      </div>
    </div>
  </div>
</div>
<?php include('order_js.php');?>
