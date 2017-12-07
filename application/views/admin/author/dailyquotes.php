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
<button type="button" class="btn bg-olive margin" data-toggle="modal" data-target="#modal-default">Select Quote</button>

  <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Default Modal</h4>
              </div>
              <div class="modal-body">
                  <form role="form" id="selectquotes">
               <div class="form-group">
                  <label>Select Quote</label>
                  <select class="form-control" name="todayquote">
                      <?php foreach($allquotes as $quote){
                          ?>
                    <option value="<?php echo $quote->id; ?>"><?php echo $quote->quotes; ?></option>
               <?php 
                      } ?>
                   
                  </select>
                </div>
                      <button type="submit" class="btn btn-primary">Add Quotes</button>
                  </form>     
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>


<div class="box">
            <div class="box-header">
              <h3 class="box-title">Daily Quotes</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Author Name</th>
                  <th>Quote</th>
                  <th>Date</th>
                  
                </tr>
                </thead>
              <?php if(!empty($dailyquotes)){ ?>
                  
                <tbody>
                <?php foreach($dailyquotes as $dailyquot){
                    ?>
                      <tr>
                  <td><?php echo $dailyquot->authorfname." ".$dailyquot->authorlname; ?></td>
                  <td><?php echo $dailyquot->todayquote; ?></td>
                  <td><?php   $originalDate = $dailyquot->publish_date;
                  $newDate = date("d-m-Y", strtotime($originalDate));
                  echo $newDate; ?></td>
                
                </tr>
                    
                    <?php
                } ?>    
             </tbody>  
           <?php         
                  
              } ?>  
                
                
                
                
                <tfoot>
            <tr>
                  <th>Author Name</th>
                  <th>Quote</th>
                  <th>Date</th>
                  
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
