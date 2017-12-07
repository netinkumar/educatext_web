<?php $this->load->view('admin/sadminheader'); ?>
<div class="content-wrapper">
    
     <?php if(isset($_COOKIE['update_sucess_msg'])) {
  ?>
                  <div class="form-group has-success">
                 <label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> <?php echo $_COOKIE['update_sucess_msg']; ?></label> 
                  </div>
                  
           <?php  }elseif(isset($_COOKIE['update_error_msg'])){
               ?>
    <div class="form-group has-error">
                 <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> <?php echo $_COOKIE['update_error_msg']; ?></label>
    </div>                
 <?php
           } ?>
    
    <?php // echo "<pre>"; print_r($allnotes); echo "</pre>"; ?>
<!--    dfsgdsf-->

<div class="box">
            <div class="box-header">
              <h3 class="box-title">Quotes</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Teacher Name</th>
                  <th>Teach</th>
                  <th>Created</th>
                  <th>Action</th>
                </tr>
                </thead>
                
                    <?php if(!empty($allnotes)){
                    $i=1;
                   foreach($allnotes as $allnote){ ?>
                         
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $allnote->teacherfname." ".$allnote->teacherlname; ?></td>
                  <td>
                 <?php echo substr($allnote->notes, 0, 50)."..."; ?>
                  </td>
                  <td><?php
                  $originalDate = $allnote->created;
                  $newDate = date("d-m-Y", strtotime($originalDate));
                  echo $newDate;
                  ?></td>
                  <td>
                  <a href="<?php echo base_url() ?>admin/teacher/viewsinglenote/<?php echo $allnote->id; ?>"class="btn btn-primary btn-xs">view</a>
                  <a href="<?php echo base_url() ?>admin/teacher/editquote/<?php echo $allnote->id; ?>"class="btn btn-primary btn-xs">Edit</a>
                  <a href="<?php echo base_url() ?>admin/teacher/deletenotes/<?php echo $allnote->id; ?>" class="btn btn-danger btn-xs">Delete</a>
                </tr>  
                       
                       
                       
                 <?php $i++; }   
                 
                } ?>
           
              <tfoot>
    
                 <tr>
                 <th style="width: 10px">#</th>
                  <th>Teacher Name</th>
                  <th>Teach</th>
                  <th>Created</th>
                  <th>Action</th>
                </tr>
                  
             
              </table>
            </div>
            <!-- /.box-body -->
          </div> 











<!--    dfsgdsf-->
<!--    <div class="box-body">
              <table class="table table-bordered">
                <tbody><tr>
                  <th style="width: 10px">#</th>
                  <th>Teacher Name</th>
                  <th>Teach</th>
                  <th>Created</th>
                  <th>Action</th>
                </tr>
                <?php if(!empty($allnotes)){
                    $i=1;
                   foreach($allnotes as $allnote){ ?>
                         
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $allnote->teacherfname." ".$allnote->teacherlname; ?></td>
                  <td>
                 <?php echo substr($allnote->notes, 0, 50)."..."; ?>
                  </td>
                  <td><?php
                  $originalDate = $allnote->created;
                  $newDate = date("d-m-Y", strtotime($originalDate));
                  echo $newDate;
                  ?></td>
                  <td>
                  <a href="<?php echo base_url() ?>admin/teacher/viewsinglenote/<?php echo $allnote->id; ?>"class="btn btn-primary btn-xs">view</a>
                  <a href="<?php echo base_url() ?>admin/teacher/editquote/<?php echo $allnote->id; ?>"class="btn btn-primary btn-xs">Edit</a>
                  <a href="<?php echo base_url() ?>admin/teacher/deletenotes/<?php echo $allnote->id; ?>" class="btn btn-danger btn-xs">Delete</a>
                </tr>  
                       
                       
                       
                 <?php $i++; }   
                 
                } ?>
            
              </tbody></table>
            </div>-->
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
<!--  <ul>
        <?php  foreach($allnotes as $allquotes){ ?> 
            
              <li>
                    

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> <?php echo $allquotes->created; ?></span>

                      <h3 class="timeline-header"><a><?php echo $allquotes->username; ?></a></h3>

                      <div class="timeline-body">
                       <?php echo $allquotes->notes; ?>
                      </div>
                      <div class="timeline-footer">
                        <a href="<?php echo base_url() ?>admin/teacher/editquote/<?php echo $allquotes->notes_id; ?>"class="btn btn-primary btn-xs">Edit</a>
                        <a href="<?php echo base_url() ?>admin/teacher/deletenotes/<?php echo $allquotes->notes_id; ?>" class="btn btn-danger btn-xs">Delete</a>
                      </div>
                    </div>
                  </li>
            
            
            
            
            <?php  } ?>
        
        
        
        
    </ul>-->

       <!-- /.content -->
</div> 
<script src="<?php echo $baseurl=base_url(); ?>assets/admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo $baseurl=base_url(); ?>assets/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
    <?php $this->load->view('admin/sadminfooter'); ?>