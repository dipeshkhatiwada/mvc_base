 <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
             <h1>Change Password</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>user/dashboard">Home</a></li>
              <li class="breadcrumb-item active">Change Password</li>
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
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                Change Password
                </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="" method="post" enctype="multipart/form-data" id="ChangePassword" novalidate="">
                <div class="card-body">
                  <?php if (isset($this->error['sucess_messsage'])) {?>
                    <div class="alert alert-success"><?php echo $this->error['sucess_messsage']; ?>
                    </div>
                  <?php }else if (isset($this->error['error_messsage'])) {?>
                    <div class="alert alert-danger"><?php echo $this->error['error_messsage'];?></div>

                 <?php } ?>
                   <div class="form-group">
                    <label for="old_password">Old Password</label>
                    <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Enter old password" title="Enter old password" required>
                    <?php if (isset($this->error['old_password'])) {?>
                     <span class="error"><?php echo $this->error['old_password'];?></span>
                    <?php } ?>
                  </div> 
                   <div class="form-group">
                    <label for="new_password">New Password</label>
                    <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Enter New password" title="Enter New password" required>
                    <?php if (isset($this->error['new_password'])) {?>
                     <span class="error"><?php echo $this->error['new_password'];?></span>
                    <?php } ?>
                  </div> 
                   <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder ="Enter Confirm password" title="Enter Confirm password" required>
                    <?php if (isset($this->error['confirm_password'])) {?>
                     <span class="error"><?php echo $this->error['confirm_password'];?></span>
                    <?php } ?>
                  </div>                 
                  
                 
                  
                </div>
                <!-- /.card-body -->
             <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="btnChangePassword">Change Password</button>
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
            $('#ChangePassword').validate();
            // console.log('hello');
        });
    </script>
      <script type="text/javascript">
    
    
    $("#name").keyup(function(){
        var Text = $(this).val();
        Text = Text.toLowerCase();
        var regExp = /\s+/g;
        Text = Text.replace(regExp,'-');
        $("#slug").val(Text);        
      });
  </script>
