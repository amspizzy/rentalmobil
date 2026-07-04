<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Data Mobil</h1>
</div>

<?php foreach($mobil as $m){ ?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Edit Mobil</h6>
    </div>
    <div class="card-body">
        <form action="<?php echo base_url().'admin/mobil_update' ?>" method="post">
            <div class="form-group">
                <label>Merk Mobil</label>
                <input type="hidden" name="id" value="<?php echo $m->mobil_id; ?>">
                <input type="text" name="merk" class="form-control" value="<?php echo $m->mobil_merk; ?>" required>
                <?php echo form_error('merk'); ?>
            </div>
            <div class="form-group">
                <label>No. Plat Kendaraan</label>
                <input type="text" name="plat" class="form-control" value="<?php echo $m->mobil_plat; ?>" required>
            </div>
            <div class="form-group">
                <label>Warna</label>
                <input type="text" name="warna" class="form-control" value="<?php echo $m->mobil_warna; ?>" required>
            </div>
            <div class="form-group">
                <label>Tahun Kendaraan</label>
                <input type="number" name="tahun" class="form-control" value="<?php echo $m->mobil_tahun; ?>" required>
            </div>
            <div class="form-group">
                <label>Status Kendaraan</label>
                <select name="status" class="form-control" required>
                    <option <?php if($m->mobil_status == "1"){echo "selected='selected'";} ?> value="1">Tersedia</option>
                    <option <?php if($m->mobil_status == "2"){echo "selected='selected'";} ?> value="2">Sedang Di Rental</option>
                </select>
                <?php echo form_error('status'); ?>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
                <a href="<?php echo base_url().'admin/mobil'; ?>" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a>
            </div>
        </form>
    </div>
</div>
<?php } ?>
