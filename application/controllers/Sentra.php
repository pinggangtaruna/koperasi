<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sentra extends CI_Controller {

    public function __construct() {
        parent::__construct();
        SecureLogin();
        SecureSentra();
        $this->load->model('Sentra_model');
    }

    public function index()
    {
        $data['content'] = 'sentra/dashboard';
        $id_user = $this->Sentra_model->getIDUser($this->session->userdata('telepon'))['id_user'];
        $data['jumlah_penjualan'] = $this->Sentra_model->getJumlahPenjualan($id_user);
        $data['profit_tahun'] = $this->Sentra_model->getProfitTahun(date('Y'), $id_user);
        $data['profit_bulan'] = $this->Sentra_model->getProfitBulan(date('m'), $id_user);
        $data['profit_bulanan'] = [];
        for ($i = 1; $i <= 12; $i++) {
            $fetch = $this->Sentra_model->getProfitBulanan($i);
            if ($fetch == NULL) {
                $fetch[0]['profit'] = 0;
            }
            array_push($data['profit_bulanan'], $fetch);
        }

        $this->load->view('layout/wrapper', $data);
    }

    function penjualan()
    {
        $data['content'] = 'sentra/penjualan';
        $id_user = $this->Sentra_model->getIDUser($this->session->userdata('telepon'))['id_user'];
        $data['penjualan'] = $this->Sentra_model->getDataPenjualan($id_user);

        $this->load->view('layout/wrapper', $data);
    }

    function TambahPenjualan()
    {
        $this->form_validation->set_rules('total', 'Total Pembelian', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $data['content'] = 'sentra/tambah-penjualan';

            $this->load->view('layout/wrapper', $data);
        } else {
            $id_user = $this->Sentra_model->getIDUser($this->session->userdata('telepon'))['id_user'];

            $data = [
                'id_sentra' => $id_user,
                'total' => $this->input->post('total')
            ];

            $this->Sentra_model->addPenjualan($data);
            flashData('Berhasil menambahkan Penjualan!', 'Berhasil', 'success');
            redirect('sentra/penjualan', 'refresh');
        }
    }

    function DeletePenjualan() {
        $id_penjualan = $this->input->get('id');

        if (!$id_penjualan) {
            redirect('auth/blocked', 'refresh');
        } else {
            $this->Sentra_model->deletePenjualan($id_penjualan);

            flashData('Berhasil menghapus Data Kirim Ikan!', 'Delete Success', 'success');
            redirect('sentra/penjualan', 'refresh');
        }
    }

    function Pendapatan()
    {
        if ($this->input->post('filter') == null) {
            $data['content'] = 'sentra/pendapatan';
            $id_user = $this->Sentra_model->getIDUser($this->session->userdata('telepon'))['id_user'];
            $data['penjualan'] = $this->Sentra_model->getDataPenjualan($id_user);
            $data['pendapatan'] = $this->Sentra_model->getPendapatan($id_user);
            $this->load->view('layout/wrapper', $data);
        } else {
            $filter = explode(" - ", $this->input->post('filter'));
            $from = date( 'Y-m-d', strtotime($filter[0]));
            $to = date( 'Y-m-d', strtotime($filter[1]));

            $data['content'] = 'sentra/pendapatan';
            $id_user = $this->Sentra_model->getIDUser($this->session->userdata('telepon'))['id_user'];
            $data['penjualan'] = $this->Sentra_model->getDataPenjualanFiltered($id_user, $from, $to);
            $data['from'] = $from;
            $data['to'] = $to;
            $data['pendapatan'] = $this->Sentra_model->getPendapatanFiltered($id_user, $from, $to);
            
            $this->load->view('layout/wrapper', $data);
        }
    }
}

/* End of file: Sentra.php */
