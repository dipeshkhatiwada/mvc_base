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
          <li class="breadcrumb-item"><a href="<?php echo base_url() ?>purchase/index">List Purchase</a></li>
          <li class="breadcrumb-item active">Purchase Details</li>
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
              <a href="" class="btn btn-primary">Purchase Details</a>&nbsp;&nbsp;
              <a href="<?php echo base_url() ?>purchase/create" class="btn btn-primary">Create purchase</a>&nbsp;&nbsp;
              <a href="<?php echo base_url() ?>purchase/index" class="btn btn-primary">List purchase</a>
              </h3>
            </div>
            <!-- /.card-header -->
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                  <i class="fa fa-user"></i> <?php echo $this->purchasedata[0]->admin_name; ?>
                  <small class="float-right">Date: <?php echo $this->purchasedata[0]->created_date; ?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong><?php echo $this->purchasedata[0]->supplier_name; ?></strong><br>
                    Address: <?php echo $this->purchasedata[0]->address; ?><br>
                    Phone: <?php echo $this->purchasedata[0]->phone; ?><br>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Bill No.  #  <?php echo $this->purchasedata[0]->bill_no; ?></b><br>
                  <br>
                  <!-- <b>Order ID:</b> 4F3S8J<br>
                  <b>Payment Due:</b> 2/22/2014<br>
                  <b>Account:</b> 968-34567 -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>S.N.</th>
                        <th>Product Name</th>
                        <th>Cost Price</th>
                        <th>Selling Price</th>
                        <th>Quantity</th>
                        <th>Expire date</th>
                        <th>Description</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                      <?php $i=1; foreach ($this->productPurchasedata as $ppd) { ?>
                      <tr>
                        
                        
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $ppd->product_name; ?></td>
                        <td><?php echo $ppd->cost_price; ?></td>
                        <td><?php echo $ppd->selling_price; ?></td>
                        <td><?php echo $ppd->quantity; ?></td>
                        <?php if ($ppd->status==0) { ?>
                        
                        
                        <form  action="<?php echo base_url() ?>purchase/updatePurchaseProduct/<?php echo $this->purchasedata[0]->id; ?>" method="post" id="updatePurchaseProduct<?php echo $i; ?>">
                          <td>
                            <input type="date" class="form-control" name="expire_date" placeholder="Enter Expire date"  title="Enter Expire date" required="" >
                          </td>
                          <td>
                            <input type="text" class="form-control" name="description" placeholder="Description"  title="Enter Description" required="">
                            <input type="hidden" name="id" value="<?php echo $ppd->id; ?>">
                          </td>
                          <td>
                            <button type="submit" class="btn btn-primary btnUpdate" id="<?php echo $i; ?>"" name="btnUpdate">update <i class="fa fa-pencil"></i></button>
                        </form>
                          <?php  }else{ ?>
                          <td><?php echo $ppd->expire_date; ?></td>
                          <td><?php echo $ppd->description; ?></td>
                          <td>
                            <a href="<?php echo base_url() ?>purchase/editPurchaseProduct/<?php echo $ppd->id; ?>" class="btn btn-primary">Edit <i class="fa fa-pencil"></i></a>
                            <?php } ?>
                            <a href="<?php echo base_url() ?>purchase/deletePurchaseProduct/<?php echo $ppd->id; ?>" class="btn btn-danger" onclick="return confirm('Are you sure want to delete?')" >Delete <i class="fa fa-trash"></i></a>
                          </td>
                          
                          
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
                <div class="row">
                  <!-- accepted payments column -->
                  <div class="col-5">
                    
                  </div>
                  <!-- /.col -->
                  <div class="col-7">
                    <div class="table-responsive">
                      <table class="table">
                        <tr>
                          <th style="width:50%">Total Amount:</th>
                          <td><strong>Rs. <?php echo $this->purchasedata[0]->total_amount; ?></strong></td>
                        </tr>
                        <tr>
                          <th>Discount :</th>
                          <td>Rs. <?php echo $this->purchasedata[0]->discount; ?></td>
                        </tr>
                        <tr>
                          <th>Paid Amount:</th>
                          <td>Rs. <?php echo $this->purchasedata[0]->paid_amount; ?></td>
                        </tr>
                        <tr>
                          <th>Dues Amount:</th>
                          <td><strong>Rs. <?php echo ($this->purchasedata[0]->total_amount - $this->purchasedata[0]->discount - $this->purchasedata[0]->paid_amount); ?></strong></td>
                        </tr>
                        <tr>
                          <th>Made Payment:</th>
                          <td>
                            <form action="<?php echo base_url() ?>purchase/madePayment/<?php echo $this->purchasedata[0]->id; ?>" method="post" id="paymentForm" >
                            <strong>Rs. &nbsp; </strong><input type="number" name="payment" value="0" max="<?php echo ($this->purchasedata[0]->total_amount - $this->purchasedata[0]->discount - $this->purchasedata[0]->paid_amount); ?>" min="0" title="Enter valid Amount"> &nbsp; 
                            <button type="submit" class="btn btn-success">Pay  <i class="fa fa-money"></i></button>
                          </form>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
                <!-- this row will not appear when printing -->
                <div class="row no-print">
                  <div class="col-12">
                    <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                    <!-- <button type="button" class="btn btn-success float-right"><i class="fa fa-credit-card"></i> Made
                    Payment
                    </button>
                    </form> -->
                    <!-- <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fa fa-download"></i> Generate PDF
                    </button> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
          
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      <script src="<?php echo base_url(); ?>public/validation/dist/jquery.validate.min.js"></script>
      <script type="text/javascript">
      $(document).ready(function () {
      // $(document).on('click', ".btnUpdate", function (){
      //  var a=$(this).attr('id');
      //  alert('#updatePurchaseProduct'+a);
      
      // });
      $('#updatePurchaseProduct2').validate();
      $('#paymentForm').validate();
      // console.log('hello');
      });
      </script>