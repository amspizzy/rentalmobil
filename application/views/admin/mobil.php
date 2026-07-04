<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Mobil</h1>
    <a href="<?php echo base_url().'admin/mobil_add'; ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Mobil Baru
    </a>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Mobil</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Merk Mobil</th>
                        <th>Plat</th>
                        <th>Warna</th>
                        <th>Tahun Pembuatan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach($mobil as $m){
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $m->mobil_merk; ?></td>
                        <td><?php echo $m->mobil_plat; ?></td>
                        <td><?php echo $m->mobil_warna; ?></td>
                        <td><?php echo $m->mobil_tahun; ?></td>
                        <td>
                            <?php 
                            if($m->mobil_status == "1"){
                                echo "<span class='badge badge-success'>Tersedia</span>";
                            }else if($m->mobil_status == "2"){
                                echo "<span class='badge badge-warning'>Sedang di Rental</span>";
                            }
                            ?>
                        </td>
                        <td>
                            <a class="btn btn-warning btn-sm" href="<?php echo base_url().'admin/mobil_edit/'.$m->mobil_id; ?>">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a class="btn btn-danger btn-sm" href="<?php echo base_url().'admin/mobil_hapus/'.$m->mobil_id; ?>">
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
