<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Sf_Tickets_Model extends CI_Model
{

    function getDataPasienResult()
    {
        return  $this->db->get('sf_tickets')->result_array();
    }

    function getDataPasienRow()
    {
        return  $this->db->get_where('sf_tickets')->row_array();
    }

    function getDataPasienById($id)
    {
        return $this->db->get_where('sf_tickets', ['id' => $id])->row_array();
    }


    public function hapus_data_registrasi($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('sf_tickets');
    }

    public function getDataTotalPasien()
    {
        $query = "SELECT SUM(sts) AS total_pasien FROM `sf_tickets`";
        return $this->db->query($query)->result_array();
    }
    public function getDataBelumBayar()
    {
        $query = "SELECT COUNT(bayar) AS belum_bayar FROM `sf_tickets` WHERE bayar LIKE 'a'";
        return $this->db->query($query)->result_array();
    }

    public function getDataSudahBayar()
    {
        $query = "SELECT COUNT(bayar) AS sudah_bayar FROM `sf_tickets` WHERE bayar LIKE 'b' ";
        return $this->db->query($query)->result_array();
    }
}
