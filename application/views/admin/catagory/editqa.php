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
     <form role="form" id="editqa" action="<?php echo base_url(); ?>admin/catagory/updateqa" enctype="multipart/form-data" method="POST">
              <div class="box-body">
                   <?php foreach($cat as $qa){ ?>
           <div class="form-group">
                  <label for="quesname1">Question</label>
                   <textarea name="quesname1" class="textarea" placeholder="Place some text here"
                       style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                             <?php echo $qa->question; ?> 
                   </textarea>
                  <input type="hidden" name="classid1" value="<?php echo $qa->catageorydata_id; ?>">
                  <input type="hidden" name="subject1" value="<?php echo $qa->subject_id; ?>">
                  <input type="hidden" name="qaid1" value="<?php echo $qa->id; ?>">
               </div>
                    <div class="form-group">
                  <label for="ansname1">Answer</label>
                   <textarea name="ansname1" class="textarea" placeholder="Place some text here"
                       style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                               <?php echo $qa->answer; ?> 
                   </textarea>
                   </div>
                   <?php } ?>
              </div>
              <!-- /.box-body -->

            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
    
    
    
</div>






<script src="<?php echo $baseurl=base_url(); ?>assets/admin/customscript/classesscript.js"></script>
<?php $this->load->view('admin/sadminfooter'); ?>
