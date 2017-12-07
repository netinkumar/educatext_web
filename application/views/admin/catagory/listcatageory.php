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
    <!-- Main content -->
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
    <!-- asdsa-->
    
    <div class="box">
            <div class="box-header">
              <h3 class="box-title">Schools</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                   <th>Name</th>
                  <th>Image</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
                </thead>
                
                 <?php
                if(!empty($allnotes)){ 
                    ?>  <tbody> <?php 
                $i=1;
                foreach($allnotes as $catageory){ ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $catageory->name; ?></td>
                  <td>
                  <img class="profile-user-img img-responsive img-square" src="<?php echo $baseurl=base_url().'assets/catageory/images/'.$catageory->image; ?>" alt="Attachment Image">
                  </td>
                  <td> <?php echo substr($catageory->description,0,12); ?></td>
                  <td><a class="btn bg-olive btn-flat margin" href="<?php echo $baseurl=base_url().'admin/catagory/editcatageory/'.$catageory->id; ?>">Edit</a>
                  <a class="btn bg-maroon btn-flat margin" href="<?php echo $baseurl=base_url().'admin/catagory/deletequote/'.$catageory->id; ?>">Delete</a>
                  <a class="btn bg-purple btn-flat margin" href="<?php echo $baseurl=base_url().'admin/catagory/viewclasses/'.$catageory->id; ?>">View Classes</a>
                  </td>
                </tr>
                
             


<?php $i++;  }
    ?>
                    </tbody>
                <?php
                }?>
           
              <tfoot>
    
                 <tr>
                     <th>#</th>
                   <th>Name</th>
                  <th>Image</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
                  
             
              </table>
            </div>
            <!-- /.box-body -->
          </div>
    
    
    
    
     <!-- asdsa-->
    
    
   


    <?php 
    
  //  foreach($allnotes as $catageory){ ?>
        
<!--       <div class="attachment-block clearfix">
                <img class="attachment-img" src="<?php // echo $baseurl=base_url().'assets/catageory/images/'.$catageory->image; ?>" alt="Attachment Image">

                <div class="attachment-pushed">
                  <h4 class="attachment-heading"><?php // echo $catageory->name; ?></h4>

                  <div class="attachment-text">
                   <?php // echo $catageory->description; ?>
                  </div>
                   /.attachment-text 
                </div>
                 /.attachment-pushed 
              </div>-->
     
        
        
        
        
  <?php  // }
    ?>
    
    
<!--    <div id="pagination">
<ul class="tsc_pagination">

 Show pagination links 



<?php foreach ($links as $link) {
echo  $link;
} ?>
</ul>
</div>-->
        
    <!-- /content  -->
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