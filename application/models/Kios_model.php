<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kios_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function getIDUser($telepon)
    {
        $this->db->select('id_user');
        return $this->db->get_where('tbl_users', ['telepon' => $telepon])->row_array();
    }

    function getJumlahPenjualan($id_user) {
        return $this->db->get_where('tbl_kios', ['id_kios' => $id_user])->num_rows();
    }

    function getProfitBulan($month, $id_user) {
        return $this->db->select(" MONTH(tgl) AS bulan, SUM(total) AS total_pendapatan FROM tbl_kios WHERE id_kios =" . $id_user . " GROUP BY MONTH(" . $month .")")->get()->row_array();
    }

    function getProfitTahun($year, $id_user) {
        return $this->db->select(" YEAR(tgl) AS tahun, SUM(total) AS total_pendapatan FROM tbl_kios WHERE id_kios =" . $id_user . " GROUP BY YEAR(" . $year .")")->get()->row_array();
    }

    function getProfitBulanan($date) {
        $query = 'SELECT month(tgl) AS bulan,sum(total) AS profit
        FROM tbl_kios
        WHERE year(tgl)  = year(now()) AND MONTH(tgl) = ' . $date . '
        GROUP BY month(tgl)
        ORDER BY month(tgl)';

        return $this->db->query($query)->result_array();
    }

    function getDataPenjualan($id_user) {
        return $this->db->get_where('tbl_kios', ['id_kios' => $id_user])->result_array();
    }

    function getDataPenjualanFiltered($id_user, $from, $to) {
        $query = "SELECT * FROM tbl_kios WHERE id_kios = " . $id_user . " AND tgl BETWEEN '" . $from . "' AND '" . $to . "'";

        return $this->db->query($query)->result_array();
    }

    function getPendapatan($id_user) {
        $query = "SELECT SUM(total) AS total_pendapatan FROM tbl_kios WHERE id_kios = " . $id_user;

        return $this->db->query($query)->row_array();
    }

    function getPendapatanFiltered($id_user, $from, $to) {
        $query = "SELECT SUM(total) AS total_pendapatan FROM tbl_kios WHERE id_kios = " . $id_user . " AND tgl BETWEEN '" . $from . "' AND '" . $to . "'";

        return $this->db->query($query)->row_array();
    }

    function addPenjualan($data) {
        $this->db->insert('tbl_kios', $data);
    }

    function deletePenjualan($id_penjualan) {
        $this->db->delete('tbl_kios', array('id_penjualan' => $id_penjualan));
    }
}

/* End of file: Kios_model.php */
