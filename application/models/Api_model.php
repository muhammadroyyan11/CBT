<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api_model extends CI_Model
{
    public function get($table, $data = null, $where = null)
    {
        if ($data != null) {
            return $this->db->get_where($table, $data);
        } else {
            return $this->db->get_where($table, $where);
        }
    }

    public function get_pengguna($id = null)
    {
        $this->db->select('*');
        $this->db->from('pengguna');
        if ($id != null) {
            $this->db->where('id', $id);
        }

        return $this->db->get();
    }
}