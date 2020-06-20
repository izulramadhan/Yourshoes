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
                            <h3 class="card-title">Detail Customer</h3>
                          </div>
                          <!-- /.card-header -->
                        <?php foreach ($user as $u) {?>
                            <div class="card-body">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Nama : </label>
                                <input type="text" class="form-control primary" placeholder="<?php echo $u->nama; ?>" readonly>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Email : </label>
                                <input type="text" class="form-control primary" placeholder="<?php echo $u->email; ?>" readonly>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Telepon : </label>
                                <input type="text" class="form-control primary" placeholder="<?php echo $u->hp; ?>" readonly>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Alamat : </label>
                                <textarea type="text" class="form-control primary" placeholder="<?php echo $u->alamat; ?>" readonly></textarea> 
                              </div>
                          <?php } ?>
                        </div>
                              <a href="<?php echo base_url('backend/Page/service')?>" class="btn btn-primary text-white">Kembali</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>