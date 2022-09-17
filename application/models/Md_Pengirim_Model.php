<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Md_Pengirim_model extends CI_Model
{

    function getDataPengirimById($id)
    {
        return $this->db->get_where('md_pengirim_pasien', ['id' => $id])->row_array();
    }

    function getDataPengirimResult()
    {
        $this->db->select('*');
        $this->db->from('md_pengirim_pasien');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    function hapus_md_pengirim($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('md_pengirim_pasien');
    }
}
