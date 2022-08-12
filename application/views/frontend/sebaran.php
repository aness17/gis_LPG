<link rel="stylesheet" href="<?= base_url('assets/js/leaflet-panel-layers-master/src/leaflet-panel-layers.css') ?>">
<script src="<?= base_url('assets/js/leaflet-panel-layers-master/src/leaflet-panel-layers.js') ?>"></script>
<!-- <script src="api/index"></script> -->
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
				$q = $this->db->query("select * from agen order by id desc limit 6");
				foreach ($q->result() as $row) {
				?>
					<div class="col-lg-4 mb-3">
						<div class="post-box">
							<div class="post-img">
								<?php if ($row->j != "") { ?>
									<img src="image/<?php echo $row->j ?>" class="img-fluid" alt="" style="width: 500px;height:400px;">
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
							<td>
								<a href="home/detail/<?php echo $row->id ?>" class="btn btn-info">Detail</a>
							</td>


							</p>
						</div>
					</div>
				<?php  } ?>
			</div>

		</div>

	</section><!-- End Recent Blog Posts Section -->
</main>



<script>
	let titik = [0.4737907605329965, 101.4248760767789];

	var map = L.map('map').setView(titik, 12);

	var tiles = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		maxZoom: 19,
		attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
	}).addTo(map);
	// var kecamatan = L.layerGroup();
	var kuburan = L.layerGroup();
	var masjid = L.layerGroup();
	var jpo = L.layerGroup();
	var harga = L.layerGroup();
	var jam = L.layerGroup();
	var ukuran = L.layerGroup();
	var mall = L.layerGroup();
	var taman = L.layerGroup();

	//basemaps
	var baseMaps = [{
		groupName: "Base Maps",
		expanded: true,
		layers: {
			"Open Street": map,
			"Open Street": map,
		}
	}];


	var overlays = [{
		groupName: "Peta Sebaran",
		layers: {
			// "Kecamatan": kecamatan,
			"Masjid": masjid,
			"JPO": jpo,
			"TPU": kuburan,
			"Mall": mall,
			"Taman": taman,
			"Filtering Buffer Harga ": harga,
			"Filtering Buffer Ukuran ": ukuran,
			"Filtering Buffer Jam Operasional ": jam,
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
	$.getJSON("gg.geojson", function(data) {
		L.geoJSON(data, {
			style: function(feature) {
				return {
					color: "#15C809",
					weight: 1,
					fillColor: "#15C809",
					fillOpacity: 0.4
				}

			},
			onEachFeature: function(feature, layer) {
				var hehe = "<table class='table table-striped table-bordered'>";
				hehe += "<tr>";
				hehe += "<td> Kecamatan : " + feature.properties.Name + "</td>";
				hehe += "</tr>";
				hehe += "</table>";
				layer.bindPopup(hehe);
			}
		}).addTo(map);
	});


	//kecamatan
	// $.getJSON("kecamatan.geojson", function(data) {
	// 	L.geoJSON(data, {
	// 		style: function(feature) {
	// 			return {
	// 				color: "#15C809",
	// 				weight: 1,
	// 				fillColor: "#15C809",
	// 				fillOpacity: 0.4
	// 			}

	// 		},
	// 		onEachFeature: function(feature, layer) {
	// 			var hehe = "<table class='table table-striped table-bordered'>";
	// 			hehe += "<tr>";
	// 			hehe += "<td> Kecamatan : " + feature.properties.Name + "</td>";
	// 			hehe += "</tr>";
	// 			hehe += "</table>";
	// 			layer.bindPopup(hehe);
	// 		}
	// 	}).addTo(kecamatan);
	// });
	$.getJSON("geo/mall.geojson", function(data) {
			L.geoJSON(data, {
				style: function(feature) {
					return {
						color: "#15C809",
						weight: 1,
						fillColor: "#15C809",
						fillOpacity: 0.4
					}

				},
				onEachFeature: function(feature, layer) {
					var hehe = "<table class='table table-striped table-bordered'>";
					hehe += "<tr>";
					hehe += "<td> Nama : " + feature.properties.Name + "</td>";
					hehe += "</tr>";
					hehe += "<tr>";
					hehe += "<td> Alamat : " + feature.properties.Alamat + "</td>";
					hehe += "</tr>";
					hehe += "</table>";
					layer.bindPopup(hehe);
				}
			}).addTo(mall);
		});
		$.getJSON("geo/taman.geojson", function(data) {
			L.geoJSON(data, {
				style: function(feature) {
					return {
						color: "#15C809",
						weight: 1,
						fillColor: "#15C809",
						fillOpacity: 0.4
					}

				},
				onEachFeature: function(feature, layer) {
					var hehe = "<table class='table table-striped table-bordered'>";
					hehe += "<tr>";
					hehe += "<td> Nama : " + feature.properties.Nama + "</td>";
					hehe += "</tr>";
					hehe += "<tr>";
					hehe += "<td> Alamat : " + feature.properties.Alamat + "</td>";
					hehe += "</tr>";
					hehe += "</table>";
					layer.bindPopup(hehe);
				}
			}).addTo(taman);
		});

	//kecamatan
	$.getJSON("kuburan.geojson", function(data) {
		L.geoJSON(data, {
			style: function(feature) {
				return {
					color: "#15C809",
					weight: 1,
					fillColor: "#15C809",
					fillOpacity: 0.4
				}

			},
			onEachFeature: function(feature, layer) {
				var hehe = "<table class='table table-striped table-bordered'>";
				hehe += "<tr>";
				hehe += "<td> Nama TPU : " + feature.properties.NAMA + "</td>";
				hehe += "</tr>";
				hehe += "<tr>";
				hehe += "<td> Alamat : " + feature.properties.ALAMAT + "</td>";
				hehe += "</tr>";
				hehe += "</table>";
				layer.bindPopup(hehe);
			}
		}).addTo(kuburan);
	});
	//kecamatan
	$.getJSON("masjid.geojson", function(data) {
		L.geoJSON(data, {
			style: function(feature) {
				return {
					color: "#15C809",
					weight: 1,
					fillColor: "#15C809",
					fillOpacity: 0.4
				}

			},
			onEachFeature: function(feature, layer) {
				var hehe = "<table class='table table-striped table-bordered'>";
				hehe += "<tr>";
				hehe += "<td> Nama Masjid : " + feature.properties.nama + "</td>";
				hehe += "</tr>";
				hehe += "<tr>";
				hehe += "<td> Status : " + feature.properties.Status + "</td>";
				hehe += "</tr>";
				hehe += "<tr>";
				hehe += "<td> Telepon : " + feature.properties.telepon + "</td>";
				hehe += "</tr>";
				hehe += "<tr>";
				hehe += "<td> Alamat : " + feature.properties.alamat + "</td>";
				hehe += "</tr>";
				hehe += "</table>";
				layer.bindPopup(hehe);
			}
		}).addTo(masjid);
	});
	$.getJSON("jpo.geojson", function(data) {
		L.geoJSON(data, {
			style: function(feature) {
				return {
					color: "#15C809",
					weight: 1,
					fillColor: "#15C809",
					fillOpacity: 0.4
				}
			},
			onEachFeature: function(feature, layer) {
				var hehe = "<table class='table table-striped table-bordered'>";
				hehe += "<tr>";
				hehe += "<td> Nama JPO : " + feature.properties.Nama + "</td>";
				hehe += "</tr>";
				hehe += "<tr>";
				hehe += "<td> Keterangan : " + feature.properties.Keterangan + "</td>";
				hehe += "</tr>";
				hehe += "</table>";
				layer.bindPopup(hehe);
			}
		}).addTo(jpo);
	});
	$.getJSON("BufferedLPG.geojson", function(data) {
		L.geoJSON(data, {
			style: function(feature) {
				return {
					color: "#C80957",
					weight: 2,
					fillColor: "#C80957",
					fillOpacity: 2
				}

			},
			onEachFeature: function(feature, layer) {
				var hehe = "<table class='table table-striped table-bordered'>";
				hehe += "<tr>";
				hehe += "<td> Harga : " + feature.properties.Harga + "</td>";
				hehe += "</tr>";
				hehe += "<tr>";
				hehe += "<td> Nama Agen : " + feature.properties.Nama_Agen_PSO_Siaga + "</td>";
				hehe += "</tr>";
				hehe += "<tr>";
				hehe += "<td> Kab / Kota : " + feature.properties.Kab____Kota + "</td>";
				hehe += "</tr>";
				hehe += "<tr>";
				hehe += "<td> Provinsi : " + feature.properties.Prov_ + "</td>";
				hehe += "</tr>";
				hehe += "<tr>";
				hehe += "<td> ALamat : " + feature.properties.Alamat + "</td>";
				hehe += "</tr>";
				hehe += "<tr>";
				hehe += "<td> Kecamatan : " + feature.properties.Kecamatan + "</td>";
				hehe += "</tr>";
				hehe += "<tr>";
				hehe += "<td> Jenis Gas : " + feature.properties.Jenis_Gas + "</td>";
				hehe += "</tr>";
				hehe += "</table>";
				hehe +=
					layer.bindPopup(hehe);
			}
		}).addTo(harga);
	});
	$.getJSON("BufferedLPG.geojson", function(data) {
		L.geoJSON(data, {
			style: function(feature) {
				return {
					color: "#C80957",
					weight: 2,
					fillColor: "#C80957",
					fillOpacity: 2
				}

			},
			onEachFeature: function(feature, layer) {
				var hehe = "<table class='table table-striped table-bordered'>";
				hehe += "<tr>";
				hehe += "<td> Ukuran : " + feature.properties.Ukuran_LPG + "</td>";
				hehe += "</tr>";
				hehe += "<tr>";
				hehe += "<td> Nama Agen : " + feature.properties.Nama_Agen_PSO_Siaga + "</td>";
				hehe += "</tr>";
				hehe += "<tr>";
				hehe += "<td> Kab / Kota : " + feature.properties.Kab____Kota + "</td>";
				hehe += "</tr>";
				hehe += "<tr>";
				hehe += "<td> Provinsi : " + feature.properties.Prov_ + "</td>";
				hehe += "</tr>";
				hehe += "<tr>";
				hehe += "<td> ALamat : " + feature.properties.Alamat + "</td>";
				hehe += "</tr>";
				hehe += "<tr>";
				hehe += "<td> Kecamatan : " + feature.properties.Kecamatan + "</td>";
				hehe += "</tr>";
				hehe += "<tr>";
				hehe += "<td> Jenis Gas : " + feature.properties.Jenis_Gas + "</td>";
				hehe += "</tr>";



				hehe += "</table>";
				layer.bindPopup(hehe);
			}
		}).addTo(ukuran);
	});
	$.getJSON("BufferedLPG.geojson", function(data) {
		L.geoJSON(data, {
			style: function(feature) {
				return {
					color: "#C80957",
					weight: 2,
					fillColor: "#C80957",
					fillOpacity: 2
				}

			},
			onEachFeature: function(feature, layer) {
				var hehe = "<table class='table table-striped table-bordered'>";
				hehe += "<tr>";
				hehe += "<td> Jam_Operasional : " + feature.properties.Jam_Operasional + "</td>";
				hehe += "</tr>";
				hehe += "<tr>";
				hehe += "<td> Nama Agen : " + feature.properties.Nama_Agen_PSO_Siaga + "</td>";
				hehe += "</tr>";
				hehe += "<tr>";
				hehe += "<td> Kab / Kota : " + feature.properties.Kab____Kota + "</td>";
				hehe += "</tr>";
				hehe += "<tr>";
				hehe += "<td> Provinsi : " + feature.properties.Prov_ + "</td>";
				hehe += "</tr>";
				hehe += "<tr>";
				hehe += "<td> ALamat : " + feature.properties.Alamat + "</td>";
				hehe += "</tr>";
				hehe += "<tr>";
				hehe += "<td> Kecamatan : " + feature.properties.Kecamatan + "</td>";
				hehe += "</tr>";
				hehe += "<tr>";
				hehe += "<td> Jenis Gas : " + feature.properties.Jenis_Gas + "</td>";
				hehe += "</tr>";
				hehe += "</table>";
				layer.bindPopup(hehe);
			}
		}).addTo(jam);
	});
</script>