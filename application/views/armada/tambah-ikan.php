<div class="content-wrapper" style="min-height: 2646.34px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Ikan</h1>
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
                        <h3 class="card-title">Form Tambah Ikan</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('armada/tambah-ikan'); ?>" method="post">
                            <div class="form-group">
                                <label for="nama_ikan">Nama Ikan</label>
                                <input type="text" name="nama_ikan" id="nama_ikan" class="form-control" placeholder="Nama Ikan">
                                <?php echo form_error('nama_ikan', '<small class="error text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="harga_perkilo">Harga Perkilo</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            Rp.
                                        </div>
                                    </div>
                                    <input type="text" name="harga_perkilo" id="harga_perkilo" class="form-control" placeholder="Harga Perkilo">
                                </div>
                                <?php echo form_error('harga_perkilo', '<small class="error text-danger">', '</small>'); ?>
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