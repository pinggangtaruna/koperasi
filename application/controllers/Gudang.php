<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gudang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        SecureLogin();
        SecureGudang();
        $this->load->model('Gudang_model');
    }

    public function index()
    {
        $data['content'] = 'gudang/dashboard';
        $data['stok'] = $this->Gudang_model->getJumlahDataStokIkan();
        $data['kiriman'] = $this->Gudang_model->getJumlahDataKirimanIkan();
        $data['mengirim'] = $this->Gudang_model->getJumlahDataKirimIkan();

        $this->load->view('layout/wrapper', $data);
    }

    function DataGudang()
    {
        $data['content'] = 'gudang/data-gudang';
        $data['gudang'] = $this->Gudang_model->getAllDataKirimIkan();

        $this->load->view('layout/wrapper', $data);
    }

    function DataKirim()
    {
        $data['content'] = 'gudang/data-kirim';
        $data['gudang'] = $this->Gudang_model->getAllDataKirim();

        $this->load->view('layout/wrapper', $data);
    }

    function KirimIkan()
    {
        $this->form_validation->set_rules('nama_ikan', 'Nama Ikan', 'required');
        $this->form_validation->set_rules('jumlah_kirim', 'Jumlah Kirim', 'required|numeric');
        $this->form_validation->set_rules('tujuan', 'Tujuan Kirim', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['content'] = 'gudang/kirim-ikan';
            $data['ikan'] = $this->Gudang_model->getAllDataIkan();

            $this->load->view('layout/wrapper', $data);
        } else {
            $id_ikan = $this->input->post('nama_ikan');
            date_default_timezone_set('Asia/Jakarta');
            $ikan = $this->Gudang_model->getDataIkanByID($id_ikan);

            $data = [
                'id_ikan' => $id_ikan,
                'nama_ikan' => $ikan['nama_ikan'],
                'jumlah_kirim' => $this->input->post('jumlah_kirim'),
                'asal_kirim' => 'Gudang',
                'tujuan' => $this->input->post('tujuan'),
                'tgl_kirim' => date('Y-m-d H:i:s')
            ];

            cekStokIkanBeforeKirim($id_ikan, $this->input->post('jumlah_kirim'), 'Gudang');

            $this->Gudang_model->addKirimIkan($data);
            flashData('Data Kirim Ikan berhasil ditambahkan!', 'Berhasil', 'success');
            redirect('gudang/data-kirim', 'refresh');
        }
    }

    function DeleteKirim()
    {
        $id_kirim_ikan = $this->input->get('id');

        if (!$id_kirim_ikan) {
            redirect('auth/blocked', 'refresh');
        } else {
            $this->Gudang_model->deleteKirimIkan($id_kirim_ikan);

            flashData('Berhasil menghapus Data Kirim Ikan!', 'Delete Success', 'success');
            redirect('gudang/data-kirim', 'refresh');
        }
    }
}

/* End of file: Gudang.php */
