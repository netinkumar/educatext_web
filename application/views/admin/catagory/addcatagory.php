<?php  $this->load->view('admin/sadminheader'); 
 //echo $baseurl=base_url();
 //require(base_url().'assets/admin/spreadsheet-reader-master/php-excel-reader/excel_reader2.php');
//require(base_url().'assets/admin/spreadsheet-reader-master/SpreadsheetReader.php');


?>

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
        <form action="<?php echo base_url(); ?>admin/catagory/uploadcsv" enctype="multipart/form-data" method="POST">
           <input type="file" class="form-control" id="csv1" name="csv1"  placeholder="Image"> 
           <input type="submit" value="Upload" name="submit">
        </form>
    </section>
    <!-- Main content -->
<?php if(!empty($msg)){
    echo $msg;
}  ?>
    <div class="form-group has-error">
        <label> <?php echo validation_errors(); ?></label>
   
    </div>
    <form  action="<?php echo base_url(); ?>admin/catagory/savecatageory" enctype="multipart/form-data" method="POST" >
        <div class="box-body">
            <div class="form-group">
                <label for="catageoryname1">Name</label>
                <input type="text" class="form-control" id="catageoryname1" name="catageoryname1"  title="Letters Only" placeholder="First Name">
            </div>
            
             <div class="box-body pad">
               <textarea name="catageorydescription1" class="textarea" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
           </div>
          
            <div class="form-group">
                <label for="image1">Image</label>
                <input type="file" class="form-control" id="image1" name="catimage1"  placeholder="Image">
            </div>
            <input type="submit" value="Add Category" name="submit">
        </div>
    </form>
 
    
    
    
    
</div>


<?php $this->load->view('admin/sadminfooter'); ?>