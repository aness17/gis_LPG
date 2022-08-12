<!-- Main Content -->
<div class="main-content">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->

            <div class="card">
                <div class="card-header bg-success text-light">
                    Data Kontak
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-striped dt">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Nomor Telepon</th>
                                <th>Kritik / Saran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <body>
                            <?php
                                $q = $this->db->query("select * from kontak  order by id desc");
                                $no = 1;
                                foreach($q->result() as $row){ 
                            ?>
                                <tr>
                                    <td><?php echo $no ?></td>
                                    <td><?php echo $row->nama ?></td>
                                    <td><?php echo $row->telp ?></td>
                                    <td><?php echo $row->kritik ?></td>
                                    <td>
                                        <a href="main/hpskontak/<?php echo $row->id ?>" class="btn btn-danger" onclick="return confirm('Yakin hapus data?')"><i class="fa fa-trash"></i> Hapus</a>
                                    </td>
                                </tr>
                            <?php $no++; }  ?>
                        </body>
                    </table>
                </div>
                </div>
          </div>
        </section>
      
      </div>
      