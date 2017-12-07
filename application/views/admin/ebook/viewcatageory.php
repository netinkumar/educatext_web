<?php $this->load->view('admin/sadminheader'); ?>
<div class="content-wrapper">
    
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Add User</li>
        </ol>
    </section>
    
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
    <button type="button" class="btn bg-olive btn-flat margin" data-toggle="modal" data-target="#modal-addcatageory">Add Catageory</button>
    
    
    <div class="modal fade" id="modal-addcatageory">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Catageory</h4>
              </div>
              <div class="modal-body">
                  <form role="form" id="addcategory">
               <div class="form-group">
                  <label for="categoryname1">Category Name</label>
                  <input type="text" class="form-control" id="categoryname1" name="categoryname1" placeholder="Enter category name" required>
                  </div>
                      <input type="submit" value="Add category" name="category">
                  </form>     
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
 <div class="box">
            <div class="box-header">
              <h3 class="box-title">E-book Category</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Category</th>
                  <th>Date</th>
                  <th>Action </th>
                </tr>
                </thead>
              <?php if(!empty($allcat)){ ?>
                  
                <tbody>
                <?php foreach($allcat as $allcats){
                    ?>
                      <tr>
                  <td><?php echo $allcats->id; ?></td>
                  <td><?php  echo $allcats->name; ?></td>
                  <td><?php   $originalDate = $allcats->created;
                  $newDate = date("d-m-Y", strtotime($originalDate));
                  echo $newDate; ?></td>
                  <td>
                    <a class="btn bg-maroon btn-flat btn-xs" href="<?php echo base_url().'admin/ebookctrl/delcat/'.$allcats->id ?>">Delete</a>
                  <a class="btn bg-olive btn-flat btn-xs" href="<?php echo base_url().'admin/ebookctrl/viewbooks/'.$allcats->id ?>">View Books</a>
                 
                  </td>
                      </tr>
                    
                    <?php
                } ?>    
             </tbody>  
           <?php         
                  
              } ?>  
              <tfoot>
        <tr>
                  <th>#</th>
                  <th>Category</th>
                  <th>Date</th>
                  <th>Action </th>
                  
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
    
    
    
    
    
    
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

<script src="<?php echo $baseurl=base_url(); ?>assets/admin/customscript/classesscript.js"></script>
<?php $this->load->view('admin/sadminfooter'); ?>