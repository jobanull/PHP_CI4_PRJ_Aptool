<?php

defined('BASEPATH') or exit('No direct script access allowed');

class PDF_Model extends CI_Model
{
    function data_print($id)
    {
        return $this->db->get('sf_progress_pemeriksaan', ['id' => $id])->result_array();
    }
}
