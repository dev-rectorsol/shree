


                    <div>
                    <h4>Apply FDA:</h4>
                    </div>
                      <?php
                   if($this->session->flashdata('success'))
                   {
                   echo $this->session->flashdata('success');
                   }
                   ?>
                   <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="table">
                        <thead>
                          <tr class="odd" role="row">

                           <th><b>Sr. No.</b></th>
                           <th><b>Design Name</b></th>
                           <th><b>Design Code</b></th>
                           <th><b>Stitch</b></th>
                           <th><b>Dye</b></th>
                           <th><b>Desig On</b></th>
                         </tr>
                        </thead>
                      <tbody>
                        <?php $id=0; foreach($data_value as $value): $id++;?>
                        <tr>
                          <tr class="gradeU" id="tr_<?php echo $value['id']?>">

                          <td style="display:none;" class="ui-widget-content"><?php echo $value['id']?></td>
                          <td><?php echo  $id;?></td>
                          <td><?php echo $value['designName'];?></td>
                          <td><?php echo $value['designCode']?></td>
                          <td><?php echo $value['stitch'] ?></td>
                          <td><?php echo $value['dye'] ?></td>
                          <td><?php echo $value['designOn']?></td>
             						</tr>
                      <?php endforeach;?>
                      </tbody>
                   </table>
                   </div>
                   <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                   <!-- <input type="button" value="Asign" class="btn btn-primary" class="Asign"> -->
                   <input type="submit" name="OK" class="btn btn-primary Asign" value="Asign" id="button"/>
                   <?php include('asign_js.php'); ?>
