<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Sf_Registrasi_Pasien_Model extends CI_Model
{

    function getDataPasienResult()
    {
        return  $this->db->get('sf_registrasi_pasien')->result_array();
    }

    function getDataPasienRow()
    {
        return  $this->db->get_where('sf_registrasi_pasien')->row_array();
    }

    function getDataPasienById($id)
    {
        return $this->db->get_where('sf_registrasi_pasien', ['id' => $id])->row_array();
    }


    public function hapus_data_registrasi($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('sf_registrasi_pasien');
    }

    public function getDataTotalPasien()
    {
        $query = "SELECT SUM(sts) AS total_pasien FROM `sf_registrasi_pasien`";
        return $this->db->query($query)->result_array();
    }
    public function getDataBelumBayar()
    {
        $query = "SELECT COUNT(bayar) AS belum_bayar FROM `sf_registrasi_pasien` WHERE bayar LIKE 'a'";
        return $this->db->query($query)->result_array();
    }

    public function getDataSudahBayar()
    {
        $query = "SELECT COUNT(bayar) AS sudah_bayar FROM `sf_registrasi_pasien` WHERE bayar LIKE 'b' ";
        return $this->db->query($query)->result_array();
    }
}
