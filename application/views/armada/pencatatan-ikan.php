<div class="content-wrapper" style="min-height: 2646.34px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pencatatan Ikan</h1>
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
                        <h3 class="card-title">Form Pencatatan Ikan</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('armada/tambah-pencatatan'); ?>" method="post">
                            <div class="form-group">
                                <label for="telepon">Telepon</label>
                                <div class="d-flex gap-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="text" id="telepon" class="form-control mr-2" name="telepon" placeholder="Telepon">
                                    </div>
                                    <a id="cekakun" class="btn btn-outline-success">CEK</a>
                                </div>
                                <div class="row">
                                    <small id="alert" class="text-danger pl-3" style="font-size: 14px"></small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama_nelayan">Nama Nelayan</label>
                                <input type="text" name="nama_nelayan" id="nama_nelayan" class="form-control" placeholder="Nama Nelayan" readonly>
                                <?php echo form_error('nama_nelayan', '<small class="error text-danger">', '</small>'); ?>
                            </div>
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
                                <label for="harga_perkilo">Harga Perkilo</label>
                                <input type="text" name="harga_perkilo" id="harga_perkilo" class="form-control" placeholder="Rp. 0,00" readonly>
                                <?php echo form_error('harga_perkilo', '<small class="error text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="jumlah_ikan">Jumlah Ikan</label>
                                <input type="number" name="jumlah_ikan" id="jumlah_ikan" class="form-control" placeholder="Jumlah Ikan">
                                <?php echo form_error('jumlah_ikan', '<small class="error text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="total">Total</label>
                                <input type="text" name="total" id="total" class="form-control" placeholder="Total" readonly>
                                <?php echo form_error('total', '<small class="error text-danger">', '</small>'); ?>
                            </div>
                            <div class="col text-right">
                                <button type="submit" class="btn btn-success">Submit</button>
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