<?php $this->load->view('admin/sadminheader'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
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
    <form  action="<?php echo base_url(); ?>admin/userlists/saveuser" enctype="multipart/form-data" method="POST" >
        <div class="box-body">
            <div class="form-group">
                <label for="firstname1">First Name</label>
                <input type="text" class="form-control" id="firstname1" name="firstname1"  title="Letters Only" placeholder="First Name">
            </div>
            <div class="form-group">
                <label for="lastname1">Last Name</label>
                <input type="text" class="form-control" id="lastname1" name="lastname1" title="Letters Only" placeholder="Last Name">
            </div>
            <div class="form-group">
                <label for="phonenumber1">Phone Number</label>
                <input type="number" class="form-control" id="phonenumber1" name="phonenumber1"  placeholder="Phone Number">
            </div>
            <div class="form-group">
                <label for="email1">Email</label>
                <input type="email" class="form-control" id="email1" name="email1"  placeholder="Email">
            </div>
<!--            <div class="form-group">
                <label for="username1">Username</label>
                <input type="text" class="form-control" id="username1" name="username1"  placeholder="Username">
            </div>-->
            <div class="form-group">
                <label for="password1">Password</label>
                <input type="password" class="form-control" id="password1" name="password1"  placeholder="Password">
            </div>
            <div class="form-group">
                <label for="image1">Image</label>
                <input type="file" class="form-control" id="image1" name="image1"  placeholder="Email">
            </div>

            <div class="form-group">
                <label>User Role</label>
                <select class="form-control select2" name="role1" id="role1" style="width: 100%;">
                    <option value="user" selected="selected">User</option>
                    <option value="author">Author</option>
                    <option value="teacher">Teacher</option>
                    <option value="parent" >Parent</option>
                    <option value="student">Student</option>
                </select>
            </div>


            <input type="submit" value="Add User" name="submit">
        </div>
    </form>

    <!-- /.content -->
</div>
<?php $this->load->view('admin/sadminfooter'); ?>
