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
          <li class="breadcrumb-item active">Create purchase</li>
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
              <a href="" class="btn btn-primary">Create purchase</a> &nbsp;&nbsp;
              <a href="<?php echo base_url() ?>purchase/index" class="btn btn-primary">List purchase</a>
              </h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="" method="post" enctype="multipart/form-data" id="createpurchase" novalidate="">
              <div class="card-body">
                <?php if (isset($this->error['sucess_messsage'])) {?>
                <div class="alert alert-success"><?php echo $this->error['sucess_messsage']; ?></div>
                <?php }else if (isset($this->error['error_messsage'])) {?>
                <div class="alert alert-danger"><?php echo $this->error['error_messsage'];?></div>
                <?php } ?>
                <label for="supplier_id">Supplier Name</label>
                <div class="form-group">
                  <select class="" id="supplier_id" name="supplier_id" required="" title="Select supplier name">
                    <option value="">Select Supplier Name</option>
                    <?php  foreach ($this->supplierdata as $sd) {?>
                    <option value="<?php  echo $sd->id; ?>"><?php  echo $sd->name; ?></option>
                    <?php  } ?>
                  </select>   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <a href="<?php echo base_url() ?>supplier/create"> <label type="submit" class="btn btn-primary">Add new Supplier</label></a>
                  <?php if (isset($this->error['supplier_id'])) {?>
                  <span class="error"><?php echo $this->error['supplier_id'];?></span>
                  <?php } ?>
                </div>
                <div class="form-group">
                  <label for="bill_no">Bill Number</label>
                  <input type="text" class="form-control" id="bill_no" name="bill_no" placeholder="Enter Bill Number"  title="Enter Bill Number" required="">
                  <?php if (isset($this->error['bill_no'])) {?>
                  <span class="error"><?php echo $this->error['bill_no'];?></span>
                  <?php } ?>
                </div>
                <label>Product Details</label>
                <input type="hidden"  value="1" id="hiddencount">
                <div class="sub_add cloned-row">
                  <span class = "category">
                    <select name="category_id[]" class="category" id="category_id1" required="" title="Select category">
                      <option value="">category</option>
                      <?php  foreach ($this->categorydata as $c) {?>
                      <option value="<?php  echo $c->id; ?>"><?php  echo $c->name; ?></option>
                      <?php  } ?>
                    </select>&nbsp;
                  </span>
                    <span class = "brand">
                    <select name="brand_id[]" class="brand_id" required="" id="brand_id1" title="Select brand">
                      <option value="">Brand</option>
                      <?php  foreach ($this->branddata as $b) {?>
                      <option value="<?php  echo $b->id; ?>"><?php  echo $b->name; ?></option>
                      <?php  } ?>
                    </select>&nbsp;
                  </span>
                    <span class = "name ajxcln">
                    <select name="product_id[]" required="" title="Select name" id="name1">
                      <option value="">Product Name</option>
                    </select>&nbsp;
                  </span>
                    <span class = "semadd ajxcln">
                    <input type="number" class="cost_price" name="cost_price[]" placeholder="Cost Price" min="0" id="cost_price1" required="" title="Enter cost price">&nbsp;
                   </span>
                   <span class = "total ">
                       <input type="hidden" name="total[]" class="total" id="total1" min="0" value="0">
                   </span>
                    <span class = "subadd ajxcln2">
                       <input type="number" name="selling_price[]" placeholder="Selling Price" min="0" required="" title="Enter Selling price">&nbsp;
                        <input type="number" name="quantity[]" placeholder="Quantity" min="0" id="quantity1" class="quantity" required="" title="Enter quantity">&nbsp;
                    
                      <label class="add_more label label-success" id="buttonvalue">Add</label>
                    </span>

                  </div>
                  <input type="hidden" id="count" class="count" value="total1">
                  <?php if(isset($err['subject'])){?>
                  <div class="alert alert-danger"> <?php echo $err['subject'];?></div>
                  <?php   } ?>
                  <div class="form-group">
                    <label for="total_amount">Total Amount</label>
                    <input type="number" class="form-control" id="total_amount" name="total_amount" placeholder="Enter Total Amount"  title="Enter total amount" required="" readonly="readonly" value="0">
                    <?php if (isset($this->error['total_amount'])) {?>
                    <span class="error"><?php echo $this->error['total_amount'];?></span>
                    <?php } ?>
                  </div>
                  <div class="form-group">
                    <label for="discount">Discount</label>
                    <input type="number" class="form-control" id="discount" name="discount" title="Enter discount amount" required="" min=0 value="0">
                    <?php if (isset($this->error['discount'])) {?>
                    <span class="error"><?php echo $this->error['discount'];?></span>
                    <?php } ?>
                  </div>
                  <div class="form-group">
                    <label for="paid_amount">Paid Amount</label>
                    <input type="number" class="form-control" id="paid_amount" name="paid_amount" title="Enter paid amount" required="" min=0 value=0>
                    <?php if (isset($this->error['paid_amount'])) {?>
                    <span class="error"><?php echo $this->error['paid_amount'];?></span>
                    <?php } ?>
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
        //validation
        $('#createpurchase').validate();
    

        // var count=0;
        $(document).on("click", ".add_more", function () {
          var c=$('#hiddencount').val();
          var count=$('#count').val();
          c= parseInt(c) +1;
          $('#count').val(count+',total'+c);
          $('#hiddencount').val(c);
            var $clone = $('.cloned-row:eq(0)').clone(true);
            //alert("Clone number" + clone);
            $clone.find('span.brand > [id]').each(function(){this.id='brand_id'+c});
            $clone.find('span.name > [id]').each(function(){this.id='name'+c});
            $clone.find('span.semadd > [id]').each(function(){this.id='cost_price'+c});
            $clone.find('span.category > [id]').each(function(){this.id='category_id'+c});
            $clone.find('span.subadd > [id]').each(function(){this.id='quantity'+c});
            $clone.find('span.total > [id]').each(function(){this.id='total'+c});
            // $clone.find('span.count > [id]').each(function(){this.id='total'+c});
            // $('.count').id('total'+c);
            $clone.find('.add_more').after("&nbsp;<label class='remove1 label label-danger' id='buttonless'>Remove</label>")
            $clone.attr('id', "added"+(++c));
            $(this).parents('.sub_add').after($clone);
          });

        // removing cloned part
      $(document).on('click', ".remove1", function (){
      var len = $('.cloned-row').length;
        if(len=>1){
          var qid=$(this).parents('.sub_add').attr('id');//added+'n'

          var n='total'+(parseFloat(qid.substr(5))-1);
          // alert(n);
          
          var count=$('#count').val();
          var arr=count.split(",");//converting to array 
          var index=arr.indexOf(n);
          arr.splice(index,1);
          // alert(arr.indexOf(n));
          //removing the remove cloned element

          var ttl=arr.toString();//array to string
          $('#count').val(ttl);
          // alert(arr);
          $(this).parents('.sub_add').remove();

          var count=$('#count').val();
          var arr=count.split(",");
          var allamount=0.0;
          $.each(arr, function( index, value ) {
            allamount+=parseFloat($('#'+value).val());
          });
          $('#total_amount').val(allamount);
        }
      });

      ////   ajax work  ////
        $('.brand_id').change(function(){
          var a=$(this).attr('id');
          // var n=a.slice(8, 9);
          if (a!=null) {
            // var n=a.substr(8);
            var n=a.slice(8, 9);

          }
          // alert(a);
          var x = '#category_id'+n;
          // alert(x);
          var path="<?php echo base_url(); ?>"+'product/getProductName';
          var b=$(x).val();
          var c=$('#brand_id'+n).val();
          $.ajax({
              url:path,
              data:{'category_id':b,'brand_id':c},
              method:'post',
              success:function(resp){
                
                var x='#name'+n;
                $(x).empty();
                $(x).append(resp);
                // console.log(x);
              }
            });
        });

        /// calculating total//

        $('.quantity').change(function(){
          var qid=$(this).attr('id');
          var n=qid.substr(8);
          
          var cost_price=$('#cost_price'+n).val();
          var quantity=parseFloat($('#quantity'+n).val());
          
          // alert(cost_price);
          // alert(quantity);
          
          var total_amount=cost_price*quantity;
          // console.log(total_amount);
          $('#total'+n).val(total_amount);

          var count=$('#count').val();
          var arr=count.split(",");
          var allamount=0.0;
          $.each(arr, function( index, value ) {
            allamount+=parseFloat($('#'+value).val());
          });
          // alert(allamount);
          $('#total_amount').val(allamount);
       });

    ///cost price eent capturing///
         $('.cost_price').change(function(){
          var qid=$(this).attr('id');
          var n=qid.substr(10);
          
          var cost_price=$('#cost_price'+n).val();
          var quantity=parseFloat($('#quantity'+n).val());
          
          // alert(cost_price);
          // alert(quantity);
          
          var total_amount=cost_price*quantity;
          // console.log(total_amount);
          $('#total'+n).val(total_amount);

          var count=$('#count').val();
          var arr=count.split(",");
          var allamount=0.0;
          $.each(arr, function( index, value ) {
            allamount+=parseFloat($('#'+value).val());
          });
          // alert(allamount);
          $('#total_amount').val(allamount);
       });  

      

    });
    </script>
    