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
<div class="form-group has-error">
        <label> <?php echo validation_errors(); ?></label>
   
    </div>
    <form  action="<?php echo base_url(); ?>admin/ebookctrl/saveebook" enctype="multipart/form-data" method="POST" >
        <div class="box-body">
            <div class="form-group">
                <label for="authorname1">Author Name</label>
                <input type="text" class="form-control" id="firstname1" name="authorname1"  title="Letters Only" placeholder="Author Name">
            </div>
            <div class="form-group">
                <label for="bookname1">Book Name</label>
                <input type="text" class="form-control" id="lastname1" name="bookname1" title="Letters Only" placeholder="Book Name">
            </div>
            <div class="form-group">
                <label for="edition1">Edition</label>
                <input type="text" class="form-control" id="phonenumber1" name="edition1"  placeholder="Edition">
            </div>
            <div class="form-group">
                <label for="bookfile1">Select File</label>
                <input type="file" class="form-control" id="phonenumber1" name="bookfile1" required>
            </div>
            <input type="hidden" name="catid" value="<?php echo $catid; ?>">
            <input type="submit" value="Submit Book" name="submit">
        </div>
    </form>
    
    
    
</div>


<?php $this->load->view('admin/sadminfooter'); ?>