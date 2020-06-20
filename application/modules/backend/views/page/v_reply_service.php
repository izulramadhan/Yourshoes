      <div class="page-content">
        <!-- Page Header-->
        <div class="page-header no-margin-bottom">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Add Product</h2>
          </div>
        </div>
        <!-- Breadcrumb-->
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('backend/Admin')?>">Home</a></li>
            <li class="breadcrumb-item active"><?php echo $judul; ?>        </li>
          </ul>
        </div>
        <section class="no-padding-top">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-12">
                <div class="block margin-bottom-sm">
                <!-- Content Header (Page header) -->
                <!-- Main content -->
                  <div class="row d-flex justify-content-center">
                      <!-- left column -->
                      <div class="col-md-4">
                        <!-- general form elements -->
                        <div class="card card-primary border-primary">
                          <div class="card-header border-primary">
                            <h3 class="card-title">Balas Pesan</h3>
                          </div>
                          <!-- /.card-header -->
                          <!-- form start -->
                        <?php foreach ($user as $u) {
                        echo form_open_multipart('backend/Crud/balasService');?>
                            <div class="card-body">
                              <div class="form-group">
                                <input type="hidden" class="form-control" name="id" value="<?php echo $u->id; ?>"/>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Nama Customer : </label>
                                <input type="text" class="form-control primary" name="nama" placeholder="<?php echo $u->nama; ?>" readonly>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Status Pesan : </label>
                                <input type="text" class="form-control primary" name="status" placeholder="<?php echo $u->status; ?>" readonly>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Pesan :</label>
                                <textarea type="text" class="form-control" name="pesan" placeholder="<?php echo $u->pesan; ?>" readonly></textarea>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Balas :</label>
                                <textarea type="text" class="form-control" name="reply" placeholder="<?php echo $u->reply;?>"></textarea>
                              </div>
                              <input class="btn btn-primary" type="submit" value="Balas" />
                          <?php echo form_close(); } ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>