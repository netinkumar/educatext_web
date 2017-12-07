
<?php $this->load->view('admin/sadminheader'); ?>

<div class="content-wrapper">
<div class="col-md-12">
          
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Bootstrap WYSIHTML5
                <small>Simple and fast</small>
              </h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              <form role="form" action="<?php echo base_url(); ?>admin/staticpagec/updatepages" enctype="multipart/form-data" method="POST">
                  <?php foreach($notes as $qoutesdata){ ?>
                       <input type="hidden" name="pageid" value="<?php echo $qoutesdata->id; ?>" >
                
                <textarea name="teachernotes" class="textarea" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                          <?php echo $qoutesdata->pagecontent;   ?> 
                </textarea>
                          
                          
                          
                 <input type="submit" value="Add Quote" name="submit">
                          
                      
                      
                      <?php
                  } ?>
                 
              </form>
            </div>
          </div>
        </div>
    
       <!-- /.content -->
</div> 
    <?php $this->load->view('admin/sadminfooter'); ?>