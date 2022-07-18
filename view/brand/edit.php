 <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
             <h1>Brand Management</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url() ?>user/dashboard">Home</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url() ?>brand/index">ListBrand</a></li>
              <li class="breadcrumb-item active">UpdateBrand</li>
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
      
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                <a href="" class="btn btn-primary">Update Brand</a> &nbsp;
                <a href="<?php echo base_url() ?>brand/create" class="btn btn-primary">Create Brand</a>&nbsp;
                <a href="<?php echo base_url() ?>brand/index" class="btn btn-primary">List Brand</a>
              </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="" method="post" enctype="multipart/form-data" id="editbrand">
                <div class="card-body">
                  <?php if (isset($this->error['sucess_messsage'])) {?>
                    <div class="alert alert-success"><?php echo $this->error['sucess_messsage']; ?></div>
                  <?php }else if (isset($this->error['error_messsage'])) {?>
                    <div class="alert alert-danger"><?php echo $this->error['error_messsage'];?></div>

                 <?php } ?>
                 
                   <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $this->branddata[0]->name;?>" title=" Enter Name " required >
                    <?php if (isset($this->error['name'])) {?>
                     <span class="error"><?php echo $this->error['name'];?></span>
                    <?php } ?>
                  </div>                 
                  
                 <!--  <div class="form-group">
                    <label for="slug">slug</label>
                    <input type="text" class="form-control" name="slug" id="slug" value="<?php echo $this->branddata[0]->slug;?>">
                  </div> -->
                  <!-- <div class="form-group">
                    <label for="exampleInputFile">Image</label>
                    <div class="input-group">
                      <div >
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                        <label class="custom-file-label" for="exampleInputFile">Choose Image</label>
                      </div>
                    </div>
                    <img src="<?php echo base_url()?>public/images/<?php echo $this->branddata[0]->image; ?>">
                    <?php if (isset($this->error['image'])) {?>
                     <span class="error"><?php echo $this->error['image'];?></span>
                    <?php } ?>
                  </div> -->
                  <div class="form-group">
                    <label for="exampleInputEmail1">Status</label>
                    <?php if ($this->branddata[0]->status==1) {?>
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
            $('#editbrand').validate();
            // console.log('hello');
        });
    </script
      
