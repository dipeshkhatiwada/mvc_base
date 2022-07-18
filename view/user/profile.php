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
          
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Profile Management</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="<?php echo base_url() ?>user/dashboard">Home</a></li>
                  <li class="breadcrumb-item active">Create Profile</li>
                </ol>
              </div>
            </div>
            </div><!-- /.container-fluid -->
          </section>
          <!-- Main content -->
          <section class="content">
            <div class="container-fluid">
              <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                  <!-- general form elements -->
                  <div class="card ">
                    <div class="card-header">
                      <h3 class="card-title">
                      <a href="" class="btn btn-primary">Create profile</a> &nbsp;
                      </h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="<?php echo base_url() ?>profile/create" method="post" enctype="multipart/form-data" id="createprofile">
                      <div class="card-body">
                        <?php if (isset($this->error['error_messsage'])) {?>
                        <div class="alert alert-danger"><?php echo $this->error['error_messsage'];?></div>
                        <?php } ?>
                        <div class="form-group">
                          <label for="company_name">Company Name</label>
                          <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Enter Company Name" title="Enter Company Name" required>
                          <?php if (isset($this->error['company_name'])) {?>
                          <span class="error"><?php echo $this->error['company_name'];?></span>
                          <?php } ?>
                        </div>
                        
                        <div class="form-group">
                          <label for="address">address</label>
                          <input type="text" class="form-control" name="address" id="address" placeholder="Enter address" title="Enter address" required="">
                          <?php if (isset($this->error['address'])) {?>
                          <span class="error"><?php echo $this->error['address'];?></span>
                          <?php } ?>
                        </div>
                        <div class="form-group">
                          <label for="phone">Phone</label>
                          <input type="number" class="form-control" name="phone" id="phone" placeholder="Enter phone"  title="Enter phone" required="">
                          <?php if (isset($this->error['phone'])) {?>
                          <span class="error"><?php echo $this->error['phone'];?></span>
                          <?php } ?>
                        </div>
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input type="email" class="form-control" name="email" id="email" placeholder="Enter email"  title="Enter email" required="">
                          <?php if (isset($this->error['email'])) {?>
                          <span class="error"><?php echo $this->error['email'];?></span>
                          <?php } ?>
                        </div>
                        <div class="form-group">
                          <label for="pan_no">Pan Number</label>
                          <input type="text" class="form-control" id="pan_no" name="pan_no" title="Enter pan number" placeholder="Enter pan number" required="">
                          <?php if (isset($this->error['pan_no'])) {?>
                          <span class="error"><?php echo $this->error['pan_no'];?></span>
                          <?php } ?>
                        </div>
                        <div class="form-group">
                          <label for="reg_no">Registration Number</label>
                          <input type="text" class="form-control" id="reg_no" name="reg_no" title="Enter reg_no" placeholder="Enter reg_no" required="">
                          <?php if (isset($this->error['reg_no'])) {?>
                          <span class="error"><?php echo $this->error['reg_no'];?></span>
                          <?php } ?>
                        </div>
                        <div class="form-group">
                          <label for="established_date">Established Date</label>
                          <select class="form-control" name="established_date">
                            <?php for ($i=(date(Y)-15); $i <date(Y) ; $i++) {  ?>
                            <option id="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php  } ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="service_charge">Service Charge</label>
                          <input type="number" name="service_charge" class="form-control" title="Enter Service charge %" min="0" max="50" value="0" required="">
                        </div>
                        <div class="form-group">
                          <label for="discount">Discount</label>
                          <input type="number" name="discount" class="form-control" title="Enter Discount %" min="0" max="50" value="0" required="">
                        </div>
                        <div class="form-group">
                          <label for="vat">Vat</label>
                          <input type="number" name="vat" class="form-control" title="Enter Vat %" min="0" max="50" value="0" required="">
                        </div>
                        
                      </div>
                      <!-- /.card-body -->
                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary" name="btnCreate">Create</button>
                      </div>
                    </form>
                  </div>
                  <!-- /.card -->
                  <!-- Form Element sizes -->
                  
                  <!-- /.card -->
                  
                </div>
                <!--/.col (left) -->
                <!-- right column -->
                
                <!--/.col (right) -->
              </div>
              <!-- /.row -->
              </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
          </div>
          <!-- /.content-wrapper -->
          <script src="<?php echo base_url(); ?>public/validation/dist/jquery.validate.min.js"></script>
          <script type="text/javascript">
          $(document).ready(function () {
          $('#createprofile').validate();
          // console.log('hello');
          });
          </script>
          
          <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
              <!-- <b>Version</b> 3.0.0-alpha -->
            </div>
            <strong>Copyright &copy; <?php echo date('Y   M'); ?> <!-- <a href="http://adminlte.io">AdminLTE.io</a> -->.</strong> All rights
            reserved.
          </footer>
          <!-- Control Sidebar -->
          <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
          </aside>
          <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->
        <!-- jQuery -->
        <!-- Bootstrap 4 -->
        <script src="<?php echo base_url(); ?>public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- SlimScroll -->
        <script src="<?php echo base_url(); ?>public/plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="<?php echo base_url(); ?>public/plugins/fastclick/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url(); ?>public/dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo base_url(); ?>public/dist/js/demo.js"></script>
      </body>
    </html>