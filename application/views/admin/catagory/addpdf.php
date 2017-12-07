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

    <form  role="form" action="<?php echo base_url(); ?>admin/catagory/addpdffile"enctype="multipart/form-data" method="POST" >
        
           <div class="form-group">
                <label for="pdf1">Select File</label>
                <input type="file" class="form-control" id="pdf1" name="pdf1"  required>
              </div>
 <input type="submit" value="Upload" name="submit">
        
     </form>



  <!-- /content  -->
</div>

<?php $this->load->view('admin/sadminfooter'); ?>
