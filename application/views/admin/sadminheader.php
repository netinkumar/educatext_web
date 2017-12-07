<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link href="<?php echo $baseurl=base_url(); ?>assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo $baseurl=base_url(); ?>assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo $baseurl=base_url(); ?>assets/admin/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo $baseurl=base_url(); ?>assets/admin/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $baseurl=base_url(); ?>assets/admin/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo $baseurl=base_url(); ?>assets/admin/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo $baseurl=base_url(); ?>assets/admin/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo $baseurl=base_url(); ?>assets/admin/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo $baseurl=base_url(); ?>assets/admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo $baseurl=base_url(); ?>assets/admin/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo $baseurl=base_url(); ?>assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <script src="<?php echo $baseurl=base_url(); ?>assets/admin/bower_components/jquery/dist/jquery.min.js"></script>
</head>
 <body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
        
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo $baseurl=base_url().'assets/user/images/'.$_SESSION['userdata'][0]->image; ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION['userdata'][0]->username; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo $baseurl=base_url().'assets/user/images/'.$_SESSION['userdata'][0]->image; ?>" class="img-circle" alt="User Image">

                <p>
                 <?php echo $_SESSION['userdata'][0]->username; ?> - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
           
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo base_url(); ?>admin/welcomead/adminlogout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo $baseurl=base_url().'assets/user/images/'.$_SESSION['userdata'][0]->image; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['userdata'][0]->username; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="<?php echo $baseurl=base_url().'admin'; ?>"><i class="fa fa-circle-o"></i> Dashboard</a></li>
          </ul>
        </li>
         <?php if($_SESSION['userdata'][0]->role=="admin"){ ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>User Management</span>
            <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
             </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo $baseurl=base_url(); ?>admin/userlists"><i class="fa fa-circle-o"></i>User List</a></li>
            <li><a href="<?php echo $baseurl=base_url(); ?>admin/userlists/userform"><i class="fa fa-circle-o"></i>Add User</a></li>
          </ul>
        </li>
         <?php } ?>
        
        
           <?php if($_SESSION['userdata'][0]->role=="admin"){ ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Teacher Requested</span>
            <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
             </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo $baseurl=base_url(); ?>admin/userlists/newteacherreq"><i class="fa fa-circle-o"></i>New Requests</a></li>
            <li><a href="<?php echo $baseurl=base_url(); ?>admin/userlists/allteacherreq"><i class="fa fa-circle-o"></i>All Requests</a></li>
          </ul>
        </li>
         <?php } ?>
        
        <?php if($_SESSION['userdata'][0]->role=="admin" || $_SESSION['userdata'][0]->role=="author" ){ ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-file-text"></i>
            <span>Author Management</span>
            <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
             </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo $baseurl=base_url(); ?>admin/author/viewquotes"><i class="fa fa-circle-o"></i>All Quotes</a></li>
            <li><a href="<?php echo $baseurl=base_url(); ?>admin/author/addquotes"><i class="fa fa-circle-o"></i>Add Quotes</a></li>
             <li><a href="<?php echo $baseurl=base_url(); ?>admin/author/dailyquotes"><i class="fa fa-circle-o"></i>Daily Quotes</a></li>
          </ul>
        </li>
        <?php } ?>
        <?php if($_SESSION['userdata'][0]->role=="admin" || $_SESSION['userdata'][0]->role=="teacher" ){ ?>
           <li class="treeview">
          <a>
            <i class="fa fa-book"></i>
            <span>Teach Management</span>
            <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
             </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo $baseurl=base_url(); ?>admin/teacher/viewnotes"><i class="fa fa-circle-o"></i>Tech Notes</a></li>
            <li><a href="<?php echo $baseurl=base_url(); ?>admin/teacher/addnotes"><i class="fa fa-circle-o"></i>Add Tech Notes</a></li>
              <li><a href="<?php echo $baseurl=base_url(); ?>admin/teacher/teachcatageories"><i class="fa fa-circle-o"></i>Teach Categories</a></li>
          </ul>
        </li>
        <?php } ?>
        
            <?php if($_SESSION['userdata'][0]->role=="admin"){ ?>
            <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i>
            <span>E-book Management</span>
            <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
             </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo $baseurl=base_url(); ?>admin/ebookctrl/viewcatageory"><i class="fa fa-circle-o"></i>E-book Catageories</a></li>
            <li><a href="<?php echo $baseurl=base_url(); ?>admin/ebookctrl/addcatageory"><i class="fa fa-circle-o"></i>Add E-book Catageory</a></li>
          </ul>
        </li>
            <?php } ?>
        
        
        
        
         <?php if($_SESSION['userdata'][0]->role=="admin"){ ?>
          <li class="treeview">
          <a href="#">
            <i class="fa fa-home"></i>
            <span>Category Management</span>
            <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
             </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo $baseurl=base_url(); ?>admin/catagory/viewcats"><i class="fa fa-circle-o"></i>View Categories</a></li>
            <li><a href="<?php echo $baseurl=base_url(); ?>admin/catagory/addcatagory"><i class="fa fa-circle-o"></i>Add Category</a></li>
          </ul>
        </li>
         <?php } ?>
         <?php if($_SESSION['userdata'][0]->role=="admin"){ ?>
           <li class="treeview">
          <a href="#">
            <i class="fa fa-home"></i>
            <span>mp3/pdf</span>
            <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
             </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo $baseurl=base_url(); ?>admin/catagory/viewmp3"><i class="fa  fa-music"></i>View mp3</a></li>
            <li><a href="<?php echo $baseurl=base_url(); ?>admin/catagory/viewpdf"><i class="fa fa-file-pdf-o"></i>View pdf</a></li>
          </ul>
        </li>
        
         <?php } ?>
        
         <?php if($_SESSION['userdata'][0]->role=="admin"){ ?>
          <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Static Pages</span>
            <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
             </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo $baseurl=base_url(); ?>admin/staticpagec/viewpages"><i class="fa fa-circle-o"></i>View Static Pages</a></li>
            <li><a href="<?php echo $baseurl=base_url(); ?>admin/staticpagec/addpages"><i class="fa fa-circle-o"></i>Add Static Pages</a></li>
          </ul>
        </li>
         <?php } ?>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  
  
