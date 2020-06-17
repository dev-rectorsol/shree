
<div id="content">
<div id="content-header">
<div class="container-fluid">
 <div class="row">
    <div class="col-md-8">
        <div class="card">
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
                        <form action="<?php echo base_url('/admin/erc/filter1'); ?>" method="post">
                          <div class="form-row">
                            <div class="col-3">
                              <input type="date" name="date_from" class="form-control form-control-sm"
                                value="<?php echo date('Y-m-01')?>">
                            </div>
                            <div class="col-3">
                              <input type="date" name="date_to" class="form-control form-control-sm"
                                value="<?php echo date('Y-m-d')?>">
                            </div>
                            <div class="col-2">
                              <select id="searchByCat" name="searchByCat" class="form-control form-control-sm" required>
                                <option value="">-- Select Category --</option>
                                <option value="desName">Design Name</option>
                                <option value="desCode">Design Code</option>
                                <option value="rate">Emb Rate</option>

                              </select>
                            </div>
                            <div class="col-2">
                              <input type="text" name="searchValue" class="form-control form-control-sm" value=""
                                placeholder="Search" required>
                            </div>
                            <input type="hidden" name="type" value="erc">
                            <input type="hidden" name="search" value="simple">
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
                        <form action="<?php echo base_url('/admin/erc/filter1'); ?>" method="post">
                          <table class=" remove_datatable">
                            <caption>Advance Filter</caption>
                            <thead>
                              <tr>
                                <th>Date_from</th>
                                <th>Date_to</th>
                                <th>Design Name</th>
                                <th>design Code</th>
                                <th>Emb Rate</th>

                              </tr>
                            </thead>
                            <tr>
                              <td>
                                <input type="date" name="date_from" class="form-control form-control-sm"
                                  value="<?php echo date('Y-m-01')?>"></td>

                              <td>
                                <input type="date" name="date_to" class="form-control form-control-sm"
                                  value="<?php echo date('Y-m-d')?>"></td>
                                  <td><input type="text" name="desName" class="form-control form-control-sm" value=""
                                      placeholder="desName"></td>

                                  <td><input type="text" name="desCode" class="form-control form-control-sm" value=""
                                    placeholder="desCode"></td>

                                    <td><input type="text" name="rate" class="form-control form-control-sm" value=""
                                      placeholder="Emb rate"></td>
                            </tr>

                          </table>
                          <input type="hidden" name="search" value="advance">
                          <input type="hidden" name="type"  value="erc">
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
            <div class="card-body">
                <div id="overlay">
                </div>
                <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                 <h5>ERC Design List</h5>
                </div>
                 <h4 ><span id='msg'></span></h4>
                <hr>
                <table class="table table-striped  table-responsive  table-bordered data-table" id="erc_details" >
                  <caption style='caption-side : top' class=" text-info">
                    <h6 class="text-center"> <?php echo $caption ; ?></h6>
                  </caption>
                   <thead>
                     <tr>
                       <th>Design Name</th>
                       <th>design Code</th>
                       <th>Emb Rate</th>
                     </tr>
                   </thead>
              <tbody>
                <?php  foreach ($src as $value) { ?>
                        <tr class="gradeU order_row" id="">
                        <td><?php echo $value['desName'];?></td>
                        <td><?php echo $value['desCode'];?></td>
                        <td><?php echo $value['rate'];?></td>
                    </tr>
                <?php }?>
              </tbody>
              </table>
               </div>
              <p><button id='download_erc'>Download as CSV</button></p>
            </div>

          </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                 <h5>New Design List</h5>
                </div><hr>
                    <table class="table" >
                   <thead>
                     <tr>
                        <th>Design  Name</th>
                        <th>Stitch</th>
                     </tr>
                   </thead>
                <tbody>
                    <?php  foreach ($fresh_designname as $value) { ?>
                        <tr class="gradeU order_row" id="">

                        <td><?php echo $value['designName'];?></td>
                        <td><?php echo $value['stitch'];?></td>


                      </tr>

                    <?php }?>


                </tbody>
        </table>
    </div>
        </div>
     </div>
</div>

</div>

  </div>
</div>
</div>
<style>
    #DataTables_Table_0_filter{
        display:none;
    }
</style>

<?php include('erc_js.php');?>
