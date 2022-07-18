<?php
@session_start();
  if (isset($_COOKIE['admin_username'])&&!empty($_COOKIE['admin_username'])) {
      $_SESSION['admin_name']=$_COOKIE['admin_name'];
      $_SESSION['admin_username']=$_COOKIE['admin_username'];
      $_SESSION['admin_email']=$_COOKIE['admin_email'];
      $_SESSION['admin_image']=$_COOKIE['admin_image'];
      if (isset($_COOKIE['cname'])) {
       $_SESSION['cname']=$_COOKIE['cname'];
       $_SESSION['address']=$_COOKIE['address'];
        $_SESSION['phone']=$_COOKIE['phone'];
      }
      
  }
  if (!isset($_SESSION['admin_username'])||empty($_SESSION['admin_username'])) {
    $path=base_url().'user/login';
    header("location:$path");
    $_SESSION['error']='Please! Login to proceed';
  }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Inventory| <?php echo $this->title;?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"> -->
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<script src="<?php echo base_url(); ?>public/plugins/jquery/jquery.min.js"></script>
<style type="text/css">
  img{
    height: 100px;
    width: 150px;
  }
  .error{
    color: #f00;
  }
</style>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand border-bottom navbar-dark bg-primary">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo base_url(); ?>user/dashboard" class="nav-link"><?php echo $_SESSION['cname']; ?></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo base_url(); ?>user/dashboard" class="nav-link">(<?php echo $_SESSION['address']; ?>)</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo base_url(); ?>user/dashboard" class="nav-link"><i class="fa fa-phone"></i> &nbsp; <?php echo $_SESSION['phone']; ?></a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <!-- <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
    </form> -->

    <!-- Right navbar links -->
    <!-- <ul class="navbar-nav ml-auto">
      
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
          <i class="fa fa-th-large"></i>
        </a>
      </li>
    </ul> -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <?php if (isset($this->notification)) {?>
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-bell"></i>
          <span class="badge badge-danger navbar-badge"><?php echo count($this->notification);?> </span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header"><?php echo count($this->notification);?> New Notifications</span>
          <div class="dropdown-divider"></div>
          <?php foreach ($this->notification as $nf) { ?>
             <a href="<?php echo base_url(); ?>notes/display/<?php echo  $nf->id; ?>" class="dropdown-item"><span class="float-center text-muted "><?php echo $nf->title; ?></span>
            <!-- <span class="float-right text-muted text-sm">3 mins</span> -->
          </a>
          <?php } ?>
          <div class="dropdown-divider"></div>
          <div class="dropdown-divider mt-3"></div>
      </li>
      <?php } ?>
      <!-- user dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-user"></i>
          <span class="navbar-light"><?php echo $_SESSION['admin_name']; ?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-dark dropdown-menu-right">
          <span class="dropdown-item dropdown-header"><i class="fa fa-bell"></i>  Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="<?php echo base_url(); ?>user/changePassword" class="dropdown-item"><span class="float-center text-muted ">Change Password</span></a>
          <a href="user/changePassword" class="dropdown-item text-dark">
            <!-- <i class="fa fa-envelope mr-2"></i> -->
            <span class="float-left text-muted "><?php echo $_SESSION['admin_name']; ?></span>
            <span class="float-right ">View Profile</span>
          </a>
         
          <div class="dropdown-divider"></div>
          <a href="<?php echo base_url(); ?>user/logout" class="dropdown-item dropdown-footer ">
             <span class="float-center text-muted "><i class="nav-icon fa fa-sign-out"></i>Log out</a></span>
            
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
          <i class="fa fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url(); ?>user/dashboard" class="brand-link bg-info">
      <img src="<?php echo base_url(); ?>public/dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Inventory System</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex ">
        <div class="image">
          <img src="<?php echo base_url(); ?>public/images/<?php echo $_SESSION['admin_image']; ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="" class="d-block"><?php echo $_SESSION['admin_name']; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-item nav-pills">
            <a href="<?php echo base_url(); ?>user/dashboard" class="nav-link">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-pie-chart"></i>
              <p>
                Category Management
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>category/create" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Create Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>category/index" class="nav-link">
                  <i class="fa fa-list-ul nav-icon"></i>
                  <p>List Category</p>
                </a>
              </li>
             
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-tasks"></i>
              <p>
                Brand Management
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>brand/create" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Create Brand</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>brand/index" class="nav-link">
                  <i class="fa fa-list-ul nav-icon"></i>
                  <p>List Brand</p>
                </a>
              </li>
             
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-male"></i>
              <p>
                Supplier Management
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>supplier/create" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Create Supplier</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>supplier/index" class="nav-link">
                  <i class="fa fa-list-ul nav-icon"></i>
                  <p>List Supplier</p>
                </a>
              </li>
             
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Customer Management
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>customer/create" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Create Customer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>customer/index" class="nav-link">
                  <i class="fa fa-list-ul nav-icon"></i>
                  <p>List Customer</p>
                </a>
              </li>
             
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-table"></i>
              <p>
                Product Management
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>product/create" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Create Product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>product/index" class="nav-link">
                  <i class="fa fa-list-ul nav-icon"></i>
                  <p>List Product</p>
                </a>
              </li>
             
            </ul>
          </li> <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-shopping-cart"></i>
              <p>
                Purchase Management
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>purchase/create" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Create Purchase</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>purchase/index" class="nav-link">
                  <i class="fa fa-list-ul nav-icon"></i>
                  <p>List Purchase</p>
                </a>
              </li>
             
            </ul>
          </li>
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-upload"></i>
              <p>
                Sales Management
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>sales/create" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Create Sales</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>sales/index" class="nav-link">
                  <i class="fa fa-list-ul nav-icon"></i>
                  <p>List Sales</p>
                </a>
              </li>
             
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-credit-card"></i>
              <p>
                Expenses Management
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>expenses/create" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Create Expenses</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>expenses/index" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>List Expenses</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>expenses/heading" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Expenses Heading</p>
                </a>
              </li>
             
            </ul>
          </li>
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-calendar"></i>
              <p>
                Notes Management
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>notes/create" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Create Notes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>notes/index" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>List Notes</p>
                </a>
              </li>
             
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?php echo base_url(); ?>purchaseReturn/index" class="nav-link">
              <i class="nav-icon fa fa-cart-arrow-down"></i>
              <p>
               Purchase Return
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?php echo base_url(); ?>salesReturn/index" class="nav-link">
              <i class="nav-icon fa fa-upload"></i>
              <p>
               Sales Return
              </p>
            </a>
          </li>
           <li class="nav-item has-treeview">
            <a href="<?php echo base_url(); ?>profile/index" class="nav-link">
              <i class="nav-icon fa fa-cogs"></i>
              <p>
               Setting
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?php echo base_url(); ?>user/logout" class="nav-link">
              <i class="nav-icon fa fa-sign-out"></i>
              <p>
                Log out
              </p>
            </a>
           
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   