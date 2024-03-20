<html lang="en" style="height: auto;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | 404 Page not found</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/template/AdminLTE/') ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/template/AdminLTE/') ?>dist/css/adminlte.min.css">
</head>

<body class="sidebar-mini sidebar-closed sidebar-collapse" style="height: auto;">
    <div class="wrapper">
        <!-- Main content -->
        <section class="content pt-5 px-3">
            <div class="error-page">
                <h2 class="headline text-warning"> 404</h2>

                <div class="error-content">
                    <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Page not found.</h3>

                    <p>
                        We could not find the page you were looking for.
                        Meanwhile, you may <a href="<?= base_url('assets/template/') ?>index.html">return to dashboard</a> or try using the search form.
                    </p>

                    <form class="search-form">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" name="submit" class="btn btn-warning"><i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.input-group -->
                    </form>
                </div>
                <!-- /.error-content -->
            </div>
            <!-- /.error-page -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 3.2.0
        </div>
        <strong>Copyright © 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark" style="display: none;">
        <!-- Control sidebar content goes here -->
        <div class="p-3 control-sidebar-content" style="">
            <h5>Customize AdminLTE</h5>
            <hr class="mb-2">
            <div class="mb-4"><input type="checkbox" value="1" class="mr-1"><span>Dark Mode</span></div>
            <h6>Header Options</h6>
            <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Fixed</span></div>
            <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Dropdown Legacy Offset</span></div>
            <div class="mb-4"><input type="checkbox" value="1" class="mr-1"><span>No border</span></div>
            <h6>Sidebar Options</h6>
            <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Collapsed</span></div>
            <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Fixed</span></div>
            <div class="mb-1"><input type="checkbox" value="1" checked="checked" class="mr-1"><span>Sidebar Mini</span></div>
            <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Sidebar Mini MD</span></div>
            <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Sidebar Mini XS</span></div>
            <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Nav Flat Style</span></div>
            <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Nav Legacy Style</span></div>
            <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Nav Compact</span></div>
            <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Nav Child Indent</span></div>
            <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Nav Child Hide on Collapse</span></div>
            <div class="mb-4"><input type="checkbox" value="1" class="mr-1"><span>Disable Hover/Focus Auto-Expand</span></div>
            <h6>Footer Options</h6>
            <div class="mb-4"><input type="checkbox" value="1" class="mr-1"><span>Fixed</span></div>
            <h6>Small Text Options</h6>
            <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Body</span></div>
            <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Navbar</span></div>
            <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Brand</span></div>
            <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Sidebar Nav</span></div>
            <div class="mb-4"><input type="checkbox" value="1" class="mr-1"><span>Footer</span></div>
            <h6>Navbar Variants</h6>
            <div class="d-flex"><select class="custom-select mb-3 text-light border-0 bg-white">
                    <option class="bg-primary">Primary</option>
                    <option class="bg-secondary">Secondary</option>
                    <option class="bg-info">Info</option>
                    <option class="bg-success">Success</option>
                    <option class="bg-danger">Danger</option>
                    <option class="bg-indigo">Indigo</option>
                    <option class="bg-purple">Purple</option>
                    <option class="bg-pink">Pink</option>
                    <option class="bg-navy">Navy</option>
                    <option class="bg-lightblue">Lightblue</option>
                    <option class="bg-teal">Teal</option>
                    <option class="bg-cyan">Cyan</option>
                    <option class="bg-dark">Dark</option>
                    <option class="bg-gray-dark">Gray dark</option>
                    <option class="bg-gray">Gray</option>
                    <option class="bg-light">Light</option>
                    <option class="bg-warning">Warning</option>
                    <option class="bg-white">White</option>
                    <option class="bg-orange">Orange</option>
                </select></div>
            <h6>Accent Color Variants</h6>
            <div class="d-flex"></div><select class="custom-select mb-3 border-0">
                <option>None Selected</option>
                <option class="bg-primary">Primary</option>
                <option class="bg-warning">Warning</option>
                <option class="bg-info">Info</option>
                <option class="bg-danger">Danger</option>
                <option class="bg-success">Success</option>
                <option class="bg-indigo">Indigo</option>
                <option class="bg-lightblue">Lightblue</option>
                <option class="bg-navy">Navy</option>
                <option class="bg-purple">Purple</option>
                <option class="bg-fuchsia">Fuchsia</option>
                <option class="bg-pink">Pink</option>
                <option class="bg-maroon">Maroon</option>
                <option class="bg-orange">Orange</option>
                <option class="bg-lime">Lime</option>
                <option class="bg-teal">Teal</option>
                <option class="bg-olive">Olive</option>
            </select>
            <h6>Dark Sidebar Variants</h6>
            <div class="d-flex"></div><select class="custom-select mb-3 text-light border-0 bg-primary">
                <option>None Selected</option>
                <option class="bg-primary">Primary</option>
                <option class="bg-warning">Warning</option>
                <option class="bg-info">Info</option>
                <option class="bg-danger">Danger</option>
                <option class="bg-success">Success</option>
                <option class="bg-indigo">Indigo</option>
                <option class="bg-lightblue">Lightblue</option>
                <option class="bg-navy">Navy</option>
                <option class="bg-purple">Purple</option>
                <option class="bg-fuchsia">Fuchsia</option>
                <option class="bg-pink">Pink</option>
                <option class="bg-maroon">Maroon</option>
                <option class="bg-orange">Orange</option>
                <option class="bg-lime">Lime</option>
                <option class="bg-teal">Teal</option>
                <option class="bg-olive">Olive</option>
            </select>
            <h6>Light Sidebar Variants</h6>
            <div class="d-flex"></div><select class="custom-select mb-3 border-0">
                <option>None Selected</option>
                <option class="bg-primary">Primary</option>
                <option class="bg-warning">Warning</option>
                <option class="bg-info">Info</option>
                <option class="bg-danger">Danger</option>
                <option class="bg-success">Success</option>
                <option class="bg-indigo">Indigo</option>
                <option class="bg-lightblue">Lightblue</option>
                <option class="bg-navy">Navy</option>
                <option class="bg-purple">Purple</option>
                <option class="bg-fuchsia">Fuchsia</option>
                <option class="bg-pink">Pink</option>
                <option class="bg-maroon">Maroon</option>
                <option class="bg-orange">Orange</option>
                <option class="bg-lime">Lime</option>
                <option class="bg-teal">Teal</option>
                <option class="bg-olive">Olive</option>
            </select>
            <h6>Brand Logo Variants</h6>
            <div class="d-flex"></div><select class="custom-select mb-3 border-0">
                <option>None Selected</option>
                <option class="bg-primary">Primary</option>
                <option class="bg-secondary">Secondary</option>
                <option class="bg-info">Info</option>
                <option class="bg-success">Success</option>
                <option class="bg-danger">Danger</option>
                <option class="bg-indigo">Indigo</option>
                <option class="bg-purple">Purple</option>
                <option class="bg-pink">Pink</option>
                <option class="bg-navy">Navy</option>
                <option class="bg-lightblue">Lightblue</option>
                <option class="bg-teal">Teal</option>
                <option class="bg-cyan">Cyan</option>
                <option class="bg-dark">Dark</option>
                <option class="bg-gray-dark">Gray dark</option>
                <option class="bg-gray">Gray</option>
                <option class="bg-light">Light</option>
                <option class="bg-warning">Warning</option>
                <option class="bg-white">White</option>
                <option class="bg-orange">Orange</option><a href="#">clear</a>
            </select>
        </div>
    </aside>
    <!-- /.control-sidebar -->
    <div id="sidebar-overlay"></div>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?= base_url('assets/template/AdminLTE/') ?>plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('assets/template/AdminLTE/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/template/AdminLTE/') ?>dist/js/adminlte.min.js"></script>
</body>

</html>