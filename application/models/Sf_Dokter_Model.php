<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Sf_Dokter_Model extends CI_Model
{

    function hapus_data_dokter($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('sf_dokter');
    }
}
