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
    <a href="<?php echo base_url().'admin/catagory/addpdf' ?>" type="button" id="addpdf"  class="btn btn-block btn-success">Add pdf</a>
 <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Name</th>
                  <th>File</th>
                  <th>Action</th>
                </tr>
                <?php
                
                
                
                
    if(!empty($pdf)){           
                
    $i=1;
    foreach($pdf as $pdfdata){ ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $pdfdata->name; ?></td>
                  
                  <td>
                          <a href="<?php echo base_url().'assets/user/pdf/'.$pdfdata->name ?>" download>Download</a>
</td>
                  <td>
                  <a class="btn btn-block btn-danger btn-flat" href="<?php echo base_url().'admin/catagory/deletepdf/'.$pdfdata->id ?>">Delete</a>
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
