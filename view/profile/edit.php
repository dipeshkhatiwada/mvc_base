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
          <li class="breadcrumb-item active">Edit Profile </li>
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
              <a href="" class="btn btn-primary">Edit Profile </a>&nbsp;&nbsp;
              <a href="<?php echo base_url() ?>profile/index" class="btn btn-primary"> List profile</a>
              </h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="" method="post" enctype="multipart/form-data" id="editProfile" novalidate="">
              <div class="card-body">
                <?php if (isset($this->error['sucess_messsage'])) {?>
                <div class="alert alert-success"><?php echo $this->error['sucess_messsage']; ?></div>
                <?php }else if (isset($this->error['error_messsage'])) {?>
                <div class="alert alert-danger"><?php echo $this->error['error_messsage'];?></div>
                <?php } ?>
                
                <div class="form-group">
                  <label for="company_name">Company name</label>
                  <input type="text" class="form-control" id="company_name" name="company_name"  title="Enter Company Name" required=""  value="<?php echo $this->profiledata[0]->company_name; ?>">
                  <?php if (isset($this->error['company_name'])) {?>
                  <span class="error"><?php echo $this->error['company_name'];?></span>
                  <?php } ?>
                </div>
                <div class="form-group">
                  <label for="address">Address</label>
                  <input type="text" class="form-control" id="address" name="address" title="Enter address" required="" value="<?php echo $this->profiledata[0]->address; ?>">
                  <?php if (isset($this->error['address'])) {?>
                  <span class="error"><?php echo $this->error['address'];?></span>
                  <?php } ?>
                </div>
                <div class="form-group">
                  <label for="phone">Phone Number</label>
                  <input type="number" class="form-control" id="phone" name="phone" title="Enter phone number" required="" value="<?php echo $this->profiledata[0]->phone; ?>">
                  <?php if (isset($this->error['phone'])) {?>
                  <span class="error"><?php echo $this->error['phone'];?></span>
                  <?php } ?>
                </div>
                <div class="form-group">
                  <label for="email">Email Address</label>
                  <input type="text" class="form-control" id="email" name="email" title="Enter email" required="" value="<?php echo $this->profiledata[0]->email; ?>">
                  <?php if (isset($this->error['email'])) {?>
                  <span class="error"><?php echo $this->error['email'];?></span>
                  <?php } ?>
                </div>
                <div class="form-group">
                  <label for="pan_no">Pan Number</label>
                  <input type="text" class="form-control" id="pan_no" name="pan_no" title="Enter pan number" required="" value="<?php echo $this->profiledata[0]->pan_no; ?>">
                  <?php if (isset($this->error['pan_no'])) {?>
                  <span class="error"><?php echo $this->error['pan_no'];?></span>
                  <?php } ?>
                </div>
                <div class="form-group">
                  <label for="reg_no">Registration Number</label>
                  <input type="text" class="form-control" id="reg_no" name="reg_no" title="Enter reg_no" required="" value="<?php echo $this->profiledata[0]->reg_no; ?>">
                  <?php if (isset($this->error['reg_no'])) {?>
                  <span class="error"><?php echo $this->error['reg_no'];?></span>
                  <?php } ?>
                </div>
                <div class="form-group">
                  <label for="established_date">Established Date</label>
                  <select class="form-control" name="established_date">
                    <?php for ($i=(date(Y)-15); $i <date(Y) ; $i++) { if ($i==$this->profiledata[0]->established_date) {?>
                      <option id="<?php echo $i; ?>" selected=""><?php echo $i; ?></option>
                    <?php } ?>
                      <option id="<?php echo $i; ?>"><?php echo $i; ?></option>
                   <?php  } ?>
                  </select>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary" name="btnUpdate">Update</button>
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
  //validation
  $('#editProfile').validate();
  
  
  });
  </script>