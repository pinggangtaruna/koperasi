<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
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
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tabel Data Ikan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="content mb-3 text-right">
                                <a href="<?= base_url('armada/tambah-ikan') ?>" class="btn btn-sm btn-success"><i class="fas fa-plus mr-1"></i> Tambah
                                    Ikan</a>
                            </div>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Ikan</th>
                                        <th class="text-center">Harga Perkilo</th>
                                        <th class="text-center">Stok</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($ikan as $ikan) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $ikan['nama_ikan']; ?></td>
                                            <td class="text-center"><?= "Rp " . number_format($ikan['harga_perkilo'], 2, ',', '.'); ?></td>
                                            <td class="text-center"><?= $ikan['stok']; ?> Kg</td>
                                            <td class="text-center">
                                                <button data-toggle="modal" data-target="#modal-edit-ikan" type="button" class="btn btn-warning btn-sm editikan" fdprocessedid="bkcwxd" data-idikan="<?= $ikan['id_ikan'] ?>"><i class="fas fa-edit text-white"></i></button>
                                                <button href="<?= base_url('armada/delete-ikan?id=' . $ikan['id_ikan']) ?>" type="button" class="btn btn-danger btn-sm mr-1 btnDelete" fdprocessedid="bkcwxd"><i class="fas fa-trash"></i></button>
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

<!-- Modal Edit Permohonan -->
<div class="modal fade" id="modal-edit-ikan" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Data Ikan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('armada/edit-ikan'); ?>" method="post">
                    <div class="form-group">
                        <label for="nama_ikan">Nama Ikan</label>
                        <input type="text" name="nama_ikan" id="nama_ikan" class="form-control" placeholder="Nama Ikan">
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
                    </div>
                    <div class="col text-right">
                        <button type="submit" class="btn btn-success">Edit</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Edit Permohonan -->