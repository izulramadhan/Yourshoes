<div class="page-content">
        <!-- Page Header-->
        <div class="page-header no-margin-bottom">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom form-inline">Data Product 
            </h2> 
          </div>
        </div>
        <!-- Breadcrumb-->
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('backend/Page/home')?>">Home</a></li>
            <li class="breadcrumb-item active"><?php echo $judul; ?>        </li>
              <div class="no-margin-bottom ml-auto">
              <?php
                // Cek role user
                if($this->session->userdata('role') == 'admin'){ ?>
                  <a class="mr-3" href="<?php echo base_url('backend/Crud/insert_product')?>"><button type="submit" class="btn btn-sm btn-success"><h6 class="h6 no-margin-bottom">Tambah Produk</h6></button></a>
                  <a class="mr-3" href="<?php echo base_url('backend/Crud/hapus_produk')?>"><button class="btn btn-sm btn-primary text-white" type="submit" ><h6 class="h6 no-margin-bottom">Produk Terhapus</h6></button></a>
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
                          <!-- Table -->
                          <table id='prodTable' class='table-dataTable-compact table-striped text-nowrap border-primary'>
                            <thead class="text-white" style="font-size: 15px;">
                              <tr>
                                <th></th>
                                <th>No</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Nama Kategori</th>
                                <th>Option</th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody class="text-white" style="font-size: 14px;">
                              <tr>
                              </tr>
                            </tbody>
                          </table>
                         </div>
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
    return 'Preview: <br><br><img src="<?php echo base_url('gambar/product/')?>'+d.gambar+'" width="120"/><br><br>Deskripsi: '+d.deskripsi+'<br><br>'+
        'Stok: '+d.stok+'<br><br>';
}
  $(document).ready(function(){
      var dt =  $('#prodTable').DataTable({
          'processing': true,
          'serverSide': true,
          'serverMethod': 'post',
          "columnDefs": [
            {
                "targets": [ 6 ],
                "visible": false,
                "searchable": false
                },
                {
                "targets": [ 1 ],
                "orderable": false
                }
            ],
          'ajax': {
            'url':'<?=base_url()?>backend/Datatable/prodList'
          },
          'columns': [
            {
                "class": "details-control",
                "orderable": false,
                "data": null,
                "defaultContent":""
            },
            { data: 'id_produk'},
            { data: 'nama_produk' },
            { data: 'harga',
            render: $.fn.dataTable.render.number( ',', '.', 2, 'Rp. ' )
            },
            { data: 'nama_kategori' },
            {
              "data": "no",
                       "orderable": false,
                       "aTargets": [6],
                       "render": function (data) {
                           return '<div class="d-inline" <form action="<?php echo base_url('backend/Crud/hapus')?>" enctype="multipart/form-data" method="post" accept-charset="utf-8"><a href="<?php echo site_url('backend/Crud/hapus/')?>'+data+'" ><span class="btn btn-sm btn-danger">Delete <i class="icon-close mb-1"></i></span></a><?php echo form_close(); ?> || <a href="<?php echo site_url('backend/Crud/edit/')?>'+data+'"><span class="btn btn-sm btn-warning">Edit <i class="icon-padnote mb-1"></i></span></a></div>';
                       }
                   },
            { data: 'no'}
          ]
      });
        // Array to track the ids of the details displayed rows
    var detailRows = [];
 
    $('#prodTable tbody').on( 'click', 'tr td.details-control', function () {
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