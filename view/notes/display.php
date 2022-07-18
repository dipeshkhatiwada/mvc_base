<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
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
          <li class="breadcrumb-item active">DisplayNotes</li>
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
          
            <div class="table-responsive">
              <table class="table">
                <tr>
                  <th style="width:50%">Title:</th>
                  <td><strong><?php echo $this->notesdata[0]->title; ?></strong></td>
                </tr>
                <tr>
                  <th>Date :</th>
                  <td>Rs. <?php echo $this->notesdata[0]->date; ?></td>
                </tr>
                <tr>
                  <th>Description</th>
                  <td><?php echo $this->notesdata[0]->description; ?>
                  </td>
                </tr>
              </table>
              <form action="<?php echo base_url() ?>notes/display/<?php echo $this->notesdata[0]->id; ?>" method="post"  >
                
                <button type="submit" class="btn btn-success form-control" name="btnDone">Done &nbsp;  <i class="fa fa-thumbs-up"></i></button>
              </div>
              </form>
            </div>
          </div>
        </div>
        
      </section>
      <!-- /.content -->
    </div>