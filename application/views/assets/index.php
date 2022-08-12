
<?php 
  $agen = $this->db->query("select * from agen")->num_rows();
  $kec = $this->db->query("select * from agen ")->num_rows();
  $kontak = $this->db->query("select * from kontak ")->num_rows();


?>
<!-- Main Content -->
<div class="main-content">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->
            <div class="alert alert-success" role="alert">
              Hallo Selamat Datang <strong><?php echo $this->session->userdata("nama") ?></strong> di Toko Nasti
            </div>
            <div class="row">
              <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon l-bg-purple">
                    <i class="fas fa-book"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="padding-20">
                      <div class="text-right">
                        <h3 class="font-light mb-0">
                          <i class="ti-arrow-up text-success"></i> <?php echo $agen ?>
                        </h3>
                        <span class="text-muted"> Agen Distributor LPG</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon l-bg-green">
                    <i class="fas fa-map"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="padding-20">
                      <div class="text-right">
                        <h3 class="font-light mb-0">
                          <i class="ti-arrow-up text-success"></i> <?php echo $kec ?>
                        </h3>
                        <span class="text-muted">Jumlah Kecamatan</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon l-bg-cyan">
                    <i class="fas fa-book"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="padding-20">
                      <div class="text-right">
                        <h3 class="font-light mb-0">
                          <i class="ti-arrow-up text-success"></i> <?php echo $kontak; ?>
                        </h3>
                        <span class="text-muted">Jumlah Kritik / Saran</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          
            </div>

      
          </div>
        </section>
      
      </div>
      

      