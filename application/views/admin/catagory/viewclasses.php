<?php $this->load->view('admin/sadminheader'); ?>
<style>
    #pagination{
margin: 40 40 0;
}
ul.tsc_pagination a
{
border:solid 1px;
border-radius:3px;
-moz-border-radius:3px;
-webkit-border-radius:3px;
padding:6px 9px 6px 9px;
}
ul.tsc_pagination 
{
padding-bottom:1px;
}
ul.tsc_pagination  a:hover,
ul.tsc_pagination  a.current
{
color:#FFFFFF;
box-shadow:0px 1px #EDEDED;
-moz-box-shadow:0px 1px #EDEDED;
-webkit-box-shadow:0px 1px #EDEDED;
}
ul.tsc_pagination
{
margin:4px 0;
padding:0px;
height:100%;
overflow:hidden;
font:12px 'Tahoma';
list-style-type:none;
}
ul.tsc_pagination
{
float:left;
margin:0px;
padding:0px;
margin-left:5px;
}
ul.tsc_pagination  a
{
color:black;
display:block;
text-decoration:none;
padding:7px 10px 7px 10px;
}
ul.tsc_pagination  a img
{
border:none;
}
ul.tsc_pagination  a
{
color:#0A7EC5;
border-color:#8DC5E6;
background:#F8FCFF;
}
ul.tsc_pagination  a:hover,
ul.tsc_pagination  a.current
{
text-shadow:0px 1px #388DBE;
border-color:#3390CA;
background:#58B0E7;
background:-moz-linear-gradient(top, #B4F6FF 1px, #63D0FE 1px, #58B0E7);
background:-webkit-gradient(linear, 0 0, 0 100%, color-stop(0.02, #B4F6FF), color-stop(0.02, #63D0FE), color-stop(1, #58B0E7));
}
</style>
  <style>
    .example-modal .modal {
      position: relative;
      top: auto;
      bottom: auto;
      right: auto;
      left: auto;
      display: block;
      z-index: 1;
    }

    .example-modal .modal {
      background: transparent !important;
    }
  </style>
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
    
    <button type="button" id="addclass" data-toggle="modal" data-target="#modal-default" class="btn bg-olive margin">Add Class</button>
     <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Class</h4>
              </div>
              <div class="modal-body">
               <form role="form" id="addnewclass">
              <div class="box-body">
                <div class="form-group">
                  <label for="classname1">Class Name</label>
                  <input type="text" class="form-control" id="classname11" name="classname1" placeholder="Enter class name" required>
                  <input type="hidden" value="<?php echo $catid; ?>" class="form-control" id="catid1" name="catid1" >
                </div>
              </div>
              <!-- /.box-body -->

            <button type="submit" class="btn btn-primary">Submit</button>
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

      <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Catageory Name</th>
                  <th>Class name</th>
                  <th>Action</th>
                </tr>
                <?php
                
                
         
                
    if(!empty($classes)){           
                
    $i=1;
    foreach($classes as $classdata){ ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $classdata->catname; ?></td>
                  
                  <td> <?php echo $classdata->classname; ?></td>
                  <td>
                  <a class="btn bg-maroon btn-flat btn-xs" href="<?php echo base_url().'admin/catagory/deleteclass/'.$classdata->catageoryid."/".$classdata->classid; ?>">Delete</a>
                  <a class="btn bg-purple btn-flat btn-xs" href="<?php echo base_url().'admin/catagory/viewsubjects/'.$classdata->catageoryid."/".$classdata->classid; ?>">View Subjects</a>
                  </td>
                </tr>
                
             


<?php $i++;  
  }
}
    ?>
 </table>



  
    <!-- /content  -->
</div>

<script src="<?php echo $baseurl=base_url(); ?>assets/admin/customscript/classesscript.js"></script>
<?php $this->load->view('admin/sadminfooter'); ?>
