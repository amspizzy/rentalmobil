<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Hasil Laporan</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <div>
            <h6 class="m-0 font-weight-bold text-primary">Data Laporan</h6>
            <small>Dari: <?php echo date('d/m/Y', strtotime($dari)); ?> sampai: <?php echo date('d/m/Y', strtotime($sampai)); ?></small>
        </div>
        <a href="<?php echo base_url().'admin/laporan_print/?dari='.$dari.'&sampai='.$sampai; ?>" class="btn btn-warning btn-sm">
            <i class="fas fa-print"></i> Print
        </a>
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
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach($laporan as $l){
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo date('d/m/Y', strtotime($l->transaksi_tgl)); ?></td>
                        <td><?php echo $l->kostumer_nama; ?></td>
                        <td><?php echo $l->mobil_merk; ?></td>
                        <td><?php echo date('d/m/Y', strtotime($l->transaksi_tgl_pinjam)); ?></td>
                        <td><?php echo date('d/m/Y', strtotime($l->transaksi_tgl_kembali)); ?></td>
                        <td>Rp. <?php echo number_format($l->transaksi_harga); ?></td>
                        <td>Rp. <?php echo number_format($l->transaksi_denda); ?></td>
                        <td>
                            <?php
                            if($l->transaksi_tgldikembalikan == '0000-00-00'){
                                echo '-';
                            } else {
                                echo date('d/m/Y', strtotime($l->transaksi_tgldikembalikan));
                            }
                            ?>
                        </td>
                        <td>Rp. <?php echo number_format($l->transaksi_totaldenda); ?> ,-</td>
                        <td>
                            <?php if($l->transaksi_status == '1'){ ?>
                                <span class="badge badge-success">Selesai</span>
                            <?php } else { ?>
                                <span class="badge badge-warning">Berlangsung</span>
                            <?php } ?>
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
