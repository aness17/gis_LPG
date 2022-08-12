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
                <li>Peta Sebaran Agen LPG Pekanbaru Filtering jam</li>
            </ol>
            <h2>Peta Sebaran Agen LPG Pekanbaru Filtering jam</h2>
        </div>
    </section><!-- End Breadcrumbs -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <p>Filtering jam</p>
                <form name="myForm" method="POST" action="home/jam">
                <select name="filterjam" id="filterjam" onchange="filtering()">
                <option value="" disabled selected>--Pilih jam--</option>
                    <?php foreach($jam as $row) { ?>
                    <option value="<?=$row->jam?>" <?php if ($filterjam==$row->jam) {?> selected <?php } ?>><?=$row->jam?></option>
                    <?php } ?>
                </select>
                <input type="hidden" name="jam" id="jam">
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
                                    <td>jam</td>
                                    <td><?php echo $row->d ?></td>
                                </tr>
                                <tr>
                                    <td>jam</td>
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
    // var layersjam = [];

    function filtering(){
        var el = document.getElementById("filterjam");
        var filterValue = el.value;
       
        document.getElementById("jam").value = filterValue;
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
		 			}).addTo(map).bindPopup("<b>Nama Agen : ' . $key->a . '</b><br><br><b>Kab/Kota : ' . $key->b . '</b><br><br><b>Prov : ' . $key->c . '</b><br><br><b>jam : ' . $key->d . '</b><br><br><b>jam : ' . $key->f . '</b><br><br><b>Jam Operasional : ' . $key->g . '</b><br><br><b>Ukuran : ' . $key->h . '</b><br><br><b>Jenis : ' . $key->i . '</b><br><br>")

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

    overLayers.map((data)=>{ 
        if(!this_name.includes(data.name)){
            this_name.push(data.name)
            data_name.push({name:data.name})  
        } 
        if(!this_layer.includes(data.layer)){
            this_layer.push(data.layer)
            data_layer.push({name:data.name,layer:data.layer})  
        } 
        if(!this_id.includes(data.id)){
            this_id.push(data.id)
            data_id.push({name:data.name,id:data.id})  
        } 
    })

    data_name.map((data)=>{
        let layer_list = data_layer.filter((this_data)=>this_data.name == data.name);
        let new_layer = [];
        layer_list.map((data_layer)=>{
            new_layer.push(data_layer.layer)
        })
        let id_list = data_id.filter((this_data)=>this_data.name == data.name);
        let new_id = [];
        id_list.map((data_id)=>{
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