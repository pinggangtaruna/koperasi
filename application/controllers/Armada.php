<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Armada extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        SecureLogin();
        SecureArmada();
        $this->load->model('Armada_model');
    }

    public function index()
    {
        $data['content'] = 'armada/dashboard';
        $data['stok'] = $this->Armada_model->getJumlahDataStokIkan();
        $data['pencatatan'] = $this->Armada_model->getJumlahDataPencatatan();
        $data['mengirim'] = $this->Armada_model->getJumlahDataKirimIkan();

        $this->load->view('layout/wrapper', $data);
    }

    // ============================ MENU PENCATATAN IKAN ==================================
    function PencatatanIkan()
    {
        $data['content'] = 'armada/data-pencatatan';
        $data['pencatatan'] = $this->Armada_model->getAllDataPencatatanIkan();
        $data['ikan'] = $this->Armada_model->getAllDataIkan();

        $this->load->view('layout/wrapper', $data);
    }

    function TambahPencatatan()
    {
        $this->form_validation->set_rules('nama_nelayan', 'Nama Nelayan', 'required');
        $this->form_validation->set_rules('nama_ikan', 'Nama Ikan', 'required');
        $this->form_validation->set_rules('harga_perkilo', 'Harga Perkilo', 'required');
        $this->form_validation->set_rules('jumlah_ikan', 'Jumlah Ikan', 'required');
        $this->form_validation->set_rules('total', 'Total', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data['content'] = 'armada/pencatatan-ikan';
            $data['ikan'] = $this->Armada_model->getAllDataIkan();

            $this->load->view('layout/wrapper', $data);
        } else {
            $id_ikan = $this->input->post('nama_ikan');
            $harga_perkilo = str_replace('.', "", preg_replace('/[^0-9-.]+/ ', '', str_replace(",00", "", $this->input->post('harga_perkilo'))));
            $total = str_replace('.', "", preg_replace('/[^0-9-.]+/ ', '', str_replace(",00", "", $this->input->post('total'))));

            $telepon = $this->input->post('telepon');
            $user = $this->Armada_model->getDataUserByTelepon($telepon);
            $curlSaldo = $this->Armada_model->getTabunganUser($user['id_user']);

            $ikan = $this->Armada_model->getDataIkanByID($id_ikan);
            date_default_timezone_set('Asia/Jakarta');
            $data = [
                'nama_nelayan' => $this->input->post('nama_nelayan'),
                'id_ikan' => $this->input->post('nama_ikan'),
                'nama_ikan' => $ikan['nama_ikan'],
                'harga_perkilo' => $harga_perkilo,
                'jumlah_ikan' => $this->input->post('jumlah_ikan'),
                'total' => $total,
                'tgl_masuk' => date('Y-m-d H:i:s'),
            ];

            $data2 = [
                'id_user' => $user['id_user'],
                'jumlah' => $total,
                'deskripsi' => 'Jual ' . $ikan['nama_ikan'] . ' (' . $this->input->post('jumlah_ikan') . 'Kg)',
                'tgl_masuk' => date('Y-m-d H:i:s'),
                'saldo_akhir' => $curlSaldo['saldo'] + $total,
                'jenis' => 'Masuk'
            ];

            $this->Armada_model->addPencatatan($data);
            $this->Armada_model->addPemasukan($data2);
            flashData('Data Pencatatan berhasil ditambahkan!', 'Berhasil', 'success');
            redirect('armada/pencatatan-ikan', 'refresh');
        }
    }

    function DeletePencatatan()
    {
        $id_pencatatan_ikan = $this->input->get('id');

        if (!$id_pencatatan_ikan) {
            redirect('auth/blocked', 'refresh');
        } else {
            $this->Armada_model->deletePencatatan($id_pencatatan_ikan);

            flashData('Berhasil menghapus Data Ikan!', 'Delete Success', 'success');
            redirect('armada/pencatatan-ikan', 'refresh');
        }
    }

    // ============================ MENU DATA IKAN ==================================
    function DataIkan()
    {
        $data['content'] = 'armada/data-ikan';
        $data['ikan'] = $this->Armada_model->getAllDataIkan();

        $this->load->view('layout/wrapper', $data);
    }

    function TambahIkan()
    {
        $this->form_validation->set_rules('nama_ikan', 'Nama Ikan', 'required|is_unique[tbl_ikan.nama_ikan]');
        $this->form_validation->set_rules('harga_perkilo', 'Harga Perkilo', 'required|numeric');

        if ($this->form_validation->run() == false) {
            $data['content'] = 'armada/tambah-ikan';

            $this->load->view('layout/wrapper', $data);
        } else {
            $data = [
                'nama_ikan' => $this->input->post('nama_ikan'),
                'harga_perkilo' => $this->input->post('harga_perkilo')
            ];

            $this->Armada_model->addIkan($data);
            flashData('Data Ikan berhasil ditambahkan!', 'Berhasil', 'success');
            redirect('armada/data-ikan', 'refresh');
        }
    }

    function EditIkan()
    {
        $id_ikan = $this->input->get('id');
        if (!$id_ikan) {
            redirect('auth/blocked', 'refresh');
        }

        $this->form_validation->set_rules('nama_ikan', 'Nama Ikan', 'required|is_unique[tbl_ikan.nama_ikan]');
        $this->form_validation->set_rules('harga_perkilo', 'Harga Perkilo', 'required|numeric');

        if ($this->form_validation->run() == false) {
            flashData('Gagal edit Data Ikan!', 'Gagal Edit', 'error');
            redirect('armada/data-ikan', 'refresh');
        } else {
            $data = [
                'nama_ikan' => $this->input->post('nama_ikan'),
                'harga_perkilo' => $this->input->post('harga_perkilo')
            ];

            $this->Armada_model->editIkan($id_ikan, $data);
            flashData('Data Ikan berhasil diubah!', 'Berhasil', 'success');
            redirect('armada/data-ikan', 'refresh');
        }
    }

    function DeleteIkan()
    {
        $id_ikan = $this->input->get('id');

        if (!$id_ikan) {
            redirect('auth/blocked', 'refresh');
        } else {
            $this->Armada_model->deleteIkan($id_ikan);

            flashData('Berhasil menghapus Data Ikan!', 'Delete Success', 'success');
            redirect('armada/data-ikan', 'refresh');
        }
    }

    function KirimIkan()
    {
        $data['content'] = 'armada/data-kirim-ikan';
        $data['kirim'] = $this->Armada_model->getAllDataKirimIkan();
        $data['ikan'] = $this->Armada_model->getAllDataIkan();

        $this->load->view('layout/wrapper', $data);
    }

    function TambahKirim()
    {
        $this->form_validation->set_rules('nama_ikan', 'Nama Ikan', 'required');
        $this->form_validation->set_rules('jumlah_kirim', 'Jumlah Kirim', 'required|numeric');
        $this->form_validation->set_rules('tujuan', 'Tujuan Kirim', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['content'] = 'armada/tambah-kirim-ikan';
            $data['ikan'] = $this->Armada_model->getAllDataIkan();

            $this->load->view('layout/wrapper', $data);
        } else {
            $id_ikan = $this->input->post('nama_ikan');
            date_default_timezone_set('Asia/Jakarta');
            $ikan = $this->Armada_model->getDataIkanByID($id_ikan);

            $data = [
                'id_ikan' => $id_ikan,
                'nama_ikan' => $ikan['nama_ikan'],
                'jumlah_kirim' => $this->input->post('jumlah_kirim'),
                'asal_kirim' => 'Armada',
                'tujuan' => $this->input->post('tujuan'),
                'tgl_kirim' => date('Y-m-d H:i:s')
            ];

            cekStokIkanBeforeKirim($id_ikan, $this->input->post('jumlah_kirim'), 'Armada');

            $this->Armada_model->addKirimIkan($data);
            flashData('Data Kirim Ikan berhasil ditambahkan!', 'Berhasil', 'success');
            redirect('armada/kirim-ikan', 'refresh');
        }
    }

    function DeleteKirim()
    {
        $id_kirim_ikan = $this->input->get('id');

        if (!$id_kirim_ikan) {
            redirect('auth/blocked', 'refresh');
        } else {
            $this->Armada_model->deleteKirimIkan($id_kirim_ikan);

            flashData('Berhasil menghapus Data Kirim Ikan!', 'Delete Success', 'success');
            redirect('armada/kirim-ikan', 'refresh');
        }
    }

    // ================= AJAX =================
    function getDataModalEditIkan()
    {
        // Menangkap data ajax. cek script view data-user dan myscript.js
        if ($this->input->post('id_ikan')) {
            $this->db->select('nama_ikan, harga_perkilo');
            $this->db->from('tbl_ikan');
            $this->db->where('id_ikan', $this->input->post('id_ikan'));
            $data = $this->db->get()->row();
            echo json_encode($data);
        } else {
            redirect('auth/blocked');
        }
    }

    function getDataModalEditPencatatan()
    {
        // Menangkap data ajax. cek script view data-user dan myscript.js
        if ($this->input->post('id_pencatatan')) {
            $this->db->select('nama_nelayan, id_ikan, nama_ikan, harga_perkilo, jumlah_ikan, total');
            $this->db->from('tbl_pencatatan_ikan');
            $this->db->where('id_pencatatan_ikan', $this->input->post('id_pencatatan'));
            $data = $this->db->get()->row();
            echo json_encode($data);
        } else {
            redirect('auth/blocked');
        }
    }

    function getDataUserByTelepon()
    {
        if ($this->input->post('telepon')) {
            $this->db->select('nama');
            $this->db->from('tbl_users');
            $this->db->where('telepon', $this->input->post('telepon'));
            $query = $this->db->get();
            if ($query->num_rows() < 1) {
                $data['status'] = 'error';
            } else {
                $data = $query->row_array();
                $data['status'] = 'success';
            }
            echo json_encode($data);
        } else {
            redirect('auth/blocked');
        }
    }
}

/* End of file: Armada.php */
