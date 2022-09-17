<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Md_Obat_model extends CI_Model
{
    function getDataObatById($id)
    {
        return $this->db->get_where('md_obat', ['id' => $id])->row_array();
    }

    function getDataObatRow()
    {
        return $this->db->get_where('md_obat')->row_array();
    }


    function getDataObatResult()
    {
        $this->db->select('*');
        $this->db->from('md_obat');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    function hapus_md_obat($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('md_obat');
    }
}
