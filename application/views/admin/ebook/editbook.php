 <?php $this->load->view('admin/sadminheader'); 
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
    <form  action="<?php echo base_url(); ?>admin/ebookctrl/editbookdetail" enctype="multipart/form-data" method="POST" >
       <?php foreach($bookdetail as $book){ ?>
        <div class="box-body">
            <div class="form-group">
                <label for="authorname1">Author Name</label>
                <input type="text" class="form-control" id="firstname1" name="authorname1"  title="Letters Only" placeholder="Author Name" value="<?php echo $book->author_name; ?>">
            </div>
             <div class="form-group">
                <input type="hidden" class="form-control" id="bookid1" name="bookid1"  value="<?php echo $book->id; ?>">
            </div>
            <div class="form-group">
                <label for="bookname1">Book Name</label>
                <input type="text" class="form-control" id="lastname1" name="bookname1" title="Letters Only" placeholder="Book Name" value="<?php echo $book->name; ?>">
            </div>
            <div class="form-group">
                <label for="edition1">Edition</label>
                <input type="text" class="form-control" id="edition1" name="edition1"  placeholder="Edition" value="<?php echo $book->edition; ?>">
            </div>
            <div class="form-group">
                <label for="bookfile1">Select File</label>
                <input type="file" class="form-control" id="bookdata1" name="bookfile1">
                <input type="hidden" id="savedname1" name="savedname1" value="<?php echo $book->saved_name; ?>">
                <a href="<?php echo base_url().'assets/ebooks/books/'.$book->saved_name ?>" download>Download</a>
            </div>
            <input type="hidden" name="catid" value="<?php echo $book->cat_id; ?>">
            <input type="submit" value="Submit Book" name="submit">
        </div>
       <?php } ?>
    </form>
    
    
    
</div>


<?php $this->load->view('admin/sadminfooter'); ?>