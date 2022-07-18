<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Purchase Management</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo base_url() ?>user/dashboard">Home</a></li>
          <li class="breadcrumb-item active">Edit Purchase Product</li>
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
              <a href="" class="btn btn-primary">Edit Purchase Product</a>&nbsp;&nbsp;
              <a href="<?php echo base_url() ?>purchase/create" class="btn btn-primary">Create purchase</a>&nbsp;&nbsp;
              <a href="<?php echo base_url() ?>purchase/index" class="btn btn-primary"> List purchase</a>
              </h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="" method="post" enctype="multipart/form-data" id="editProductPurchase" novalidate="">
              <div class="card-body">
                <?php if (isset($this->error['sucess_messsage'])) {?>
                <div class="alert alert-success"><?php echo $this->error['sucess_messsage']; ?></div>
                <?php }else if (isset($this->error['error_messsage'])) {?>
                <div class="alert alert-danger"><?php echo $this->error['error_messsage'];?></div>
                <?php } ?>
                <div class="form-group">
                  <label for="product_id">Product name</label>
                  <select class="form-control" required="" name="product_id">
                    <?php foreach ($this->productdata as $pd) { if ($pd->id==$this->productPurchasedata[0]->product_id) {?>
                    <option value="<?php echo $pd->id; ?>" selected=""><?php echo $pd->name; ?></option>
                   <?php  } ?>
                    <option value="<?php echo $pd->id; ?>"><?php echo $pd->name; ?></option>
                    <?php } ?>
                  </select>
                  
                  <?php if (isset($this->error['product_id'])) {?>
                  <span class="error"><?php echo $this->error['product_id'];?></span>
                  <?php } ?>
                </div>
                <div class="form-group">
                  <label for="cost_price">Cost Price</label>
                  <input type="text" class="form-control" id="cost_price" name="cost_price"  title="Enter Cost Price" required="" min="0" value="<?php echo $this->productPurchasedata[0]->cost_price; ?>">
                  <?php if (isset($this->error['cost_price'])) {?>
                  <span class="error"><?php echo $this->error['cost_price'];?></span>
                  <?php } ?>
                </div>
                <div class="form-group">
                  <label for="selling_price">Selling Price</label>
                  <input type="text" class="form-control" id="selling_price" name="selling_price" title="Enter Selling Price" required="" min="0" value="<?php echo $this->productPurchasedata[0]->selling_price; ?>">
                  <?php if (isset($this->error['selling_price'])) {?>
                  <span class="error"><?php echo $this->error['selling_price'];?></span>
                  <?php } ?>
                </div>
                <div class="form-group">
                  <label for="quantity">Quantity</label>
                  <input type="number" class="form-control" id="quantity" name="quantity" title="Enter quantity" required="" min=0 value="<?php echo $this->productPurchasedata[0]->quantity; ?>">
                  <?php if (isset($this->error['quantity'])) {?>
                  <span class="error"><?php echo $this->error['quantity'];?></span>
                  <?php } ?>
                </div>
                <div class="form-group">
                  <label for="expire_date">Expire Date</label>
                  <input type="date" class="form-control" id="expire_date" name="expire_date" title="Enter paid amount" required="" min=0 value="<?php echo $this->productPurchasedata[0]->expire_date; ?>">
                  <?php if (isset($this->error['expire_date'])) {?>
                  <span class="error"><?php echo $this->error['expire_date'];?></span>
                  <?php } ?>
                </div>
                <div class="form-group">
                  <label for="description">Description</label>
                  <input type="text" class="form-control" id="description" name="description" title="Enter paid amount" required="" value="<?php echo $this->productPurchasedata[0]->description; ?>">
                  <?php if (isset($this->error['description'])) {?>
                  <span class="error"><?php echo $this->error['description'];?></span>
                  <?php } ?>
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
  $('#editProductPurchase').validate();
  
  
  });
  </script>