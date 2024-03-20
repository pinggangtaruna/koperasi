<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Penjualan</h1>
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
                            <h3 class="card-title">Tabel Penjualan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="content mb-3 text-right">
                                <a href="<?= base_url('kios/tambah-penjualan') ?>" class="btn btn-sm btn-success"><i class="fas fa-plus mr-1"></i> Tambah
                                    Penjualan</a>
                            </div>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Penjualan</th>
                                        <th class="text-center">Total</th>
                                        <th class="text-center">Tanggal Penjualan</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($penjualan as $penjualan) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $penjualan['id_penjualan']; ?></td>
                                            <td class="text-center">Rp. <?= number_format($penjualan['total'], 0, ',', '.'); ?></td>
                                            <td class="text-center"><?= date('d M Y H:i:s', strtotime($penjualan['tgl'])); ?></td>
                                            <td class="text-center">
                                                <button href="<?= base_url('kios/delete-penjualan?id=' . $penjualan['id_penjualan']) ?>" type="button" class="btn btn-danger btn-sm mr-1 btnDelete" fdprocessedid="bkcwxd"><i class="fas fa-trash"></i></button>
                                            </td>
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