<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Data Kostumer</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Tambah Kostumer</h6>
    </div>
    <div class="card-body">
        <form action="<?php echo base_url().'admin/kostumer_add_act' ?>" method="post">
            <div class="form-group">
                <label>Nama Kostumer</label>
                <input type="text" name="nama" class="form-control">
                <?php echo form_error('nama'); ?>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label>Jenis Kelamin</label>
                <select name="jk" class="form-control">
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label>HP</label>
                <input type="number" name="hp" class="form-control">
            </div>
            <div class="form-group">
                <label>No. KTP</label>
                <input type="text" name="ktp" class="form-control">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
                <a href="<?php echo base_url().'admin/kostumer'; ?>" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a>
            </div>
        </form>
    </div>
</div>
