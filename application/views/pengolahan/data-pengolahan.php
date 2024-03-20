<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Ikan Masuk</h1>
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
                            <h3 class="card-title">Tabel Data Ikan Masuk</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="content mb-3 text-right">
                                <a href="<?= base_url('pengolahan/tambah-pengolahan') ?>" class="btn btn-sm btn-success"><i class="fas fa-plus mr-1"></i> Tambah
                                    Pengolahan</a>
                            </div>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Ikan</th>
                                        <th class="text-center">Jumlah Diolah</th>
                                        <th class="text-center">Jenis Olahan</th>
                                        <th class="text-center">Tanggal Pengolahan</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($olahan as $olahan) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $olahan['nama_ikan']; ?></td>
                                            <td class="text-center"><?= $olahan['jumlah']; ?> Kg</td>
                                            <td class="text-center"><?= $olahan['jenis_olahan']; ?></td>
                                            <td class="text-center"><?= date('d-m-Y H:i:s', strtotime($olahan['tgl_pengolahan'])); ?></td>
                                            <td class="text-center">
                                                <button href="<?= base_url('pengolahan/delete-pengolahan?id=' . $olahan['id_olah_ikan']) ?>" type="button" class="btn btn-danger btn-sm mr-1 btnDelete" fdprocessedid="bkcwxd"><i class="fas fa-trash"></i></button>
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