  <div class="container-fluid">

            

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
                            <li><a data-toggle="tab" href="#menu1">Pending <span class="badge"><?php echo $Order_count[0]['pending'] ?></span></a></li>
                            <li><a data-toggle="tab" href="#menu2">Completed <span class="badge"><?php echo $Order_count[0]['complete'] ?></span></a></li>
                        </ul>

                        <div class="tab-content">
                            <div id="home" class="tab-pane fade in active">
                               
                                <p><div class="col-lg-12">
                                <div class="row">

                                     <div class="col-2 m-t-15">
                                        <div class="bg-primary p-10 text-white text-center">
                                           <i class="fa fa-tag m-b-5 font-16"></i>
                                           <h5 class="m-b-0 m-t-5"><?php echo $Order_count[0]['total'] ?></h5>
                                           <small class="font-light">Total Orders</small>
                                        </div>
                                    </div>
                                    <div class="col-2 m-t-15">
                                        <div class="bg-danger p-10 text-white text-center">
                                           <i class="fa fa-table m-b-5 font-16"></i>
                                           <h5 class="m-b-0 m-t-5"><?php echo $Order_count[0]['pending'] ?></h5>
                                           <small class="font-light">Pending Orders</small>
                                        </div>
                                    </div>
                                    <div class="col-2 m-t-15">
                                        <div class="bg-warning p-10 text-white text-center">
                                           <i class="fa fa-globe m-b-5 font-16"></i>
                                           <h5 class="m-b-0 m-t-5"><?php echo $Order_count[0]['complete'] ?></h5>
                                           <small class="font-light">Completed Orders</small>
                                        </div>
                                    </div>
                                </div>
                            </div></p>
                            </div>
                            <div id="menu1" class="tab-pane fade">
                                <h3>Pending </h3>
                                <p><table class="table table-bordered data-table text-center table-responsive">
                                <thead class="">
                                    <tr class="odd" role="row">
                                        <th><input type="checkbox" class="sub_chk" id="master"></th>
                                        <th>S/No</th>
                                        <th>Series Number</th>
                                        <th>Order Number</th>
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
                                        <th>Priority</th>

                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                        $id=1;
                                        foreach ($pending as $value) { ?>
                                        <tr class="gradeU" id="tr_<?php echo $value['product_order_id']?>">

                                          <td><input type="checkbox" class="sub_chk" data-id="<?php echo $value['product_order_id'] ?>"></td>
                                          <td><?php echo $id ?></td>

                                          <td><?php echo $value['series_number']?></td>
                                          <td><?php echo $value['order_id'];?></td>
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
                                          <td><?php echo $value['priority']?></td>
                                         
                                        </tr>

                                <?php $id=$id+1; } ?>
                                </tbody>
                            </table></p>
                            </div>
                            <div id="menu2" class="tab-pane fade">
                                <h3>Completed</h3>
                                <p><table class="table table-bordered data-table text-center table-responsive">
                                <thead class="">
                                    <tr class="odd" role="row">
                                        <th><input type="checkbox" class="sub_chk" id="master"></th>
                                        <th>S/No</th>
                                        <th>Series Number</th>
                                        <th>Order Number</th>
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
                                        <th>Priority</th>

                                       
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                        $id=1;
                                        foreach ($Complete as $value) { ?>
                                        <tr class="gradeU" id="tr_<?php echo $value['product_order_id']?>">

                                          <td><input type="checkbox" class="sub_chk" data-id="<?php echo $value['product_order_id'] ?>"></td>
                                          <td><?php echo $id ?></td>

                                          <td><?php echo $value['series_number']?></td>
                                          <td><?php echo $value['order_id'];?></td>
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
                                          <td><?php echo $value['priority']?></td>
                                          
                                        </tr>

                                <?php $id=$id+1; } ?>
                                </tbody>
                            </table></p>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>

    </div>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>