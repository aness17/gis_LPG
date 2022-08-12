<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">
      <?php
      $q = $this->db->query("select * from agen where id='$id'");
      $row = $q->row();
      ?>

      <ol>
        <li><a href="home/index">Beranda</a></li>
        <li>Detail <?php echo $row->a ?></li>
      </ol>
      <h2> <?php echo $row->a ?></h2>

    </div>
  </section><!-- End Breadcrumbs -->


  <section id="contact" class="contact">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <!-- <p>Peta Sebaran</p> -->
      </header>



      <center>
        <div class="card">
          <div class="card-body table-responsive">
            <?php if ($row->j != "") { ?>
              <img src="image/<?php echo $row->j ?>" class="img-fluid img img-thumbnail" alt="">
            <?php } else { ?>
              <img src="assets/nofoto.jpg" class="img-fluid img img-thumbnail" alt="">
            <?php }  ?>
            <br>
            <br>
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
            <div id="map" style="height: 400px; width: 900px;"></div>
          </div>
        </div>

      </center>
    </div>

    </div>

  </section><!-- End Contact Section -->

</main>

<script>
  var map = L.map('map').setView([<?php echo $row->e ?>], 13);

  var tiles = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
  }).addTo(map);

  var marker = L.marker([<?php echo $row->e ?>]).addTo(map)
    .bindPopup('<b><?php echo $row->a ?></b><br /><?php echo $row->d ?>').openPopup();

</script>