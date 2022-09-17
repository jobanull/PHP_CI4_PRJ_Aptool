<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Md_Data_Pemeriksaan_model extends CI_Model
{
    function getDataPemeriksaanResult()
    {
        $this->db->select('*');
        $this->db->from('md_data_pemeriksaan');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    function hapus_md_data($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('md_data_pemeriksaan');
    }

    function getDataPemeriksaanById($id)
    {
        return $this->db->get_where('md_data_pemeriksaan', ['id' => $id])->row_array();
    }
}
