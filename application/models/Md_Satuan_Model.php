<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Md_Satuan_model extends CI_Model
{
    function getDataSatuanById($id)
    {
        return $this->db->get_where('md_satuan_pasien', ['id' => $id])->row_array();
    }

    function getDataSatuanResult()
    {
        $this->db->select('*');
        $this->db->from('md_satuan_pasien');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    function hapus_md_satuan($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('md_satuan_pasien');
    }
}
