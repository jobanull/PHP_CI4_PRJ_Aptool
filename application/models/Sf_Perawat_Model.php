<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Sf_Perawat_Model extends CI_Model
{

    function hapus_data_perawat($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('sf_perawat');
    }
}
