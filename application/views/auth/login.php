<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Log in (v2)</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/template/AdminLTE/'); ?>plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url('assets/template/AdminLTE/'); ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/template/AdminLTE/'); ?>dist/css/adminlte.min.css">
    <!-- Sweetalert2 -->
    <link rel="stylesheet" href="<?= base_url('assets/template/AdminLTE/plugins/sweetalert2/') ?>sweetalert2.min.css">
</head>

<body class="hold-transition login-page">
    <div class="flashData" id="<?= $this->session->userdata('icon') ?>" data-message="<?= $this->session->flashdata('message'); ?>" data-tittle="<?= $this->session->flashdata('tittle'); ?>" data-icon="<?= $this->session->flashdata('icon'); ?>"></div>
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="<?= base_url('auth'); ?>" class="h1"><b>Koperasi</b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form action="<?= base_url('auth'); ?>" method="post">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="telepon" name="telepon" class="form-control" placeholder="Nomor Telepon">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-phone-alt"></span>
                                </div>
                            </div>
                        </div>
                        <?php echo form_error('telepon', '<small class="error text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <?php echo form_error('password', '<small class="error text-danger">', '</small>'); ?>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?= base_url('assets/template/AdminLTE/'); ?>plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('assets/template/AdminLTE/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/template/AdminLTE/'); ?>dist/js/adminlte.min.js"></script>
    <!-- Sweetalert2 -->
    <script src="<?= base_url('assets/template/AdminLTE/plugins/sweetalert2/') ?>sweetalert2.all.min.js"></script>
    <!-- MyScript -->
    <script src="<?= base_url('assets/js/'); ?>MyScript.js"></script>
</body>

</html>