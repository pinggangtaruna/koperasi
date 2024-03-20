<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Fixed Navbar Layout</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/template/AdminLTE/'); ?>plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url('assets/template/AdminLTE/'); ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/template/AdminLTE/'); ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/template/AdminLTE/'); ?>plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/template/AdminLTE/'); ?>dist/css/adminlte.min.css">
  <!-- Sweetalert2 -->
  <link rel="stylesheet" href="<?= base_url('assets/template/AdminLTE/plugins/sweetalert2/') ?>sweetalert2.min.css">
  <!-- Charts -->
  <link rel="stylesheet" href="<?= base_url('assets/template/AdminLTE/plugins/'); ?>chart.js/chart.min.css">
  <script src="<?= base_url('assets/template/AdminLTE/plugins/'); ?>chart.js/chart.min.js"></script>
  
  
  <!-- jQuery -->
  <script src="<?= base_url('assets/template/AdminLTE/'); ?>plugins/jquery/jquery.min.js"></script>
  <link rel="stylesheet" href="<?= base_url('assets/template/AdminLTE/'); ?>plugins/jquery-ui/jquery-ui.min.css">
  <script src="<?= base_url('assets/template/AdminLTE/'); ?>plugins/jquery-ui/jquery-ui.min.js"></script>
  
<!-- InputMask -->
<script src="<?= base_url('assets/template/AdminLTE/plugins/'); ?>moment/moment.min.js"></script>
<script src="<?= base_url('assets/template/AdminLTE/plugins/'); ?>inputmask/jquery.inputmask.min.js"></script>
<!-- daterange picker -->
<link rel="stylesheet" href="<?= base_url('assets/template/AdminLTE/plugins/'); ?>daterangepicker/daterangepicker.css">
<script src="<?= base_url('assets/template/AdminLTE/'); ?>plugins/daterangepicker/daterangepicker.js"></script>
</head>

<body class="hold-transition sidebar-mini layout-navbar-fixed">
  <div class="flashData" id="<?= $this->session->userdata('icon') ?>" data-message="<?= $this->session->flashdata('message'); ?>" data-tittle="<?= $this->session->flashdata('tittle'); ?>" data-icon="<?= $this->session->flashdata('icon'); ?>"></div>
  <!-- Site wrapper -->
  <div class="wrapper">