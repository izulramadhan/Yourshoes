<!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Dashboard</h2>
          </div>
        </div>
        <section class="no-padding-top no-padding-bottom">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon mb-2"><i class="icon-user-1"></i></div><strong>Jumlah<br>Admin</strong>
                    </div>
                    <div class="number dashtext-1"><?php echo $total_user; ?></div>
                  </div>
                  <div class="progress progress-template">
                    <div role="progressbar" style="width: 15%" aria-valuenow="<?php echo $total_user; ?>" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-1"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon mb-2"><i class="icon-user-1"></i></div><strong>Jumlah<br>Customer</strong>
                    </div>
                    <div class="number dashtext-2"><?php echo $total_customer; ?></div>
                  </div>
                  <div class="progress progress-template">
                    <div role="progressbar" style="width: 5%" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-2"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon mb-2"><i class="icon-contract"></i></div><strong>Jumlah<br>Product</strong>
                    </div>
                    <div class="number dashtext-3"><?php echo $total_product; ?></div>
                  </div>
                  <div class="progress progress-template">
                    <div role="progressbar" style="width: 10%" aria-valuenow="<?php echo $total_product; ?>" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-3"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon mb-2"><i class="icon-paper-and-pencil"></i></div><strong>Jumlah<br>Order</strong>
                    </div>
                    <div class="number dashtext text-primary"><?php echo $total_order; ?></div>
                  </div>
                  <div class="progress progress-template">
                    <div role="progressbar" style="width: 20%" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-5"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

<section class="no-padding-bottom">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Customer</h5>
                <br>
                <p class="card-text">
                  Total Customer : <?php echo $total_customer; ?>
                </p>

                <a href="<?php echo base_url('backend/Page/customer')?>" class="btn dashbg-2 text-white"><b>Lihat</b></a>
              </div>
            </div>
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Product</h5>
                <br>
                <p class="card-text">
                  Total Product : <?php echo $total_product; ?>
                </p>

                <a href="<?php echo base_url('backend/Page/product')?>" class="btn dashbg-3 text-white"><b>Lihat</b></a>
              </div>
            </div>
            <div class="card card-primary card-outline">
              <div class="card-body">
                <h5 class="card-title">Order</h5>

                <p class="card-text">
                   Total Order : <?php echo $total_order; ?>
                </p>
                <a href="<?php echo base_url('backend/Page/product')?>" class="btn dashbg-1 text-white"><b>Lihat</b></a>
              </div>
            </div><!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
          <?php foreach ($kategori as $row ) { ?>
          <!-- /.col-md-6 -->
            <div class="card">
              <div class="card-header">
                <h5 class="card-title m-0"><?php echo $row['nama_kategori'];?></h5>
              </div>
              <div class="card-body">
                <h6 class="card-title">Kategori Product <?php echo $row['nama_kategori'];?></h6>
                <a href="<?php echo base_url()?>backend/Page/category/<?php echo $row['id'];?>" class="btn btn-primary">Lihat</a>
              </div>
            </div>
         <?php } ?> 
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</section>


