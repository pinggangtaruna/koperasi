<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Users</h1>
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
                            <h3 class="card-title">Tabel Users</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="content mb-3 text-right">
                                <a href="<?= base_url('master/tambah-user') ?>" class="btn btn-sm btn-success"><i class="fas fa-plus mr-1"></i> Tambah
                                    User</a>
                            </div>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th class="text-center">Role</th>
                                        <th class="text-center">Divisi</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($users as $user) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $user['nama']; ?></td>
                                            <td><?= $user['jenis_kelamin']; ?></td>
                                            <td class="text-center"><?= $user['role']; ?></td>
                                            <td class="text-center"><?= $user['divisi']; ?></td>
                                            <td class="text-center">
                                                <button data-toggle="modal" data-target="#modal-edit-user" type="button" class="btn btn-warning btn-sm edituser" fdprocessedid="bkcwxd" data-iduser="<?= $user['id_user'] ?>"><i class="fas fa-edit text-white"></i></button>
                                                <button href="<?= base_url('master/delete-user?id=' . $user['id_user']) ?>" type="button" class="btn btn-danger btn-sm mr-1 btnDelete" fdprocessedid="bkcwxd"><i class="fas fa-trash"></i></button>
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
<div class="modal fade" id="modal-edit-user" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Permohonan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('master/edit-user'); ?>" method="post">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan Nama">
                    </div>
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" name="nik" id="nik" class="form-control" placeholder="Masukan NIK" disabled>
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select id="jenis_kelamin" name="jenis_kelamin" class="form-control custom-select">
                            <option selected="" disabled="">Pilih Jenis Kelamin</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea id="alamat" name="alamat" class="form-control" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Telepon</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                            </div>
                            <input type="text" id="telepon" name="telepon" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select id="role" name="role" class="form-control custom-select">
                            <option selected="" disabled="">Pilih Role</option>
                            <option value="User">User</option>
                            <option value="Admin">Admin</option>
                            <option value="Petugas">Petugas</option>
                        </select>
                    </div>
                    <div class="form-group" id="selectdivisi" style="display: none;">
                        <label for="divisi">Divisi</label>
                        <select id="divisi" name="divisi" class="form-control custom-select">
                            <option selected="" disabled="">Pilih Divisi</option>
                            <option value="Armada Penangkapan Ikan">Armada Penangkapan Ikan</option>
                            <option value="Rumah Pengeringan">Rumah Pengeringan</option>
                            <option value="Gudang">Gudang</option>
                            <option value="Waserda">Waserda</option>
                            <option value="Bengkel">Bengkel</option>
                            <option value="Sentra Kuliner">Sentra Kuliner</option>
                            <option value="Kios">Kios</option>
                        </select>
                    </div>
                    <div class="col text-right">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- End Modal Edit Permohonan -->
</div>