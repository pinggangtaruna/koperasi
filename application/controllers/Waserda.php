<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Waserda extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        SecureLogin();
        SecureWaserda();
        $this->load->model('Waserda_model');
    }

    public function index()
    {
        $data['content'] = 'waserda/dashboard';
        $id_user = $this->Waserda_model->getIDUser($this->session->userdata('telepon'))['id_user'];
        $data['saldo'] = $this->Waserda_model->getJumlahSaldo($id_user);
        $data['pendapatan'] = $this->Waserda_model->getPendapatan();
        $data['pendapatan_metode'] = $this->Waserda_model->getPendapatanByMetode();

        $this->load->view('layout/wrapper', $data);
    }

    function keuangan()
    {
        $data['content'] = 'waserda/catatan-keuangan';

        $id_user = $this->Waserda_model->getIDUser($this->session->userdata('telepon'))['id_user'];

        $jumlah_data = $this->Waserda_model->getJumlahCatatanKeuangan($id_user);
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'waserda/keuangan';

        // Jumlah data dari database
        $config['total_rows'] = $jumlah_data;
        $config['per_page'] = 10;
        $config['use_page_numbers'] = TRUE;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';

        $offset = html_escape((!$this->input->get('page')) ? 0 : ($this->input->get('page') * $config['per_page']) - $config['per_page']);
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

        $this->pagination->initialize($config);

        $data['catatan'] = $this->Waserda_model->getCatatanKeuangan($id_user, $config['per_page'], $offset);

        $this->load->view('layout/wrapper', $data);
    }

    function pembelian()
    {
        $data['content'] = 'waserda/pembelian';
        $data['pembelian'] = $this->Waserda_model->getDataPembelian();

        $this->load->view('layout/wrapper', $data);
    }

    function TambahPembelian()
    {
        $this->form_validation->set_rules('nama', 'Nama Pembeli', 'required');
        $this->form_validation->set_rules('metode', 'Metode', 'required');
        $this->form_validation->set_rules('total', 'Total Pembelian', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data['content'] = 'waserda/tambah-pembelian';

            $this->load->view('layout/wrapper', $data);
        } else {
            $telepon = $this->input->post('telepon');
            $pembeli = $this->Waserda_model->getDataUserByTelepon($telepon);

            if ($this->input->post('metode') == 'Digital') {
                if (password_verify($this->input->post('password'), $pembeli['password']) == TRUE) {
                    $curlSaldoPembeli = $this->Waserda_model->getTabunganUser($pembeli['id_user']);
                    $penjual = $this->Waserda_model->getDataUserByTelepon($this->session->userdata('telepon'));
                    $curlSaldoPenjual = $this->Waserda_model->getTabunganUser($penjual['id_user']);
                    date_default_timezone_set('Asia/Jakarta');
    
                    if ($curlSaldoPembeli['saldo'] - $this->input->post('total') < 0) {
                        flashData('Saldo Pembeli kurang!', 'Gagal!', 'error');
                        redirect('waserda/tambah-pembelian', 'refresh');
                    }
    
                    $data = [
                        'id_user' => $pembeli['id_user'],
                        'nama' => $this->input->post('nama'),
                        'tgl' => date('Y-m-d H:i:s'),
                        'metode' => $this->input->post('metode'),
                        'total' => $this->input->post('total')
                    ];
    
                    $this->Waserda_model->addPembelian($data);
    
                    $dataPembeli = [
                        'id_user' => $pembeli['id_user'],
                        'jumlah' => $this->input->post('total'),
                        'deskripsi' => 'Pembelian di Waserda',
                        'tgl_keluar' => date('Y-m-d H:i:s'),
                        'saldo_akhir' => $curlSaldoPembeli['saldo'] - $this->input->post('total'),
                        'jenis' => 'Keluar'
                    ];
    
                    $dataPenjual = [
                        'id_user' => $penjual['id_user'],
                        'jumlah' => $this->input->post('total'),
                        'deskripsi' => 'Penjualan di Waserda',
                        'tgl_masuk' => date('Y-m-d H:i:s'),
                        'saldo_akhir' => $curlSaldoPenjual['saldo'] + $this->input->post('total'),
                        'jenis' => 'Masuk'
                    ];
    
                    $this->Waserda_model->addPengeluaran($dataPembeli);
                    $this->Waserda_model->addPemasukan($dataPenjual);
    
                    flashData('Pembelian berhasil ditambahkan!', 'Berhasil', 'success');
                    redirect('waserda/pembelian', 'refresh');
                } else {
                    flashData('Password salah!', 'Gagal', 'error');
                    redirect('waserda/tambah-pembelian', 'refresh');
                }
            } else {
                $data = [
                    'id_user' => $pembeli['id_user'],
                    'nama' => $this->input->post('nama'),
                    'tgl' => date('Y-m-d H:i:s'),
                    'metode' => $this->input->post('metode'),
                    'total' => $this->input->post('total')
                ];

                $this->Waserda_model->addPembelian($data);

                flashData('Pembelian berhasil ditambahkan!', 'Berhasil', 'success');
                redirect('waserda/pembelian', 'refresh');
            }
        }
    }

    function Secure() {
        // Menangkap data ajax. cek script view data-user dan myscript.js
        if ($this->input->post('telepon') && $this->input->post('password')) {
            $telepon = $this->input->post('telepon');
            $password = $this->input->post('password');

            $user = $this->db->get_where('tbl_users', array('telepon' => $telepon))->row_array();

            $data = password_verify($password, $user['password']);
            echo json_encode($data);
        } else {
            redirect('auth/blocked');
        }
    }
}

/* End of file: Waserda.php */
