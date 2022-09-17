<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Md_Kategori_model extends CI_Model
{
    function getDataKategoriById($id)
    {
        return $this->db->get_where('md_kategori_pasien', ['id' => $id])->row_array();
    }

    function getDataKategoriResult()
    {
        $this->db->select('*');
        $this->db->from('md_kategori_pasien');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    function hapus_md_kategori($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('md_kategori_pasien');
    }
}
