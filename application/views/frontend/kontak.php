<main id="main">

<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
  <div class="container">

    <ol>
      <li><a href="home/index">Beranda</a></li>
      <li>Kontak</li>
    </ol>
    <h2>Kontak</h2>

  </div>
</section><!-- End Breadcrumbs -->


<section id="contact" class="contact">

<div class="container" data-aos="fade-up">

  <header class="section-header">
    <p>Kontak Kami</p>
  </header>

  <div class="row gy-4">
<center>
    

<div class="col-lg-6">
      <form action="home/send" method="post" >
        <div class="row gy-4">

          <div class="col-md-6">
            <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required>
          </div>

          <div class="col-md-6 ">
            <input type="number" class="form-control" name="telp" placeholder="Nomor Telepon" required>
          </div>

        

          <div class="col-md-12">
            <textarea class="form-control" name="pesan" rows="6" placeholder="Kritik / Saran" required></textarea>
          </div>

          <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Kirim</button>
          </div>

        </div>
      </form>

    </div>

</center>
  </div>

</div>

</section><!-- End Contact Section -->
</main>

<?php if($this->session->flashdata("msg") == "send"){ ?>
    <script>
        Swal.fire(
            "Informasi",
            "Terima kasih atas kritik / saran dari anda!",
            "success"
        );
    </script>
    <?php } ?>