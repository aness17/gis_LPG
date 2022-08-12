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
                                <th>Foto</th>
                                <th>Nama Agen</th>
                                <th>Kabupaten / Kota</th>
                                <th>Provinsi</th>
                                <th>Alamat</th>
                                <th>Ukuran LPG</th>
                                <th>Harga</th>
                                <th>Jenis Gas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $q = $this->db->query("select * from agen order by id desc");
                            foreach ($q->result() as $row) {
                            ?>
                                <tr>
                                    <td><?php echo $no ?></td>
                                   <td>
                                    <?php if($row->k != ""){ ?>
                                    <img src="image/<?php echo $row->k ?>" class="img img-fluid img-thumbnail" width="240" alt="">

                                        <?php }else{  ?>
                                    <img src="assets/nofoto.jpg" class="img img-fluid img-thumbnail" width="240" alt="">
                                            
                                            <?php  } ?>
                                   </td>
                                    <td><?php echo $row->a ?></td>
                                    <td><?php echo $row->b ?></td>
                                    <td><?php echo $row->c ?></td>
                                    <td><?php echo $row->j ?></td>
                                    <td><?php echo $row->h ?></td>
                                    <td><?php echo $row->f ?></td>
                                    <td><?php echo $row->i ?></td>
                                    <td>
                                        <a href="main/hapusagen/<?php echo $row->id ?>" class="btn btn-danger" onclick="return confirm('Hapus data?')"><i class="fa fa-trash"></i></a>
                                        <a href="main/editagen/<?php echo $row->id ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                    </td>
                                </tr>
                            <?php $no++;
                            } ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </section>

</div>