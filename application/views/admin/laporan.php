<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Laporan Transaksi</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Filter Laporan</h6>
    </div>
    <div class="card-body">
        <form method="post" action="<?php echo base_url().'admin/laporan'; ?>">
            <div class="form-row">
                <div class="form-group col-md-5">
                    <label>Dari Tanggal</label>
                    <input type="date" name="dari" class="form-control" value="<?php echo set_value('dari'); ?>">
                    <?php echo form_error('dari', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group col-md-5">
                    <label>Sampai Tanggal</label>
                    <input type="date" name="sampai" class="form-control" value="<?php echo set_value('sampai'); ?>">
                    <?php echo form_error('sampai', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group col-md-2 align-self-end">
                    <button type="submit" class="btn btn-primary btn-block">Cari</button>
                </div>
            </div>
        </form>
    </div>
</div>
