<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{


    public function __construct()
    {
        parent::__construct();
    }

    function getIDUser($telepon)
    {
        $this->db->select('id_user');
        return $this->db->get_where('tbl_users', ['telepon' => $telepon])->row_array();
    }

    function getJumlahSaldo($id_user)
    {
        $this->db->select('saldo');
        return $this->db->get_where('tbl_tabungan', ['id_user' => $id_user])->row_array();
    }

    function getCatatanKeuangan($id_user, $number, $offset)
    {
        return $this->db->query('SELECT id_user,jumlah,deskripsi,tgl_masuk,saldo_akhir,jenis FROM tbl_pemasukan WHERE id_user =' . $id_user . ' UNION ALL SELECT id_user,jumlah,deskripsi,tgl_keluar,saldo_akhir,jenis FROM tbl_pengeluaran WHERE id_user =' . $id_user . ' ORDER BY tgl_masuk DESC LIMIT ' . $number . ' OFFSET ' . $offset)->result_array();
    }

    function getJumlahCatatanKeuangan($id_user)
    {
        return $this->db->query('SELECT id_user,jumlah,deskripsi,tgl_masuk,saldo_akhir,jenis FROM tbl_pemasukan WHERE id_user =' . $id_user . ' UNION ALL SELECT id_user,jumlah,deskripsi,tgl_keluar,saldo_akhir,jenis FROM tbl_pengeluaran WHERE id_user =' . $id_user . ' ORDER BY tgl_masuk')->num_rows();
    }
}

/* End of file: User_model.php */
