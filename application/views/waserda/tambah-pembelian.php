<div class="content-wrapper" style="min-height: 2646.34px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pembelian</h1>
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
                        <h3 class="card-title">Form Tambah Pembelian</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('waserda/tambah-pembelian'); ?>" method="post" id="form-tambah-pembelian">
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
                                <label for="nama">Nama Pembeli</label>
                                <input type="text" name="nama" id="nama_nelayan" class="form-control" placeholder="Nama Pembeli" readonly>
                                <?php echo form_error('nama', '<small class="error text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="metode">Metode Pembayaran</label>
                                <select id="metode" name="metode" class="form-control custom-select">
                                    <option selected="" disabled="">Pilih Metode Pembayaran</option>
                                    <option value="Cash">Cash</option>
                                    <option value="Digital">Digital</option>
                                </select>
                                <?php echo form_error('metode', '<small class="error text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="total">Total</label>
                                <input type="text" name="total" id="total" class="form-control" placeholder="Total">
                                <?php echo form_error('total', '<small class="error text-danger">', '</small>'); ?>
                            </div>
                            <div class="col text-right">
                                <button id="tambah-pembelian" type="button" class="btn btn-success">Submit</button>
                            </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

<!-- Modal Password -->
<div class="modal fade" id="modal-secure" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Input Password</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="input-group">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <small id="cekpassword" class="text-danger pl-3" style="font-size: 14px"></small>
                    </div>
                </div>
                <div class="col text-right">
                    <button type="button" id="secure" class="btn btn-success">Submit</button>
                </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Password -->