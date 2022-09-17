<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MasterData extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('email')) {
            redirect('auth');
        }

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('Menu_Model');
        $this->load->model('Md_Pengirim_Model');
        $this->load->model('Md_Kategori_Model');
        $this->load->model('Md_Satuan_Model');
        $this->load->model('Md_Bidang_Model');
        $this->load->model('Md_Petugas_Model');
        $this->load->model('Md_Data_Pemeriksaan_Model');
        $this->load->model('Md_Obat_Model');
    }

    public function index()
    {

        echo "hello world";
    }

    public function Pengirim_Pasien()
    {
        $data['title'] = 'Pengirim Pasien';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pengirim'] = $this->Md_Pengirim_Model->getDataPengirimResult();

        $this->form_validation->set_rules('nama_dokter', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('spesialis', 'Spesialis');
        $this->form_validation->set_rules('telepon', 'Telepon');
        $this->form_validation->set_rules('tgl_lahir', 'Tgl_lahir');
        $this->form_validation->set_rules('alamat', 'Alamat');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('masterdata/pengirim-pasien', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_dokter' => htmlentities($this->input->post('nama_dokter')),
                'email' => htmlentities($this->input->post('email')),
                'spesialis' => htmlentities($this->input->post('spesialis')),
                'telepon' => htmlentities($this->input->post('telepon')),
                'tgl_lahir' => htmlentities($this->input->post('tgl_lahir')),
                'alamat' => htmlentities($this->input->post('alamat')),
                'date_created' => time()
            ];
            // $data = $this->security->xss_clean($data);

            $this->db->insert('md_pengirim_pasien', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Data Berhasil Ditambahkan</div>');
            redirect('masterdata/pengirim_pasien');
        }
    }

    public function hapus_pengirim_pasien($id)
    {
        $this->Md_Pengirim_Model->hapus_md_pengirim($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
       Data Berhasil Dihapus</div>');
        redirect('masterdata/pengirim_pasien');
    }

    // -----------------------------------------------------------------------------------------


    public function getUbahPengirimPasien()
    {
        echo json_encode($this->Md_Pengirim_Model->getDataPengirimById($_POST['id']));
    }

    // -----------------------------------------------------------------------------------------

    public function ubah_pengirim_pasien($id)
    {
        $data['title'] = 'Ubah Pengirim Pasien';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pengirim'] = $this->Md_Pengirim_Model->getDataPengirimById($id);

        $this->form_validation->set_rules('nama_dokter', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('spesialis', 'Spesialis');
        $this->form_validation->set_rules('telepon', 'Telepon');
        $this->form_validation->set_rules('tgl_lahir', 'Tgl_lahir');
        $this->form_validation->set_rules('alamat', 'Alamat');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('masterdata/ubah/pengirim-pasien', $data);
            $this->load->view('templates/footer');
        } else {

            $data = [
                'nama_dokter' => htmlentities($this->input->post('nama_dokter')),
                'email' => htmlentities($this->input->post('email')),
                'spesialis' => htmlentities($this->input->post('spesialis')),
                'telepon' => htmlentities($this->input->post('telepon')),
                'tgl_lahir' => htmlentities($this->input->post('tgl_lahir')),
                'alamat' => htmlentities($this->input->post('alamat'))

            ];

            $this->db->where('id', $this->input->post('id'));
            $this->db->update('md_pengirim_pasien', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
               Data Berhasil Diubah</div>');
            redirect('masterdata/pengirim_pasien');
        }
    }



    // -----------------------------------------------------------------------------------------


    public function Kategori_Pasien()
    {
        $data['title'] = 'Kategori Pasien';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kategori'] = $this->Md_Kategori_Model->getDatakategoriResult();

        $this->form_validation->set_rules('kategori', 'Kategori', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('masterdata/kategori-pasien', $data);
            $this->load->view('templates/footer');
        } else {

            $data = [
                'kategori' => htmlentities($this->input->post('kategori'))
            ];

            $this->db->insert('md_kategori_pasien', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data Berhasil Ditambah</div>');
            redirect('masterdata/kategori_pasien');
        }
    }
    // -----------------------------------------------------------------------------------------
    public function hapus_kategori_pasien($id)
    {
        $this->Md_Kategori_Model->hapus_md_kategori($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
       Data Berhasil Dihapus</div>');
        redirect('masterdata/kategori_pasien');
    }

    // -----------------------------------------------------------------------------------------

    public function getUbahKategoriPasien()
    {
        echo json_encode($this->Md_Kategori_Model->getDataKategoriById($_POST['id']));
    }


    // -----------------------------------------------------------------------------------------


    public function ubah_kategori_pasien($id)
    {
        $data['title'] = 'Kategori Pasien';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kategori'] = $this->Md_Kategori_Model->getDataKategoriById($id);

        $this->form_validation->set_rules('kategori', 'Kategori', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('masterdata/ubah/kategori-pasien', $data);
            $this->load->view('templates/footer');
        } else {

            $data = [
                'kategori' => htmlentities($this->input->post('kategori'))
            ];

            $this->db->where('id', $this->input->post('id'));
            $this->db->update('md_kategori_pasien', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data Berhasil Diubah</div>');
            redirect('masterdata/kategori_pasien');
        }
    }




    // -----------------------------------------------------------------------------------------

    public function Satuan()
    {
        $data['title'] = 'Satuan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['satuan'] = $this->Md_Satuan_Model->getDataSatuanResult();

        $this->form_validation->set_rules('satuan', 'Satuan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('masterdata/satuan', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'satuan' => htmlentities($this->input->post('satuan'))
            ];

            $this->db->insert('md_satuan_pasien', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data Berhasil Ditambahkan</div>');
            redirect('masterdata/satuan');
        }
    }
    // -----------------------------------------------------------------------------------------
    public function hapus_satuan($id)
    {
        $this->Md_Satuan_Model->hapus_md_satuan($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
       Data Berhasil Dihapus</div>');
        redirect('masterdata/satuan');
    }

    // -----------------------------------------------------------------------------------------

    public function getUbahSatuan()
    {
        echo json_encode($this->Md_Satuan_Model->getDataSatuanById($_POST['id']));
    }

    // -----------------------------------------------------------------------------------------

    public function ubah_satuan($id)
    {
        $data['title'] = 'Ubah Satuan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['satuan'] = $this->Md_Satuan_Model->getDataSatuanById($id);
        $this->form_validation->set_rules('satuan', 'Satuan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('masterdata/ubah/satuan', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'satuan' => htmlentities($this->input->post('satuan'))
            ];
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('md_satuan_pasien', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data Berhasil Diubah</div>');
            redirect('masterdata/satuan');
        }
    }

    // -----------------------------------------------------------------------------------------

    public function Bidang_Pemeriksaan()
    {
        $data['title'] = 'Bidang Pemeriksaan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['bidang'] = $this->Md_Bidang_Model->getDataBidangResult();

        $this->form_validation->set_rules('bidang', 'Bidang', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('masterdata/bidang-pemeriksaan', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'bidang' => htmlentities($this->input->post('bidang'))
            ];

            $this->db->insert('md_bidang_pemeriksaan', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data Berhasil Ditambahkan</div>');
            redirect('masterdata/bidang_pemeriksaan');
        }
    }

    public function hapus_bidang_pemeriksaan($id)
    {
        $this->Md_Bidang_Model->hapus_md_bidang($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
       Data Berhasil Dihapus</div>');
        redirect('masterdata/bidang_pemeriksaan');
    }

    // -----------------------------------------------------------------------------------------

    // public function getUbahBidang()
    // {
    //     echo json_encode($this->Md_Bidang_Model->getDataBidangById($_POST['id']));
    // }

    // -----------------------------------------------------------------------------------------

    public function Ubah_Bidang_Pemeriksaan($id)
    {
        $data['title'] = 'Ubah Bidang Pemeriksaan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['getDataBidangById'] = $this->Md_Bidang_Model->getDataBidangById($id);

        $this->form_validation->set_rules('bidang', 'Bidang', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('masterdata/ubah/bidang-pemeriksaan', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'bidang' => htmlentities($this->input->post('bidang'))
            ];

            $this->db->where('id', $this->input->post('id'));
            $this->db->update('md_bidang_pemeriksaan', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data Berhasil Diubah</div>');
            redirect('masterdata/bidang_pemeriksaan');
        }
    }
    // -----------------------------------------------------------------------------------------

    public function Data_Pemeriksaan()
    {
        $data['title'] = 'Data Pemeriksaan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['dataPemeriksaan'] = $this->Md_Data_Pemeriksaan_Model->getDataPemeriksaanResult();
        $data['bidang'] = $this->Md_Bidang_Model->getDataBidangResult();
        $data['satuan'] = $this->Md_Satuan_Model->getDataSatuanResult();

        $this->form_validation->set_rules('bidang', 'Bidang', 'required');
        $this->form_validation->set_rules('data_pemeriksaan', 'Data_pemeriksaan', 'required');
        $this->form_validation->set_rules('sub_pemeriksaan', 'Sub_pemeriksaan');
        $this->form_validation->set_rules('nominal', 'Nominal');
        $this->form_validation->set_rules('tarif', 'Tarif');
        $this->form_validation->set_rules('satuan', 'Satuan');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('masterdata/data-pemeriksaan', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'bidang' => htmlentities($this->input->post('bidang')),
                'data_pemeriksaan' => htmlentities($this->input->post('data_pemeriksaan')),
                'sub_pemeriksaan' => htmlentities($this->input->post('sub_pemeriksaan')),
                'nominal' => htmlentities($this->input->post('nominal')),
                'tarif' => htmlentities($this->input->post('tarif')),
                'satuan' => htmlentities($this->input->post('satuan'))
            ];

            $this->db->insert('md_data_pemeriksaan', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data Berhasil Ditambahkan</div>');
            redirect('masterdata/data_pemeriksaan');
        }
    }
    // -----------------------------------------------------------------------------------------
    public function hapus_data_pemeriksaan($id)
    {
        $this->Md_Data_Pemeriksaan_Model->hapus_md_data($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
       Data Berhasil Dihapus</div>');
        redirect('masterdata/data_pemeriksaan');
    }
    // -----------------------------------------------------------------------------------------
    public function getUbahDataPemeriksaan()
    {
        echo json_encode($this->Md_Data_Pemeriksaan_Model->getDataPemeriksaanById($_POST['id']));
    }
    // -----------------------------------------------------------------------------------------
    public function Ubah_Data_Pemeriksaan($id)
    {
        $data['title'] = 'Data pemeriksaan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pemeriksaan'] = $this->Md_Data_Pemeriksaan_Model->getDataPemeriksaanById($id);

        $this->form_validation->set_rules('bidang', 'Bidang', 'required');
        $this->form_validation->set_rules('data_pemeriksaan', 'Data_pemeriksaan', 'required');
        $this->form_validation->set_rules('sub_pemeriksaan', 'Sub_pemeriksaan');
        $this->form_validation->set_rules('nominal', 'Nominal');
        $this->form_validation->set_rules('tarif', 'Tarif');
        $this->form_validation->set_rules('satuan', 'Satuan');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('masterdata/ubah/data-pemeriksaan', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'bidang' => htmlentities($this->input->post('bidang')),
                'data_pemeriksaan' => htmlentities($this->input->post('data_pemeriksaan')),
                'sub_pemeriksaan' => htmlentities($this->input->post('sub_pemeriksaan')),
                'nominal' => htmlentities($this->input->post('nominal')),
                'tarif' => htmlentities($this->input->post('tarif')),
                'satuan' => htmlentities($this->input->post('satuan'))

            ];

            $this->db->where('id', $this->input->post('id'));
            $this->db->update('md_data_pemeriksaan', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data Berhasil Diubah</div>');
            redirect('masterdata/data_pemeriksaan');
        }
    }

    // -----------------------------------------------------------------------------------------  

    public function petugas()
    {
        $data['title'] = 'Petugas';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['petugas'] = $this->Md_Petugas_Model->getDataPetugasRow();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('masterdata/petugas', $data);
        $this->load->view('templates/footer');
    }
    // -----------------------------------------------------------------------------------------

    public function ubah_petugas($id)
    {
        $data['petugas'] = $this->Md_Petugas_Model->getDataPetugasById($id);


        $this->form_validation->set_rules('petugas', 'Petugas', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('masterdata/petugas', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'petugas' => htmlentities($this->input->post('petugas'))
            ];

            $this->db->where('id', $this->input->post('id'));
            $this->db->update('md_petugas', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data Berhasil Diubah</div>');
            redirect('masterdata/petugas');
        }
    }

    public function users()
    {
        $data['title'] = 'Users';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['users'] = $this->db->get('user')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('masterdata/Users', $data);
        $this->load->view('templates/footer');
    }
}
