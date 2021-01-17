<?php  ?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css">
  <script src="<?php echo base_url()?>assets/js/jquery-3.3.1.slim.min.js"></script>
  <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/font-awesome.min.css">

  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/dataTables.bootstrap4.css">
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.dataTables.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/dataTables.bootstrap4.js"></script>

  <title>Database IKM Kota Bogor</title>
</head>
<body>

 <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <div class="container">
    <a class="navbar-brand" href="#">
      <a class="navbar-brand" href="<?php echo base_url()?>user"> <img src="<?php echo base_url()?>assets/img/eventq_logo.png" width="150px" height="100px"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item <?php if( "/gis_ikm/user" == $_SERVER['REQUEST_URI'] ){ 
            ?> active <?php } ?>">
            <a class="nav-link" href="<?php echo base_url()?>user">Beranda</a>
          </li>
          <li class="nav-item <?php if( "/gis_ikm/user/data_ikm" == $_SERVER['REQUEST_URI'] ){ 
            ?> active <?php } ?>">
            <a class="nav-link " href="<?php echo base_url()?>user/data_ikm">Data IKM</a>
          </li>
          <li class="nav-item <?php if( "/gis_ikm/user/peta_ikm" == $_SERVER['REQUEST_URI'] ){ 
            ?> active <?php } ?>">
            <a class="nav-link " href="<?php echo base_url()?>user/peta_ikm">Peta IKM</a>
          </li>
          <li class="nav-item <?php if( "/gis_ikm/user/kontak" == $_SERVER['REQUEST_URI'] ){ 
            ?> active <?php } ?>">
            <a class="nav-link " href="<?php echo base_url()?>user/kontak">Kontak</a>
          </li>
        </ul>
      </div>
    </div>
  </nav><br><br><br>

