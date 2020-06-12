<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
 <div class="col-md-12 ">
    <div class="card">
          <div class="card-body">
            <form id="frcFilter">
              <div class="form-row">
                <div class="col-4">
                  <select id="searchByCat" name="searchByCat" class="form-control">
                    <option value="">-- Select Category --</option>
                    <option value="challan_date">Date</option>
                    <option value="parent_barcode">PBC</option>
                    <option value="challan_no">color</option>
                    <option value="fabric_type">Fabric Type</option>
                    <option value="stock_quantity">stock_quantity</option>
                    <option value="current_stock">current_stock</option>
                    <option value="stock_unit">stock_unit</option>
                  </select>
                </div>
                <div class="col-4">
                  <input type="text" name="searchValue" class="form-control" value="" placeholder="Search"
                    id="searchByValue">
                </div>
                 <input type="hidden" name="type" value="pbc" >
                <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>"
                  value="<?=$this->security->get_csrf_hash();?>" />
                <button type="submit" class="btn btn-info"> <i class="fas fa-search"></i> Search</button>
              </div>
            </form>

          </div>
        </div>
</div>
        <!-- **************** Product List *****************  -->
        <div class="col-md-12 bg-white">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">2nd PBC List</h4>
                    <hr>

                    <div class="widget-box">
                      <div class="row well" >
                             <div class="col-6"> <a type="button" class="btn btn-info pull-left print_all btn-success" style="color:#fff;"><i class="fa fa-print"></i></a>
                             </div><div class="col-6">
                            
                               <form action="<?php echo base_url('/admin/frc/showRecieveList'); ?>" method="post">
                           
                                <div class="form-row " >
                                  <div class="col-5">
                               <label>Date From</label> 
                                    <input type="date" name="date_from" class="form-control" value="<?php echo $from?>" 
                                      >
                                  </div>
                                  <div class="col-5">
                                <label>Date To</label>  
                                    <input type="date" name="date_to" class="form-control" value="<?php echo $to?>" 
                                      >
                                  </div>
                                  <div class="col-2">
                                   <label>Search</label>  
                                   <input type="hidden" name="type" value="recieve" >
                                  <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>"
                                    value="<?=$this->security->get_csrf_hash();?>" />
                                  <button type="submit" class="btn btn-info"> <i class="fas fa-search"></i> Search</button>
                                </div>
                                </div>
                              </form>
                            </div>
                            </div> <hr> 
                            <table class=" table-bordered data-table text-center table-responsive" id="frc">
                                
                                   <?php 
                                         echo $content;
                                        
                                           ?>
                               
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
    jQuery('.print_all').on('click', function(e) {
  var allVals = [];
   $(".sub_chk:checked").each(function() {
     allVals.push($(this).attr('data-id'));
   });
   //alert(allVals.length); return false;
   if(allVals.length <=0)
   {
     alert("Please select row.");
   }
   else {
     //$("#loading").show();
     WRN_PROFILE_DELETE = "Are you sure you want to Print this rows?";
     var check = confirm(WRN_PROFILE_DELETE);
     if(check == true){
       //for server side
     var join_selected_values = allVals.join(",");
     // alert (join_selected_values);exit;
     var ids = join_selected_values.split(",");
     var data = [];
     $.each(ids, function(index, value){
       if (value != "") {
         data[index] = value;
       }
     });
       $.ajax({
         type: "POST",
         url: "<?= base_url()?>admin/FRC/return_print_multiple",
         cache:false,
         data: {'ids' : data,'title':'2nd PBC List','type':'pbc', '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php  echo $this->security->get_csrf_hash(); ?>'},
         success: function(response)
         {
           var w = window.open('about:blank');
            w.document.open();
            w.document.write(response);
            w.document.close();
         }
       });
              //for client side

     }
   }
 });   
</script>

<?php include('FRC_js.php');?>
