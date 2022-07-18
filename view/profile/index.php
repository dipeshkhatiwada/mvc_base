
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
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
              <li class="breadcrumb-item active">List Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
         <div class="col-md-12">
      <!-- Default box -->
        <div class="card ">
              <div class="card-header">
                <h3 class="card-title">
                <a href="" class="btn btn-primary">List Profile</a> &nbsp;
                <!-- <a href="<?php echo base_url() ?>profile/create" class="btn btn-primary">Create Profile</a> -->
              </h3>
              </div><br/>
              <!-- /.card-header -->
             <table class="table table-bordered table-hover" id="customer_table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Heading</th>
                  <th>Details</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th>1.</th>
                  <th>Company Name</th>
                  <td><?php echo $this->profiledata[0]->company_name; ?></td>
                </tr>
                <tr>
                  <th>2.</th>
                  <th>Address</th>
                  <td><?php echo $this->profiledata[0]->address; ?></td>
                </tr>
                <tr>
                  <th>3.</th>
                  <th>Phone Number</th>
                  <td><?php echo $this->profiledata[0]->phone; ?></td>
                </tr>
                <tr>
                  <th>4.</th>
                  <th>Email Address</th>
                  <td><?php echo $this->profiledata[0]->email; ?></td>
                </tr>
                <tr>
                  <th>5.</th>
                  <th>Map</th>
                  <td><?php echo $this->profiledata[0]->map; ?></td>
                </tr>
                <tr>
                  <th>6.</th>
                  <th>Pan no.</th>
                  <td><?php echo $this->profiledata[0]->pan_no; ?></td>
                </tr>
                <tr>
                  <th>7.</th>
                  <th>Reg. no.</th>
                  <td><?php echo $this->profiledata[0]->reg_no; ?></td>
                </tr>
                <tr>
                  <th>8.</th>
                  <th>Established Year</th>
                  <td><?php echo $this->profiledata[0]->established_date; ?></td>
                </tr>
                <tr>
                  <th>9.</th>
                  <th>Service charge</th>
                  <td>
                    <form action="<?php echo base_url(); ?>profile/updateServiceCharge/<?php echo $this->profiledata[0]->id ?>" method="post" id="updateServiceCharge">
                    <?php echo $this->profiledata[0]->service_charge;?> %  &nbsp;  &nbsp;&nbsp; &nbsp;  &nbsp;&nbsp; &nbsp;  &nbsp;&nbsp; &nbsp;  &nbsp;&nbsp; &nbsp;  &nbsp;&nbsp;  &nbsp;&nbsp;  &nbsp;
                      <input type="number" name="service_charge" title="Enter Service charge %" min="0" max="50" required=""> &nbsp; % &nbsp;&nbsp; 
                      <input type="submit" name="btnServiceCharge" class="btn btn-primary" value="Update">
                    </form>
                  </td>
                </tr>
                <tr>
                  <th>10.</th>
                  <th>Discount </th>
                  <td>
                    <form action="<?php echo base_url(); ?>profile/updateDiscount/<?php echo $this->profiledata[0]->id ?>" method="post" id="updateDiscount">
                    <?php echo $this->profiledata[0]->discount;?> %  &nbsp;  &nbsp;&nbsp; &nbsp;  &nbsp;&nbsp; &nbsp;  &nbsp;&nbsp; &nbsp;  &nbsp;&nbsp; &nbsp;  &nbsp;&nbsp;  &nbsp;&nbsp;  &nbsp;
                      <input type="number" name="discount" title="Enter Discount %" min="0" max="50" required=""> &nbsp; % &nbsp;&nbsp; 
                      <input type="submit" name="btnDiscount" class="btn btn-primary" value="Update">
                    </form>
                  </td>
                </tr>
                <tr>
                  <th>11.</th>
                  <th>VAT</th>
                  <td>
                    <form action="<?php echo base_url(); ?>profile/updateVat/<?php echo $this->profiledata[0]->id ?>" method="post" id="updateVat">
                    <?php echo $this->profiledata[0]->vat;?> %  &nbsp;  &nbsp;&nbsp; &nbsp;  &nbsp;&nbsp; &nbsp;  &nbsp;&nbsp; &nbsp;  &nbsp;&nbsp; &nbsp;  &nbsp;&nbsp;  &nbsp;&nbsp;  &nbsp;
                      <input type="number" name="vat" title="Enter VAT %" min="0" max="50" required=""> &nbsp; % &nbsp;&nbsp; 
                      <input type="submit" name="btnVat" class="btn btn-primary" value="Update">
                    </form>
                  </td>
                </tr>
                
              </tbody>
               
             </table>

                    <a href="<?php echo base_url() ?>profile/edit/<?php echo $this->profiledata[0]->id; ?>" class="btn btn-primary" >Edit  Details  <i class="fa fa-pencil"></i></a>

            </div>

          </div>
                

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script src="<?php echo base_url(); ?>public/validation/dist/jquery.validate.min.js"></script>
  <script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript">
    $(document).ready( function () {
      // $('#customer_table').DataTable();
    } );
  </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#updateServiceCharge').validate();
            $('#updateDiscount').validate();
            $('#updateVat').validate();
            // console.log('hello');
        });
    </script>

  