

<script type="text/javascript">
  $(document).ready(function() {

        $("#table ").click(function(){
           $(this).toggleClass('selected');
           var value=$(this).find('td:first').html();
            //console.log(value);
        });

$('.Asign').on('click', function(e){
    var selected = [];
    $("#table ").each(function(){
      selected.push($('td:first', this).html());
     var value=window.value;
      //console.log(value);
    });
    if(selected == ""){
      alert("Nothing to Assign")
    }

    var csrf_name = $("#get_csrf_hash").attr('name');
    var csrf_val = $("#get_csrf_hash").val();
    $.ajax({
      type: "POST",
      url: "<?php echo base_url('admin/FDA/submit_value') ?>",
      data: {'selected' : selected, 'value':value,'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php  echo $this->security->get_csrf_hash(); ?>'},
      datatype: 'json',
      success: function(data){
          alert("Inserted")
          // console.log(data);
          // window.location.reload();
          // location.reload();
      // $("#show").html(data);
      // $(".chk").click(function() {
      //   console.log('1');
      //   alert("ok");
      //    var id = $(this).attr('data-id');
      //    $('#tr_'+id).remove();
      // });

      }

    });
   
});

            $("#button").click(function () { 
                // location.reload(true); 
                  window.location.reload();
            });

//  $("#fabric tr").click(function(event){
//     event.preventDefault();
//       $("#fabric tr").removeClass("selected");
//       $(this).toggleClass('selected');
//       $(event).addClass("selected");
//     var fabricType=$(this).find('td:first').attr('id');
    
//   window.value=$(this).find('td:first').html();
   

//   var csrf_name = $("#get_csrf_hash").attr('name');
//   var csrf_val = $("#get_csrf_hash").val();
//   $.ajax({
//     type: "POST",
//     url: "<?php echo base_url('admin/FDA/get_fabric_name_value') ?>",
//     data: {'fabricType' : fabricType, '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php  echo $this->security->get_csrf_hash(); ?>'},
//     datatype: 'json',
//     success: function(data){
//         $("#show").html(data);
//     }

//   });

// });
$("#fabric").on('change',function(){
var fabricType=$(this).val();
 window.value=$(this).val();
//alert(window.value)
var csrf_name = $("#get_csrf_hash").attr('name');
var csrf_val = $("#get_csrf_hash").val();
$.ajax({
  type: "POST",
  url: "<?php echo base_url('admin/FDA/get_fabric_name_value') ?>",
  data: {'fabricType' : fabricType, '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php  echo $this->security->get_csrf_hash(); ?>'},
  datatype: 'json',
  success: function(data){
      $("#show").html(data);
  }

});

});

$("#fda_value span").click(function(event){
    // alert('ok');
  var fabric_id=$(this).attr('id');
  console.log(fabric_id);
   //alert(fabric_id);
  var csrf_name = $("#get_csrf_hash").attr('name');
  var csrf_val = $("#get_csrf_hash").val();
  $.ajax({
    type: "POST",
    url: "<?php echo base_url('admin/FDA/get_fda_details') ?>",
    data: {'fabric_id' : fabric_id, '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php  echo $this->security->get_csrf_hash(); ?>'},
    datatype: 'json',
    success: function(data){
        $(".content_body").html(data);
    }

  });

});

});

</script>
