<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Catatan Keuangan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">User</a></li>
                        <li class="breadcrumb-item active">Catatan Keuangan</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <?php foreach ($catatan as $catatan) : ?>
                <?php if ($catatan['jenis'] == 'Masuk') : ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="info-box shadow-none">
                                <span class="info-box-icon bg-success"><i class="fas fa-arrow-up"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Uang <?= $catatan['jenis']; ?></span>
                                    <span class="info-box-number"><?= $catatan['deskripsi']; ?></span>
                                </div>
                                <div class="info-box-content align-items-end">
                                    <span class="info-box-text text-success">+ Rp. <?= number_format($catatan['jumlah'], 0, ',', '.'); ?></span>
                                    <span class="info-box-number"><?= date("d M Y H:i:s", strtotime($catatan['tgl_masuk']));; ?></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                    </div>
                <?php else : ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="info-box shadow-none">
                                <span class="info-box-icon bg-danger"><i class="fas fa-arrow-down"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Uang <?= $catatan['jenis']; ?></span>
                                    <span class="info-box-number"><?= $catatan['deskripsi']; ?></span>
                                </div>
                                <div class="info-box-content align-items-end">
                                    <span class="info-box-text text-danger">- Rp. <?= number_format($catatan['jumlah'], 0, ',', '.'); ?></span>
                                    <span class="info-box-number"><?= date("d M Y H:i:s", strtotime($catatan['tgl_masuk']));; ?></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                    </div>
                <?php endif; ?>
                <!-- Small boxes (Stat box) -->
            <?php endforeach; ?>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <?php
                    echo $this->pagination->create_links();
                    ?>
                </ul>
            </nav>
        </div>
    </section>
</div>