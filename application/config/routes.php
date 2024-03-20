<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Route Auth

// Route Master
$route['master/data-users'] = 'master/DataUsers';
$route['master/tambah-user'] = 'master/TambahUser';
$route['master/edit-user'] = 'master/EditUser';
$route['master/delete-user'] = 'master/DeleteUser';

// Route Armada
$route['armada/pencatatan-ikan'] = 'armada/PencatatanIkan';
$route['armada/tambah-pencatatan'] = 'armada/TambahPencatatan';
$route['armada/delete-pencatatan'] = 'armada/DeletePencatatan';
$route['armada/data-ikan'] = 'armada/DataIkan';
$route['armada/tambah-ikan'] = 'armada/TambahIkan';
$route['armada/edit-ikan'] = 'armada/EditIkan';
$route['armada/delete-ikan'] = 'armada/DeleteIkan';
$route['armada/kirim-ikan'] = 'armada/KirimIkan';
$route['armada/tambah-kirim'] = 'armada/TambahKirim';
$route['armada/delete-kirim'] = 'armada/DeleteKirim';

// Gudang
$route['gudang/data-gudang'] = 'gudang/DataGudang';
$route['gudang/data-kirim'] = 'gudang/DataKirim';
$route['gudang/kirim-ikan'] = 'gudang/KirimIkan';
$route['gudang/delete-kirim'] = 'gudang/DeleteKirim';

// Waserda
$route['waserda/tambah-pembelian'] = 'waserda/TambahPembelian';

// Bengkel
$route['bengkel/tambah-service'] = 'bengkel/TambahService';

// KIOS
$route['kios/tambah-penjualan'] = 'kios/TambahPenjualan';
$route['kios/delete-penjualan'] = 'kios/DeletePenjualan';

// Rumah Pengolahan
$route['pengolahan/data-kiriman'] = 'pengolahan/DataKiriman';
$route['pengolahan/data-pengolahan'] = 'pengolahan/DataPengolahan';
$route['pengolahan/tambah-pengolahan'] = 'pengolahan/TambahPengolahan';
$route['pengolahan/delete-pengolahan'] = 'pengolahan/DeletePengolahan';
$route['pengolahan/data-kirim'] = 'pengolahan/DataKirim';
$route['pengolahan/tambah-kirim'] = 'pengolahan/TambahKirim';
$route['pengolahan/delete-kirim'] = 'pengolahan/DeleteKirim';

// Sentra Kuliner
$route['sentra/tambah-penjualan'] = 'sentra/TambahPenjualan';
$route['sentra/delete-penjualan'] = 'sentra/DeletePenjualan';