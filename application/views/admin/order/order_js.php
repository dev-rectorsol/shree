
<script src="<?php echo base_url('jexcelmaster/')?>asset/js/jquery.3.1.1.js"></script>
<script src="<?php echo base_url('jexcelmaster/')?>dist/jexcel.js"></script>
<script src="<?php echo base_url('jexcelmaster/')?>dist/jsuites.js"></script>
<link rel="stylesheet" href="<?php echo base_url('jexcelmaster/')?>dist/jsuites.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url('jexcelmaster/')?>dist/jexcel.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url('jexcelmaster/')?>src/css/jexcel.datatables.css" type="text/css" />

<script type="text/javascript">
$(document).ready(function() {
$('#fresh_form').hide();

$('#order_form').hide();

$("#add_order").on('click', function(){
var category =$('#Select_Category').val();
$('#category').val(category);
var session =$('#Select_Session').val();
$('#session').val(session);
  var type = $('#selectType').val();
  if(type == 'FRESH'){
    $('#order_form').hide();
      $('#fresh_form').show();
  }else if (type == 'PRM') {
      $('#fresh_form').hide();

        $('#order_form').show();
  }else {
      $('#fresh_form').show();
  }
});

        $('#master').on('click', function(e){
         if($(this).is(':checked',true))
         {
           $(".sub_chk").prop('checked', true);
         }
         else
         {
           $(".sub_chk").prop('checked',false);
         }
        });
         $('#add_more').on('click', function(){
              var element= '<tr>'
                element+=  '<td> <input type="text" class="form-control" name="serial_number[]" value="" ></td>'
                element+=  '<td><input type="text" name="unit[]" class="form-control" value=""></td>'
                element+=  '<td><input type="text" class="form-control" name="quantity[]" value=""></td>'
                element+=  '<td>  <input type="text" class="form-control" name="priority[]"  value=""></td>'
                element+=  '<td> <input type="text" class="form-control" name="order_barcode[]" value=""></td>'
                element+=  '<td><input type="text" class="form-control" name="remark[]" value=""></td>'
                element+=  '<td> <input type="text" name="fabric_name[]" class="form-control" value=""></td>'
                element+=  '<td><input type="text" class="form-control" name="hsn[]" value=""></td>'
                element+=  '<td><input type="text" name="design_name[]" class="form-control" value=""></td>'
                element+=  '<td> <input type="text" name="design_code[]" class="form-control" value=""></td>'
                element+=  '<td><input type="text" class="form-control" name="stitch[]" value=""></td>'
                element+=  '<td>  <input type="text" class="form-control" name="dye[]" value=""></td>'
                element+=  '<td><input type="text" class="form-control" name="matching[]" value=""></td>'
                element+=  '<td> <button type="button" name="remove"  class="btn btn-danger btn-xs remove">-</button></td>'
                element+=  '</tr>';
          $('#fresh_data').append(element);
         });

      $(document).on('click', '.remove', function() {
        $(this).parent().parent().remove();
      });

  $('.delete_all').on('click', function(e) {
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
     WRN_PROFILE_DELETE = "Are you sure you want to delete this row?";
     var check = confirm(WRN_PROFILE_DELETE);
     if(check == true){
       //for server side
     var join_selected_values = allVals.join(",");
     // alert (join_selected_values);exit;

       $.ajax({
         type: "POST",
         url: "<?= base_url()?>admin/orders/deleteorder",
         cache:false,
         data: {'ids' : join_selected_values, '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php  echo $this->security->get_csrf_hash(); ?>'},
         success: function(response)
         {

           //referesh table
           $(".sub_chk:checked").each(function() {
              var id = $(this).attr('data-id');
              $('#tr_'+id).remove();
           });
         }
       });
     }
   }
 });


 $('.delete_all_product').on('click', function(e) {
  var allVals = [];
  $(".sub_chk_order:checked").each(function() {
    allVals.push($(this).attr('data-id'));
  });
  //alert(allVals.length); return false;
  if(allVals.length <=0)
  {
    alert("Please select row.");
  }
  else {
    //$("#loading").show();
    WRN_PROFILE_DELETE = "Are you sure you want to delete this row?";
    var check = confirm(WRN_PROFILE_DELETE);
    if(check == true){
      //for server side
    var join_selected_values = allVals.join(",");
    // alert (join_selected_values);exit;

      $.ajax({
        type: "POST",
        url: "<?= base_url()?>admin/orders/deleteorder_product",
        cache:false,
        data: {'ids' : join_selected_values, '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php  echo $this->security->get_csrf_hash(); ?>'},
        success: function(response)
        {

          //referesh table
          $(".sub_chk_order:checked").each(function() {
             var id = $(this).attr('data-id');
             $('#tr_'+id).remove();
          });
        }
      });
    }
  }
 });


 $(".order_row").click(function(){
            // alert ('ok');
            var oreder_id =  $(this).attr('id');
             ///alert(oreder_id);

                  var csrf_name = $("#get_csrf_hash").attr('name');
                  var csrf_val = $("#get_csrf_hash").val();
                  $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('admin/Orders/get_order_details') ?>",
                    data: {'oreder_id' : 	oreder_id, '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php  echo $this->security->get_csrf_hash(); ?>'},
                    datatype: 'json',
                    success: function(data){

                       $("#content_body").html(data);
                    }
                  });
                });

 // var i=1;
 // $('#add_fresh').click(function(){
 //      i++;
 //      var rowid = Math.random();
 //     // $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
 //     $('#fresh_field').append('<row id="row'+i+'" class="row"><input type="hidden" name="count[]" value="'+Math.floor((Math.random() * 10000) + 1)+'"><div class="col-sm-1"><label>Sr.No.</label> <input type="text" class="form-control" name="serial_number[]" value=""></div>  <div class="col-sm-1">  <label>Unit</label><input type="text" class="form-control" name="unit[]" value=""></div>  <div class="col-sm-1">  <label>Quntity</label>  <input type="text" class="form-control" name="quantity[]" value=""></div>    <div class="col-md-2"><label>priority</label>  <input type="text" class="form-control" name="priority[]"  value=""></div>  <div class="col-md-2"><label>Order Barcode</label>  <input type="text" class="form-control" name="order_barcode[]" value=""></div>    <div class="col-md-1"> <label>Remark</label>  <input type="text" class="form-control" name="remark[]" value=""></div>  <div class="col-md-2"><label>Fabric Name</label><input type="text" class="form-control" name="fabric_name[]" value=""></div>  <div class="col-md-2"> <label>Hsn</label>  <input type="text" class="form-control" name="hsn[]" value=""></div>  <div class="col-md-2"> <label>Design Name</label> <input type="text" class="form-control" name="design_name[]" value=""></div>   <div class="col-md-2"><label>Design Code</label>  <input type="text" class="form-control" name="design_code[]" value=""></div> <div class="col-md-2"> <label>Stitch</label> <input type="text" class="form-control" name="stitch[]" value=""></div>  <div class="col-md-2">  <label>Dye</label>   <input type="text" class="form-control" name="dye[]" value=""></div><div class="col-md-2"> <label>Matching</label> <input type="text" class="form-control" name="matching[]" value=""></div> <div class="col-md-2"><br><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div></div><div class="row"><div class="col-md-12"> <label></label><div></div><br><br><br></br><br>');
 //
 // });
 //
 // $('#add_prm').click(function(){
 //      i++;
 //     // $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
 //     $('#prm_field').append('<row id="row'+i+'" class="row"><input type="hidden" name="count[]" value="'+Math.floor((Math.random() * 10000) + 1)+'"><div class="col-sm-1"><label>Sr.No.</label> <input type="text" class="form-control" name="serial_number[]" value=""></div>  <div class="col-sm-1">  <label>Unit</label><input type="text" class="form-control" name="unit[]" value=""></div>  <div class="col-sm-1">  <label>Quntity</label>  <input type="text" class="form-control" name="quantity[]" value=""></div>    <div class="col-md-2"><label>priority</label>  <input type="text" class="form-control" name="priority[]"  value=""></div>  <div class="col-md-2"><label>Order Barcode</label>  <input type="text" class="form-control" name="order_barcode[]" value=""></div>    <div class="col-md-1"> <label>Remark</label>  <input type="text" class="form-control" name="remark[]" value=""></div>  <div class="col-md-2"><label>Fabric Name</label><input type="text" class="form-control" name="fabric_name[]" value=""></div>  <div class="col-md-2"> <label>Hsn</label>  <input type="text" class="form-control" name="hsn[]" value=""></div>  <div class="col-md-2"> <label>Design Name</label> <input type="text" class="form-control" name="design_name[]" value=""></div>   <div class="col-md-2"><label>Design Code</label>  <input type="text" class="form-control" name="design_code[]" value=""></div> <div class="col-md-2"> <label>Stitch</label> <input type="text" class="form-control" name="stitch[]" value=""></div>  <div class="col-md-2">  <label>Dye</label>   <input type="text" class="form-control" name="dye[]" value=""></div><div class="col-md-2"> <label>Matching</label> <input type="text" class="form-control" name="matching[]" value=""></div> <div class="col-md-2"><br><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div></div><div class="row"><div class="col-md-12"> <label></label><div></div><br><br><br></br><br>');
 //
 // });

 $(document).on('click', '.btn_remove', function(){
      var button_id = $(this).attr("id");
      $('#row'+button_id+'').remove();
 });

$('#order_number').on('blur',function(){
      var order = $('#order_number').val();
      console.log(order);
      if (order == '') {

        return;
                }

                $.ajax({
                      url: '<?php echo base_url('admin/orders/CheckOrder'); ?>',
                    type: 'post',
                    data: {
                           'email_check' : 1,
                           'order' : order,
                           '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php  echo $this->security->get_csrf_hash(); ?>'
                          },
                    success: function(response){
                         if (response == 'taken' ) {

                             $( "#msg" ).html("<h6 class='text-danger'><b>Order already exists</b></h6>");
                             $('#order_number').css("border-bottom", "1px solid red");
                                      }
                          else{
                            $( "#msg" ).html("");
                            $('#order_number').css("border-bottom", "1px solid green");
                          }
                      }
        });
    });


});

   </script>
