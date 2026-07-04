<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Data Kostumer</h1>
</div>

<?php foreach($kostumer as $k){ ?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Edit Kostumer</h6>
    </div>
    <div class="card-body">
        <form action="<?php echo base_url().'admin/kostumer_update' ?>" method="post">
            <div class="form-group">
                <label>Nama Kostumer</label>
                <input type="hidden" name="id" value="<?php echo $k->kostumer_id; ?>">
                <input type="text" name="nama" class="form-control" value="<?php echo $k->kostumer_nama; ?>">
                <?php echo form_error('nama'); ?>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control"><?php echo $k->kostumer_alamat; ?></textarea>
            </div>
            <div class="form-group">
                <label>Jenis Kelamin</label>
                <select name="jk" class="form-control">
                    <option <?php if($k->kostumer_jk == "L"){echo "selected='selected'";} ?> value="L">Laki-laki</option>
                    <option <?php if($k->kostumer_jk == "P"){echo "selected='selected'";} ?> value="P">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label>HP</label>
                <input type="number" name="hp" class="form-control" value="<?php echo $k->kostumer_hp; ?>">
            </div>
            <div class="form-group">
                <label>No. KTP</label>
                <input type="text" name="ktp" class="form-control" value="<?php echo $k->kostumer_ktp; ?>">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
                <a href="<?php echo base_url().'admin/kostumer'; ?>" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a>
            </div>
        </form>
    </div>
</div>
<?php } ?>
