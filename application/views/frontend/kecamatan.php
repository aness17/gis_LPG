<style>
    .legend label,
    .legend span {
        display: block;
        float: left;
        height: 15px;
        width: 20%;
        text-align: center;
        font-size: 9px;
        color: #808080;
    }

    .leaflet-control-layers-expanded {
        width: 125px !important;
    }
</style>
<script src="<?= base_url('assets/js/leaflet-panel-layers-master/src/leaflet-panel-layers.js') ?>"></script>
<script src="api/index"></script>
<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="home/index">Beranda</a></li>
                <li>Peta Sebaran Agen LPG Pekanbaru Filtering kecamatan</li>
            </ol>
            <h2>Peta Sebaran Agen LPG Pekanbaru Filtering kecamatan</h2>
        </div>
    </section><!-- End Breadcrumbs -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <p>Filtering kecamatan</p>
                <form name="myForm" method="POST" action="home/kecamatan">
                    <table class="table">
                        <tr>
                            <td>Kecamatan</td>
                            <td>
                                <select name="filterKec" id="categoryKecamatan" class="form-control">
                                    <option value="" disabled selected>--Pilih Kecamatan--</option>
                                    <?php 
                                    $kecval = $this->db->query("select distinct(d) as kecamatan from agen")->result();
                                    foreach ($kecval as $row) { ?>
                                        <!-- <option value="<?= $row->kecamatan ?>" <?php if ($filterkecamatan == $row->kecamatan) { ?> selected <?php } ?>><?= $row->kecamatan ?></option> -->
                                        <option value="<?= $row->kecamatan ?>" ><?= $row->kecamatan ?></option>
                                    <?php } ?>
                                </select>

                            </td>
                        </tr>
                        <tr>
                            <td>Jam Operasional</td>
                            <td>
                                <select name="filterJam" id="categoryJam" class="form-control">
                                    <option>No Selected</option>
                                    <?php 
                                    $jamval = $this->db->query("select distinct(g) as jam from agen")->result();
                                    foreach ($jamval as $row) { ?>
                                        <option value="<?= $row->jam ?>" ><?= $row->jam ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Ukuran Gas</td>
                            <td>
                                <select name="filterUkuran" id="categoryUkuran" class="form-control">
                                <option>No Selected</option>
                                <?php 
                                    $ukuranval = $this->db->query("select distinct(h) as ukuran from agen")->result();
                                    foreach ($ukuranval as $row) { ?>
                                        <option value="<?= $row->ukuran ?>" ><?= $row->ukuran ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Harga</td>
                            <td>
                                <select name="filterHarga" id="categoryHarga" class="form-control">
                                    <!-- <option value="" disabled selected>--Pilih Kecamatan--</option> -->
                                    <option>No Selected</option>
                                    <?php 
                                    $hargaval = $this->db->query("select distinct(f) as harga from agen")->result();
                                    foreach ($hargaval as $row) { ?>
                                        <option value="<?= $row->harga ?>" ><?= $row->harga ?></option>
                                    <?php } ?>
                                </select>
                                </select>
                            </td>
                        </tr>
                            <input type="hidden" name="valkecamatan" id="kecamatan">
                            <input type="hidden" name="valjam" id="kecamatan">
                            <input type="hidden" name="valukuran" id="kecamatan">
                    </table>
                    <input type="submit" value="Cari">
                </form>
            </header>
            <center>
                <div class="card">
                    <div class="card-body table-responsive">
                        <div id="map" style="height: 600px; width: 1000px;"></div>
                    </div>
                </div>
            </center>
        </div>
        </div>
    </section><!-- End Contact Section -->
    <section id="recent-blog-posts" class="recent-blog-posts">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <p>Daftar Agen di Pekanbaru</p>
            </header>
            <div class="row">
                <?php
                $q = $this->db->query("select * from agen order by id desc");
                foreach ($q->result() as $row) {
                ?>
                    <div class="col-lg-4 mb-3">
                        <div class="post-box">
                            <div class="post-img">
                                <?php if ($row->j != "") { ?>
                                    <img src="image/<?php echo $row->k ?>" class="img-fluid" alt="">
                                <?php } else { ?>
                                    <img src="assets/nofoto.jpg" class="img-fluid" alt="">
                                <?php }  ?>
                            </div>
                            <span class="post-date">Jam Operasional : <?php echo $row->g ?></span>
                            <h3 class="post-title">
                                <?php echo $row->a ?>
                            </h3>
                            <p>
                            <table class="table table-bordered">
                                <tr>
                                    <td>Kab / Kota</td>
                                    <td><?php echo $row->b ?></td>
                                </tr>
                                <tr>
                                    <td>Provinsi</td>
                                    <td><?php echo $row->c ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td><?php echo $row->j ?></td>
                                </tr>
                                <tr>
                                    <td>Kecamatan</td>
                                    <td><?php echo $row->d ?></td>
                                </tr>
                                <tr>
                                    <td>kecamatan</td>
                                    <td><?php echo $row->f ?></td>
                                </tr>
                                <tr>
                                    <td>Ukuran</td>
                                    <td><?php echo $row->h ?></td>
                                </tr>
                                <tr>
                                    <td>Jenis GAS</td>
                                    <td><?php echo $row->i ?></td>
                                </tr>
                            </table>
                            </p>
                        </div>
                    </div>
                <?php  } ?>
            </div>
        </div>
    </section><!-- End Recent Blog Posts Section -->
</main>
<script>
    // var layersKecamatan = [];
    
    function filtering() {
        // var el = document.getElementById("sub_category");
        // var al = document.getElementById("category");
        // var filterValue = el.value && al.value;
        // document.getElementById("kecamatan").value = filterValue;
        // console.log(document.getElementById("category").value);
        // console.log(document.getElementById("sub_category").value);
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