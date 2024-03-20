<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function getAllDataUsers()
    {
        $this->db->select('*');
        $this->db->from('tbl_users');
        $this->db->order_by('id_user', 'DESC');
        return $this->db->get()->result_array();
    }

    function getJumlahDataRoleUser() {
        return $this->db->query("SELECT role, divisi, COUNT(*) as jumlah FROM tbl_users GROUP BY divisi")->result_array();
    }

    function addUser($data)
    {
        $this->db->insert('tbl_users', $data);
    }

    function tambahTabungan($data) {
        $this->db->insert('tbl_tabungan', $data);
    }

    function editUser($id_user, $data) {
        $this->db->where('id_user', $id_user);
        $this->db->update('tbl_users', $data);
    }

    function getDataUserByID($id_user) {
        return $this->db->get_where('tbl_users', ['id_user' => $id_user])->row_array();
    }

    function DeleteUser($id_user) {
        $this->db->delete('tbl_users', array('id_user' => $id_user));
    }
}

/* End of file: Master_model.php */
