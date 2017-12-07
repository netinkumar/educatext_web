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
<?php if(!empty($msg)){
    echo $msg;
}  ?>
     <div class="form-group has-error">
        <label> <?php echo validation_errors(); ?></label>
   
    </div>
    <form  action="<?php echo base_url(); ?>admin/catagory/updatecatageory" enctype="multipart/form-data" method="POST" >
        <div class="box-body">
            <?php foreach($cat as $catageory){ ?>
            <div class="form-group">
                <label for="catageoryname1">Name</label>
                <input type="text" class="form-control" id="catageoryname1" name="catageoryname1" value="<?php echo $catageory->name; ?>"  title="Letters Only" placeholder="First Name">
                <input type="hidden" name="catageoryid1" value="<?php echo $catageory->id; ?>" >
            </div>
            
             <div class="box-body pad">
               <textarea name="catageorydescription1" class="textarea" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $catageory->description; ?></textarea>
           </div>
          
            <div class="form-group">
                <label for="image1">Image</label>
                <input type="file" class="form-control" id="catimage1" name="catimage1"  placeholder="Image">
            </div>
            <img class="profile-user-img img-responsive img-square" src="<?php echo $baseurl=base_url().'assets/catageory/images/'.$catageory->image; ?>" alt="Attachment Image">
            <input type="hidden" class="form-control" id="savedimage1" name="savedimage1" value="<?php echo $catageory->image; ?>">
            <input type="submit" value="Add Category" name="submit">
            <?php } ?>
        </div>
    </form>
 
    
    
    
    
</div>


<?php $this->load->view('admin/sadminfooter'); ?>