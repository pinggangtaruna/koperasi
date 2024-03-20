<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengolahan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        SecureLogin();
        SecurePengolahan();
        $this->load->model('Pengolahan_model');
    }

    public function index()
    {
        $data['content'] = 'pengolahan/dashboard';
        $data['stok'] = $this->Pengolahan_model->getJumlahDataStokIkan();
        $data['kiriman'] = $this->Pengolahan_model->getJumlahDataKirimanIkan();
        $data['mengirim'] = $this->Pengolahan_model->getJumlahDataKirimIkan();
        $data['stok_olahan'] = $this->Pengolahan_model->getJumlahDataOlahan();

        $this->load->view('layout/wrapper', $data);
    }

    function DataKiriman() {
        $data['content'] = 'pengolahan/data-kiriman';
        $data['kiriman'] = $this->Pengolahan_model->getAllDataKirimIkan();

        $this->load->view('layout/wrapper', $data);
    }

    function DataPengolahan() {
        $data['content'] = 'pengolahan/data-pengolahan';
        $data['olahan'] = $this->Pengolahan_model->getAllDataOlahan();

        $this->load->view('layout/wrapper', $data);
    }

    function TambahPengolahan()
    {
        $this->form_validation->set_rules('nama_ikan', 'Nama Ikan', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah Diolah', 'required|numeric');
        $this->form_validation->set_rules('jenis_olahan', 'Jenis Olahan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['content'] = 'pengolahan/tambah-pengolahan';
            $data['ikan'] = $this->Pengolahan_model->getAllDataIkan();

            $this->load->view('layout/wrapper', $data);
        } else {
            $id_ikan = $this->input->post('nama_ikan');
            $ikan = $this->Pengolahan_model->getDataIkanByID($id_ikan);

            $data = [
                'id_ikan' => $id_ikan,
                'nama_ikan' => $ikan['nama_ikan'],
                'jumlah' => $this->input->post('jumlah'),
                'jenis_olahan' => $this->input->post('jenis_olahan')
            ];

            cekStokIkanBeforeOlah($id_ikan, $this->input->post('jumlah'));

            $this->Pengolahan_model->addOlahanIkan($data);
            flashData('Data Olahan berhasil ditambahkan!', 'Berhasil', 'success');
            redirect('pengolahan/data-pengolahan', 'refresh');
        }
    }

    function DeletePengolahan() {
        $id_olah_ikan = $this->input->get('id');

        if (!$id_olah_ikan) {
            redirect('auth/blocked', 'refresh');
        } else {
            $this->Pengolahan_model->deleteOlahan($id_olah_ikan);

            flashData('Berhasil menghapus Data Olahan Ikan!', 'Delete Success', 'success');
            redirect('pengolahan/data-pengolahan', 'refresh');
        }
    }

    function DataKirim() {
        $data['content'] = 'pengolahan/data-kirim';
        $data['kirim'] = $this->Pengolahan_model->getAllDataKirim();

        $this->load->view('layout/wrapper', $data);
    }

    function TambahKirim() {
        $this->form_validation->set_rules('nama_ikan', 'Nama Ikan', 'required');
        $this->form_validation->set_rules('jumlah_kirim', 'Jumlah Kirim', 'required|numeric');
        $this->form_validation->set_rules('jenis_olahan', 'Jenis Olahan', 'required');
        $this->form_validation->set_rules('tujuan', 'Tujuan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['content'] = 'pengolahan/tambah-kirim';
            $data['ikan'] = $this->Pengolahan_model->getAllDataIkan();

            $this->load->view('layout/wrapper', $data);
        } else {
            $id_ikan = $this->input->post('nama_ikan');
            $ikan = $this->Pengolahan_model->getDataIkanByID($id_ikan);

            $data = [
                'id_ikan' => $id_ikan,
                'nama_ikan' => $ikan['nama_ikan'],
                'jumlah_kirim' => $this->input->post('jumlah_kirim'),
                'jenis_olahan' => $this->input->post('jenis_olahan'),
                'tujuan' => $this->input->post('tujuan')
            ];

            cekStokIkanOlahBeforeKirim($id_ikan, $this->input->post('jumlah_kirim'), $this->input->post('jenis_olahan'));

            $this->Pengolahan_model->addKirimIkan($data);
            flashData('Data Kirim Ikan berhasil ditambahkan!', 'Berhasil', 'success');
            redirect('pengolahan/data-kirim', 'refresh');
        }
    }

    function DeleteKirim() {
        $id_kirim_olahan = $this->input->get('id');

        if (!$id_kirim_olahan) {
            redirect('auth/blocked', 'refresh');
        } else {
            $this->Pengolahan_model->deleteKirim($id_kirim_olahan);

            flashData('Berhasil menghapus Data Kirim Ikan Olahan!', 'Delete Success', 'success');
            redirect('pengolahan/data-kirim', 'refresh');
        }
    }
}

/* End of file: Pengolahan.php */
