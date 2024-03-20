<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kios extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        SecureLogin();
        SecureKios();
        $this->load->model('Kios_model');
    }

    public function index()
    {
        $data['content'] = 'kios/dashboard';
        $id_user = $this->Kios_model->getIDUser($this->session->userdata('telepon'))['id_user'];
        $data['jumlah_penjualan'] = $this->Kios_model->getJumlahPenjualan($id_user);
        $data['profit_tahun'] = $this->Kios_model->getProfitTahun(date('Y'), $id_user);
        $data['profit_bulan'] = $this->Kios_model->getProfitBulan(date('m'), $id_user);
        $data['profit_bulanan'] = [];
        for ($i = 1; $i <= 12; $i++) {
            $fetch = $this->Kios_model->getProfitBulanan($i);
            if ($fetch == NULL) {
                $fetch[0]['profit'] = 0;
            }
            array_push($data['profit_bulanan'], $fetch);
        }
        
        $this->load->view('layout/wrapper', $data);
    }

    function penjualan()
    {
        $data['content'] = 'kios/penjualan';
        $id_user = $this->Kios_model->getIDUser($this->session->userdata('telepon'))['id_user'];
        $data['penjualan'] = $this->Kios_model->getDataPenjualan($id_user);

        $this->load->view('layout/wrapper', $data);
    }

    function TambahPenjualan()
    {
        $this->form_validation->set_rules('total', 'Total Pembelian', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $data['content'] = 'kios/tambah-penjualan';

            $this->load->view('layout/wrapper', $data);
        } else {
            $id_user = $this->Kios_model->getIDUser($this->session->userdata('telepon'))['id_user'];

            $data = [
                'id_kios' => $id_user,
                'total' => $this->input->post('total')
            ];

            $this->Kios_model->addPenjualan($data);
            flashData('Berhasil menambahkan Penjualan!', 'Berhasil', 'success');
            redirect('kios/penjualan', 'refresh');
        }
    }

    function DeletePenjualan() {
        $id_penjualan = $this->input->get('id');

        if (!$id_penjualan) {
            redirect('auth/blocked', 'refresh');
        } else {
            $this->Kios_model->deletePenjualan($id_penjualan);

            flashData('Berhasil menghapus Data Kirim Ikan!', 'Delete Success', 'success');
            redirect('kios/penjualan', 'refresh');
        }
    }

    function Pendapatan()
    {
        if ($this->input->post('filter') == null) {
            $data['content'] = 'kios/pendapatan';
            $id_user = $this->Kios_model->getIDUser($this->session->userdata('telepon'))['id_user'];
            $data['penjualan'] = $this->Kios_model->getDataPenjualan($id_user);
            $data['pendapatan'] = $this->Kios_model->getPendapatan($id_user);
            $this->load->view('layout/wrapper', $data);
        } else {
            $filter = explode(" - ", $this->input->post('filter'));
            $from = date( 'Y-m-d', strtotime($filter[0]));
            $to = date( 'Y-m-d', strtotime($filter[1]));

            $data['content'] = 'kios/pendapatan';
            $id_user = $this->Kios_model->getIDUser($this->session->userdata('telepon'))['id_user'];
            $data['penjualan'] = $this->Kios_model->getDataPenjualanFiltered($id_user, $from, $to);
            $data['from'] = $from;
            $data['to'] = $to;
            $data['pendapatan'] = $this->Kios_model->getPendapatanFiltered($id_user, $from, $to);

            $this->load->view('layout/wrapper', $data);
        }
    }
}

/* End of file: Kios.php */
