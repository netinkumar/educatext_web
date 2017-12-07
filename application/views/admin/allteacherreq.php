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
    <?php // echo "<pre>"; print_r($newreq); echo "</pre>"; ?>
    <!--  csd-->
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
                  <th>Student Name</th>
                  <th>Teacher Name</th>
                  <th>Created</th>
                  <th>Status</th>
                </tr>
                </thead>
                
                    <?php if(!empty($allreq)){
                    $i=1;
                   foreach($allreq as $newreqs){ ?>
                         
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $newreqs->student_fname." ".$newreqs->student_lname; ?></td>
                  <td>
                 <?php echo $newreqs->teacher_fname." ".$newreqs->teacher_lname; ?>
                  </td>
                  <td><?php
                  $originalDate = $newreqs->created;
                  $newDate = date("d-m-Y", strtotime($originalDate));
                  echo $newDate;
                  ?></td>
                  <td>
                      <?php
                      switch($newreqs->status){
                          case "0": 
                              echo "Unapproved";
                              break;
                          case "1":
                              echo "Approved";
                              break;
                          case "2":
                              echo "Rejected";
                              break;
                      }
?>
                      
<!--                  <a href="<?php echo base_url() ?>admin/userlists/approveteacher/<?php echo $newreqs->id; ?>"class="btn btn-primary btn-xs">Approve</a>
                  <a href="<?php echo base_url() ?>admin/userlists/discardteacher/<?php echo $newreqs->id; ?>"class="btn btn-danger btn-xs">Discard</a>-->
                </tr>  
                       
                       
                       
                 <?php $i++; }   
                 
                } ?>
           
              <tfoot>
    
                 <tr>
                    <th style="width: 10px">#</th>
                  <th>Student Name</th>
                  <th>Teacher Name</th>
                  <th>Created</th>
                  <th>Action</th>
                </tr>
                  
             
              </table>
            </div>
            <!-- /.box-body -->
          </div> 
    
<!--  csd-->
<!--    <div class="box-body">
              <table class="table table-bordered">
                <tbody><tr>
                  <th style="width: 10px">#</th>
                  <th>Author Name</th>
                  <th>Quotes</th>
                  <th>Created</th>
                  <th>Action</th>
                </tr>
                <?php if(!empty($allquotes)){
                    $i=1;
                   foreach($allquotes as $allquotes){ ?>
                         
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $allquotes->username; ?></td>
                  <td>
                 <?php echo substr($allquotes->quotes, 0, 50)."..."; ?>
                  </td>
                  <td><?php
                  $originalDate = $allquotes->created;
                  $newDate = date("d-m-Y", strtotime($originalDate));
                  echo $newDate;
                  ?></td>
                  <td>
                  <a href="<?php echo base_url() ?>admin/author/viewsinglequote/<?php echo $allquotes->quoteid; ?>"class="btn btn-primary btn-xs">view</a>
                  <a href="<?php echo base_url() ?>admin/author/editquote/<?php echo $allquotes->quoteid; ?>"class="btn btn-primary btn-xs">Edit</a>
                  <a href="<?php echo base_url() ?>admin/author/deletequote/<?php echo $allquotes->quoteid; ?>" class="btn btn-danger btn-xs">Delete</a></td>
                </tr>  
                       
                       
                       
                 <?php $i++; }   
                 
                } ?>
            
              </tbody></table>
            </div>-->
    
  



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