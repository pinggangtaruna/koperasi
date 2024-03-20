<?php
defined('BASEPATH') or exit('No direct script access allowed');

function flashData($message, $tittle, $icon)
{
    $CI = &get_instance();

    $CI->session->set_flashdata(
        'message',
        $message
    );
    $CI->session->set_flashdata(
        'tittle',
        $tittle
    );
    $CI->session->set_flashdata(
        'icon',
        $icon
    );
}

function cekStokIkanBeforeKirim($id_ikan, $jumlah_kirim, $asal_kirim)
{
    $CI = &get_instance();
    $data = $CI->db->get_where('tbl_ikan', ['id_ikan' => $id_ikan])->row_array();

    if ($asal_kirim == 'Gudang') {
        if ($data['stok_gudang'] < $jumlah_kirim) {
            flashData('Stok Ikan tidak memenuhi Jumlah Kirim!', 'Gagal', 'error');
            redirect('gudang/kirim-ikan', 'refresh');
        }
    } else {
        if ($data['stok'] < $jumlah_kirim) {
            flashData('Stok Ikan tidak memenuhi Jumlah Kirim!', 'Gagal', 'error');
            redirect('armada/tambah-kirim', 'refresh');
        }
    }
}

function cekStokIkanOlahBeforeKirim($id_ikan, $jumlah_kirim, $jenis_olahan)
{
    $CI = &get_instance();
    $data = $CI->db->get_where('tbl_stok_olahan', ['id_ikan' => $id_ikan, 'jenis_olahan' => $jenis_olahan])->row_array();

    if ($data != null) {
        if ($data['stok'] < $jumlah_kirim) {
            flashData('Stok Ikan Olahan tidak memenuhi Jumlah Kirim!', 'Gagal', 'error');
            redirect('pengolahan/tambah-kirim', 'refresh');
        }
    } else {
        flashData('Stok Ikan Olahan tidak tersedia!', 'Gagal', 'error');
        redirect('pengolahan/tambah-kirim', 'refresh');
    }
}

function cekStokIkanBeforeOlah($id_ikan, $jumlah)
{
    $CI = &get_instance();
    $data = $CI->db->get_where('tbl_ikan', ['id_ikan' => $id_ikan])->row_array();

    if ($data['stok_pengolahan'] < $jumlah) {
        flashData('Stok Ikan tidak memenuhi Jumlah Olahan!', 'Gagal', 'error');
        redirect('pengolahan/tambah-pengolahan', 'refresh');
    }
}

function pagination($jumlah_data)
{
    $CI = &get_instance();
    $CI->load->library('pagination');
    $config['base_url'] = base_url() . 'user/keuangan';

    // Jumlah data dari database
    $config['total_rows'] = $jumlah_data;
    $config['per_page'] = 10;
    $config['use_page_numbers'] = TRUE;
    $config['page_query_string'] = TRUE;
    $config['query_string_segment'] = 'page';

    $offset = html_escape((!$CI->input->get('page')) ? 0 : ($CI->input->get('page') * $config['per_page']) - $config['per_page']);
    // $config['num_links'] = ($config["total_rows"] / $config["per_page"]);

    $config['full_tag_open'] = '<ul class="pagination">';
    $config['full_tag_close'] = '</ul>';
    $config['attributes'] = ['class' => 'page-link'];
    $config['first_link'] = false;
    $config['last_link'] = false;
    $config['first_tag_open'] = '<li class="page-item">';
    $config['first_tag_close'] = '</li>';
    $config['prev_link'] = '&laquo';
    $config['prev_tag_open'] = '<li class="page-item">';
    $config['prev_tag_close'] = '</li>';
    $config['next_link'] = '&raquo';
    $config['next_tag_open'] = '<li class="page-item">';
    $config['next_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li class="page-item">';
    $config['last_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
    $config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
    $config['num_tag_open'] = '<li class="page-item">';
    $config['num_tag_close'] = '</li>';

    $CI->pagination->initialize($config);
}

function SecureLogin()
{
    $CI = &get_instance();
    
    if (!($CI->session->userdata('telepon'))) {
        redirect('auth', 'refresh');
    }
}

function hasbeenLoggedIn()
{
    $CI = &get_instance();
    if ($CI->session->userdata('telepon')) {
        redirect('auth/blocked/404', 'refresh');
    }
}

function SecureAdmin() {
    $CI = &get_instance();

    if (strtolower($CI->session->userdata('role')) == 'admin') {
        if (strtolower($CI->session->userdata('divisi')) != 'master') {
            redirect('auth/blocked/404', 'refresh');
        }
    } else {
        redirect('auth/blocked/404', 'refresh');
    }
}

function SecureUser() {
    $CI = &get_instance();

    if (strtolower($CI->session->userdata('role')) == 'user') {
        if (strtolower($CI->session->userdata('divisi')) != 'nelayan') {
            redirect('auth/blocked/404', 'refresh');
        }
    } else {
        redirect('auth/blocked/404', 'refresh');
    }
}

function SecureArmada() {
    $CI = &get_instance();

    if (strtolower($CI->session->userdata('role')) == 'petugas') {
        if (strtolower($CI->session->userdata('divisi')) != 'armada penangkapan ikan') {
            redirect('auth/blocked/404', 'refresh');
        }
    } else {
        redirect('auth/blocked/404', 'refresh');
    }
}

function SecureGudang() {
    $CI = &get_instance();

    if (strtolower($CI->session->userdata('role')) == 'petugas') {
        if (strtolower($CI->session->userdata('divisi')) != 'gudang') {
            redirect('auth/blocked/404', 'refresh');
        }
    } else {
        redirect('auth/blocked/404', 'refresh');
    }
}

function SecureWaserda() {
    $CI = &get_instance();

    if (strtolower($CI->session->userdata('role')) == 'petugas') {
        if (strtolower($CI->session->userdata('divisi')) != 'waserda') {
            redirect('auth/blocked/404', 'refresh');
        }
    } else {
        redirect('auth/blocked/404', 'refresh');
    }
}

function SecureBengkel() {
    $CI = &get_instance();

    if (strtolower($CI->session->userdata('role')) == 'petugas') {
        if (strtolower($CI->session->userdata('divisi')) != 'bengkel') {
            redirect('auth/blocked/404', 'refresh');
        }
    } else {
        redirect('auth/blocked/404', 'refresh');
    }
}

function SecurePengolahan() {
    $CI = &get_instance();

    if (strtolower($CI->session->userdata('role')) == 'petugas') {
        if (strtolower($CI->session->userdata('divisi')) != 'rumah pengolahan') {
            redirect('auth/blocked/404', 'refresh');
        }
    } else {
        redirect('auth/blocked/404', 'refresh');
    }
}

function SecureKios() {
    $CI = &get_instance();

    if (strtolower($CI->session->userdata('role')) == 'petugas') {
        if (strtolower($CI->session->userdata('divisi')) != 'kios') {
            redirect('auth/blocked/404', 'refresh');
        }
    } else {
        redirect('auth/blocked/404', 'refresh');
    }
}

function SecureSentra() {
    $CI = &get_instance();

    if (strtolower($CI->session->userdata('role')) == 'petugas') {
        if (strtolower($CI->session->userdata('divisi')) != 'sentra kuliner') {
            redirect('auth/blocked/404', 'refresh');
        }
    } else {
        redirect('auth/blocked/404', 'refresh');
    }
}

