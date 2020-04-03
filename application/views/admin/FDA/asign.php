
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
                   <div class="list-group">
            <?php $i=1;
  foreach ($fabric_data as $value) { ?>
            <a href="<?php echo base_url('admin/fda/get_fda_details/').$value['fabricType'] ?> "class="list-group-item list-group-item-action">
             <Div class="float-left">
            <Div class="container"><b>S.no :-</b><?php echo $i ?></Div>
            <Div class="container"><b>Fabric name :-</b><?php echo $value['fabricName'] ?></Div>
            </Div>
            <Div class="float-right"> <Div><b>Fabric type :-</b><?php echo $value['fabricType'] ?></Div>
            <Div><b>Fabric Code :-</b><?php echo $value['fabricCode'] ?></Div>
           </Div>
           
            </a>
            <?php $i++;
}?>
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
