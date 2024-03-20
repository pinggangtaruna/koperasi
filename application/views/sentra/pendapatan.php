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
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Filter Tanggal</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <form action="<?= base_url('sentra/pendapatan'); ?>" method="post">
                                        <!-- Date range -->
                                        <div class="form-group">
                                            <label>Date range:</label>

                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-calendar-alt"></i>
                                                    </span>
                                                </div>
                                                <input type="text" name="filter" class="form-control float-right" id="reservation">
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.form group -->
                                        <div class="col text-right">
                                            <button type="submit" class="btn btn-success">Filter</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="total">Pendapatan</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    Rp.
                                                </div>
                                            </div>
                                            <input type="text" name="total" id="total" class="form-control" placeholder="Pendapatan" disabled value="<?= number_format($pendapatan['total_pendapatan'], '0', ',', '.'); ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <?php if (isset($from) && isset($to)) : ?>
                                <h3 class="card-title">Tabel Penjualan dari <?= date( 'd-m-Y', strtotime($from)); ?> sampai <?= date( 'd-m-Y', strtotime($to)); ?></h3>
                            <?php else : ?>
                                <h3 class="card-title">Tabel Penjualan No-Filter</h3>
                            <?php endif; ?>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Penjualan</th>
                                        <th class="text-center">Total</th>
                                        <th class="text-center">Tanggal Penjualan</th>
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
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>
    //Date range picker
    $('#reservation').daterangepicker();
    $('#daterange-btn').daterangepicker({
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            startDate: moment().subtract(29, 'days'),
            endDate: moment()
        },
        function(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
        }
    )
</script>