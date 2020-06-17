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
              <form action="<?php echo base_url('/admin/FDA/filter1'); ?>" method="post">
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
                      <option value="designName">Desing Name</option>
                      <option value="desCode">Design Code</option>
                      <option value="designOn">Design On</option>
                      <option value="stitch">Stich</option>
                      <option value="dye">Dye</option>
                    </select>
                  </div>
                  <div class="col-2">
                    <input type="text" name="searchValue" class="form-control form-control-sm" value=""
                      placeholder="Search" required>
                  </div>
                  <input type="hidden" name="type" value="show_details">
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
              <form action="<?php echo base_url('/admin/FDA/filter1'); ?>" method="post">
                <table class=" remove_datatable">
                  <caption>Advance Filter</caption>
                  <thead>
                    <tr>
                      <th>Date_from</th>
                      <th>Date_to</th>
                      <th>Dname</th>
                      <th>Dcode</th>
                      <th>Stitch</th>
                      <th>Dye</th>
                      <th>DOn</th>
                    </tr>
                  </thead>
                  <tr>
                      <td>
                      <input type="date" name="date_from" class="form-control form-control-sm"
                      value="<?php echo date('Y-m-01')?>"></td>

                      <td>
                      <input type="date" name="date_to" class="form-control form-control-sm"
                      value="<?php echo date('Y-m-d')?>"></td>
                      <td><input type="text" name="designName" class="form-control form-control-sm" value=""
                      placeholder="designName"></td>

                      <td><input type="text" name="desCode" class="form-control form-control-sm" value=""
                      placeholder="desCode"></td>

                      <td><input type="text" name="stitch" class="form-control form-control-sm" value=""
                      placeholder="stitch"></td>
                      <td><input type="text" name="dye" class="form-control form-control-sm" value=""
                      placeholder="dye"></td>

                      <td><input type="text" name="designOn" class="form-control form-control-sm" value=""
                      placeholder="designOn"></td>


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
<br><br>
                  <!-- <div>
                  <form >
                  <h4>Apply FDA: <?php echo $fabric_type; ?></h4>
                  <input type="hidden" name="fabric_type" value="<?php echo $fabric_type; ?>">
                  <input type="hidden" name="fabric_name" value="<?php echo $fabric_name; ?>">
                  </div> -->
                   <div class="table-responsive">
                    <table class="table table-striped  table-responsive  table-bordered data-table" id="table" id="fabric">
                        <thead>
                          <caption style='caption-side : top' class=" text-info">
                            <h6 class="text-center"> <?php echo $caption ; ?></h6>
                          </caption>
                          <tr class="odd" role="row">

                           <th><b>Sr. No.</b></th>
                           <th><b>Design Name</b></th>
                           <th><b>Design Code</b></th>
                           <th><b>Stitch</b></th>
                           <th><b>Dye</b></th>
                           <th><b>Desig On</b></th>
                         </tr>
                        </thead>
                      <tbody>
                        <?php $id=0; foreach($data_value as $value): $id++;?>
                        <tr class="gradeU" id="tr_<?php echo $value['id']?>">

                          <td style="display:none;" class="ui-widget-content"><?php echo $value['id']?></td>
                          <td><?php echo  $id;?></td>
                          <td><?php echo $value['designName'];?></td>
                          <td><?php echo $value['desCode']?></td>
                          <td><?php echo $value['stitch'] ?></td>
                          <td><?php echo $value['dye'] ?></td>
                          <td><?php echo $value['designOn']?></td>
             						</tr>
                      <?php endforeach;?>
                      </tbody>
                   </table>
                   </div>

                   <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                   <!-- <input type="button" value="Asign" class="btn btn-primary" class="Asign"> -->
                   <input type="submit" name="OK" class="btn btn-primary" value="Assign" id="asign"/>
                   </form>
                   <?php include('asign_js.php'); ?>

                 </div>
               </div>
             </div>
