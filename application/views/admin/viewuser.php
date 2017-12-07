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
        <li class="active">Userlist</li>
      </ol>
    </section>
 
     <div class="post">
                 <div class="box-body">
                <?php foreach($user as $userdetail){ ?>
                      <span class="username">
                          <a href="<?php echo base_url() ?>admin/userlists/edituser/<?php echo $userdetail->id; ?>" class="pull-right btn-box-tool"><i class="fa  fa-edit"></i></a>
                        </span>
                   <div class="form-group">
                <label for="firstname1">First Name:</label>
                <span >  <?php echo $userdetail->f_name; ?></span>
            </div>
            <div class="form-group">
                <label for="lastname1">Last Name</label>
                <span> <?php echo $userdetail->l_name; ?></span>
             </div>
             <div class="form-group">
                <label for="phonenumber1">Phone Number</label>
                <span> <?php echo $userdetail->phone; ?></span>
             </div>
            <div class="form-group">
                <label for="email1">Email</label>
                 <span> <?php echo $userdetail->email; ?></span>
            </div>
          
             <div class="form-group">
                <label for="image1">Image</label>
                <div class="pull-left image">
                    
                    
                    <img class="profile-user-img img-responsive img-square" src="<?php echo base_url().'assets/user/images/'.$userdetail->image ?>" alt="Attachment Image">
<!--         <img src="<?php echo base_url().'assets/user/images/'.$userdetail->image ?>" class="img-circle" alt="User Image">-->
        </div>
               
             </div>

            <div class="form-group">
                <label>User Role</label>
                <span> <?php echo $userdetail->role; ?></span>
            </div>
                <?php  } ?>
                </div>
     </div>
              <!-- /.box-body -->

   
    
</div>
<?php $this->load->view('admin/sadminfooter'); ?>