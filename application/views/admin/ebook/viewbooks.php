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
    <a  class="btn bg-olive margin" href="<?php echo base_url().'admin/ebookctrl/addebook/'.$catid ?>">Add e-book</a>
<!--    <pre><?php
    
    print_r($ebooks);
    ?></pre>
    -->
    
    <div class="box">
            <div class="box-header">
              <h3 class="box-title">E-books</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Category</th>
                  <th>Author Name</th>
                  <th>Book</th>
                  <th>Edition</th>
                  <th>View</th>
                  <th>Action</th>
                </tr>
                </thead>
              <?php if(!empty($ebooks)){ ?>
                  
                <tbody>
                    <?php //echo "<pre>"; print_r($ebooks); echo "</pre>"; ?> 
                <?php foreach($ebooks as $ebook){
                    ?>
                      <tr>
                  <td><?php echo $ebook->catname; ?></td>
                  <td><?php echo $ebook->author_name; ?></td>
                  <td><?php   echo $ebook->name; ?></td>
                  <td><?php echo $ebook->edition; ?></td>
                  <td> <a href="<?php echo base_url().'assets/ebooks/books/'.$ebook->saved_name ?>" download>Download</a></td>
                  <td> 
                      
                      <a class="btn bg-maroon btn-flat btn-xs" href="<?php echo base_url().'admin/ebookctrl/delebook/'.$ebook->id.'/'.$ebook->cat_id; ?>">Delete Book</a>
                       <a class="btn bg-olive btn-flat btn-xs" href="<?php echo base_url().'admin/ebookctrl/editbook/'.$ebook->id; ?>">Edit Book</a>
                 
                  </td>
                
                </tr>
                    
                    <?php
                } ?>    
             </tbody>  
           <?php         
                  
              } ?>  
                
                
                
                
                <tfoot>
            <tr>
                   <th>Category</th>
                  <th>Author Name</th>
                  <th>Book</th>
                  <th>Edition</th>
                  <th>View</th>
                  <th>Action</th>
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