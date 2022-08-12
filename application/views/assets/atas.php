
<!DOCTYPE html>
<html lang="en">


<!-- blank.html  21 Nov 2019 03:54:41 GMT -->
<head>
    <base href="<?php echo base_url(); ?>">
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Sistem Informasi Geografis</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/icon.png' />
  <script src="assets/js/app.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="assets/bundles/datatables/datatables.min.css">
  <link rel="stylesheet" href="assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <script src="assets/bundles/datatables/datatables.min.js"></script>
  <script src="assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="assets/bundles/jquery-ui/jquery-ui.min.js"></script>
  <link rel="stylesheet" type="text/css" href="plugin/bootstrapdatepicker/bootstrap-datepicker.css">
  <script src="assets/bundles/summernote/summernote-bs4.js"></script>
  <link rel="stylesheet" href="assets/bundles/summernote/summernote-bs4.css">
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
	<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
	<!-- Leaflet Draw -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js"></script>
  <script src="plugin/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
  <link rel="stylesheet" href="plugin/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
	
  <script type="text/javascript" src="src/L.Control.ZoomBar.js"></script>
<script type="text/javascript" src="plugin/dist/Leaflet.Coordinates-0.1.5.min.js"></script>
	<link rel="stylesheet" href="plugin/dist/Leaflet.Coordinates-0.1.5.css"/>
  <link rel="stylesheet" href="plugin/dist/L.Control.Locate.min.css" />
  <script src="plugin/src/L.Control.Locate.js" ></script>
  <script src="plugin/src/leaflet-compass.js"></script>
  <script src='plugin/Leaflet.LocationShare.js'></script>
  <link rel="stylesheet" href="plugin/src/leaflet-compass.css" />
  <script src="plugin/L.Control.Window.js"></script>
     <link rel="stylesheet" href="plugin/L.Control.Window.css" />
     <script src="plugin/dist/Control.FullScreen.js"></script>
     <link rel="stylesheet" href="plugin/dist/Control.FullScreen.css" />
     <script src="plugin/src/Control.GlobeMiniMap.js"></script>
     <link rel="stylesheet" href="plugin/dist/Control.MiniMap.min.css" />
	<script src="plugin/dist/Control.MiniMap.min.js" type="text/javascript"></script>
  <!-- <link rel="stylesheet" type="text/css" href="src/leaflet.css"/> -->
<link rel="stylesheet" type="text/css" href="src/L.Control.ZoomBar.css"/>
  
  <script src="plugin/angular.min.js"></script>
  <link rel="stylesheet" href="plugin/css/styledLayerControl.css" />
		<script src="plugin/src/styledLayerControl.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
<script  src="https://maps.google.com/maps/api/js?v=3.2&sensor=false&key=AIzaSyBXTXgQ7wZPndgKZilAsFVZjT5YWMr9WFs"></script>

<script src="https://raruto.github.io/cdn/leaflet-google/0.0.3/leaflet-google.js"></script>
<link rel="stylesheet" href="<?=base_url('assets/leaflet-compass.css')?>" />
<link rel="stylesheet" href="assets/bundles/select2/dist/css/select2.min.css">
  <script src="assets/bundles/select2/dist/js/select2.full.min.js"></script>
  <link rel="stylesheet" href="assets/bundles/bootstrap-daterangepicker/daterangepicker.css">
<script src="assets/bundles/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="assets/bundles/chartjs/chart.min.js"></script>
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper  main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg bg-success main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a  data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
            <li><a  class="nav-link nav-link-lg fullscreen-btn">
                <i data-feather="maximize"></i>
              </a></li>
          
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
       
       
          <li class="dropdown"><a  data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="assets/icon.png"
                class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title">Hello <?php echo $this->session->userdata("nama") ?></div>
              <div class="dropdown-divider"></div>
              <a href="welcome/logout" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar  sidebar-style-2">
        <aside id="sidebar-wrapper ">
          <div class="sidebar-brand bg-success">
            <a href="main"> <img alt="image" src="assets/icon.png" class="header-logo" /> <span
                class="logo-name text-light">Geografis</span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown">
              <a href="main/index" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <!-- <li class="dropdown">
              <a href="main/sebaran" class="nav-link"><i data-feather="map"></i><span>Sebaran</span></a>
            </li> -->
            <li class="dropdown">
              <a href="main/agen" class="nav-link"><i data-feather="map"></i><span>Sebaran</span></a>
            </li>
            <li class="dropdown">
              <a href="main/kontak" class="nav-link"><i data-feather="phone"></i><span>Kontak</span></a>
            </li>
            
            <li class="dropdown">
              <a href="welcome/logout" onclick="return confirm('Yakin ingin logout?')" class="nav-link"><i data-feather="log-out"></i><span>Logout</span></a>
            </li>
            
          </ul>
        </aside>
      </div>
      