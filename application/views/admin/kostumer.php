<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Kostumer</h1>
    <a href="<?php echo base_url().'admin/kostumer_add'; ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Kostumer Baru
    </a>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Kostumer</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>HP</th>
                        <th>No. KTP</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach($kostumer as $k){
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $k->kostumer_nama; ?></td>
                        <td><?php echo ($k->kostumer_jk == 'L') ? 'Laki-laki' : 'Perempuan'; ?></td>
                        <td><?php echo $k->kostumer_alamat; ?></td>
                        <td><?php echo $k->kostumer_hp; ?></td>
                        <td><?php echo $k->kostumer_ktp; ?></td>
                        <td>
                            <a class="btn btn-warning btn-sm" href="<?php echo base_url().'admin/kostumer_edit/'.$k->kostumer_id; ?>">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a class="btn btn-danger btn-sm" href="<?php echo base_url().'admin/kostumer_hapus/'.$k->kostumer_id; ?>">
                                <i class="fas fa-trash"></i> Hapus
                            </a>
                        </td>
                    </tr>
                    <?php 
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
