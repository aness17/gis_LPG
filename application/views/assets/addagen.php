<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <!-- add content here -->

      <div class="row">
        <div class="col-lg-7">
          <div class="card">
            <div class="card-header text-light bg-success">
              Lokasi (Drag And Drop Marker Untuk Mengambil Coordinat)

            </div>
            <div class="card-body table-responsive">
              <div id="map" style="height: 400px;"></div>
            </div>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="card">
            <div class="card-header bg-success text-light">
              Form Tambah Data Agen
            </div>
            <div class="card-body table-responsive">
              <form action="main/saveagen" id="save" method="post" enctype="multipart/form-data">
                <table class="table">
                  <tr>
                    <td>Nama Agen</td>
                    <td>
                      <input type="text" class="form-control" name="a">
                    </td>
                  </tr>
                  
                  <tr>
                    <td>Kabupaten / Kota</td>
                    <td>
                      <input type="text" class="form-control" name="b">
                    </td>
                  </tr>
                  <tr>
                    <td>Provinsi</td>
                    <td>
                      <input type="text" class="form-control" name="c">
                    </td>
                  </tr>
                  <tr>
                    <td>Kecamatan</td>
                    <td>
                      <input type="text" class="form-control" name="d">
                    </td>
                  </tr>
                  
                  <tr>
                    <td>
                      Lattitude
                    </td>
                    <td>
                      <input name="lat" id="Latitude" type="text" class="form-control" readonly placeholder="Latitude" required>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      Longitude
                    </td>
                    <td>
                      <input name="lng" id="Longitude" type="text" class="form-control" readonly placeholder="Longitude" required>
                    </td>
                  </tr>

                  <tr>
                    <td>Harga</td>
                    <td>
                      <input type="text" class="form-control" name="f">
                    </td>
                  </tr>
                  <tr>
                    <td>Jam Operasional</td>
                    <td>
                      <input type="time" class="form-control" name="g">
                    </td>
                  </tr>
                  <tr>
                    <td>Ukuran Gas</td>
                    <td>
                      <input type="text" class="form-control" name="h">
                    </td>
                  </tr>
                  <tr>
                    <td>Jenis</td>
                    <td>
                      <input type="text" class="form-control" name="i">
                    </td>
                  </tr>
                  <tr>
                    <td>Alamat</td>
                    <td>
                      <input type="text" class="form-control" name="k">
                    </td>
                  </tr>
                  <tr>
                    <td>Foto / Gambar</td>
                    <td>
                      <center>
                        <img id="blah" class='img-fluid mb-3' width='280' src="assets/nofoto.jpg" alt="your image" />
                      </center>
                      <input type="file" name="gambar" class="form-control mb-3 bersih" onchange="readURL(this);" aria-describedby="inputGroupFileAddon01">
                      <span class="badge badge-warning mb-3"><strong>Informasi</strong> Input Gambar Maksimal 2mb !</span>

                    </td>
                  </tr>

                  <tr>
                    <td></td>
                    <td>
                      <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Simpan</button>
                      <a href="main/produk" class="btn btn-warning"><i class="fa fa-sync-alt"></i> Kembali</a>
                    </td>
                  </tr>
                </table>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</div>

<script>
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#blah').attr('src', e.target.result);
      };

      reader.readAsDataURL(input.files[0]);
    }
  }

  var curLocation = [0, 0];
  if (curLocation[0] == 0 && curLocation[1] == 0) {

    curLocation = [0.5086411884223458, 101.44632234878364];
  }

  var map = L.map("map", {
    center: [0.5086411884223458, 101.44632234878364],
    zoom: 12,
    zoomControl: false,
    layers: [],
  });
  var GoogleSatelliteHybrid = L.tileLayer('https://mt1.google.com/vt/lyrs=y&x={x}&y={y}&z={z}', {
    // maxZoom: 12,
    attribution: ""
  }).addTo(map);
  var OpenStreetMap_Mapnik = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 12,
    attribution: ''
  });
  var mapdark = L.tileLayer(
    "https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}", {
      attribution: "",
      maxZoom: 18,
      minZoom: 7,
      id: "mapbox/dark-v10",
      tileSize: 512,
      zoomOffset: -1,
      accessToken: "pk.eyJ1Ijoic25vd3JleCIsImEiOiJjazhmbTd4cG8wNXN0M2ZzMDFpZGNoaWpmIn0.GgO0rwaNrkc-eqVt6DeM3g",
    });
  var googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
    maxZoom: 20,
    subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
    attribution: "",
  });

  var googleTerrain = L.tileLayer('http://{s}.google.com/vt/lyrs=p&x={x}&y={y}&z={z}', {
    maxZoom: 20,
    subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
    attribution: "",
  });
  L.control.scale({
    maxWidth: 150
  }).addTo(map);

  //base maps
  var baseMaps = [{
    groupName: "Base Maps",
    expanded: true,
    layers: {
      "Satellite": GoogleSatelliteHybrid,
      "Open Street Map Mapnik": OpenStreetMap_Mapnik,
      "Open Street Map Dark": mapdark,
      "Google Street": googleStreets,
      "Google Terrain": googleTerrain
    }
  }];
  var overlays = [
    // {
    //     // groupName:"Lahan Dan Irigasi",
    //   expanded : true,
    //   layers : {
    //       "Group Lahan" : gruplahan,
    //       "Group Irigasi" : grupirigasi
    //    }
    // }
  ];


  var options = {
    contaner_width: "300px",
    group_maxHeight: "80px",
    exclusive: false,
    collapsed: true,
    position: "topright"
  }
  var control = L.Control.styledLayerControl(baseMaps, overlays, options);
  map.addControl(control);


  map.attributionControl.setPrefix(false);

  var marker = new L.marker(curLocation, {
    draggable: 'true'
  });

  marker.on('dragend', function(event) {
    var position = marker.getLatLng();
    marker.setLatLng(position, {
      draggable: 'true'
    }).bindPopup(position).update();
    $("#Latitude").val(position.lat);
    $("#Longitude").val(position.lng).keyup();
  });

  $("#Latitude, #Longitude").change(function() {
    var position = [parseInt($("#Latitude").val()), parseInt($("#Longitude").val())];
    marker.setLatLng(position, {
      draggable: 'true'
    }).bindPopup(position).update();
    map.panTo(position);
  });

  map.addLayer(marker);
</script>