<html>
  <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin - <?php echo $judul; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/font-awesome/css/font-awesome.min.css') ?>">
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/font.css') ?>">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.sea.css') ?>" id="theme-stylesheet">
    <!-- custom stylesheet-->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css') ?>" id="theme-stylesheet">
    <!-- Favicon-->
    <link rel="shortcut icon" href="<?php echo base_url('gambar/logo.png')?>">
    <!-- Datatable CSS -->
    <link href="<?php echo base_url('assets/datatables/css/jquery.custom2.css')?>" rel='stylesheet' type='text/css'>
    <!-- jQuery Library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Datatable JS -->
     <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
      <?php
      // Cek apakah terdapat session nama message
      if($this->session->flashdata('message')){ // Jika ada
       echo '<div class="alert alert-success no-margin-bottom">'.$this->session->flashdata('message').'</div>'; // Tampilkan pesannya
      }if($this->session->flashdata('sukses')){ // Jika ada
       echo '<div class="alert alert-success no-margin-bottom" role="alert"><h4 class="alert-heading">'.$this->session->flashdata('sukses').'</h4><p>Selemat Datang</p></div>'; // Tampilkan pesannya
      }if($this->session->flashdata('hapus')){ // Jika ada
       echo '<div class="alert alert-danger no-margin-bottom">'.$this->session->flashdata('hapus').'</div>'; // Tampilkan pesannya
      }
      ?>
  </head>
  <body>
    <header class="header">   
      <nav class="navbar navbar-expand-lg">
        <div class="container-fluid d-flex align-items-center justify-content-between">
          <div class="navbar-header">
            <!-- Navbar Header--><a href="<?php echo base_url('backend/Admin')?>" class="navbar-brand">
              <div class="brand-text brand-big visible text-uppercase"><strong class="text-primary">Halaman&nbsp;</strong><strong>Admin</strong></div>
              <div class="brand-text brand-sm"><strong class="text-primary">H</strong><strong>A</strong></div></a>
            <!-- Sidebar Toggle Btn-->
            <button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i></button>
          </div>
          <div class="right-menu list-inline no-margin-bottom"> 
            <!-- Log out               -->
            <div class="list-inline-item logout">
              <li class="text-danger"><a href="<?php echo base_url('Multiuser/Auth/logout')?>"><h4>Logout <i class="icon-logout"></i></h4></a></li>
            </div>
          </div>
        </div>
      </nav>
    </header>
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="avatar"><img src="<?php echo base_url('gambar/user.png')?>" class="img-fluid rounded-circle"></div>
          <div class="title">
            <h1 class="h5"><?php echo $this->session->userdata('nama') ?></h1>
            <p><?php echo ucwords($this->session->userdata('role')) ?></p>
          </div>
        </div>
        <!-- Sidebar Navidation Menus-->
        <ul class="list-unstyled">
          <li class="<?php if($this->uri->segment(3)=="home"){echo("active");}?>"><a href="<?php echo base_url('backend/Page/home')?>"><i class="icon-home"></i></i>Home </span></a></li>
          <li class="<?php if($this->uri->segment(3)=="upload"){echo("active");}?>"><a href="<?php echo base_url('backend/Page/upload')?>"><i class="icon-writing-whiteboard"></i>Upload File </a></li>
          <?php if($this->session->userdata('role') == 'admin'){ ?>
          <li class="<?php if($this->uri->segment(3)=="order"){echo("active");}?>"><a href="<?php echo base_url('backend/Page/order')?>"><i class="icon-grid"></i>Order <span class="badge badge-pill badge-danger ml-4"><?php echo $order; ?></a></li>
          <li class="<?php if($this->uri->segment(3)=="customer"){echo("active");}?>"><a href="<?php echo base_url('backend/Page/customer')?>"><i class="fa fa-bar-chart"></i>Customer </a></li>
          <?php } ?>
          <li class="<?php if($this->uri->segment(3)=="product"){echo("active");}?>"><a href="<?php echo base_url('backend/Page/product')?>"><i class="icon-padnote"></i>Product <span class="badge badge-pill badge-danger ml-4"><?php echo $product; ?></a></li>
          <li class="<?php if($this->uri->segment(3)=="category"){echo("active");}?>">
            <a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"><i class="icon-chart"></i>Category </a>
            <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
            <?php foreach ($kategori as $row) { ?>    
            <li class="<?php if($row['id']==$this->uri->segment(3)){echo("active");}?>"><a href="<?php echo base_url()?>backend/Page/category/<?php echo $row['id'];?>"><?php echo $row['nama_kategori'];?></a></li>
            <?php } ?> 
            </ul>
          </li>
          <li class="<?php if($this->uri->segment(3)=="service"){echo("active");}?>"><a href="<?php echo base_url('backend/Page/service')?>"><i class="icon-settings"></i>Service <span class="badge badge-pill badge-danger ml-4"><?php echo $service; ?></a></li>
        </ul>
      </nav>