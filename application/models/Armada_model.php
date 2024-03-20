<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Armada_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function getAllDataIkan() {
        $this->db->order_by('id_ikan', 'DESC');
        return $this->db->get('tbl_ikan')->result_array();
    }

    function getDataIkanByID($id_ikan) {
        return $this->db->get_where('tbl_ikan', ['id_ikan' => $id_ikan])->row_array();
    }

    function addIkan($data) {
        $this->db->insert('tbl_ikan', $data);
    }

    function editIkan($id_ikan, $data) {
        $this->db->where('id_ikan', $id_ikan);
        $this->db->update('tbl_ikan', $data);
    }

    function deleteIkan($id_ikan) {
        $this->db->delete('tbl_ikan', array('id_ikan' => $id_ikan));
    }
    
    function getAllDataPencatatanIkan() {
        $this->db->order_by('id_pencatatan_ikan', 'DESC');
        return $this->db->get('tbl_pencatatan_ikan')->result_array();
    }

    function getDataUserByTelepon($telepon)  {
        return $this->db->get_where('tbl_users', ['telepon' => $telepon])->row_array();
    }

    function getTabunganUser($id_user) {
        return $this->db->get_where('tbl_tabungan', ['id_user' => $id_user])->row_array();
    }

    function getJumlahDataKirimIkan()
    {
        return $this->db->get_where('tbl_kirim_ikan', ['asal_kirim' => 'Armada'])->num_rows();
    }

    function getJumlahDataPencatatan()
    {
        return $this->db->get('tbl_pencatatan_ikan')->num_rows();
    }

    function getJumlahDataStokIkan()
    {
        return $this->db->get_where('tbl_ikan')->result_array();
    }

    function addPemasukan($data) {
        $this->db->insert('tbl_pemasukan', $data);
    }

    function addPencatatan($data) {
        $this->db->insert('tbl_pencatatan_ikan', $data);
    }

    function editPencatatan($id_pencatatan_ikan, $data) {
        $this->db->where('id_pencatatan_ikan', $id_pencatatan_ikan);
        $this->db->update('tbl_pencatatan_ikan', $data);
    }

    function deletePencatatan($id_pencatatan_ikan) {
        $this->db->delete('tbl_pencatatan_ikan', array('id_pencatatan_ikan' => $id_pencatatan_ikan));
    }

    function getAllDataKirimIkan() {
        $this->db->where('asal_kirim', 'Armada');
        $this->db->order_by('id_kirim_ikan', 'DESC');
        return $this->db->get('tbl_kirim_ikan')->result_array();
    }

    function addKirimIkan($data) {
        $this->db->insert('tbl_kirim_ikan', $data);
    }

    function editKirim($id_kirim_ikan, $data) {
        $this->db->where('id_kirim_ikan', $id_kirim_ikan);
        $this->db->update('tbl_kirim_ikan', $data);
    }

    function deleteKirimIkan($id_kirim_ikan) {
        $this->db->delete('tbl_kirim_ikan', array('id_kirim_ikan' => $id_kirim_ikan));
    }

}

/* End of file: Armada_model.php */
