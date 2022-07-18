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
              <li class="breadcrumb-item"><a href="<?php echo base_url() ?>notes/index">List Notes</a></li>
              <li class="breadcrumb-item active">Update Notes</li>
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
      <!-- Default box -->
      
        <div class="card ">
              <div class="card-header">
                <h3 class="card-title">
                <a href="" class="btn btn-primary">Update Notes</a> &nbsp;<a href="<?php echo base_url() ?>notes/create" class="btn btn-primary">Create Notes</a>&nbsp;<a href="<?php echo base_url() ?>notes/index" class="btn btn-primary">List Notes</a>
              </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="" method="post" enctype="multipart/form-data" id="editnotes">
                <div class="card-body">
                  <?php if (isset($this->error['sucess_messsage'])) {?>
                    <div class="alert alert-success"><?php echo $this->error['sucess_messsage']; ?></div>
                  <?php }else if (isset($this->error['error_messsage'])) {?>
                    <div class="alert alert-danger"><?php echo $this->error['error_messsage'];?></div>

                 <?php } ?>
                 
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" title="Enter title" required="" value="<?php echo $this->notesdata[0]->title;?>">
                    <?php if (isset($this->error['title'])) {?>
                     <span class="error"><?php echo $this->error['title'];?></span>
                    <?php } ?>
                  </div>
                  <div class="form-group">
                    <label for="date">Notes Date</label>
                    <input type="date" class="form-control" id="date" name="date" placeholder="Enter notes date" title="Enter notes date" required="" value="<?php echo $this->notesdata[0]->date;?>" min="<?php echo date('Y-m-d'); ?>">
                    <?php if (isset($this->error['date'])) {?>
                     <span class="error"><?php echo $this->error['date'];?></span>
                    <?php } ?>
                  </div> 
                  <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" placeholder="Enter Description"><?php echo $this->notesdata[0]->description;?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Status</label>
                    <?php if ($this->notesdata[0]->status==1) {?>
                       <input type="radio" value="1" name="status" checked="">Active
                      <input type="radio" value="0" name="status">Deactive
                    <?php }else{ ?>
                      <input type="radio" value="1" name="status" >Active
                      <input type="radio" value="0" name="status" checked="" >Deactive
                    <?php } ?>
                    
                  </div>
                
                  
                </div>
                <!-- /.card-body -->
             <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="btnUpdate">Update</button>
                </div>
              </form>
            </div>
          </div>
                


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script type="text/javascript">
    
   

    $("#name").keyup(function(){
        var Text = $(this).val();
        Text = Text.toLowerCase();
        var regExp = /\s+/g;
        Text = Text.replace(regExp,'-');
        $("#slug").val(Text);        
});
  </script>
  <script src="<?php echo base_url(); ?>public/validation/dist/jquery.validate.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#editnotes').validate();
            // console.log('hello');
        });
    </script>
      <script type="text/javascript">

  