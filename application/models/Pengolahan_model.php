<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengolahan_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function getJumlahDataKirimanIkan()
    {
        return $this->db->get_where('tbl_kirim_ikan', ['tujuan' => 'Rumah Pengolahan'])->num_rows();
    }

    function getJumlahDataOlahan() {
        return $this->db->get('tbl_stok_olahan')->result_array();
    }

    function getJumlahDataKirimIkan()
    {
        return $this->db->get_where('tbl_kirim_ikan_olah')->num_rows();
    }

    function getJumlahDataStokIkan()
    {
        return $this->db->get_where('tbl_ikan')->result_array();
    }

    function getAllDataKirimIkan()
    {
        $this->db->order_by('id_kirim_ikan', 'DESC');
        return $this->db->get_where('tbl_kirim_ikan', ['tujuan' => 'Rumah Pengolahan'])->result_array();
    }

    function getAllDataOlahan() {
        return $this->db->get('tbl_olah_ikan')->result_array();
    }

    function getAllDataIkan()
    {
        $this->db->order_by('id_ikan', 'DESC');
        return $this->db->get('tbl_ikan')->result_array();
    }

    function getDataIkanByID($id_ikan)
    {
        return $this->db->get_where('tbl_ikan', ['id_ikan' => $id_ikan])->row_array();
    }

    function getAllDataKirim()
    {
        $this->db->order_by('id_kirim_olahan', 'DESC');
        return $this->db->get('tbl_kirim_ikan_olah')->result_array();
    }

    function addOlahanIkan($data) {
        $this->db->insert('tbl_olah_ikan', $data);
    }

    function addKirimIkan($data) {
        $this->db->insert('tbl_kirim_ikan_olah', $data);
    }

    function deleteOlahan($id_olah_ikan)
    {
        $this->db->delete('tbl_olah_ikan', array('id_olah_ikan' => $id_olah_ikan));
    }

    function deleteKirim($id_kirim_olahan)
    {
        $this->db->delete('tbl_kirim_ikan_olah', array('id_kirim_olahan' => $id_kirim_olahan));
    }
}

/* End of file: Pengolahan_model.php */
