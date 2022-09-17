<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Md_Petugas_Model extends CI_Model
{

    function getDataPetugasRow()
    {
        return $this->db->get_where('md_petugas')->row_array();
    }

    function getDataPetugasById($id)
    {
        return $this->db->get_where('md_petugas', ['id' => $id])->row_array();
    }
}
