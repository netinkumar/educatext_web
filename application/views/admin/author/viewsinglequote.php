<?php $this->load->view('admin/sadminheader'); ?>

<div class="content-wrapper">
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
<div class="post">
    <?php foreach ($quotedata as $quotcontent){ ?>
                  <div class="user-block">
                      <img class="img-circle img-bordered-sm" src="<?php echo base_url().'assets/user/images/'.$quotcontent->userimage; ?>" alt="user image">
                        <span class="username">
                          <a><?php echo $quotcontent->userfname." ".$quotcontent->userlname; ?></a>
                          <a href="<?php echo base_url() ?>admin/author/editquote/<?php echo $quotcontent->id; ?>" class="pull-right btn-box-tool"><i class="fa  fa-edit"></i></a>
                        </span>
                    <span class="description">Posted on- <?php  $originalDate = $quotcontent->created;
                  $newDate = date("d-m-Y", strtotime($originalDate));
                  echo $newDate; ?></span>
                  </div>
                  <!-- /.user-block -->
      <?php 
      
      echo $quotcontent->quotes;
      
    } ?>  
</div>

       <!-- /.content -->
</div> 
    <?php $this->load->view('admin/sadminfooter'); ?>