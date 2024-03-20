<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
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
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tabel Pembelian</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="content mb-3 text-right">
                                <a href="<?= base_url('waserda/tambah-pembelian') ?>" class="btn btn-sm btn-success"><i class="fas fa-plus mr-1"></i> Tambah
                                    Pembelian</a>
                            </div>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pembeli</th>
                                        <th class="text-center">Total</th>
                                        <th class="text-center">Tanggal Beli</th>
                                        <th class="text-center">Metode</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($pembelian as $pembelian) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $pembelian['nama']; ?></td>
                                            <td class="text-center">Rp. <?= number_format($pembelian['total'], 0, ',', '.'); ?></td>
                                            <td class="text-center"><?= date('d M Y H:i:s', strtotime($pembelian['tgl'])); ?></td>
                                            <td class="text-center"><?= $pembelian['metode']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->