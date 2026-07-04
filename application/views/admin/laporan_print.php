<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan Transaksi</title>
    <link href="<?php echo base_url().'assets/'; ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url().'assets/'; ?>css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        body { padding: 20px; }
        .table {
            border-collapse: collapse;
        }
        .table th,
        .table td {
            vertical-align: middle;
            border: 1px solid #000 !important;
            padding: .75rem;
        }
        .table thead th {
            border-bottom: 2px solid #000 !important;
        }
        .table tbody tr td {
            border-bottom: 1px solid #000 !important;
        }
        .table-bordered {
            border: 1px solid #000 !important;
        }
        @media print {
            .no-print { display: none; }
        }
    </style>
</head>
<body>
    <div class="text-center mb-4">
        <h3>Laporan Transaksi Rental Mobil</h3>
        <p>Dari: <?php echo date('d/m/Y', strtotime($dari)); ?> sampai: <?php echo date('d/m/Y', strtotime($sampai)); ?></p>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped" width="100%" cellspacing="0">
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
                        <?php if($l->transaksi_status == '1'){ echo 'Selesai'; } else { echo 'Berlangsung'; } ?>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <div class="mt-4 no-print">
        <button onclick="window.print()" class="btn btn-primary">Cetak</button>
        <a href="<?php echo base_url().'admin/laporan'; ?>" class="btn btn-secondary">Kembali</a>
    </div>
</body>
</html>
