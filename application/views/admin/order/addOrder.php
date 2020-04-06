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
                <div class="col-md-3">
                  <button type="button" name="add_more" id="add_order" class="btn btn-success btn-md">Select Order Type</button>
                </div>
              </div>
            </div>
          </div>
          <br>
          <div id="order_form" class="card overflow-auto">
            <div class="card-header">
              <h5 class="card-title"><i class="fa fa-plus"></i>ENTER NEW ORDER DETAILS</h5>
              <div class='pull-right msg'>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-3">
                  <label>ORDER NUMBER</label>
                  <input type="text" class="form-control order_number" name="order_number" required>
                </div>
                <div class="col-md-3">
                  <label>CUSTOMER NAME</label>
                  <input type="text" class="form-control" name="customer_name" placeholder="">
                </div>
              </div>
              <hr>
              <table id="fresh_form" class="remove_datatable">
                <thead>
                  <th>#</th>
                  <th>Fabric Name</th>
                  <th>Hsn</th>
                  <th>Design Name</th>
                  <th>Design Code</th>
                  <th>Stitch</th>
                  <th>Dye</th>
                  <th>Matching</th>
                  <th>Unit</th>
                  <th>Quantity</th>
                  <th>priority</th>
                  <th>Order Barcode</th>
                  <th>Remark</th>
                  <th>Option</th>
                </thead>
                <tbody id="fresh_data">
                  <tr>
                    <td><input type="text" class="form-control" name="serial_number[]" value="1"></td>
                    <td> <input type="text" name="fabric_name[]" class="form-control" value=""></td>
                    <td><input type="text" class="form-control" name="hsn[]" value=""></td>
                    <td><input type="text" name="design_name[]" class="form-control" value=""></td>
                    <td> <input type="text" name="design_code[]" class="form-control" value=""></td>
                    <td><input type="text" class="form-control" name="stitch[]" value=""></td>
                    <td> <input type="text" class="form-control" name="dye[]" value=""></td>
                    <td><input type="text" class="form-control" name="matching[]" value=""></td>
                    <td><input type="text" name="unit[]" class="form-control" value=""></td>
                    <td><input type="text" class="form-control" name="quantity[]" value=""></td>
                    <td> <input type="text" class="form-control" name="priority[]" value=""></td>
                    <td> <input type="text" class="form-control" name="order_barcode[]" value=""></td>
                    <td><input type="text" class="form-control" name="remark[]" value=""></td>
                    <td> <button type="button" name="add_more" id="add_more" class="btn btn-success">+</button></td>
                  </tr>
                </tbody>
              </table>
              <table id="prm_form" class="remove_datatable">
                <thead>
                  <th>#</th>
                  <th>old Barcode</th>
                  <th>Fabric Name</th>
                  <th>Hsn</th>
                  <th>Design Name</th>
                  <th>Design Code</th>
                  <th>Stitch</th>
                  <th>Dye</th>
                  <th>Matching</th>
                  <th>Unit</th>
                  <th>Quantity</th>
                  <th>priority</th>
                  <th>Order Barcode</th>
                  <th>Remark</th>
                  <th>Option</th>
                </thead>
                <tbody id="prm_data">
                  <tr>
                    <td><input type="text" class="form-control" name="serial_number[]" value="1"></td>
                    <td> <input type="text" name="old_barcode[]" class="form-control" value=""></td>
                    <td> <input type="text" name="fabric_name[]" class="form-control" value=""></td>
                    <td><input type="text" class="form-control" name="hsn[]" value=""></td>
                    <td><input type="text" name="design_name[]" class="form-control" value=""></td>
                    <td> <input type="text" name="design_code[]" class="form-control" value=""></td>
                    <td><input type="text" class="form-control" name="stitch[]" value=""></td>
                    <td> <input type="text" class="form-control" name="dye[]" value=""></td>
                    <td><input type="text" class="form-control" name="matching[]" value=""></td>
                    <td><input type="text" name="unit[]" class="form-control" value=""></td>
                    <td><input type="text" class="form-control" name="quantity[]" value=""></td>
                    <td> <input type="text" class="form-control" name="priority[]" value=""></td>
                    <td> <input type="text" class="form-control" name="order_barcode[]" value=""></td>
                    <td><input type="text" class="form-control" name="remark[]" value=""></td>
                    <td> <button type="button" name="add_more" id="add_more_prm" class="btn btn-success">+</button></td>
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
      </div>
    </div>
  </div>
</div>
<?php include('order_js.php');?>
