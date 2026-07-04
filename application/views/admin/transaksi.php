<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Transaksi</h1>
    <a href="<?php echo base_url().'admin/transaksi_add'; ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> Transaksi Baru
    </a>
</div>

<!-- DataTable -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Transaksi</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Kostumer</th>
                        <th>Mobil</th>
                        <th>Tgl. Pinjam</th>
                        <th>Tgl. Kembali</th>
                        <th>Harga</th>
                        <th>Denda / Hari</th>
                        <th>Tgl. Dikembalikan</th>
                        <th>Total Denda</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach($transaksi as $t){
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo date('d/m/Y', strtotime($t->transaksi_tgl)); ?></td>
                        <td><?php echo $t->kostumer_nama; ?></td>
                        <td><?php echo $t->mobil_merk; ?></td>
                        <td><?php echo date('d/m/Y', strtotime($t->transaksi_tgl_pinjam)); ?></td>
                        <td><?php echo date('d/m/Y', strtotime($t->transaksi_tgl_kembali)); ?></td>
                        <td>Rp. <?php echo number_format($t->transaksi_harga); ?></td>
                        <td>Rp. <?php echo number_format($t->transaksi_denda); ?></td>
                        <td>
                            <?php
                            if($t->transaksi_tgldikembalikan == "0000-00-00"){
                                echo "-";
                            } else {
                                echo date('d/m/Y', strtotime($t->transaksi_tgldikembalikan));
                            }
                            ?>
                        </td>
                        <td>Rp. <?php echo number_format($t->transaksi_totaldenda); ?> ,-</td>
                        <td>
                            <?php
                            if($t->transaksi_status == "1"){
                                echo "<span class='badge badge-success'>Selesai</span>";
                            } else {
                                echo "<span class='badge badge-warning'>Berlangsung</span>";
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if($t->transaksi_status == "1"){
                                echo "-";
                            } else {
                            ?>
                            <a class="btn btn-sm btn-success" href="<?php echo base_url().'admin/transaksi_selesai/'.$t->transaksi_id; ?>">
                                <i class="fas fa-check"></i> Selesai
                            </a>
                            <br>
                            <a class="btn btn-sm btn-danger" href="<?php echo base_url().'admin/transaksi_hapus/'.$t->transaksi_id; ?>">
                                <i class="fas fa-times"></i> Batalkan
                            </a>
                            <?php
                            }
                            ?>
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
