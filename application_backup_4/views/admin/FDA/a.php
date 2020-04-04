<div class="card">
         <div class="card-body">
             <h5 class="card-title">Fabric Asign Design</h5>
         </div>
       <div class="table-responsive">
            <table class="table table-striped table-bordered" id="asign_tb">
              <thead>
                <tr class="odd" role="row">
                   <th>Fabric Name</th>
                   <th>Fabric Type</th>
                   <th>Design Name</th>
                   <th>design Code</th>
                   <th>Dye</th>
                   <th>Stitch</th>
                </tr>
              </thead>
              <tbody>
        <?php  foreach ($fda_data as $value) { ?>
              <tr id="" >
                <td><?php echo $value['fabricName'];?></td>
                <td><?php echo $value['designOn'];?></td>
                <td><?php echo $value['designName'];?></td>
                <td><?php echo $value['designCode'];?></td>
                <td><?php echo $value['dye'];?></td>
                <td><?php echo $value['stitch'];?></td>
               
            </tr>

        <?php }?>


    </tbody>
</table>
</div>
</div>
<?php include('asign_js.php'); ?>
