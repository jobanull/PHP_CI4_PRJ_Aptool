<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Md_Bidang_model extends CI_Model
{

    function getDataBidangById($id)
    {
        return $this->db->get_where('md_bidang_pemeriksaan', ['id' => $id])->row_array();
    }

    function getDataBidangResult()
    {
        $this->db->select('*');
        $this->db->from('md_bidang_pemeriksaan');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    function hapus_md_bidang($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('md_bidang_pemeriksaan');
    }
}
