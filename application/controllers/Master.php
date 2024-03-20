<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        SecureLogin();
        SecureAdmin();
        $this->load->model('Master_model');
    }

    public function index()
    {
        $data['content'] = 'master/dashboard';
        $data['anggota'] = $this->Master_model->getJumlahDataRoleUser();
        // var_dump($data['anggota']);die;

        $this->load->view('layout/wrapper', $data);
    }

    function DataUsers()
    {
        $data['content'] = 'master/data-users';
        $data['users'] = $this->Master_model->getAllDataUsers();

        $this->load->view('layout/wrapper', $data);
    }

    function TambahUser()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nik', 'NIK', 'required|is_unique[tbl_users.nik]|numeric');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('telepon', 'Telepon', 'required|numeric|is_unique[tbl_users.telepon]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[password]');
        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['content'] = 'master/tambah-user';

            $this->load->view('layout/wrapper', $data);
        } else {
            if (strtolower($this->input->post('role')) == 'petugas') {
                $data = [
                    'nama' => $this->input->post('nama'),
                    'nik' => $this->input->post('nik'),
                    'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                    'alamat' => $this->input->post('alamat'),
                    'telepon' => $this->input->post('telepon'),
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    'role' => $this->input->post('role'),
                    'divisi' => $this->input->post('divisi')
                ];
            } elseif (strtolower($this->input->post('role')) == 'admin') {
                $data = [
                    'nama' => $this->input->post('nama'),
                    'nik' => $this->input->post('nik'),
                    'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                    'alamat' => $this->input->post('alamat'),
                    'telepon' => $this->input->post('telepon'),
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    'role' => $this->input->post('role'),
                    'divisi' => "Master"
                ];
            } elseif (strtolower($this->input->post('role')) == 'user') {
                $data = [
                    'nama' => $this->input->post('nama'),
                    'nik' => $this->input->post('nik'),
                    'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                    'alamat' => $this->input->post('alamat'),
                    'telepon' => $this->input->post('telepon'),
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    'role' => $this->input->post('role'),
                    'divisi' => "Nelayan"
                ];
            }


            $this->Master_model->addUser($data);

            flashData('Berhasil menambahkan Permohonan!', 'Tambah Data', 'success');
            redirect('master/data-users', 'refresh');
        }
    }

    function EditUser()
    {
        $id_user = $this->input->get('id');
        $user = $this->Master_model->getDataUserByID($id_user);

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        if ($user['telepon'] == $this->input->post('telepon')) {
            $this->form_validation->set_rules('telepon', 'Telepon', 'required|numeric');
        } else {
            $this->form_validation->set_rules('telepon', 'Telepon', 'required|numeric|is_unique[tbl_users.telepon]');
        }
        $this->form_validation->set_rules('password', 'Password', 'trim|min_length[5]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|matches[password]');
        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() == FALSE) {
            flashData('Gagal edit data user!','Gagal Edit','error');
            redirect('master/data-users', 'refresh');
        } else {
            if ($this->input->post('password') != '') {
                if (strtolower($this->input->post('role')) == 'petugas') {
                    $data = [
                        'nama' => $this->input->post('nama'),
                        'nik' => $this->input->post('nik'),
                        'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                        'alamat' => $this->input->post('alamat'),
                        'telepon' => $this->input->post('telepon'),
                        'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                        'role' => $this->input->post('role'),
                        'divisi' => $this->input->post('divisi')
                    ];
                } elseif (strtolower($this->input->post('role')) == 'admin') {
                    $data = [
                        'nama' => $this->input->post('nama'),
                        'nik' => $this->input->post('nik'),
                        'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                        'alamat' => $this->input->post('alamat'),
                        'telepon' => $this->input->post('telepon'),
                        'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                        'role' => $this->input->post('role'),
                        'divisi' => "Master"
                    ];
                } elseif (strtolower($this->input->post('role')) == 'user') {
                    $data = [
                        'nama' => $this->input->post('nama'),
                        'nik' => $this->input->post('nik'),
                        'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                        'alamat' => $this->input->post('alamat'),
                        'telepon' => $this->input->post('telepon'),
                        'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                        'role' => $this->input->post('role'),
                        'divisi' => "Nelayan"
                    ];
                }
            } else {
                if (strtolower($this->input->post('role')) == 'petugas') {
                    $data = [
                        'nama' => $this->input->post('nama'),
                        'nik' => $this->input->post('nik'),
                        'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                        'alamat' => $this->input->post('alamat'),
                        'telepon' => $this->input->post('telepon'),
                        'role' => $this->input->post('role'),
                        'divisi' => $this->input->post('divisi')
                    ];
                } elseif (strtolower($this->input->post('role')) == 'admin') {
                    $data = [
                        'nama' => $this->input->post('nama'),
                        'nik' => $this->input->post('nik'),
                        'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                        'alamat' => $this->input->post('alamat'),
                        'telepon' => $this->input->post('telepon'),
                        'role' => $this->input->post('role'),
                        'divisi' => "Master"
                    ];
                } elseif (strtolower($this->input->post('role')) == 'user') {
                    $data = [
                        'nama' => $this->input->post('nama'),
                        'nik' => $this->input->post('nik'),
                        'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                        'alamat' => $this->input->post('alamat'),
                        'telepon' => $this->input->post('telepon'),
                        'role' => $this->input->post('role'),
                        'divisi' => "Nelayan"
                    ];
                }
            }

            $this->Master_model->editUser($id_user, $data);

            flashData('Berhasil menambahkan Permohonan!', 'Tambah Data', 'success');
            redirect('master/data-users', 'refresh');
        }
    }

    function DeleteUser() {
        $id_user = $this->input->get('id');

        if (!$id_user) {
            redirect('auth/blocked', 'refresh');
        } else {
            $this->Master_model->deleteUser($id_user);

            flashData('Berhasil menghapus User!','Delete Success', 'success');
            redirect('master/data-users', 'refresh');
        }
    }

    // ==================== AJAX ===========================
    function getDataModalEditUser()
    {
        // Menangkap data ajax. cek script view data-user dan myscript.js
        if ($this->input->post('id_user')) {
            $this->db->select('nama, nik, jenis_kelamin, alamat, telepon, role, divisi');
            $this->db->from('tbl_users');
            $this->db->where('id_user', $this->input->post('id_user'));
            $data = $this->db->get()->row();
            echo json_encode($data);
        } else {
            redirect('auth/blocked');
        }
    }
}

/* End of file: Master.php */
