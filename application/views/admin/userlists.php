<?php  $this->load->view('admin/sadminheader'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Userlist</li>
      </ol>
    </section>

    <!-- Main content -->
     <section class="content">
      <div class="row">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Bordered Table</h3>
            </div>
            
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
              
              <div class="box">
            <div class="box-header">
              <h3 class="box-title">USERS</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Username</th>
                  <th>Role</th>
                  <th style="width: 40px">Action</th>
                </tr>
                </thead>
                
                 <?php
                if(!empty($results)){ 
                    ?>  <tbody> <?php 
                $i=1;
                foreach ($results as $data) { ?>
                    
                   <tr>
                  <td><?php echo $i ?></td>
                  <td><?php echo $data->f_name; ?></td>
                 <td><?php echo $data->l_name; ?></td>
                 <td><?php echo $data->email; ?></td>
                 <td><?php echo $data->username; ?></td>
                 <td><?php echo $data->role; ?></td>
                  <td>
                      <a href="<?php echo base_url() ?>admin/userlists/deleteuser/<?php echo $data->id; ?>" class="btn btn-block btn-danger btn-xs">Delete</a>
                      <a href="<?php echo base_url() ?>admin/userlists/edituser/<?php echo $data->id; ?>" class="btn btn-block btn-warning btn-xs">Edit</a>
                      <a href="<?php echo base_url() ?>admin/userlists/viewuser/<?php echo $data->id; ?>" class="btn btn-block btn-success btn-xs">View</a>
                  </td>
                </tr>  
           <?php $i++;
            } ?> 
                    </tbody>
                <?php
                }?>
           
              <tfoot>
        <tr>
                   <th style="width: 10px">#</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Username</th>
                  <th>Role</th>
                  <th style="width: 40px">Action</th>
                  
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
              
              
              
              
              
              
              
              
              
              
            <!-- /.box-header -->
            
            <!-- /.box-body -->
          
          </div>
          <!-- /.box -->

      </div>
      <!-- /.row -->
      
    </section>
 
<!--<div id="pagination">
<ul class="tsc_pagination">

 Show pagination links 



<?php //foreach ($links as $link) {
//echo  $link;
// } ?>
</ul>
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