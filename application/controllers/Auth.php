<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        hasbeenLoggedIn();
        
        $this->form_validation->set_rules('telepon', 'Nomor Telepon', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/login');
        } else {
            // Validasinya success
            $telepon = $this->input->post('telepon');
            $password = $this->input->post('password');

            $user = $this->db->get_where('tbl_users', array('telepon' => $telepon))->row_array();

            // Cek jika data user ada
            if ($user) {
                // Cek jika password benar
                if (password_verify($password, $user['password'])) {

                    // Kalau semua sudah dicek maka buat session
                    $data = [
                        'telepon' => $user['telepon'],
                        'role' => $user['role'],
                        'divisi' => $user['divisi']
                    ];

                    $this->session->set_userdata($data);

                    if (strtolower($this->session->userdata('role')) == 'user') {
                        redirect('user', 'refresh');
                    } elseif (strtolower($this->session->userdata('role')) == 'admin') {
                        if (strtolower($this->session->userdata('divisi')) == 'master') {
                            redirect('master', 'refresh');
                        }
                    } elseif (strtolower($this->session->userdata('role')) == 'petugas' && strtolower($this->session->userdata('divisi')) == 'armada penangkapan ikan') {
                        redirect('armada', 'refresh');
                    } elseif (strtolower($this->session->userdata('role')) == 'petugas' && strtolower($this->session->userdata('divisi')) == 'rumah pengolahan') {
                        redirect('pengolahan', 'refresh');
                    } elseif (strtolower($this->session->userdata('role')) == 'petugas' && strtolower($this->session->userdata('divisi')) == 'gudang') {
                        redirect('gudang', 'refresh');
                    } elseif (strtolower($this->session->userdata('role')) == 'petugas' && strtolower($this->session->userdata('divisi')) == 'waserda') {
                        redirect('waserda', 'refresh');
                    } elseif (strtolower($this->session->userdata('role')) == 'petugas' && strtolower($this->session->userdata('divisi')) == 'bengkel') {
                        redirect('bengkel', 'refresh');
                    } elseif (strtolower($this->session->userdata('role')) == 'petugas' && strtolower($this->session->userdata('divisi')) == 'kios') {
                        redirect('kios', 'refresh');
                    } elseif (strtolower($this->session->userdata('role')) == 'petugas' && strtolower($this->session->userdata('divisi')) == 'sentra kuliner') {
                        redirect('sentra', 'refresh');
                    } else {
                        redirect('auth/blocked', 'refresh');
                    }
                } else {
                    flashData('Telepon atau Password tidak benar!', 'Gagal Login', 'error');
                    redirect('auth', 'refresh');
                }
            } else {
                flashData('Telepon atau Password tidak benar!', 'Gagal Login', 'error');
                redirect('auth', 'refresh');
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('telepon');
        $this->session->unset_userdata('role');
        $this->session->unset_userdata('divisi');

        redirect('auth', 'refresh');
    }

    function Blocked($code) {
        if ($code == '404') {
            $this->load->view('auth/404');
        }
    }
}

/* End of file: Auth.php */
