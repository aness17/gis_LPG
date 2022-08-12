<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">

      <ol>
        <li><a href="home/index">Beranda</a></li>
        <li>Pencarian Agen LPG Pekanbaru</li>
      </ol>
      <h2>Pencarian Agen LPG Pekanbaru</h2>

    </div>
  </section><!-- End Breadcrumbs -->

  <section id="contact" class="contact">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
      </header>
      <img src="frontend/lokasi.jpg" class="img-fluid" alt="">
      <center>
        <div class="card">
          <div class="card-body table-responsive">
            <form name="myForm" method="POST" action="home/pencarian">
              <table class="table">
                <tr>
                  <td>Kecamatan</td>
                  <td>
                    <select name="kec" id="kec" class="form-control">
                      <option value="">Pilih</option>
                      <?php
                      $q = $this->db->query("select * from agen group by d");
                      foreach ($q->result() as $row) {
                      ?>
                        <option value="<?php echo $row->d ?>"><?php echo $row->d ?></option>
                      <?php }  ?>
                    </select>
                  </td>
                </tr>
                
                <tr>
                  <td>Jam Operasional</td>
                  <td>
                    <select name="jam" id="jam" onchange="filtering()" class="form-control">
                    <option value="">Pilih</option>

                    </select>
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td>
                    <input type="hidden" name="kecamatan" id="kecamatan">

                    <!-- <button type="submit" class="btn btn-primary" name="cari">Proses</button> -->
                  </td>
                </tr>
              </table>
            </form>
          </div>
        </div>
      </center>
      <br>
      <div class="card">
        <div class="card-body table-responsive">
          <div id="map" style="height: 600px; width: 1000px;"></div>
        </div>
      </div>

    </div>

    </div>

  </section><!-- End Contact Section -->
</main>
<script>
  $(document).ready(function() {
    $('#kec').change(function() {
      var id = $(this).val();
      $.ajax({
        url: "<?php echo site_url('home/cekjam'); ?>",
        method: "POST",
        data: {
          id: id
        },
        async: true,
        dataType: 'json',
        success: function(data) {

          var html = '';
          var i;
          for (i = 0; i < data.length; i++) {
            html += '<option value=' + data[i].g + ' selected>' + data[i].g + '</option>';
          }
          $('#jam').html(html);
        }
      });
      return false;
    });
  });


  function filtering() {
    console.log(document.getElementById("kec").value);
    console.log(document.getElementById("jam").value);
    document.myForm.submit();
  }

  var map = L.map("map", {
    center: [0.5052080953233125, 101.45147219026317],
    zoom: 12,
    zoomControl: false,
    layers: [],
    fullscreenControl: true,
    fullscreenControlOptions: { // optional
      title: "Show me the fullscreen !",
      titleCancel: "Exit fullscreen mode"
    }
  });
  var googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
    maxZoom: 20,
    subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
    attribution: "",
  });
  var OpenStreetMap_Mapnik = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 12,
    attribution: ''
  }).addTo(map);
  // detect fullscreen toggling
  map.on('enterFullscreen', function() {
    if (window.console) window.console.log('enterFullscreen');
  });
  map.on('exitFullscreen', function() {
    if (window.console) window.console.log('exitFullscreen');
  });
  //untuk buat skala
  //zommba
  // var zoom_bar = new L.Control.ZoomBar({position: 'topleft'}).addTo(map);

  var baseMaps = [{
    groupName: "Base Maps",
    expanded: true,
    layers: {
      "Google Street": googleStreets,
      "Open Street": OpenStreetMap_Mapnik,
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

  function featureToMarker(feature, latlng) {
    return L.marker(latlng, {
      icon: L.divIcon({
        className: 'marker-' + feature.properties.amenity,
        html: iconByName(feature.properties.amenity),
        // iconUrl: '../images/markers/' + feature.properties.amenity + '.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
      })
    });
  };

  <?php
  // $q = $this->db->query("select * from agen");
  if (isset($filter)) {
    $arrayKec = array();
    foreach ($filter as $key) {
      $arrayKec[] =
        '{
		 			name: "' . $key->f . '",
		 			layer: L.marker([' . $key->e . '],{
		 				pointToLayer:featureToMarker
		 			}).addTo(map).bindPopup("<b>Nama Agen : ' . $key->a . '</b><br><br><b>Kab/Kota : ' . $key->b . '</b><br><br><b>Prov : ' . $key->c . '</b><br><br><b>Kecamatan : ' . $key->d . '</b><br><br><b>Harga : ' . $key->f . '</b><br><br><b>Jam Operasional : ' . $key->g . '</b><br><br><b>Ukuran : ' . $key->h . '</b><br><br><b>Jenis : ' . $key->i . '</b><br><br>")

		 		}';
    }
    $arrayKec = implode(',', $arrayKec);
  }
  ?>

  var overLayers = [
    <?php
    if (isset($arrayKec)) {
    ?>
      <?= $arrayKec ?>
    <?php
    }
    ?>
  ];

  var filteringOverLayers = [];
  var data_name = [];
  var data_layer = [];
  var data_id = [];

  let this_name = [];
  let this_layer = [];
  let this_id = [];

  overLayers.map((data) => {
    if (!this_name.includes(data.name)) {
      this_name.push(data.name)
      data_name.push({
        name: data.name
      })
    }
    if (!this_layer.includes(data.layer)) {
      this_layer.push(data.layer)
      data_layer.push({
        name: data.name,
        layer: data.layer
      })
    }
    if (!this_id.includes(data.id)) {
      this_id.push(data.id)
      data_id.push({
        name: data.name,
        id: data.id
      })
    }
  })

  data_name.map((data) => {
    let layer_list = data_layer.filter((this_data) => this_data.name == data.name);
    let new_layer = [];
    layer_list.map((data_layer) => {
      new_layer.push(data_layer.layer)
    })
    let id_list = data_id.filter((this_data) => this_data.name == data.name);
    let new_id = [];
    id_list.map((data_id) => {
      new_id.push(data_id.id)
    })

    filteringOverLayers.push({
      name: data.name,
      id: new_id,
      layer: new_layer,
      overlay: true
    })
  })

  console.log(filteringOverLayers)
  console.log(overLayers)

  // overLayers = filteringOverLayers

  var panelLayers = new L.Control.PanelLayers(baseLayers, overLayers, {
    collapsibleGroups: true,
    collapsed: false,
    autoZIndex: false
  });
  // var panelLayers = new L.Control.PanelLayers(baseLayers, overLayers);
  // panelLayers.addTo(map);
  map.addControl(panelLayers);
</script>