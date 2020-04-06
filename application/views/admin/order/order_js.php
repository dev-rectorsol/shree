<script src="<?php echo base_url('jexcelmaster/')?>asset/js/jquery.3.1.1.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#fresh_form').hide();
    $('#order_form').hide();
    $('#prm_form').hide();

    $("#add_order").on('click', function() {
      $('#order_form').show();
      var order_type = $('#selectType').val();
      $('#order_type').val(order_type);
      var category = $('#Select_Category').val();
      $('#category1').val(category);
      $('#category').val(category);
      var session = $('#Select_Session').val();
      $('#session1').val(session);
      $('#session').val(session);
      var type = $('#selectType').val();
      if (type == 1) {
        $('#prm_form').hide();
        $('#fresh_form').show();
      } else if (type == 2) {
        $('#fresh_form').hide();
        $('#prm_form').show();
      } else {
        $('#fresh_form').show();
      }
    });

    $('#master').on('click', function(e) {
      if ($(this).is(':checked', true)) {
        $(".sub_chk").prop('checked', true);
      } else {
        $(".sub_chk").prop('checked', false);
      }
    });
    $('#add_more').on('click', function() {
      var element = '<tr>'
      element += '<td> <input type="text" class="form-control" name="serial_number[]" value="" ></td>'
      element += '<td> <input type="text" name="fabric_name[]" class="form-control" value=""></td>'
      element += '<td><input type="text" class="form-control" name="hsn[]" value=""></td>'
      element += '<td><input type="text" name="design_name[]" class="form-control" value=""></td>'
      element += '<td> <input type="text" name="design_code[]" class="form-control" value=""></td>'
      element += '<td><input type="text" class="form-control" name="stitch[]" value=""></td>'
      element += '<td>  <input type="text" class="form-control" name="dye[]" value=""></td>'
      element += '<td><input type="text" class="form-control" name="matching[]" value=""></td>'
      element += '<td><input type="text" name="unit[]" class="form-control" value=""></td>'
      element += '<td><input type="text" class="form-control" name="quantity[]" value=""></td>'
      element += '<td>  <input type="text" class="form-control" name="priority[]"  value=""></td>'
      element += '<td> <input type="text" class="form-control" name="order_barcode[]" value=""></td>'
      element += '<td><input type="text" class="form-control" name="remark[]" value=""></td>'
      element += '<td> <button type="button" name="remove"  class="btn btn-danger btn-xs remove">-</button></td>'
      element += '</tr>';
      $('#fresh_data').append(element);
    });

    $('#add_more_prm').on('click', function() {
      var element = '<tr>'
      element += '<td> <input type="text" class="form-control" name="serial_number[]" value="" required></td>'
      element += '<td> <input type="text" name="old_barcode[]" class="form-control" value=""></td>'
      element += '<td> <input type="text" name="fabric_name[]" class="form-control" value="" required></td>'
      element += '<td><input type="text" class="form-control" name="hsn[]" value="" required></td>'
      element += '<td><input type="text" name="design_name[]" class="form-control" value="" required></td>'
      element += '<td> <input type="text" name="design_code[]" class="form-control" value="" required></td>'
      element += '<td><input type="text" class="form-control" name="stitch[]" value="" required></td>'
      element += '<td>  <input type="text" class="form-control" name="dye[]" value="" required></td>'
      element += '<td><input type="text" class="form-control" name="matching[]" value="" required></td>'
      element += '<td><input type="text" name="unit[]" class="form-control" value="" required></td>'
      element += '<td><input type="text" class="form-control" name="quantity[]" value="" required></td>'
      element += '<td>  <input type="text" class="form-control" name="priority[]"  value="" required></td>'
      element += '<td> <input type="text" class="form-control" name="order_barcode[]" value="" required></td>'
      element += '<td><input type="text" class="form-control" name="remark[]" value="" required></td>'
      element += '<td> <button type="button" name="remove"  class="btn btn-danger btn-xs remove">-</button></td>'
      element += '</tr>';
      $('#prm_data').append(element);
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
      if (allVals.length <= 0) {
        alert("Please select row.");
      } else {
        //$("#loading").show();
        WRN_PROFILE_DELETE = "Are you sure you want to delete this row?";
        var check = confirm(WRN_PROFILE_DELETE);
        if (check == true) {
          //for server side
          var join_selected_values = allVals.join(",");
          // alert (join_selected_values);exit;

          $.ajax({
            type: "POST",
            url: "<?= base_url()?>admin/orders/deleteorder",
            cache: false,
            data: {
              'ids': join_selected_values,
              '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php  echo $this->security->get_csrf_hash(); ?>'
            },
            success: function(response) {

              //referesh table
              $(".sub_chk:checked").each(function() {
                var id = $(this).attr('data-id');
                $('#tr_' + id).remove();
              });
            }
          });
        }
      }
    });
    $(".order_row").click(function() {
      // alert ('ok');
      var oreder_id = $(this).attr('id');
      ///alert(oreder_id);

      var csrf_name = $("#get_csrf_hash").attr('name');
      var csrf_val = $("#get_csrf_hash").val();
      $.ajax({
        type: "POST",
        url: "<?php echo base_url('admin/Orders/get_order_details') ?>",
        data: {
          'oreder_id': oreder_id,
          '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php  echo $this->security->get_csrf_hash(); ?>'
        },
        datatype: 'json',
        success: function(data) {
          $("#content_body").html(data);
        }
      });
    });
    $(document).on('click', '.btn_remove', function() {
      var button_id = $(this).attr("id");
      $('#row' + button_id + '').remove();
    });

    $('.order_number').on('blur', function() {
      var order = $(this).val();
      if (order == '') {
        return;
      }
      $.ajax({
        url: '<?php echo base_url('admin/orders/CheckOrder'); ?>',
        type: 'post',
        data: {
          'order': order,
          '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php  echo $this->security->get_csrf_hash(); ?>'
        },
        success: function(response) {
          if (response == 'taken') {
            $(".msg").html("<h6 class='text-danger'><b>Order already exists</b></h6>");
            $('.order_number').css("border-bottom", "1px solid red");
          } else {
            $(".msg").html("");
            $('.order_number').css("border-bottom", "1px solid green");
          }
        }
      });
    });

    $("body").keypress(function(e) {
        if (e.which == 13) {
          return false;
        }
      });
  });
</script>
