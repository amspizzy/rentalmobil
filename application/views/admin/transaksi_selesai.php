<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Transaksi Selesai</h1>
</div>

<?php foreach($transaksi as $t){ ?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Konfirmasi Transaksi Selesai</h6>
    </div>
    <div class="card-body">
        <form action="<?php echo base_url().'admin/transaksi_selesai_act' ?>" method="post">
            <input type="hidden" name="id" value="<?php echo $t->transaksi_id ?>">
            <input type="hidden" name="mobil" value="<?php echo $t->transaksi_mobil ?>">
            <input type="hidden" name="tgl_kembali" value="<?php echo $t->transaksi_tgl_kembali ?>">
            <input type="hidden" name="denda" value="<?php echo $t->transaksi_denda ?>">

            <div class="form-group">
                <label>Kostumer</label>
                <select class="form-control" name="kostumer" disabled>
                    <option value="">-Pilih Kostumer-</option>
                    <?php foreach($kostumer as $k){ ?>
                    <option <?php if($t->transaksi_kostumer == $k->kostumer_id){echo "selected='selected'";} ?> value="<?php echo $k->kostumer_id; ?>"><?php echo $k->kostumer_nama; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label>Mobil</label>
                <select class="form-control" name="mobil" disabled>
                    <option value="">-Pilih Mobil-</option>
                    <?php foreach($mobil as $m){ ?>
                    <option <?php if($t->transaksi_mobil == $m->mobil_id){echo "selected='selected'";} ?> value="<?php echo $m->mobil_id; ?>"><?php echo $m->mobil_merk; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label>Tanggal Pinjam</label>
                <input class="form-control" type="text" name="tgl_pinjam" value="<?php echo date('d/m/Y', strtotime($t->transaksi_tgl_pinjam)) ?>" disabled>
            </div>

            <div class="form-group">
                <label>Tanggal Kembali</label>
                <input class="form-control" type="text" name="tgl_kembali_display" value="<?php echo date('d/m/Y', strtotime($t->transaksi_tgl_kembali)) ?>" disabled>
            </div>

            <div class="form-group">
                <label>Harga</label>
                <input class="form-control" type="text" name="harga" value="Rp. <?php echo number_format($t->transaksi_harga) ?>" disabled>
            </div>

            <div class="form-group">
                <label>Harga Denda / Hari</label>
                <input class="form-control" type="text" name="denda_display" value="Rp. <?php echo number_format($t->transaksi_denda) ?>" disabled>
            </div>

            <div class="form-group">
                <label>Tanggal Dikembalikan Oleh Kostumer</label>
                <input class="form-control" type="date" name="tgl_dikembalikan">
                <?php echo form_error('tgl_dikembalikan'); ?>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-check"></i> Simpan</button>
                <a href="<?php echo base_url().'admin/transaksi'; ?>" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a>
            </div>
        </form>
    </div>
</div>
<?php } ?>
