<div id="content">
  <div id="content-header">
      <div class="container-fluid">
        <div class="row-fluid">
          <div class="span4 text-right">
            <a href="#addnew" class="btn btn-primary addNewbtn"  data-toggle="modal" >Add New</a>
          </div>
          <hr>
      </div>
    </div>
  </div>

  <!-- add modal wind-->
<div id="addnew" class="modal hide">
  <div class="modal-dialog" role="document">
     <div class="modal-content">
        <div class="card">

          <div class="card-body">
          <form class="form-horizontal" method="post" action="<?php echo base_url('admin/Job_work_type/addType') ?>" name="basic_validate"  novalidate="novalidate">
            <div class="modal-header">
              <h5 class="modal-title">Add Detail</h5>
              <button data-dismiss="modal" class="close" type="button">×</button>
            </div>
            <div class="modal-body">
            <div class="widget-content nopadding">
            <div class="form-group row"> <label class="control-label col-sm-3">Type</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="type" value="" required>
              </div>
            </div>

              <!--<div class="form-group row">-->
              <!--  <label class="control-label col-sm-3">Choose Unit</label>-->
              <!--  <div class="col-sm-9">-->
              <!--      <div class=" row"><div class="col-sm-6">-->
              <!--    <label for="pcs">Pcs</label>-->
              <!--    <input type="radio" id="pcs" name="unit" value="pcs" ></div>-->
              <!--   <div class="col-sm-6">  <label for="mtrs">Mtrs</label>-->
              <!--    <input type="radio" id="mtrs" name="unit" value="mtrs"></div>-->
              <!--  </div></div>-->
              <!--</div>-->
              <div class="form-group row">
                <label class="control-label col-sm-3">Add Data</label>
               <!-- <div class="col-sm-9"><input type="hidden" class="form-control" id="tabledata" name="tabledata" value=""><div id="table"></div> </div> -->
               </div>
               <div class="form-group row">
                 <!-- <label class="control-label col-sm-3">Add Data</label> -->
                <div class="col-sm-12"><input type="hidden" class="form-control" id="tabledata" name="tabledata" value=""><div  id="table"></div> </div>
                </div>

        <div class="card-footer float-right">
          <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>"
            value="<?php echo $this->security->get_csrf_hash();?>">
          <input type="submit" class="btn btn-primary">

        </div>
      </div>
    </div>
      </form>
          </div>
      </div>
    </div>
  </div>
</div>


    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <form id="jobWorkTypeFilter">
              <div class="form-row">
                <div class="col-4">
                  <select id="searchByCat" name="searchByCat" class="form-control">
                    <option value="">-- Select Category --</option>
                    <option value="type">Type</option>
                    <option value="Job">Job</option>
                    <option value="Rate">Rate</option>
                    <option value="Unit">Unit</option>
                  </select>
                </div>
                <div class="col-4">
                  <input type="text" name="searchValue" value="" placeholder="Search" id="searchByValue"
                    class="form-control">
                </div>
                <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>"
                  value="<?=$this->security->get_csrf_hash();?>" />
                <button type="submit" class="btn btn-info"> <i class="fas fa-search"></i> Search</button>
              </div>
            </form>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <div class="widget-box">
              <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                <h5>Job Work Type List</h5>
              </div>
              <div class="row well">
                <a type="button" class="btn btn-primary pull-right delete_all" style="color:#fff;">Delete Selected</a>
              </div>
              <div class="widget-content nopadding">
                <table class="table table-striped table-bordered data-table" id="jobWorktype">
                  <thead>
                    <tr>
                      <th><input type="checkbox" class="sub_chk" id="master"></th>
                      <th>S/No</th>
                      <th>Type</th>
                      
                     
                      <th>Job</th>
                      <th>Rate</th>
                      <th>Unit</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        if($work_type>0)
                        {
                        $id=1;
                        foreach ($work_type as $value) { ?>
                      <tr class="gradeU" id="tr_<?php echo $value->id?>">
                      <td><input type="checkbox" class="sub_chk" data-id="<?php echo $value->id ?>"></td>
                      <td><?php echo $id?></td>
                      <td><?php echo $value->type?></td>
                      <!--<td><?php echo $value->parent?></td>-->
                      
                      <td><?php echo $value->job?></td>
                      <td><?php echo $value->rate?></td>
                      <td><?php echo $value->unit?></td>

                      <td>
                        <a href="<?php echo '#'.$value->id; ?>" class="text-center tip" data-toggle="modal"
                          data-original-title="Edit">
                          <i class="fas fa-edit blue"></i>
                        </a>
                        &nbsp;&nbsp;&nbsp;
                        <a class="text-danger text-center tip" href="javascript:void(0)"
                          onclick="delete_detail(<?php echo $value->id;?>)" data-original-title="Delete">
                          <i class="mdi mdi-delete red"></i>
                        </a>
                      </td>
                    </tr>
                    <!-- Edit modal wind-->
                               <div id="<?php echo $value->id;?>" class="modal hide">
                                 <div class="modal-dialog" role="document ">
                                   <div class="modal-content">
                                     <form class="form-horizontal" method="post"
                                       action="<?php echo base_url('admin/Job_work_type/edit/').$value->id; ?>"
                                       name="basic_validate" id="basic_validate" novalidate="novalidate">
                                       <div class="modal-header">
                                         <h5 class="modal-title">Edit Detail</h5>
                                         <button data-dismiss="modal" class="close" type="button">×</button>

                                       </div>
                                       <div class="modal-body">
                                         <div class="widget-content nopadding">

                                           <!-- <div class="form-group row">
                                             <label class="control-label col-sm-3">Type</label>
                                             <div class="col-sm-9">
                                               <input type="text" class="form-control" name="type"
                                                 value="<?php echo $value->type?>">
                                             </div>
                                           </div>
                                           <div class="form-group row">
                                             <label class="control-label col-sm-3">Parent</label>
                                             <div class="col-sm-9">
                                             <select name="parent" class="form-control"> <option value="none">None</option>
                                                 <?php foreach ($type as $rec): ?>

                                                 <option <?php if ($value->parent==$rec->type) { ?>selected <?php } ?>
                                                   value="<?php echo $rec->type ?>"><?php echo $rec->type ?></option>
                                                 <?php endforeach;?>

                                               </select>
                                             </div>
                                           </div>
                                           <div class="form-group row">
                                            <label class="control-label col-sm-3">Positive/Negative</label>
                                             <div class="col-sm-9">
                                               <select name="symbol" class="form-control">
                                                 <option value="-" <?php if ($value->parent=='-') { ?>selected <?php } ?>>Negative</option>
                                                 <option value="+" <?php if ($value->parent=='+') { ?>selected <?php } ?>>Positive</option>

                                               </select>
                                           </div>
                                           </div> -->
                                          <div class="form-group row">
                                             <label class="control-label col-sm-3">Rate</label>
                                             <div class="col-sm-9">
                                               <input type="text" class="form-control" name="rate"
                                                 value="<?php echo $value->rate?>">
                                             </div>
                                           </div>
                                           <div class="form-group row">
                                              <label class="control-label col-sm-3">Job</label>
                                              <div class="col-sm-9">
                                                <input type="text" class="form-control" name="job"
                                                  value="<?php echo $value->job?>">
                                              </div>
                                            </div>

                                       <div class="modal-footer">
                                         <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>"
                                           value="<?=$this->security->get_csrf_hash();?>" />
                                         <input type="submit" value="Update" class="btn btn-primary">
                                         <a data-dismiss="modal" class="btn" href="#">Cancel</a>
                                       </div>
                                     </form>
                                   </div>
                                 </div>
                               </div>


                 </div>
               </div>
                    <!-- End Edit modal wind-->
                  <?php $id=$id+1;  } } ?>
                  </tbody>
                </table>


              </div>
            </div>
          </div>
        </div>


  </div>
</div>
<!-- add modal wind-->
<div id="addnew" class="modal hide">
  <div class="modal-dialog" role="document ">
    <div class="modal-content">

    </div>
  </div>
</div>

<script>
function delete_detail(id)
{
  var del = confirm("Do you want to Delete");
  if (del== true)
  {
    var sureDel = confirm("Are you sure want to delete");
    if (sureDel == true)
    {
      window.location="<?php echo base_url()?>admin/Job_work_type/delete/"+id;
    }

  }
}

</script>
<style>
#DataTables_Table_0_previous{
  display:none;
}
#DataTables_Table_0_paginate{
    display:none;
}
</style>

<?php include('jobtype_js.php');?>
