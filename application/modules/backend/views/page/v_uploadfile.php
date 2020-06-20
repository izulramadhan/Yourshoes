
      <?php if($this->session->flashdata('error')){echo $this->session->flashdata('error');} ?>
      <div class="page-content">
        <!-- Page Header-->
        <div class="page-header no-margin-bottom">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Upload File</h2>
          </div>
        </div>
        <!-- Breadcrumb-->
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('backend/Page/home')?>">Home</a></li>
            <li class="breadcrumb-item active"><?php echo $judul; ?>        </li>
          </ul>
        </div>
        <section class="no-padding-top">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-12">
                <div class="block margin-bottom-sm">
                    <div class="row d-flex justify-content-center">
                        <!-- left column -->
                        <div class="col-md-4">
                          <!-- general form elements -->
                          <div class="card card-primary border-primary">
                            <div class="card-header border-primary">
                              <div class="card-title">Upload File</div>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <?php echo form_open_multipart('backend/Crud/aksi_upload');?>
                              <div class="card-body">
                                <div class="form-group">
                                 <label for="foto">File</label>
                                 <input type="file" name="berkas" /><br><br>
                                  <input class="btn btn-primary" type="submit"  value="upload" />
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </section>
        </div>