<!DOCTYPE html>
<html lang="en">

<head>
  <base href="<?php echo base_url(); ?>">
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sistem Informasi Geografis</title>
  <meta content="" name="description">

  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/icon.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="frontend/vendor/aos/aos.css" rel="stylesheet">
  <link href="frontend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="frontend/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="frontend/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="frontend/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="frontend/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="frontend/css/style.css" rel="stylesheet">
  <script src="assets/js/app.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
  <!-- Leaflet Draw -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js"></script>

  <link rel="stylesheet" href="plugin/MarkerCluster.css" />
  <link rel="stylesheet" href="plugin/MarkerCluster.Default.css" />
  <script src="plugin/leaflet.markercluster-src.js"></script>

  <link rel="stylesheet" href="plugin/css/styledLayerControl.css" />
  <script src="plugin/src/styledLayerControl.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
  <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
  <!-- <script src="https://maps.google.com/maps/api/js?v=3.2&sensor=false&key=AIzaSyBXTXgQ7wZPndgKZilAsFVZjT5YWMr9WFs"></script> -->

  <script src="https://raruto.github.io/cdn/leaflet-google/0.0.3/leaflet-google.js"></script>
  <!-- end -->
  <link rel="stylesheet" href="plugin/dist/Control.MiniMap.min.css" />
  <script src="plugin/dist/Control.MiniMap.min.js" type="text/javascript"></script>
  <!-- <link rel="stylesheet" type="text/css" href="src/leaflet.css"/> -->
  <link rel="stylesheet" type="text/css" href="src/L.Control.ZoomBar.css" />

  <!-- <script type="text/javascript" src="src/leaflet.js"></script> -->
  <script type="text/javascript" src="src/L.Control.ZoomBar.js"></script>
  <script type="text/javascript" src="plugin/dist/Leaflet.Coordinates-0.1.5.min.js"></script>
  <link rel="stylesheet" href="plugin/dist/Leaflet.Coordinates-0.1.5.css" />
  <link rel="stylesheet" href="plugin/dist/L.Control.Locate.min.css" />
  <script src="plugin/src/L.Control.Locate.js"></script>
  <link rel="stylesheet" href="plugin/src/leaflet-compass.css" />
  <script src="plugin/L.Control.Window.js"></script>
  <link rel="stylesheet" href="plugin/L.Control.Window.css" />
  <script src="plugin/dist/Control.FullScreen.js"></script>
  <link rel="stylesheet" href="plugin/dist/Control.FullScreen.css" />
  <script src="plugin/src/Control.GlobeMiniMap.js"></script>

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="home/index" class="logo d-flex align-items-center">
        <img src="assets/icon.png" alt="">
        <span>Agen DISTRIBUTOR LPG PEKANBARU</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto <?php if ($this->uri->segment(2) == "index") echo "active" ?>" href="home/index">Beranda</a></li>
          <li class="dropdown"><a href="#"><span>Sebaran</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="home/kecamatan">Kecamatan</a></li> 
              <li><a href="home/harga"> Harga</a></li>
              <li><a href="home/jam">Jam Operasional</a></li>
              <li><a class="nav-link scrollto <?php if ($this->uri->segment(2) == "sebaran") echo "active" ?>" href="home/sebaran">Patokan Lokasi</a></li>
            </ul>
          </li>
          <!-- <li><a class="nav-link scrollto <?php if ($this->uri->segment(2) == "pencarian") echo "active" ?>" href="home/pencarian">Pencarian</a></li> -->
          <li><a class="nav-link scrollto <?php if($this->uri->segment(2) == "pencarian") echo "active" ?>" href="home/pencarian">Pencarian</a></li>
          <li><a class="nav-link scrollto <?php if ($this->uri->segment(2) == "kontak") echo "active" ?>" href="home/kontak">Kontak</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->