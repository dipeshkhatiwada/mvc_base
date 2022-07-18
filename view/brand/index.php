
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
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
              <li class="breadcrumb-item active">ListBrand</li>
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
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                <a href="" class="btn btn-primary">List Brand</a> &nbsp;
                <a href="<?php echo base_url() ?>brand/create" class="btn btn-primary">Create Brand</a>
              </h3>
              </div><br/>
              <!-- /.card-header -->
             <table class="table table-bordered" id="category_table">
              <thead>
                <tr>
                  <th>SN</th>
                  <th>Name</th>
                  <!-- <th>Slug</th> -->
                  <!-- <th>Image</th> -->
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=1; foreach ($this->branddata as $bd) { ?>
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $bd->name; ?></td>
                  <!-- <td><?php echo $bd->slug; ?></td> -->
                  <!-- <td><img src="<?php echo base_url()?>public/images/<?php echo $bd->image; ?>"></td> -->
                  <td><?php if ($bd->status==1) {?>
                    <span class="label label-success">Active</span>
                  <?php }else{ ?>
                  <span class="label label-danger">De-Active</span>
                <?php }?>
                  <td>
                    <a href="<?php echo base_url() ?>brand/delete/<?php echo $bd->id; ?>" class="btn btn-danger" onclick="return confirm('Are you sure want to delete?')" >Delete <i class="fa fa-trash"></i></a>

                    <a href="<?php echo base_url() ?>brand/edit/<?php echo $bd->id; ?>" class="btn btn-primary">Edit <i class="fa fa-pencil"></i></a>
                  </td>
                </tr>
              <?php } ?>
              </tbody>
               
             </table>
            </div>

          </div>
                

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript">
    $(document).ready( function () {
      $('#category_table').DataTable();
    } );
  </script>

  