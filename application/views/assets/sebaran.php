<!-- Main Content -->
<div class="main-content">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->

            <div class="card">
                <div class="card-header bg-success text-light">
                    Data Peta Sebaran Agen LPG
                </div>
                <div class="card-body table-responsive">
                    <a href="main/addagen" class="btn btn-success mb-3"><i class="fa fa-plus"></i> Tambah Agen</a>
                    <table class="table table-striped dt">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Foto Agen</th>
                                <th>Nama Agen</th>
                                <th>Alamat</th>
                                <th>Kecamatan</th>
                                <th>Jam Operasi</th>
                                <th>Ukuran LPG</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                $q = $this->db->query("select * from agen order by id desc");
                                foreach($q->result() as $row){
                            ?>
                                <tr>
                                    <td><?php echo $no ?></td>
                                    <td>
                                        <img src="image/<?php echo $row->gambar ?>" alt="" class="img img-fluid img-thumbnail" width="130">
                                    </td>
                                    <td><?php echo $row->nama_agen ?></td>
                                    <td><?php echo $row->alamat ?></td>
                                    <td><?php echo $row->kec ?></td>
                                    <td><?php echo $row->jam_operasi ?></td>
                                    <td><?php echo $row->ukuran ?></td>
                                    <td><?php echo number_format($row->harga,0,',','.') ?></td>
                                    <td>
                                        <a href="main/hapusagen/<?php echo $row->id ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin hapus data?')"><i class="fa fa-trash"></i></a>
                                        <a href="main/editagen/<?php echo $row->id ?>" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                    </td>
                                </tr>
                            <?php $no++; } ?>
                        </tbody>
                     
                    </table>
                </div>
                </div>
          </div>
        </section>
      
      </div>
      