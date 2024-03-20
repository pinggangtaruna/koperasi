<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bengkel_model extends CI_Model
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

    function getDataTransaksiService()
    {
        return $this->db->get('tbl_service')->result_array();
    }

    function getCatatanKeuangan($id_user, $number, $offset)
    {
        return $this->db->query('SELECT id_user,jumlah,deskripsi,tgl_masuk,saldo_akhir,jenis FROM tbl_pemasukan WHERE id_user =' . $id_user . ' UNION ALL SELECT id_user,jumlah,deskripsi,tgl_keluar,saldo_akhir,jenis FROM tbl_pengeluaran WHERE id_user =' . $id_user . ' ORDER BY tgl_masuk DESC LIMIT ' . $number . ' OFFSET ' . $offset)->result_array();
    }

    function getJumlahCatatanKeuangan($id_user)
    {
        return $this->db->query('SELECT id_user,jumlah,deskripsi,tgl_masuk,saldo_akhir,jenis FROM tbl_pemasukan WHERE id_user =' . $id_user . ' UNION ALL SELECT id_user,jumlah,deskripsi,tgl_keluar,saldo_akhir,jenis FROM tbl_pengeluaran WHERE id_user =' . $id_user . ' ORDER BY tgl_masuk')->num_rows();
    }

    function getDataUserByTelepon($telepon)
    {
        return $this->db->get_where('tbl_users', ['telepon' => $telepon])->row_array();
    }

    function getTabunganUser($id_user)
    {
        return $this->db->get_where('tbl_tabungan', ['id_user' => $id_user])->row_array();
    }

    function getPendapatan() {
        return $this->db->query("SELECT SUM(total) as pendapatan FROM `tbl_service`")->row_array();
    }

    function getPendapatanByMetode() {
        return $this->db->query("SELECT metode, SUM(total) as pendapatan FROM `tbl_service`GROUP BY metode")->result_array();
    }

    function addService($data)
    {
        $this->db->insert('tbl_service', $data);
    }

    function addPemasukan($data)
    {
        $this->db->insert('tbl_pemasukan', $data);
    }

    function addPengeluaran($data)
    {
        $this->db->insert('tbl_pengeluaran', $data);
    }
}
