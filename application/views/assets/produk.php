<!-- Main Content -->
<div class="main-content">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->

            <div class="card">
                <div class="card-header bg-success text-light">
                    Data Produk
                </div>
                <div class="card-body table-responsive">
                    <a href="main/addproduk" class="btn btn-success mb-3"><i class="fa fa-plus"></i> Tambah Produk</a>
                    <table class="table table-striped dt">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Foto Produk</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <body>
                            <?php
                                $q = $this->db->query("select * from produk  order by id desc");
                                $no = 1;
                                foreach($q->result() as $row){ 
                            ?>
                                <tr>
                                    <td><?php echo $no ?></td>
                                    <td><img src="image/<?php echo $row->foto ?>" alt="" class="img img-fluid img-thumbnail" width="140"></td>
                                    <td><?php echo $row->produk ?></td>
                                    <td><?php echo $row->harga ?></td>
                                    <td><?php echo $row->stok ?></td>
                                    <td><?php echo $row->desk ?></td>
                                    <td>
                                        <a href="main/hpsproduk/<?php echo $row->id ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin logout?')"><i class="fa fa-trash"></i> Hapus</a>
                                        <a href="main/editproduk/<?php echo $row->id ?>" class="btn btn-info" ><i class="fa fa-edit"></i> Edit</a>
                                        <a href="main/addpromo/<?php echo $row->id ?>" class="btn btn-success" ><i class="fa fa-edit"></i> Tambah Promo</a>
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
      