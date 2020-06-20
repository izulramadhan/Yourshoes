<div class="page-content">
        <!-- Page Header-->
        <div class="page-header no-margin-bottom">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Data <?php foreach ($nama_kategori as $row){
          echo $row ["nama_kategori"];}?></h2>
          </div>  
        </div>
        <!-- Breadcrumb-->
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('backend/Page/home')?>">Home</a></li>
            <li class="breadcrumb-item active">Category        </li>
            <li class="breadcrumb-item active"><?php foreach ($nama_kategori as $row){
          echo $row ["nama_kategori"];}?>       </li>
            <div class="no-margin-bottom ml-auto">
              <?php
                // Cek role user
                if($this->session->userdata('role') == 'admin'){ ?>
                  <a class="mr-3" href="<?php echo base_url('backend/Crud/insert_product')?>"><button type="submit" class="btn btn-sm btn-success"><h6 class="h6 no-margin-bottom">Tambah Produk</h6></button></a>
                <?php } ?>
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
                          <table id="idTable" class="table table-striped text-nowrap border-primary">
                            <thead class="text-white" style="font-size: 15px;">
                              <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Deskripsi</th>
                                <th>Stok</th>
                                <th>Option</th>
                                <th>Id</th>
                              </tr>
                            </thead>
                            <tbody class="text-white" style="font-size: 14px;">
                              <tr>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
<!-- Script -->
  <script type="text/javascript">
  $(document).ready(function(){
      var id = '<?php echo $id; ?>';
      $('#idTable').DataTable({
          'processing': true,
          'serverSide': true,
          'serverMethod': 'post',
          "columnDefs": [
            {
                "targets": [ 7 ],
                "visible": false,
                "searchable": false
                }
            ],
          'ajax': {
            'method': 'post',
            'data': {'id':id},
            'url':'<?=base_url()?>backend/Datatable/category'
          },
          'columns': [
            { data: 'id_produk'},
            {
                       "data": "gambar",
                       "aTargets": [1],
                       "render": function (data) {
                           return '<img src="<?php echo base_url('gambar/product/')?>'+data+' "width="64"" />';
                       }
                   },
            { data: 'nama_produk' },
            { data: 'harga',
            render: $.fn.dataTable.render.number( ',', '.', 2, 'Rp. ' )
            },
            { data: 'deskripsi' },
            { data: 'stok' },
            {
              "data": "no",
                       "aTargets": [7],
                       "render": function (data) {
                           return '<form action="<?php echo base_url('backend/Crud/hapus')?>" enctype="multipart/form-data" method="post" accept-charset="utf-8"><a href="<?php echo site_url('backend/Crud/hapus/')?>'+data+'" ><span class="btn btn-sm btn-danger">Delete</span></a><?php echo form_close(); ?><a href="<?php echo site_url('backend/Crud/edit/')?>'+data+'"><span class="btn btn-sm btn-warning">Edit</span></a>';
                       }
                   },
            { data: 'no'}
          ]
      });
  });
  </script>