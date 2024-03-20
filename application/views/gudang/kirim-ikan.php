<div class="content-wrapper" style="min-height: 2646.34px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Kirim Ikan</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content mb-2">
        <div class="row">
            <div class="col">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Form Tambah Kirim Ikan</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('gudang/kirim-ikan'); ?>" method="post">
                            <div class="form-group">
                                <label for="nama_ikan">Jenis Ikan</label>
                                <select id="nama_ikan" name="nama_ikan" class="form-control custom-select">
                                    <option selected="" disabled="">Pilih Jenis Ikan</option>
                                    <?php foreach ($ikan as $ikan) : ?>
                                        <option value="<?= $ikan['id_ikan']; ?>"><?= $ikan['nama_ikan']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php echo form_error('nama_ikan', '<small class="error text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="jumlah_kirim">Jumlah Kirim</label>
                                <div class="input-group">
                                    <input type="text" name="jumlah_kirim" id="jumlah_kirim" class="form-control" placeholder="0">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            Kg
                                        </div>
                                    </div>
                                </div>
                                <?php echo form_error('jumlah_kirim', '<small class="error text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="tujuan">Tujuan Kirim</label>
                                <select id="tujuan" name="tujuan" class="form-control custom-select">
                                    <option selected="" disabled="">Pilih Tujuan Kirim</option>
                                    <option value="Rumah Pengolahan">Rumah Pengolahan</option>
                                </select>
                                <?php echo form_error('tujuan', '<small class="error text-danger">', '</small>'); ?>
                            </div>
                            <div class="col text-right">
                                <button type="submit" class="btn btn-success">Tambah</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>