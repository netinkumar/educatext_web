<?php  $this->load->view('admin/sadminheader'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit User</li>
      </ol>
    </section>

    <!-- Main content -->
     <section class="content">
      <div class="row">
          <div class="box">
           
            <!-- /.box-header -->
            <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Quick Example</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
        
            
            
            <form role="form" action="<?php echo base_url(); ?>admin/userlists/updateuser" enctype="multipart/form-data" method="POST">
                 <div class="box-body">
                <?php foreach($userdata as $userdetail){ ?>
                    
                   <div class="form-group">
                <label for="firstname1">First Name</label>
                <input type="hidden" class="form-control" id="userid1" name="userid1" value="<?php echo $userdetail->id; ?>">
                <input type="text" class="form-control" id="firstname1" name="firstname1" value="<?php echo $userdetail->f_name; ?>" title="Letters Only" placeholder="First Name">
            </div>
            <div class="form-group">
                <label for="lastname1">Last Name</label>
                <input type="text" class="form-control" id="lastname1" name="lastname1" value="<?php echo $userdetail->l_name; ?>" title="Letters Only" placeholder="Last Name">
            </div>
             <div class="form-group">
                <label for="phonenumber1">Phone Number</label>
                <input type="number" class="form-control" id="phonenumber1" name="phonenumber1" value="<?php echo $userdetail->phone; ?>" placeholder="Phone Number">
            </div>
            <div class="form-group">
                <label for="email1">Email</label>
                <input type="email" class="form-control" id="email1" name="email1" value="<?php echo $userdetail->email; ?>" placeholder="Email">
            </div>
<!--            <div class="form-group">
                <label for="username1">Username</label>
                <input type="text" class="form-control" id="username1" name="username1" value="<?php echo $userdetail->username; ?>" placeholder="Username">
            </div>
            <div class="form-group">
                <label for="password1">Password</label>
                <input type="password" class="form-control" id="password1" name="password1"  placeholder="Password">
                <input type="hidden" class="form-control" id="password2" name="password2"  value="<?php echo $userdetail->password; ?>" placeholder="Password">
            </div>-->
             <div class="form-group">
                <label for="image1">Image</label>
                <input type="file" class="form-control" id="image1" name="image1"  placeholder="Email">
                <input type="hidden" class="form-control" id="savedimage1" name="savedimage1" value="<?php echo $userdetail->image; ?>">
            </div>

            <div class="form-group">
                <label>User Role</label>
                <select class="form-control select2" name="role1" id="role1" style="width: 100%;">
                    <option value="user">User</option>
                    <option value="author">Author</option>
                    <option value="teacher">Teacher</option>
                    <option value="parent" >Parent</option>
                    <option value="student">Student</option>
                </select>
            </div>
                    
                  
               <?php  } ?>
                </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
            <!-- /.box-body -->
          
          </div>
          <!-- /.box -->

      </div>
      <!-- /.row -->
      
    </section>

    <!-- /.content -->
  </div>

<?php $this->load->view('admin/sadminfooter'); ?>
