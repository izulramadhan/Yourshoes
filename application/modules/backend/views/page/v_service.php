      <div class="page-content">
        <!-- Page Header-->
        <div class="page-header no-margin-bottom">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Data <?php echo $judul; ?></h2>
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
                                <th>Pesan</th>
                                <th>Reply</th>
                                <th>Status</th>
                                <th>Tanggal</th>
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
                "targets": [ 7 ],
                "visible": false,
                "searchable": false
                }
            ],
          'ajax': {
            'url':'<?=base_url()?>backend/Datatable/service'
          },
          'columns': [
            { data: 'id' },
            { data: 'nama' },
            { data: 'pesan' },
            { data: 'reply' },
            { data: 'status' },
            { data: 'tanggal' },
            {
              "data": "no",
                       "aTargets": [7],
                       "render": function (data) {
                           return '<a href="<?php echo base_url('backend/Crud/replyService/')?>'+data+'" ><span class="btn btn-sm btn-primary">Reply</span></a> || <a href="<?php echo base_url('backend/Crud/detailService/')?>'+data+'" ><span class="btn btn-sm btn-success">Detail</span></a>';
                       }
                   },
            { data: 'no'}
          ]
      });
  });
  </script>