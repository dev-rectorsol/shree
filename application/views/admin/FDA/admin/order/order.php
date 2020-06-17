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
                          <option value="financial_year">SESSION</option>
                          <option value="order_number">Order No</option>
                          <option value="customer_name">Customer Name</option>
                          <option value="order_type">Type</option>
                          <option value="data_category">Data Category</option>
                        </select>
                      </div>
                      <div class="col-2">
                        <input type="text" name="searchValue" class="form-control form-control-sm" value=""
                          placeholder="Search" required>
                      </div>
                      <input type="hidden" name="type" value="show"><input type="hidden" name="search" value="simple">
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
                          <th>Order Number</th>
                          <th>customer Name</th>
                          <th>type</th>
                          <th>Datacategory</th>
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

                            <td><input type="text" name="order_number" class="form-control form-control-sm" value=""
                                    placeholder="order number"></td>

                              <td><input type="text" name="customer_name" class="form-control form-control-sm" value=""
                                        placeholder="customer name"></td>

                              <td><input type="text" name="order_type" class="form-control form-control-sm" value=""
                                            placeholder="order type"></td>

                              <td><input type="text" name="data_category" class="form-control form-control-sm" value=""
                                                placeholder="data category"></td>
                      </tr>

                    </table>
                    <input type="hidden" name="search" value="advance">
                    <input type="hidden" name="type" value="show">
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
    <div class="col-md-12 bg-white" id="content_body">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Order</h5>
        </div>
        <div class="row well">
          <div class="col-6">
          &nbsp;&nbsp; &nbsp;&nbsp; <a type="button" class="btn btn-info pull-left delete_all  btn-danger" style="color:#fff;"><i class="mdi mdi-delete red"></i></a>&nbsp;
         </div>
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
                                            <input type="hidden" name="type" value="show">
                                           <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>"
                                             value="<?=$this->security->get_csrf_hash();?>" />
                                           <button type="submit" class="btn btn-info"> <i class="fas fa-search"></i> Search</button>
                                         </div>
                                         </div>
                                       </form>
        </div>
        </div><br>
        <table class="table">
          <caption style='caption-side : top' class=" text-info">
            <h6 class="text-center"> <?php echo $caption ; ?></h6>
          </caption>
          <thead>
            <tr>
              <th><input type="checkbox" class="sub_chk" id="master"></th>
              <th>SESSION</th>
              <th>ORDER DATE</th>
              <th>ORDER NUMBER</th>



              <th>CUSTOMER NUMBER</th>
              <th>TYPE</th>
              <th>DATA CATEGORY</th>
              <th>STATUS</th>

              <th>ACTION</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($all_Order as $orders_value) { ?>
            <tr>
              <td><input type="checkbox" class="sub_chk" data-id="<?php echo $orders_value['order_id'] ?>"></td>
               <td><?php echo $orders_value['financial_year'];?></td>
              <td><?php echo my_date_show($orders_value['order_date']);?></td>
              <td><?php echo $orders_value['order_number'];?></td>
              <td><?php echo $orders_value['customer_name'];?></td>
              <td><?php echo $orders_value['order_type'];?></td>
              <td><?php echo $orders_value['data_category'];?></td>
              <td><?php echo $orders_value['status'];?></td>

              <td>
                <a href="<?php echo base_url('admin/orders/get_details/').serve_url($orders_value['order_id']) ?> ">
                  View
                </a>
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



<?php include('order_js.php');?>
