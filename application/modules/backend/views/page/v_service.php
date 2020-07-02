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
                          <table id="idTable" class="table-dataTable-compact table-responsive table-striped text-nowrap border-primary">
                            <thead class="text-white" style="font-size: 15px;">
                              <tr>
                                <th></th>
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
    function format ( d ) {
    return 'email: '+d.email+'<br><br>'+
        'Telepon: '+d.hp+'<br><br>'+
        'Alamat: '+d.alamat+'<br>';
}
  $(document).ready(function(){
      var dt = $('#idTable').DataTable({
          'processing': true,
          'serverSide': true,
          'serverMethod': 'post',
          "columnDefs": [
            {
                "targets": [ 8 ],
                "visible": false,
                "searchable": false
                },
                {
                "targets": [ 1 ],
                "orderable": false
                }
            ],
          'ajax': {
            'url':'<?=base_url()?>backend/Datatable/service'
          },
          'columns': [
            {
                "class": "details-control",
                "orderable": false,
                "data": null,
                "defaultContent":""
            },
            { data: 'id' },
            { data: 'nama' },
            { data: 'pesan' },
            { data: 'reply' },
            { data: 'status' },
            { data: 'tanggal' },
            {
              "data": "no",
                       "aTargets": [8],
                       "render": function (data) {
                           return '<a href="<?php echo base_url('backend/Crud/replyService/')?>'+data+'" ><span class="btn btn-sm btn-success">Reply <i class="icon-mail mb-1"></i></span></a>';
                       }
                   },
            { data: 'no'}
          ]
      });
      // Array to track the ids of the details displayed rows
    var detailRows = [];
 
    $('#idTable tbody').on( 'click', 'tr td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = dt.row( tr );
        var idx = $.inArray( tr.attr('id'), detailRows );
 
        if ( row.child.isShown() ) {
            tr.removeClass( 'details' );
            row.child.hide();
 
            // Remove from the 'open' array
            detailRows.splice( idx, 1 );
        }
        else {
            tr.addClass( 'details' );
            row.child( format( row.data() ) ).show();
 
            // Add to the 'open' array
            if ( idx === -1 ) {
                detailRows.push( tr.attr('id') );
            }
        }
    } );
 
    // On each draw, loop over the `detailRows` array and show any child rows
    dt.on( 'draw', function () {
        $.each( detailRows, function ( i, id ) {
            $('#'+id+' td.details-control').trigger( 'click' );
        } );
    } );
  });
  </script>