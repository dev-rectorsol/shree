
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

$("#selectType").on('change', function(){

  var type = $(this).val();
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
//   $('#fresh_data').hide();
// $("#btn").on('click', function(){
// $('#fresh_data').show();
//
// });

$.ajax({
    type: "GET",
    url: "<?php echo base_url('admin/Orders/get_order_data')?>",

    success: function(text) {

data= jexcel(document.getElementById('fresh_data'), {
data:text,
search:true,
pagination:10,
columns: [
    { type: 'hidden', title:'id'},
    { type: 'text', title:'Oreder Number', width:120,url:"<?php echo base_url('admin/Orders/add_cell')?>" },
    { type: 'text', title:'Series' },
    { type: 'text', title:'Customer Name',width:120 },
    { type: 'text', title:'Unit' },
    { type: 'text', title:'Quntity' },
    { type: 'text', title:'priority' },
    { type: 'text', title:'Order Barcode' },
    { type: 'text', title:'Remark' },
    { type: 'text', title:'Fabric Name'},
    { type: 'text', title:'Hsn' },
    { type: 'text', title:'Design Name' },
    { type: 'text', title:'Design Code' },
    { type: 'text', title:'Stitch' },
    { type: 'text', title:'Dye' },
    { type: 'text', title:'Matching' ,width:120},
 ],
    onchange: changed,
    oninsertrow:insertrow,
});

    }
});

  $("#order_id").on('focusout', function(){
   var order_number = $(this).val();
     //alert(order_number);
     var csrf_name = $("#get_csrf_hash").attr('name');
     var csrf_val = $("#get_csrf_hash").val();
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('admin/Orders/get_order_prm')?>",
        data: {'order_number':order_number, '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php  echo $this->security->get_csrf_hash(); ?>'},
        success: function(text){
    // console.log(text);
    data= jexcel(document.getElementById('order_value'),{
    data:text,
    search:true,
    pagination:10,
    columns: [
        { type: 'hidden', title:'id'},
        { type: 'text', title:'Oreder Number', width:120},
        { type: 'text', title:'Series' },
        { type: 'text', title:'Customer Name',width:120 },
        { type: 'text', title:'Unit' },
        { type: 'text', title:'Quntity' },
        { type: 'text', title:'priority' },
        { type: 'text', title:'Order Barcode' },
        { type: 'text', title:'Remark' },
        { type: 'text', title:'Fabric Name'},
        { type: 'text', title:'Hsn' },
        { type: 'text', title:'Design Name' },
        { type: 'text', title:'Design Code' },
        { type: 'text', title:'Stitch' },
        { type: 'text', title:'Dye' },
        { type: 'text', title:'Matching' ,width:120},


     ],
        onchange: changed,
        oninsertrow:insertrow,
    });
        }
    });
  });

      var insertrow  = function(instance,x,y) {
       dat={
          '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php  echo $this->security->get_csrf_hash(); ?>'
                  }
        $.ajax({
            url: "<?php echo base_url('admin/Orders/add_cell')?>",
            type: "POST",
             data: dat,
            success: function(order_id){
             var cellName = jexcel.getColumnNameFromId([0,x+1,x+3]);
                  data.setValue(cellName,order_id);
                  var cell1 = data.getValueFromCoords(0,x+1,x+3);
            }
          });

        }


        var changed = function(instance, cell, x, y, value) {
          var cellName = jexcel.getColumnNameFromId([x,y]);
          var cell1 = data.getValueFromCoords(0,y);
              var dat=[];
               if(x==2){
                  dat={
                    series_number: value,
                    product_order_id : cell1,
                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php  echo $this->security->get_csrf_hash(); ?>'
                  }
            $.ajax({
            url: "<?php echo base_url('admin/Orders/update')?>",
            type: "POST",
            data:dat,
            success: function(dataResult){
            // console.log(dataResult);
            }

          });
       }
   //     if(x==3){
   //         dat={
   //           customer_name: value,
   //           product_order_id: cell1,
   //           '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php  echo $this->security->get_csrf_hash(); ?>'
   //         }
   //   $.ajax({
   //   url: "<?php echo base_url('admin/Orders/update')?>",
   //   type: "POST",
   //   data:dat,
   //   success: function(dataResult){
   //   console.log(dataResult);
   //   }
   // });
   //     }
       if(x==4){
           dat={
             unit: value,
             product_order_id: cell1,
             '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php  echo $this->security->get_csrf_hash(); ?>'
           }
     $.ajax({
     url: "<?php echo base_url('admin/Orders/update')?>",
     type: "POST",
     data:dat,
     success: function(dataResult){
     console.log(dataResult);
     }
   });
       }
       if(x==5){
           dat={
             quantity: value,
             product_order_id: cell1,
             '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php  echo $this->security->get_csrf_hash(); ?>'
           }
     $.ajax({
     url: "<?php echo base_url('admin/Orders/update')?>",
     type: "POST",
     data:dat,
     success: function(dataResult){
     console.log(dataResult);
     }
   });
       }
       if(x==6){
           dat={
             priority: value,
             product_order_id: cell1,
             '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php  echo $this->security->get_csrf_hash(); ?>'
           }
     $.ajax({
     url: "<?php echo base_url('admin/Orders/update')?>",
     type: "POST",
     data:dat,
     success: function(dataResult){
     console.log(dataResult);
     }
   });
       }
       if(x==7){
           dat={
             order_barcode: value,
             product_order_id: cell1,
             '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php  echo $this->security->get_csrf_hash(); ?>'
           }
     $.ajax({
     url: "<?php echo base_url('admin/Orders/update')?>",
     type: "POST",
     data:dat,
     success: function(dataResult){
     console.log(dataResult);
     }
   });
  }
  if(x==8){
      dat={
        remark: value,
        product_order_id: cell1,
        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php  echo $this->security->get_csrf_hash(); ?>'
      }
$.ajax({
url: "<?php echo base_url('admin/Orders/update')?>",
type: "POST",
data:dat,
success: function(dataResult){
console.log(dataResult);
}
});
}
if(x==9){
    dat={
      design_code: value,
      product_order_id: cell1,
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php  echo $this->security->get_csrf_hash(); ?>'
    }
$.ajax({
url: "<?php echo base_url('admin/Orders/update')?>",
type: "POST",
data:dat,
success: function(dataResult){
console.log(dataResult);
}
});
}
if(x==10){
    dat={
      fabric_name: value,
      product_order_id: cell1,
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php  echo $this->security->get_csrf_hash(); ?>'
    }
$.ajax({
url: "<?php echo base_url('admin/Orders/update')?>",
type: "POST",
data:dat,
success: function(dataResult){
console.log(dataResult);
}
});
}
if(x==11){
    dat={
      hsn: value,
      product_order_id: cell1,
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php  echo $this->security->get_csrf_hash(); ?>'
    }
$.ajax({
url: "<?php echo base_url('admin/Orders/update')?>",
type: "POST",
data:dat,
success: function(dataResult){
console.log(dataResult);
}
});
}
if(x==12){
    dat={
      design_name: value,
      product_order_id: cell1,
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php  echo $this->security->get_csrf_hash(); ?>'
    }
$.ajax({
url: "<?php echo base_url('admin/Orders/update')?>",
type: "POST",
data:dat,
success: function(dataResult){
console.log(dataResult);
}
});
}
if(x==13){
    dat={
      stitch: value,
      product_order_id: cell1,
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php  echo $this->security->get_csrf_hash(); ?>'
    }
$.ajax({
url: "<?php echo base_url('admin/Orders/update')?>",
type: "POST",
data:dat,
success: function(dataResult){
console.log(dataResult);
}
});
}
if(x==14){
    dat={
      dye: value,
      product_order_id: cell1,
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php  echo $this->security->get_csrf_hash(); ?>'
    }
$.ajax({
url: "<?php echo base_url('admin/Orders/update')?>",
type: "POST",
data:dat,
success: function(dataResult){
console.log(dataResult);
}
});
}
if(x==15){
    dat={
      matching: value,
      product_order_id: cell1,
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php  echo $this->security->get_csrf_hash(); ?>'
    }
$.ajax({
url: "<?php echo base_url('admin/Orders/update')?>",
type: "POST",
data:dat,
success: function(dataResult){
console.log(dataResult);
}
});
}


}



// $('#rd_bt').hide();
// $("#order_id").on('change', function(){
//     $('#rd_bt').show();
//     var order_id = $(this).val();
//           var csrf_name = $("#get_csrf_hash").attr('name');
//           var csrf_val = $("#get_csrf_hash").val();
//           $.ajax({
//             type: "POST",
//             url: "<?php echo base_url('admin/Orders/get_designcode') ?>",
//             data: {'order_id' : order_id, '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php  echo $this->security->get_csrf_hash(); ?>'},
//             datatype: 'json',
//             success: function(data){
//                $("#order_value").html(JSON.parse(data));
//
//             }
//           });
//         });

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

 $( "#order_id" ).autocomplete({
      source: function( request, response ) {

          var searchText = extractLast(request.term);
          $.ajax({
              url: "<?php echo base_url("/admin/Orders/order_number") ?>",
              type: 'post',
              dataType: "json",
              data: {
                  search: searchText,
                  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php  echo $this->security->get_csrf_hash(); ?>'
              },
              success: function( data ) {
                  response( data );
              }
          });
      },
      select: function( event, ui ) {
          var terms = split( $('#order_id').val() );

          terms.pop();

          terms.push( ui.item.label );

          terms.push( "" );
          $('#order_id').val(terms.join( ", " ));

          // Id
          var terms = split( $('#selectuser_ids').val() );

          terms.pop();

          terms.push( ui.item.value );

          terms.push( "" );
          $('#selectuser_ids').val(terms.join( ", " ));

          return false;
      }

  });

});

   </script>
