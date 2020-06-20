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
                            <h3 class="card-title">Add Product</h3>
                          </div>
                          <!-- /.card-header -->
                          <!-- form start -->
                        <?php echo form_open_multipart('backend/Crud/tambah_aksi');?>
                            <div class="card-body">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Nama Produk</label>
                                <input type="text" class="form-control" name="product_name" placeholder="Enter product name">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Deskripsi</label>
                                <textarea type="text" class="form-control" name="product_desc" placeholder="Enter product description"></textarea>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Harga</label>
                                <input type="text" class="form-control" name="product_price" placeholder="Enter product price">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Kategori</label><br>
                                <?php foreach ($products as $u ) {?>
                                <input type="radio" name="category" value="<?php echo $u->kategori; ?>"> <?php echo $u->nama_kategori; ?></input><br>
                                <?php } ?>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Stok</label>
                                <input type="text" class="form-control" name="stok" placeholder="Enter product stok">
                              </div>
                              <div class="form-group">
                            <label for="foto">Photo</label>
                                 <input type="file" name="berkas" value="<?php echo $u->gambar; ?>"/><br><br>
                                  <input class="btn btn-primary" type="submit" value="Tambah Produk" />
                          <?php echo form_close(); ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>