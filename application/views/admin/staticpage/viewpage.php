<?php $this->load->view('admin/sadminheader'); ?>

<div class="content-wrapper">
  
  <ul>
        <?php foreach($allnotes as $allquotes){ ?> 
            
              <li>
                    

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> <?php echo $allquotes->created; ?></span>

                      <h3 class="timeline-header"><a><?php echo $allquotes->name; ?></a></h3>

                      <div class="timeline-body">
                       <?php echo $allquotes->	pagecontent; ?>
                      </div>
                      <div class="timeline-footer">
                        <a href="<?php echo base_url() ?>admin/staticpagec/editpages/<?php echo $allquotes->id; ?>"class="btn btn-primary btn-xs">Edit</a>
                        <a href="<?php echo base_url() ?>admin/staticpagec/deletepage/<?php echo $allquotes->id; ?>" class="btn btn-danger btn-xs">Delete</a>
                      </div>
                    </div>
                  </li>
            
            
            
            
            <?php  } ?>
        
        
        
        
    </ul>




       <!-- /.content -->
</div> 
    <?php $this->load->view('admin/sadminfooter'); ?>