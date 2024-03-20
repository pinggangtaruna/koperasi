<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/template/AdminLTE/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Sweetalert2 -->
<script src="<?= base_url('assets/template/AdminLTE/plugins/sweetalert2/') ?>sweetalert2.all.min.js"></script>
<!-- MyScript -->
<script src="<?= base_url('assets/js/'); ?>MyScript.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?= base_url('assets/template/AdminLTE/'); ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/template/AdminLTE/'); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/template/AdminLTE/'); ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets/template/AdminLTE/'); ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/template/AdminLTE/'); ?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('assets/template/AdminLTE/'); ?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/template/AdminLTE/'); ?>plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url('assets/template/AdminLTE/'); ?>plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url('assets/template/AdminLTE/'); ?>plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url('assets/template/AdminLTE/'); ?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url('assets/template/AdminLTE/'); ?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url('assets/template/AdminLTE/'); ?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/template/AdminLTE/'); ?>dist/js/adminlte.min.js"></script>


<script src="<?= base_url('assets/template/AdminLTE/plugins/'); ?>chart.js/chart.min.js"></script>

<script>
    var base_url = "<?= base_url() ?>";
</script>


<!-- Page specific script -->
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
</body>

</html>