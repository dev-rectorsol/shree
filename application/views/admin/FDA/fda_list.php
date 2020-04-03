  <div id="content">
    <div id="content-header">
      <div class="container-fluid">
        <div class="row-fluid">

        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">
          
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
                   <th>Delete</th>
                </tr>
              </thead>
              <tbody>
        <?php $i=1;
         foreach ($fda_data as $row) { 
  
          ?>
              <tr  >
                <td><?php echo $row['fabricName'];?></td>
                <td><?php echo $row['designOn'];?></td>
                <td><?php echo $row['designName'];?></td>
                <td><?php echo $row['designCode'];?></td>
                <td><?php echo $row['dye'];?></td>
                <td><?php echo $row['stitch'];?></td>
               <td><a class="text-danger text-center tip"  onclick="delete_detail(<?php echo $row['id'] ;?>)" data-original-title="Delete">
                      <i class="mdi mdi-delete"></i></td>
            </tr>

        <?php 
       $i++; 
      }?>

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
  </div>

  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>
function delete_detail(id)
{
  var del = confirm("Do you want to Delete");
  if (del== true)
  {
    var sureDel = confirm("Are you sure want to delete");
    if (sureDel == true)
    {
      window.location="<?php echo base_url()?>admin/fda/delete_fda/"+id;
    }

  }
}
</script>