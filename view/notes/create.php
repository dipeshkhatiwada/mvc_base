 <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
             <h1>Notes Management</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>user/dashboard">Home</a></li>
              <li class="breadcrumb-item active">Create Notes</li>
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
                <a href="" class="btn btn-primary">Create Notes</a> &nbsp;
                <a href="<?php echo base_url() ?>notes/index" class="btn btn-primary">List Notes</a>
                </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="" method="post" enctype="multipart/form-data" id="createnotes" novalidate="">
                <div class="card-body">
                  <?php if (isset($this->error['sucess_messsage'])) {?>
                    <div class="alert alert-success"><?php echo $this->error['sucess_messsage']; ?></div>
                  <?php }else if (isset($this->error['error_messsage'])) {?>
                    <div class="alert alert-danger"><?php echo $this->error['error_messsage'];?></div>

                 <?php } ?>
                   <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" title="Enter title" required="">
                    <?php if (isset($this->error['title'])) {?>
                     <span class="error"><?php echo $this->error['title'];?></span>
                    <?php } ?>
                  </div>
                  <div class="form-group">
                    <label for="date">Notes Date</label>
                    <input type="date" class="form-control" id="date" name="date" placeholder="Enter notes date" title="Enter notes date" required="" min="<?php echo date('Y-m-d'); ?>" >
                    <?php if (isset($this->error['date'])) {?>
                     <span class="error"><?php echo $this->error['date'];?></span>
                    <?php } ?>
                  </div> 
                  <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" placeholder="Enter Description" required="" title="Enter description"></textarea>
                    <?php if (isset($this->error['description'])) {?>
                     <span class="error"><?php echo $this->error['description'];?></span>
                    <?php } ?>
                  </div>
                  <div class="form-group">
                    <label for="status">Status</label>
                    <input type="radio" value="1" name="status" >Active
                    <input type="radio" value="0" name="status" checked="" >Deactive
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
            $('#createnotes').validate();
            // console.log('hello');
        });
    </script>
  
