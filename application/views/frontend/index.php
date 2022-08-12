<!-- ======= Hero Section ======= -->
<section id="hero" class="hero d-flex align-items-center">

  <div class="container">
    <div class="row">
      <div class="col-lg-6 d-flex flex-column justify-content-center">
        <h1 data-aos="fade-up">Sistem Informasi Geografis</h1>
        <h2 data-aos="fade-up" data-aos-delay="400">Dengan adanya sistem ini kita bisa dengan mudah mengetahui persebaran agen distributor LPG di Pekanbaru</h2>
        <div data-aos="fade-up" data-aos-delay="600">
          <div class="text-center text-lg-start">
            <a href="home/pencarian" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
              <span>Cari</span>
              <i class="bi bi-arrow-right"></i>
            </a>
             <a href="home/sebaran" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
              <span>Lihat</span>
              <i class="bi bi-arrow-right"></i>
            </a>
          </div>
        </div>
      </div>
      <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
        <img src="frontend/bg.jpg" class="img-fluid" alt="">
      </div>
    </div>
  </div>

</section><!-- End Hero -->

<main id="main">
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
</main><!-- End #main -->