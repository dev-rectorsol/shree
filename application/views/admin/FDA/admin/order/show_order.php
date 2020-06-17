<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
      <div class="col-md-12 ">
        <div class="card">
          <div class="card-body">

            <div id="accordion">

              <div class="modal-content">
                <div class="modal-header">
                  <a class="card-link" data-toggle="collapse" href="#collapseOne">
                    Simple filter
                  </a>
                </div>
                <div id="collapseOne" class="collapse show" data-parent="#accordion">
                  <div class="modal-body">
                    <form action="<?php echo base_url('/admin/Orders/filter1'); ?>" method="post">
                      <div class="form-row">
                        <div class="col-2">
                          <input type="date" name="date_from" class="form-control form-control-sm"
                            value="<?php echo date('Y-m-01')?>">
                        </div>
                        <div class="col-2">
                          <input type="date" name="date_to" class="form-control form-control-sm"
                            value="<?php echo date('Y-m-d')?>">
                        </div>
                        <div class="col-2">
                          <select id="searchByCat" name="searchByCat" class="form-control form-control-sm" required>
                            <option value="">-- Select Category --</option>
                            <option value="series_number">Series</option>
                            <option value="order_barcode">Order Barcode</option>
                            <option value="order_number">Order No</option>
                            <option value="customer_name">Customer Name</option>
                            <option value="fabric_name">Fabric Name</option>
                            <option value="hsn">Hsn</option>
                            <option value="design_name">Design Name</option>
                            <option value="design_code">Design Code</option>
                            <option value="stitch">Stitch</option>
                            <option value="dye">Dye</option>
                            <option value="matching">Matching</option>
                            <option value="remark">Remark</option>
                            <option value="quantity">quantity</option>
                            <option value="unit">Unit</option>
                            <option value="Priority">Priority</option>

                          </select>
                        </div>
                        <div class="col-2">
                          <input type="text" name="searchValue" class="form-control form-control-sm" value=""
                            placeholder="Search" required>
                        </div>
                        <input type="hidden" name="type" value="show_details"><input type="hidden" name="search" value="simple">
                        <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>"
                          value="<?=$this->security->get_csrf_hash();?>" />
                        <button type="submit" name="search" value="simple" class="btn btn-info btn-xs"> <i
                            class="fas fa-search"></i> Search</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

              <div class="modal-content">
                <div class="modal-header">
                  <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
                    Advance filter
                  </a>
                </div>
                <div id="collapseTwo" class="collapse" data-parent="#accordion">
                  <div class="modal-body">
                    <form action="<?php echo base_url('/admin/Orders/filter1'); ?>" method="post">
                      <table class=" remove_datatable">
                        <caption>Advance Filter</caption>
                        <thead>
                          <tr>
                            <th>Date_from</th>
                            <th>Date_to</th>
                            <th>Session</th>
                            <th>OrderBarc</th>
                            <th>OrderNumber</th>
                            <th>customerName</th>
                            <th>FabricName</th>
                            <th>designName</th>


                          </tr>
                        </thead>
                        <tr>
                          <td>
                            <input type="date" name="date_from" class="form-control form-control-sm"
                              value="<?php echo date('Y-m-01')?>"></td>

                          <td>
                            <input type="date" name="date_to" class="form-control form-control-sm"
                              value="<?php echo date('Y-m-d')?>"></td>
                              <td><input type="text" name="financial_year" class="form-control form-control-sm" value=""
                                  placeholder="Session"></td>

                              <td><input type="text" name="order_barcode" class="form-control form-control-sm" value=""
                                      placeholder="order barcode"></td>
                              <td><input type="text" name="order_number" class="form-control form-control-sm" value=""
                                  placeholder="order number"></td>

                                <td><input type="text" name="customer_name" class="form-control form-control-sm" value=""
                                    placeholder="customer name"></td>

                                <td><input type="text" name="fabric_name" class="form-control form-control-sm" value=""
                                    placeholder=" Fabric Name"></td>

                                <td><input type="text" name="design_name" class="form-control form-control-sm" value=""
                                    placeholder="Design Name"></td>
                        </tr>
                        <th>designCode</th>
                        <th>Stitch</th>
                        <th>Dye</th>
                        <th>matching</th>
                        <th>remark</th>
                        <th>quantity</th>
                        <th>unit</th>
                        <th>priority</th>
                        <tr>

                              <td><input type="text" name="design_code" class="form-control form-control-sm" value=""
                                  placeholder="designCode"></td>

                              <td><input type="text" name="stitch" class="form-control form-control-sm" value=""
                                      placeholder="stitch"></td>
                              <td><input type="text" name="dye" class="form-control form-control-sm" value=""
                                  placeholder="dye"></td>

                                <td><input type="text" name="matching" class="form-control form-control-sm" value=""
                                    placeholder="matching"></td>
                                <td><input type="text" name="remark" class="form-control form-control-sm" value=""
                                        placeholder="Remark"></td>

                                <td><input type="text" name="quantity" class="form-control form-control-sm" value=""
                                    placeholder="Quantity"></td>

                                <td><input type="text" name="unit" class="form-control form-control-sm" value=""
                                    placeholder="Unit"></td>

                                <td><input type="text" name="priority" class="form-control form-control-sm" value=""
                                    placeholder="Priority"></td>


                        </tr>

                      </table>
                      <input type="hidden" name="search" value="advance">
                      <input type="hidden" name="type" value="show_details">
                      <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>"
                        value="<?=$this->security->get_csrf_hash();?>" />
                      <button type="submit" name="search" value="advance" class="btn btn-info btn-xs"> <i
                          class="fas fa-search"></i> Search</button>

                    </form>
                  </div>
                </div>
              </div>



            </div>




          </div>
        </div>
      </div>

        <!-- **************** Product List *****************  -->
        <div class="col-md-12 bg-white">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Order List</h4>
                    <hr>

                    <div class="widget-box">
                        <div class="widget-content nopadding">
                            <div class="row well">
                              <div class="col-6">
                            &nbsp;&nbsp;&nbsp; <a type="button" class="btn btn-info pull-left delete_all  btn-danger" style="color:#fff;"><i class="mdi mdi-delete red"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                             <a href="<?php echo base_url('admin/Orders/back') ?>" style="">GO Back</a>
                            </div>
                              <div class="col-6">
                                <form id="frc_dateFilter" action="<?php echo base_url('/admin/Orders/date_filter'); ?>" method="post">

                                   <div class="form-row " >
                                     <div class="col-5">
                                  <label>Date From</label>
                                       <input type="date" name="date_from" class="form-control" value="<?php echo date('Y-m-d')?>"
                                         >
                                     </div>
                                     <div class="col-5">
                                   <label>Date To</label>
                                       <input type="date" name="date_to" class="form-control" value="<?php echo date('Y-m-d')?>"
                                         >
                                     </div>
                                     <div class="col-2">
                                      <label>Search</label>
                                     <input type="hidden" name="type" value="show_details">
                                     <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>"
                                       value="<?=$this->security->get_csrf_hash();?>" />
                                     <button type="submit" class="btn btn-info"> <i class="fas fa-search"></i> Search</button>
                                   </div>
                                   </div>
                                 </form>
                              </div>
                          </div><br>
                            <table class="table table-bordered data-table text-center table-responsive">
                              <caption style='caption-side : top; text-center;' class=" text-info">
                                <h6 class="text-center"> <?php echo $caption ; ?></h6>
                              </caption>
                                <thead class="">
                                    <tr class="odd" role="row">
                                        <th><input type="checkbox" class="sub_chk" id="master"></th>
                                        <th>S/No</th>
                                        <th>Series Number</th>
                                         <th>Order Barcode </th>
                                        <th>Order Number</th>
                                        <th>Customer Name</th>
                                        <th>Fabric Name</th>
                                        <th>Hsn</th>


                                        <th>Design Name</th>
                                         <th>Design Code</th>
                                        <th>Stitch</th>
                                        <th>Dye</th>
                                        <th>Matching</th>
                                        <th>Remark</th>
                                        <th>Quntity</th>
                                        <th>Unit</th>
                                        <th>Image</th>
                                        <th>Priority</th>

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                        $id=1;
                                        foreach ($all_Order as $value) { ?>
                                        <tr class="gradeU" id="tr_<?php echo $value['product_order_id']?>">

                                          <td><input type="checkbox" class="sub_chk" data-id="<?php echo $value['product_order_id'] ?>"></td>
                                          <td><?php echo $id ?></td>

                                          <td><?php echo $value['series_number']?></td>
                                          <td><?php echo $value['order_barcode'];?></td>
                                          <td><?php echo $value['order_number'];?></td>

                                          <td><?php echo $value['customer_name'];?></td>
                                          <td><?php echo $value['fabric_name'];?></td>
                                          <td><?php echo $value['hsn'];?></td>

                                          <td><?php echo $value['design_name']?></td>
                                          <td><?php echo $value['design_code']?></td>
                                          <td><?php echo $value['stitch']?></td>
                                          <td><?php echo $value['dye']?></td>
                                          <td><?php echo $value['matching']?></td>
                                          <td><?php echo $value['remark']?></td>
                                          <td><?php echo $value['quantity']?></td>
                                          <td><?php echo $value['unit']?></td>
                                          <td><?php echo $value['image']?></td>
                                          <td><?php echo $value['priority']?></td>
                                          <td>

                                            <a href="<?php echo base_url('admin/Orders/edit_order_product_details/').$value['product_order_id'] ?> ">
                                              <i class="fas fa-edit"></i>
                                            </a>
                                            <a class="text-danger text-center tip" href="javascript:void(0)" onclick="delete_detail(<?php echo $value['product_order_id'];?>)" data-original-title="Delete">
                                              <i class="mdi mdi-delete red"></i>
                                            </a>

                                          </td>
                                        </tr>

                                <?php $id=$id+1; } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


<script>
    function delete_detail(id) {
        var del = confirm("Do you want to Delete");
        if (del == true) {
            window.location = "<?php echo base_url()?>admin/Orders/deleteOrders/" + id;
        }
    }

</script>

<?php include('order_js.php');?>
