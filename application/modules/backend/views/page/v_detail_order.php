      <div class="page-content">
        <!-- Page Header-->
        <div class="page-header no-margin-bottom">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Detail Order</h2>
          </div>
        </div>
        <!-- Breadcrumb-->
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('backend/Admin')?>">Home</a></li>
            <li class="breadcrumb-item active">Order        </li>
            <li class="breadcrumb-item active"><?php echo $judul; ?>        </li>
            <div class="no-margin-bottom ml-auto mr-3">
              <?php foreach ($jumlah_total as $u) {
                echo form_open_multipart('backend/Crud/prosesOrder/'.$id_order);?>
                      <div class="form-group">
                        <input type="hidden" class="form-control" name="jumlah_total" value="Rp. <?php echo number_format($u,0,",",".");?>"/>
                      </div>
              <?php foreach ($mail as $i) {?>
                      <div class="form-group">
                        <input type="hidden" class="form-control" name="email" value="<?php echo $i->email;?>"/>
                      </div>
                      <div class="form-group">
                        <input type="hidden" class="form-control" name="nama" value="<?php echo $i->nama;?>"/>
                      </div>
              <?php } ?>
                      <input class="btn btn-sm btn-success text-white" type="submit" value="Proses" />
              <?php echo form_close(); } ?>
            </div>
          </ul>
        </div>
        <section class="no-padding-top">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-12">
                <div class="block margin-bottom-sm">
                    <div class="row d-flex justify-content-center">
                      <div class="card card-primary">
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                          <table class="table table-striped text-nowrap border-primary">
                            <thead class="text-white" style="font-size: 15px;">
                              <tr>
                                <th>No</th>
                                <th>Produk</th>
                                <th>Qty</th>
                                <th>Harga</th>
                              </tr>
                            </thead>
                            <tbody class="text-white" style="font-size: 14px;">
                              <?php 
                                  $no = 1;
                                  foreach($user as $u){ 
                                  ?>
                              <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $u->nama_produk ?></td>
                                <td><?php echo $u->qty ?></td>
                                <td>Rp. <?php echo number_format($u->qty*$u->harga,0,",",".");?></td>
                              </tr>
                              <?php } ?>
                            </tbody>
                          </table>
                        </div>
                        <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                    </div>
                      <center>
                       <?php 
                          $no = 1;
                          foreach($jumlah_total as $j){ 
                          ?>
                          <h5>Total Harga : Rp. <?php echo number_format($j,0,",",".");?></h5>
                       <?php } ?>
                      </center>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>