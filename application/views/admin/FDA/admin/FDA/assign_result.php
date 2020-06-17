
<div class="card"><div class="card-header">
  <p>Type something in the input field to search the list for specific items:</p>
   <div class="col-md-12 ">
    <div class="card">
      <div class="card-body">
        <div id="accordion">
          <div class="modal-content">
            <div class="modal-header">
              <a class="card-link" data-toggle="collapse" href="#collapseOne">
                Simple filter
              </a>
            </div>
            <div id="collapseOne" class="collapse show" data-parent="#accordion">
              <div class="modal-body">
                <form action="<?php echo base_url('/admin/FDA/filter1'); ?>" method="post">
                  <div class="form-row">
                    <div class="col-2">
                      <input type="date" name="date_from" class="form-control form-control-sm"
                        value="<?php echo date('Y-m-01')?>">
                    </div>
                    <div class="col-2">
                      <input type="date" name="date_to" class="form-control form-control-sm"
                        value="<?php echo date('Y-m-d')?>">
                    </div>
                    <div class="col-2">
                      <select id="searchByCat" name="searchByCat" class="form-control form-control-sm" required>
                        <option value="">-- Select Category --</option>
                        <option value="fabric_name">Fabric Name</option>
                        <option value="fabric_type">Fabric Type</option>
                      </select>
                    </div>
                    <div class="col-2">
                      <input type="text" name="searchValue" class="form-control form-control-sm" value=""
                        placeholder="Search" required>
                    </div>
                    <input type="hidden" name="type" value="show">
                    <input type="hidden" name="search" value="simple">
                    <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>"
                      value="<?=$this->security->get_csrf_hash();?>" />
                    <button type="submit" name="search" value="simple" class="btn btn-info btn-xs"> <i
                        class="fas fa-search"></i> Search</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <div class="modal-content">
            <div class="modal-header">
              <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
                Advance filter
              </a>
            </div>
            <div id="collapseTwo" class="collapse" data-parent="#accordion">
              <div class="modal-body">
                <form action="<?php echo base_url('/admin/FDA/filter1'); ?>" method="post">
                  <table class=" remove_datatable">
                    <caption>Advance Filter</caption>
                    <thead>
                      <tr>
                        <th>Date_from</th>
                        <th>Date_to</th>
                        <th>Fabric Name</th>
                        <th>Fabric Type</th>

                      </tr>
                    </thead>
                    <tr>
                      <td>
                        <input type="date" name="date_from" class="form-control form-control-sm"
                          value="<?php echo date('Y-m-01')?>"></td>

                      <td>
                        <input type="date" name="date_to" class="form-control form-control-sm"
                          value="<?php echo date('Y-m-d')?>"></td>
                          <td><input type="text" name="fabric_name" class="form-control form-control-sm" value=""
                              placeholder="fabric name"></td>

                          <td><input type="text" name="fabric_type" class="form-control form-control-sm" value=""
                                  placeholder="fabric type "></td>


                    </tr>

                  </table>
                  <input type="hidden" name="search" value="advance">
                  <input type="hidden" name="type" value="show">
                  <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>"
                    value="<?=$this->security->get_csrf_hash();?>" />
                  <button type="submit" name="search" value="advance" class="btn btn-info btn-xs"> <i class="fas fa-search"></i> Search</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <input class="form-control" id="myInput" type="text" placeholder="Search.."></div>
    <div class="card-body">
      <div class="col-sm-12">
        <!-- accoridan part -->
        <div class="list-group" id="search">
          <?php $i=1;
          foreach ($data_value as $value): ?>
          <a href="<?php echo base_url('admin/FDA/get_fda_details/').serve_url($value['fabric_name']) ?> " class="list-group-item list-group-item-action">
            <div class="float-left">
              <div class="container"><b>Fabric name : </b><?php echo $value['fabric_name']; ?></div>
              <div class="container"><b>Designs : </b><?php echo $value['dcount']; ?></div>
            </div>
            <div class="float-right">
              <div><b>Fabric type : </b><?php echo $value['fabric_type']; ?></div>
              <div><b>Assign Date : </b><?php echo my_date_show_time($value['asign_date']); ?></div>
            </div>
          </a>
          <?php endforeach; ?>
        </div>
      </div>

    </div>
  </div>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#search *").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
