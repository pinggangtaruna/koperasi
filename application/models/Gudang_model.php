<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gudang_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function getAllDataKirimIkan()
    {
        $this->db->order_by('id_kirim_ikan', 'DESC');
        return $this->db->get_where('tbl_kirim_ikan', ['tujuan' => 'Gudang'])->result_array();
    }

    function getAllDataKirim()
    {
        $this->db->order_by('id_kirim_ikan', 'DESC');
        return $this->db->get_where('tbl_kirim_ikan', ['asal_kirim' => 'Gudang'])->result_array();
    }

    function getDataIkanByID($id_ikan)
    {
        return $this->db->get_where('tbl_ikan', ['id_ikan' => $id_ikan])->row_array();
    }

    function getJumlahDataKirimanIkan()
    {
        return $this->db->get_where('tbl_kirim_ikan', ['tujuan' => 'Gudang'])->num_rows();
    }

    function getJumlahDataKirimIkan()
    {
        return $this->db->get_where('tbl_kirim_ikan', ['asal_kirim' => 'Gudang'])->num_rows();
    }

    function getJumlahDataStokIkan()
    {
        return $this->db->get_where('tbl_ikan')->result_array();
    }

    function getAllDataIkan()
    {
        $this->db->order_by('id_ikan', 'DESC');
        return $this->db->get('tbl_ikan')->result_array();
    }

    function addKirimIkan($data)
    {
        $this->db->insert('tbl_kirim_ikan', $data);
    }

    function deleteKirimIkan($id_kirim_ikan)
    {
        $this->db->delete('tbl_kirim_ikan', array('id_kirim_ikan' => $id_kirim_ikan));
    }
}

/* End of file: Gudang_model.php */
