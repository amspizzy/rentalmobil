<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<!-- Content Row - Stats Cards -->
<div class="row">

    <!-- Total Mobil -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Mobil</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_mobil; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-car fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Kostumer -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Kostumer</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_kostumer; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Transaksi Berlangsung -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Transaksi Berlangsung</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $transaksi_aktif; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clock fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Transaksi Selesai -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Transaksi Selesai</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $transaksi_selesai; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Content Row - Recent Transactions -->
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Transaksi Terbaru</h6>
                <a href="<?php echo base_url().'admin/transaksi'; ?>" class="btn btn-sm btn-primary">
                    <i class="fas fa-list fa-sm"></i> Lihat Semua
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Kostumer</th>
                                <th>Mobil</th>
                                <th>Tgl. Pinjam</th>
                                <th>Tgl. Kembali</th>
                                <th>Harga</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(empty($transaksi_terbaru)){ ?>
                            <tr>
                                <td colspan="6" class="text-center">Belum ada transaksi</td>
                            </tr>
                            <?php } else { ?>
                            <?php foreach($transaksi_terbaru as $t){ ?>
                            <tr>
                                <td><?php echo $t->kostumer_nama; ?></td>
                                <td><?php echo $t->mobil_merk; ?></td>
                                <td><?php echo date('d/m/Y', strtotime($t->transaksi_tgl_pinjam)); ?></td>
                                <td><?php echo date('d/m/Y', strtotime($t->transaksi_tgl_kembali)); ?></td>
                                <td>Rp. <?php echo number_format($t->transaksi_harga); ?></td>
                                <td>
                                    <?php if($t->transaksi_status == '1'){ ?>
                                    <span class="badge badge-success">Selesai</span>
                                    <?php } else { ?>
                                    <span class="badge badge-warning">Berlangsung</span>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php } ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
