      <div class="page-content">
        <!-- Page Header-->
        <div class="page-header no-margin-bottom">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Data Customer</h2>
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
                      <div class="card card-primary">
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                          <table id="idTable" class="table table-responsive table-striped text-nowrap border-primary">
                            <thead class="text-white" style="font-size: 15px;">
                              <tr>
                                <th>No</th>
                                <th>Nama Customer</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Option</th>
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
      $('#idTable').DataTable({
          'processing': true,
          'serverSide': true,
          'serverMethod': 'post',
          "columnDefs": [
            {
                "targets": [ 5 ],
                "visible": false,
                "searchable": false
                }
            ],
          'ajax': {
            'url':'<?=base_url()?>backend/Datatable/customer'
          },
          'columns': [
            { data: 'id_user'},
            { data: 'nama'},
            { data: 'username' },
            { data: 'email' },
            {
              "data": "no",
                       "aTargets": [5],
                       "render": function (data) {
                           return '<form action="<?php echo base_url('backend/Crud/hapus_customer')?>" enctype="multipart/form-data" method="post" accept-charset="utf-8"><a href="<?php echo site_url('backend/Crud/hapus_customer/')?>'+data+'" ><span class="btn btn-sm btn-danger">Delete</span></a><?php echo form_close(); ?>';
                       }
                   },
            { data: 'no'}
          ]
      });
  });
  </script>