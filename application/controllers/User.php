<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        SecureLogin();
        SecureUser();
        $this->load->model('User_model');
    }

    public function index()
    {
        $data['content'] = 'user/dashboard';
        $id_user = $this->User_model->getIDUser($this->session->userdata('telepon'))['id_user'];
        $data['saldo'] = $this->User_model->getJumlahSaldo($id_user);

        $this->load->view('layout/wrapper', $data);
    }

    function keuangan()
    {
        $data['content'] = 'user/catatan-keuangan';

        $id_user = $this->User_model->getIDUser($this->session->userdata('telepon'))['id_user'];

        $jumlah_data = $this->User_model->getJumlahCatatanKeuangan($id_user);
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'user/keuangan';

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
        
        $data['catatan'] = $this->User_model->getCatatanKeuangan($id_user, $config['per_page'], $offset);
        // var_dump($data['catatan']);
        // var_dump($this->db);
        // var_dump($offset);
        // die;
        $this->load->view('layout/wrapper', $data);
    }
}

/* End of file: User.php */
