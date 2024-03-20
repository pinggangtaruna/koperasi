<div class="content-wrapper" style="min-height: 2646.34px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah User</h1>
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
                        <h3 class="card-title">Form tambah User</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('master/tambah-user'); ?>" method="post">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan Nama">
                                <?php echo form_error('nama', '<small class="error text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input type="text" name="nik" id="nik" class="form-control" placeholder="Masukan NIK">
                                <?php echo form_error('nik', '<small class="error text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select id="jenis_kelamin" name="jenis_kelamin" class="form-control custom-select">
                                    <option selected="" disabled="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                                <?php echo form_error('jenis_kelamin', '<small class="error text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea id="alamat" name="alamat" class="form-control" rows="4"></textarea>
                                <?php echo form_error('alamat', '<small class="error text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Telepon</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>
                                    <input type="text" name="telepon" class="form-control">
                                </div>
                                <?php echo form_error('telepon', '<small class="error text-danger">', '</small>'); ?>
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
                                <?php echo form_error('password', '<small class="error text-danger">', '</small>'); ?>
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
                                <?php echo form_error('confirm_password', '<small class="error text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="role">Role</label>
                                <select id="role" name="role" class="form-control custom-select">
                                    <option selected="" disabled="">Pilih Role</option>
                                    <option value="User">User</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Petugas">Petugas</option>
                                </select>
                                <?php echo form_error('role', '<small class="error text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group" id="selectdivisi" style="display: none;">
                                <label for="divisi">Divisi</label>
                                <select id="divisi" name="divisi" class="form-control custom-select">
                                    <option selected="" disabled="">Pilih Divisi</option>
                                    <option value="Armada Penangkapan Ikan">Armada Penangkapan Ikan</option>
                                    <option value="Rumah Pengolahan">Rumah Pengolahan</option>
                                    <option value="Gudang">Gudang</option>
                                    <option value="Waserda">Waserda</option>
                                    <option value="Bengkel">Bengkel</option>
                                    <option value="Sentra Kuliner">Sentra Kuliner</option>
                                    <option value="Kios">Kios</option>
                                </select>
                                <?php echo form_error('divisi', '<small class="error text-danger">', '</small>'); ?>
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