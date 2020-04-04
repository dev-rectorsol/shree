
<div id="content">
  <div id="content-header">
      <div class="container-fluid">
        <div class="row-fluid">

      </div>
    </div>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row">
      <div class="col-sm-12">
         <div class="card">
            <div class="card-body">
              <div class="row">
                    <div class="col-sm-4">
                      <div id="feedback">
                        <h4>Select Fabric Name:</h4>
                      </div><br>
                <form action="">
                   <!-- <table class="table" id="fabric">-->
                   <!--     <th><b>Fabric Name</b></th>-->
                   <!--   <tbody>-->
                   <!--   <?php   $id=0; foreach($fabric_data as $value): $id++;?>-->
                   <!--   <tr>-->
                          <!-- <td style="display:none;"><?php echo $value['id'];?></td> -->
                   <!--  <td href="javascript:void(0)" aria-expanded="false" id="<?php echo $value['fabricType'];?>"><?php echo $value['fabricName'];?></td>-->
                   <!--  </tr>-->
                   <!--</tbody>-->
                   <!--  <?php endforeach;?>-->
                   <!--</table>-->
                    <div class="form-group">
                      <select name="fabric" id="fabric" class="form-control" style="width:180px;">
                          <?php foreach($fabric_data as $value): ?>
                              <option value="<?php echo $value['fabricType'];?>"><?php echo $value['fabricName'];?></option>
                         <?php endforeach;?>
                      </select>
                    </div>
                   
                    </div>
                     <div class="col-sm-8" id="show">
                    </div>
                   </form>
                </div>

            </div>
         </div>
      </div>

   </div>
   <div class="row-fluid">
     <div class="card">
        <div class="card-body">
          <div class="col-sm-12">

           <!-- accoridan part -->
            <?php foreach($fabric_name as $value) :?>
                  <div class="accordion" id="accordion<?php echo $value['id'] ?>">
                    <div class="card m-b-0">
                        <div class="card-header" id="headingOne">
                          <h5 class="mb-0">
                            <a data-toggle="collapse" id="fda_value" data-target="#value<?php echo $value['id'];?>" aria-expanded="true" aria-controls="collapseOne">
                                <i class="fa fa-list" aria-hidden="true"></i>
                                <span id="<?php echo $value['fabric_id'];?>"><?php echo $value['fabric_id'];?></span>
                            </a>
                          </h5>
                        </div>
                        <div id="value<?php echo $value['id'];?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordion<?php echo $value['id'] ?>">
                          <div class="card-body">
                            <div class="col-md-12 bg-white content_body">

                            </div>
                          </div>
                        </div>

                    </div>
                  </div>
                 <?php endforeach;?>


                <!-- toggle part -->

           </div>

          </div>
       </div>
    </div>

  </div>
</div>
</div>
<!-- add modal wind-->

<!-- End add modal wind-->
<style>
td { padding: 5px; cursor: pointer;}

.selected {
    background-color: #7460ee;
    color: #FFF;
}


</style>
<?php include('asign_js.php'); ?>
