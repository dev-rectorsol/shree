<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">


                <form method="post" id="order">
                    <div class="modal-content">
                        <div class="modal-header">

                            <h5 class="modal-title"><i class="fa fa-plus"></i> Create Order</h5>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                              <div class="col-md-3">
                                  <label>Order Type</label>
                                  <select name="order_type"  class="form-control" id="selectType">
                                  <option value="">Select Order Type</option>
                                  <?php foreach ($all_Order as $value): ?>
                                    <option value="<?php echo $value['orderType'];?>"> <?php echo $value['orderType'];?></option>
                                 <?php endforeach;?>
                                  </select>
                              </div>

                                <div class="col-md-3">
                                    <label>Session</label>
                                    <select name="" class="form-control">
                                        <option>Select Session</option>
                                        <?php foreach ($all_session as $value): ?>
                                          <option value="<?php echo $value['financial_year'];?>"> <?php echo $value['financial_year'];?></option>
                                       <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </form><br>
                <form method="post" id="fresh_form" action="<?php echo base_url('admin/Orders/add_fresh_data')?>">
                    <div class="modal-content">
                        <div class="modal-header">
                          <div class="col-md-3">
                              <label>Enter Order Number</label>
                              <input type="text" class="form-control" name="order_number" required>
                        <input type="hidden" name="count[]" value="'+Math.floor((Math.random() * 10000) + 1)+'">
                          </div>
                          <div class="col-md-2"><br/>
                            <button type="button" name="add" id="add_fresh" class="btn  btn-primary btn-round">Add </button>
                          </div>

                        </div>
                        <div class="modal-body">
                            <div class="row" id="fresh_data">
                              <div class="col-md-1">
                                 <label>Sr.No.</label>
                                 <input type="text" class="form-control" name="serial_number[]" value="" id="" >
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
                                  <label>Quntity</label>
                                  <input type="text" class="form-control" name="quantity[]" value="">
                              </div>
                               <div class="col-md-1">
                                  <label>priority</label>
                                  <input type="text" class="form-control" name="priority[]"  value="">
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


                            </div>
                         <div class="row"><br><br>
                             <div class="form-group" id="fresh_field"></div>
                         </div>

                          <div class="col-md-3 align-center" ><br>
                              <input type="hidden" id="get_csrf_hash" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                              <input type="submit" name="action" id="order_btn" class="btn btn-info btn-block"
                              value="ORDER " />
                          </div>
                        </div>
                          </div>
                </form><br>

                <form method="post" id="order_form" action="<?php echo base_url('')?>">
                    <div class="modal-content">
                        <div class="modal-header">
                          <div class="col-md-3">
                              <label>Enter Old Order</label>
                              <!-- <select name="obc" class="form-control" id="old_barcode">
                                  <option>Select Old barcode</option>
                              <?php foreach ($old_barcode as $value): ?>
                                <option value="<?php echo $value['obc'];?>"> <?php echo $value['obc'];?></option>
                              <?php endforeach;?>
                              </select> -->
                              <input type="text" class="form-control" name="order_number[]" value="" id="order_id" >

                          </div>

                          <div class="col-md-2"><br/>
                            <button type="button" name="add" id="add_prm" class="btn  btn-primary btn-round">Add </button>
                          </div>

                        </div>
                        <div class="modal-body" >
                            <div class="row" id="order_value">


                            </div>
                          <div class="row"><br><br>
                             <div class="form-group" id="prm_field"></div>
                          </div>

                          <div class="col-md-3 align-center" id="rd_bt"><br>
                             <input type="hidden" id="get_csrf_hash" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                             <input type="submit" name="action"  class="btn btn-info btn-block" value="ORDER" />
                          </div>

                            </div>
                        </div>

                      </div>
                </form>

            </div>

          </div>
     </div>
</div>
<?php include('order_js.php');?>
