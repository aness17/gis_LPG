<script src="<?= base_url('assets/js/leaflet-panel-layers-master/src/leaflet-panel-layers.js') ?>"></script>
	<script src="api/index"></script>
	<main id="main">

		<!-- ======= Breadcrumbs ======= -->
		<section class="breadcrumbs">
			<div class="container">

				<ol>
					<li><a href="home/index">Beranda</a></li>
					<li>Peta Sebaran Agen LPG Pekanbaru</li>
				</ol>
				<h2>Peta Sebaran Agen LPG Pekanbaru</h2>

			</div>
		</section><!-- End Breadcrumbs -->


		<section id="contact" class="contact">

			<div class="container" data-aos="fade-up">

				<header class="section-header">
					<p>Peta Sebaran</p>
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
										<img src="image/<?php echo $row->j ?>" class="img-fluid" alt="">
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
										<td><?php echo $row->k ?></td>
									</tr>
									<tr>
										<td>Kecamatan</td>
										<td><?php echo $row->d ?></td>
									</tr>
									<tr>
										<td>Harga</td>
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
		var data2 = [
			<?php
			$q = $this->db->query("select * from agen");
			foreach ($q->result() as $key => $value) { ?> {
					"loc": [<?= $value->e ?>],
					"pt": "<?= $value->a ?>",
					"harga": "<?= $value->f ?>",
				},
			<?php } ?>
		];
		var kecdata = [
			<?php
			$q = $this->db->query("select * from agen");
			foreach ($q->result() as $key => $value) { ?> {
					"loc": [<?= $value->e ?>],
					"kec": "<?= $value->d ?>",
				},
			<?php } ?>
		];
		var data3 = [
			<?php
			$q = $this->db->query("select * from agen");
			foreach ($q->result() as $key => $value) { ?> {
					"loc": [<?= $value->e ?>],
					"agen": "<?= $value->a ?>",
					"size": "<?= $value->h ?>",
					"jenis": "<?= $value->i ?>",
				},
			<?php } ?>
		];
		var layersKecamatan=[];
   	
		var kecamatan = L.layerGroup();
		var terdekat = L.layerGroup();
		var hargagrup = L.layerGroup();
		var ukurangrup = L.layerGroup();
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
		var GoogleSatelliteHybrid = L.tileLayer('https://mt1.google.com/vt/lyrs=y&x={x}&y={y}&z={z}', {
			// maxZoom: 12,
			attribution: ""
		});
		var OpenStreetMap_Mapnik = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
			maxZoom: 18,
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
		}).addTo(map);

		var googleTerrain = L.tileLayer('http://{s}.google.com/vt/lyrs=p&x={x}&y={y}&z={z}', {
			maxZoom: 20,
			subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
			attribution: "",
		});
		//minimap

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
		L.control.coordinates({
			position: "topright",
			decimals: 2,
			decimalSeperator: ",",
			labelTemplateLat: "Latitude: {y}",
			labelTemplateLng: "Longitude: {x}"
		}).addTo(map);
		L.control.scale({
			maxWidth: 150,
			position: 'topright'
		}).addTo(map);
		//base maps
		var baseMaps = [{
			groupName: "Base Maps",
			expanded: true,
			layers: {
				"Google Street": googleStreets,
				"Satellite": GoogleSatelliteHybrid,
				"Open Street Map Mapnik": OpenStreetMap_Mapnik,
				"Open Street Map Dark": mapdark,
				"Google Terrain": googleTerrain
			}
		}];


		var overlays = [{
			groupName: "Peta Sebaran",
			layers: {
				"Kecamatan": kecamatan,
				"Terdekat": terdekat,
				"Harga": hargagrup,
				"Ukuran & Jenis": ukurangrup,
			}
		}];

		var options = {
			contaner_width: "300px",
			group_maxHeight: "80px",
			exclusive: false,
			collapsed: true,
			position: "topright"
		}
		var control = L.Control.styledLayerControl(baseMaps, overlays, options);
		map.addControl(control);

		for (i in data2) {
			var pt = data2[i].pt; //value searched
			var loc = data2[i].loc;
			var harga = data2[i].harga;

			var info_tempat = "<table class='table table-striped table-bordered'>";
			info_tempat += "<tr>";
			info_tempat += "<td>" + pt + "</td>";
			info_tempat += "</tr>";
			info_tempat += "<tr>";
			info_tempat += "<td> Harga : " + harga + "</td>";
			info_tempat += "</tr>";
			info_tempat += "</table>";
			var marker = new L.Marker(new L.latLng(loc), {
				title: pt,
			}); //se property searched
			marker.bindPopup(info_tempat);
			hargagrup.addLayer(marker);
		}
		for (i in data3) {
			var jenis = data3[i].jenis; //value searched
			var agen = data3[i].agen; //value searched
			var size = data3[i].size; //value searched
			var loc = data3[i].loc;

			var info_tempat = "<table class='table table-striped table-bordered'>";
			info_tempat += "<tr>";
			info_tempat += "<td>" + agen + "</td>";
			info_tempat += "</tr>";
			info_tempat += "<tr>";
			info_tempat += "<td> Ukuran : " + size + "</td>";
			info_tempat += "</tr>";
			info_tempat += "<tr>";
			info_tempat += "<td> Jenis : " + jenis + "</td>";
			info_tempat += "</tr>";
			info_tempat += "</table>";
			var marker = new L.Marker(new L.latLng(loc), {
				title: agen,
			}); //se property searched
			marker.bindPopup(info_tempat);
			ukurangrup.addLayer(marker);
		}
		for (i in kecdata) {
			var kec = kecdata[i].kec; //value searched
			var loc = kecdata[i].loc;
			var info_tempat = "<table class='table table-striped table-bordered'>";
			info_tempat += "<tr>";
			info_tempat += "<td>" + kec + "</td>";
			info_tempat += "</tr>";
			info_tempat += "</table>";
			var marker = new L.Marker(new L.latLng(loc), {
				title: kec,
			}); //se property searched
			marker.bindPopup(info_tempat);
			kecamatan.addLayer(marker);
		}

		$.getJSON("LPG.geojson", function(data) {
			L.geoJSON(data, {
				style: function(feature) {
					return {
						color: "#2D6AA4",
						weight: 1,
						fillColor: "#2D6AA4",
						fillOpacity: 0.4
					}
				},
				onEachFeature: function(feature, layer) {
					var hehe = "<table class='table table-striped table-bordered'>";
					hehe += "<tr>";
					hehe += "<td> Nama : " + feature.properties.Nama_Agen_PSO_Siaga + "</td>";
					hehe += "</tr>";
					hehe += "<tr>";
					hehe += "<td> Alamat : " + feature.properties.Alamat + "</td>";
					hehe += "</tr>";
					hehe += "<tr>";
					hehe += "<td> JAM OPERASIONAL : " + feature.properties.Jam_Operasional + "</td>";
					hehe += "</tr>";
					hehe += "<tr>";
					hehe += "<td> BUFF_DIST : " + feature.properties.BUFF_DIST + "</td>";
					hehe += "</tr>";
					hehe += "<tr>";
					hehe += "<td> ORIG_FID : " + feature.properties.ORIG_FID + "</td>";
					hehe += "</tr>";
					hehe += "<tr>";
					hehe += "<td> AnalysisArea : " + feature.properties.AnalysisArea + "</td>";
					hehe += "</tr>";
					hehe += "</table>";
					layer.bindPopup(hehe);
				}
			}).addTo(terdekat);
		});



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
	}

	var baseLayers = [{
		name: "OpenStreetMap",
		layer: map,

	 }, ];
	 <?php
		 $q = $this->db->query("select * from agen group by f");
		 foreach ($q->result() as $key) { 
		?>
	 <?php
		 	$arrayKec[] =
		 		'{
		 			name: "' . $key->f . '",
		 			layer: L.marker([' . $key->e . '],{
		 				pointToLayer:featureToMarker
		 			}).addTo(map).bindPopup("<b>Nama Agen : ' . $key->a . '</b><br><br><b>Kab/Kota : ' . $key->b . '</b><br><br><b>Prov : ' . $key->c . '</b><br><br><b>Kecamatan : ' . $key->d . '</b><br><br><b>Harga : ' . $key->f . '</b><br><br><b>Jam Operasional : ' . $key->g . '</b><br><br><b>Ukuran : ' . $key->h . '</b><br><br><b>Jenis : ' . $key->i . '</b><br><br>")

		 		}';
		 } 
		?>

	 var overLayers = [
	 	<?= implode(',', $arrayKec) ?>
	 ];
	 var panelLayers = new L.Control.PanelLayers(baseLayers, overLayers);
	 map.addControl(panelLayers);

	</script>