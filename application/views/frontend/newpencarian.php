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
            <form action="" method="post">
              <table class="table">
                <tr>
                  <td>Ukuran LPG</td>
                  <td>
                    <select name="ukuran" class="form-control" id="">
                      <option value="">Tampil Semua</option>
                      <?php
                      $q = $this->db->query("select * from agen group by h");
                      foreach ($q->result() as $row) {
                      ?>
                        <option value="<?php echo $row->h ?>"><?php echo $row->h ?></option>
                      <?php }  ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Kecamatan</td>
                  <td>
                    <select name="kec" id="" class="form-control">
                      <option value="">Tampil Semua</option>
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
                  <td>Harga</td>
                  <td>
                    <select name="harga" id="" class="form-control">
                      <option value="">Tampil Semua</option>
                      <?php
                      $q = $this->db->query("select * from agen group by f");
                      foreach ($q->result() as $row) {
                      ?>
                        <option value="<?php echo $row->f ?>"><?php echo $row->f ?></option>
                      <?php }  ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Jam Operasional</td>
                  <td>
                    <select name="jam" id="" class="form-control">
                      <option value="">Tampil Semua</option>
                      <?php
                      $q = $this->db->query("select * from agen group by g");
                      foreach ($q->result() as $row) {
                      ?>
                        <option value="<?php echo $row->g ?>"><?php echo $row->g ?></option>
                      <?php }  ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td>
                    <button type="submit" class="btn btn-primary" name="cari">Proses</button>
                  </td>
                </tr>
              </table>
            </form>
          </div>
        </div>
      </center>
    </div>

    </div>

  </section><!-- End Contact Section -->

  <?php
  if (isset($_POST['cari']) != "") {
    if ($_POST['ukuran'] != "") {
      $query = "select * from agen";

      if ($_POST['ukuran'] != "") $query .= " where h='$_POST[ukuran]'";

      if ($_POST['kec'] != "") {
        if ($_POST['ukuran'] != "") $query .= " and d='$_POST[kec]'";
        else $query .= " where d='$_POST[kec]'";
      }

      if ($_POST['harga'] != "") {
        if ($_POST['kec'] != "" || $_POST['ukuran'] != "") $query .= " and d='$_POST[harga]'";
        else $query .= " where d='$_POST[harga]'";
      }

      if ($_POST['jam'] != "") {
        if ($_POST['kec'] != "" || $_POST['ukuran'] != "" || $_POST['harga'] != "") $query .= " and d='$_POST[jam]'";
        else $query .= " where d='$_POST[jam]'";
      }


      $q = $this->db->query($query);
    } else {
      $q = $this->db->query("select * from agen");
    }

  ?>

    <section id="contact" class="contact">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
        </header>

        <center>
          <div class="card">
            <div class="card-body table-responsive">
              <table class="table table-striped dt">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Foto Agen</th>
                    <th>Nama Agen</th>
                    <th>Provinsi</th>
                    <th>Kabupaten</th>
                    <th>Kecamatan</th>
                    <th>Alamat</th>
                    <th>Ukuran LPG</th>
                    <th>Jenis Gas</th>
                    <th>Jam Operasional</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($q->result() as $row) {
                  ?>
                    <tr>
                      <td><?php echo $no ?></td>
                      <td>
                        <?php if ($row->k != "") { ?>
                          <img src="image/<?php echo $row->k ?>" class="img-fluid" alt="">
                        <?php } else { ?>
                          <img src="assets/nofoto.jpg" class="img-fluid" alt="">
                        <?php }  ?>
                      </td>
                      <td><?php echo $row->a ?></td>
                      <td><?php echo $row->c ?></td>
                      <td><?php echo $row->b ?></td>
                      <td><?php echo $row->d ?></td>
                      <td><?php echo $row->k ?></td>
                      <td><?php echo $row->h ?></td>
                      <td><?php echo $row->i ?></td>
                      <td><?php echo $row->g ?></td>
                      <td><?php echo $row->f ?></td>
                      <td>
                        <a href="home/detail/<?php echo $row->id ?>" class="btn btn-info">Detail</a>
                      </td>

                    </tr>
                  <?php $no++;
                  } ?>
                </tbody>

              </table>
            </div>
          </div>
        </center>
      </div>

      </div>

    </section><!-- End Contact Section -->

  <?php  } ?>
</main>