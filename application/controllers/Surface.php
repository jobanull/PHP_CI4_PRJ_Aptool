<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Surface extends CI_Controller
{

    public function __construct()
    {
        
        parent::__construct();

        if (!$this->session->userdata('email')) {
            redirect('auth');
        }

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('Sf_Registrasi_Pasien_Model');
        $this->load->model('Sf_Dokter_Model');
        $this->load->model('Sf_Perawat_Model');
        $this->load->model('Sf_Progress_Model');


        $this->load->model('Md_Obat_Model');
        $this->load->model('Md_Pengirim_Model');
        $this->load->model('Md_Kategori_Model');
        $this->load->model('Md_Satuan_Model');
        $this->load->model('Md_Bidang_Model');
        $this->load->model('Md_Petugas_Model');
        $this->load->model('Md_Data_Pemeriksaan_Model');

    }


    // ------------------------------------------------------------------------------------------------------


    public function index()
    {

        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // $data['total_pasien'] = $this->Sf_Registrasi_Pasien_Model->getDataTotalPasien();
        // $data['belum_bayar'] = $this->Sf_Registrasi_Pasien_Model->getDataBelumBayar();
        // $data['sudah_bayar'] = $this->Sf_Registrasi_Pasien_Model->getDataSudahBayar();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('surface/index', $data);
        $this->load->view('templates/footer');
    }


    // -----------------------------------------------------------------------------------------------------


    public function Registrasi_Pasien()
    {
        $data['title'] = 'Registrasi Pasien';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kategori'] = $this->Md_Kategori_Model->getDataKategoriResult();
        $data['dokter'] = $this->Md_Pengirim_Model->getDataPengirimResult();
        $data['petugas'] = $this->Md_Petugas_Model->getDataPetugasRow();


        $this->form_validation->set_rules('rm', 'RM', 'required');
        $this->form_validation->set_rules('tgl_registrasi', 'Tgl_Registrasi');
        $this->form_validation->set_rules('nama_pasien', 'Nama_Pasien', 'required');
        $this->form_validation->set_rules('kategori_pasien', 'Kategori_Pasien');
        $this->form_validation->set_rules('dokter_pengirim', 'Dokter_Pengirim');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis_Kelamin');
        $this->form_validation->set_rules('golongan_darah', 'Golongan_Darah');
        $this->form_validation->set_rules('tgl_lahir', 'Tgl_Lahir');
        $this->form_validation->set_rules('status', 'Status');
        $this->form_validation->set_rules('nomor_hp', 'Nomor_HP');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan');
        $this->form_validation->set_rules('no_kk', 'no_kk');
        $this->form_validation->set_rules('nama_ayah', 'Nama_Ayah');
        $this->form_validation->set_rules('nama_ibu', 'Nama_Ibu');
        $this->form_validation->set_rules('alamat', 'Alamat');
        $this->form_validation->set_rules('petugas', 'Petugas');
        $this->form_validation->set_rules('sts', 'Sts');
        $this->form_validation->set_rules('bayar', 'Bayar');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('surface/registrasi', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'rm' => htmlentities($this->input->post('rm')),
                'tgl_registrasi' => htmlentities($this->input->post('tgl_registrasi')),
                'nama_pasien' => htmlentities($this->input->post('nama_pasien')),
                'kategori_pasien' => htmlentities($this->input->post('kategori_pasien')),
                'dokter_pengirim' => htmlentities($this->input->post('dokter_pengirim')),
                'jenis_kelamin' => htmlentities($this->input->post('jenis_kelamin')),
                'golongan_darah' => htmlentities($this->input->post('golongan_darah')),
                'tgl_lahir' => htmlentities($this->input->post('tgl_lahir')),
                'status' => htmlentities($this->input->post('status')),
                'nomor_hp' => htmlentities($this->input->post('nomor_hp')),
                'pekerjaan' => htmlentities($this->input->post('pekerjaan')),
                'no_kk' => htmlentities($this->input->post('no_kk')),
                'nama_ayah' => htmlentities($this->input->post('nama_ayah')),
                'nama_ibu' => htmlentities($this->input->post('nama_ibu')),
                'alamat' => htmlentities($this->input->post('alamat')),
                'petugas' => htmlentities($this->input->post('petugas')),
                'sts' => htmlentities($this->input->post('sts')),
                'bayar' => htmlentities($this->input->post('bayar'))

            ];
            $this->db->insert('sf_registrasi_pasien', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Data Berhasil Ditambahkan</div>');
            redirect('surface/laboratorium');
        }
    }


    public function Ubah_Data_Registrasi_Pasien($id)
    {
        $data['title'] = 'Ubah Data Registrasi Pasien';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pasien'] = $this->Sf_Registrasi_Pasien_Model->getDataPasienById($id);
        $data['kategori'] = $this->Md_Kategori_Model->getDataKategoriResult();
        $data['dokter'] = $this->Md_Pengirim_Model->getDataPengirimResult();
        $data['petugas'] = $this->Md_Petugas_Model->getDataPetugasRow();


        $this->form_validation->set_rules('id', 'ID');
        $this->form_validation->set_rules('rm', 'RM');
        $this->form_validation->set_rules('tgl_registrasi', 'Tgl_Registrasi');
        $this->form_validation->set_rules('nama_pasien', 'Nama_Pasien', 'required');
        $this->form_validation->set_rules('kategori_pasien', 'Kategori_Pasien');
        $this->form_validation->set_rules('dokter_pengirim', 'Dokter_Pengirim');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis_Kelamin');
        $this->form_validation->set_rules('golongan_darah', 'Golongan_Darah');
        $this->form_validation->set_rules('tgl_lahir', 'Tgl_Lahir');
        $this->form_validation->set_rules('status', 'Status');
        $this->form_validation->set_rules('nomor_hp', 'Nomor_HP');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan');
        $this->form_validation->set_rules('no_kk', 'no_kk');
        $this->form_validation->set_rules('nama_ayah', 'Nama_Ayah');
        $this->form_validation->set_rules('nama_ibu', 'Nama_Ibu');
        $this->form_validation->set_rules('alamat', 'Alamat');
        $this->form_validation->set_rules('petugas', 'Petugas');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('surface/ubah-registrasi', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id' => htmlentities($this->input->post('id')),
                'rm' => htmlentities($this->input->post('rm')),
                'tgl_registrasi' => htmlentities($this->input->post('tgl_registrasi')),
                'nama_pasien' => htmlentities($this->input->post('nama_pasien')),
                'kategori_pasien' => htmlentities($this->input->post('kategori_pasien')),
                'dokter_pengirim' => htmlentities($this->input->post('dokter_pengirim')),
                'jenis_kelamin' => htmlentities($this->input->post('jenis_kelamin')),
                'golongan_darah' => htmlentities($this->input->post('golongan_darah')),
                'tgl_lahir' => htmlentities($this->input->post('tgl_lahir')),
                'status' => htmlentities($this->input->post('status')),
                'nomor_hp' => htmlentities($this->input->post('nomor_hp')),
                'pekerjaan' => htmlentities($this->input->post('pekerjaan')),
                'no_kk' => htmlentities($this->input->post('no_kk')),
                'nama_ayah' => htmlentities($this->input->post('nama_ayah')),
                'nama_ibu' => htmlentities($this->input->post('nama_ibu')),
                'alamat' => htmlentities($this->input->post('alamat')),
                'petugas' => htmlentities($this->input->post('petugas'))

            ];
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('sf_registrasi_pasien', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Data Berhasil Diubah</div>');
            redirect('surface/laboratorium');
        }
    }

    // ------------------------------------------------------------------------------------------

    public function Bayar($id)
    {

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['getDataPasienById'] = $this->Sf_Registrasi_Pasien_Model->getDataPasienById($id);

        $this->form_validation->set_rules('id', 'ID', 'required');
        $this->form_validation->set_rules('bayar', 'Bayar');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('surface/preview/preview_data', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id' => htmlentities($this->input->post('id')),
                'bayar' => htmlentities($this->input->post('bayar'))

            ];
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('sf_registrasi_pasien', $data);


            $in = $id;
            redirect(base_url() . "surface/preview_data/" . $in);
        }
    }

    public function hapus_data_registrasi_laboratorium($id)
    {
        $this->Sf_Registrasi_Pasien_Model->hapus_data_registrasi($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
       Data Berhasil Dihapus</div>');
        redirect('surface/laboratorium');
    }

    //-----------------------------------------------------------------------------------------------------

    public function Laboratorium()
    {
        $data['title'] = 'Laboratorium';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['hasil'] = $this->Sf_Registrasi_Pasien_Model->getDataPasienResult();
        // $data['getDataPasienrow'] = $this->Sf_Registrasi_Pasien_Model->getDataPasienrow();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('surface/Laboratorium', $data);
        $this->load->view('templates/footer');
    }

    //-----------------------------------------------------------------------------------------------------

    public function preview_data($id)
    {
        $data['title'] = 'Progress';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $data['getDataPasienById'] = $this->Sf_Registrasi_Pasien_Model->getDataPasienById($id);
        $data['getDataPemeriksaanResult'] = $this->Md_Data_Pemeriksaan_Model->getDataPemeriksaanResult();
        $data['getDataProgressResultWithID'] = $this->Sf_Progress_Model->getDataProgressResultWithID($id);
        $data['getDataPemeriksaanRowWitdId'] = $this->Sf_Progress_Model->getDataPemeriksaanRowWitdId($id);


        $this->form_validation->set_rules('id_registrasi', 'Registrasi', 'required');
        $this->form_validation->set_rules('progress_bidang', 'Bidang');
        $this->form_validation->set_rules('progress_nominal', 'Nominal');
        $this->form_validation->set_rules('progress_pemeriksaan', 'Pemeriksaan');
        $this->form_validation->set_rules('progress_satuan', 'Satuan');
        $this->form_validation->set_rules('progress_sub', 'Sub');
        $this->form_validation->set_rules('progress_tarif', 'Tarif');
        $this->form_validation->set_rules('progress_hasil', 'Hasil');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('surface/preview/preview_data', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id_registrasi' => htmlentities($this->input->post('id_registrasi')),
                'progress_bidang' => htmlentities($this->input->post('progress_bidang')),
                'progress_nominal' => htmlentities($this->input->post('progress_nominal')),
                'progress_pemeriksaan' => htmlentities($this->input->post('progress_pemeriksaan')),
                'progress_satuan' => htmlentities($this->input->post('progress_satuan')),
                'progress_sub' => htmlentities($this->input->post('progress_sub')),
                'progress_tarif' => htmlentities($this->input->post('progress_tarif')),
                'progress_hasil' => htmlentities($this->input->post('progress_hasil'))
            ];
            $this->db->insert('sf_progress_pemeriksaan', $data);

            $in = $id;
            redirect(base_url() . "surface/preview_data/" . $in);
        }
    }

   

    public function PDF($id)
    {
        $mpdf = new \Mpdf\Mpdf();
        $data['getDataProgressResultWithID'] =  $this->Sf_Progress_Model->getDataProgressResultWithID($id);
        $data['getDataPasienById'] =  $this->Sf_Registrasi_Pasien_Model->getDataPasienById($id);

        $data = $this->load->view('pdf/hasil', $data, TRUE);

        $mpdf->WriteHTML($data);
        $mpdf->Output('hasil_lab.pdf', \Mpdf\Output\Destination::INLINE);
    }

    // -----------------------------------------------------------------------------------------------------

    public function PDF_Kwitansi($id)
    {
        $mpdf = new \Mpdf\Mpdf();
        $data['getDataProgressResultWithID'] =  $this->Sf_Progress_Model->getDataProgressResultWithID($id);
        $data['getDataPasienById'] =  $this->Sf_Registrasi_Pasien_Model->getDataPasienById($id);
        $data['getDataPemeriksaanRowQueryWitdId'] =  $this->Sf_Progress_Model->getDataPemeriksaanRowQueryWitdId($id);
        // $data['getDataPemeriksaanRowQueryWitdId';
        // die;


        $data = $this->load->view('pdf/hasil_kwitansi', $data, TRUE);


        $mpdf->WriteHTML($data);
        $mpdf->Output('hasil_lab.pdf', \Mpdf\Output\Destination::INLINE);
    }

    // -----------------------------------------------------------------------------------------------------


    public function label($id)
    {
        $mpdf = new \Mpdf\Mpdf();
        $data['getDataProgressResultWithID'] =  $this->Sf_Progress_Model->getDataProgressResultWithID($id);
        $data['getDataPasienById'] =  $this->Sf_Registrasi_Pasien_Model->getDataPasienById($id);
        $data['getDataPemeriksaanRowQueryWitdId'] =  $this->Sf_Progress_Model->getDataPemeriksaanRowQueryWitdId($id);
        // $data['getDataPemeriksaanRowQueryWitdId';
        // die;


        $data = $this->load->view('pdf/label', $data, TRUE);


        $mpdf->WriteHTML($data);
        $mpdf->Output('label.pdf', \Mpdf\Output\Destination::INLINE);
    }

    // -----------------------------------------------------------------------------------------------------    

    public function Neo_station()
    {
        $data['title'] = 'Neo Station';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['hasil_registrasi'] = $this->Sf_Registrasi_Pasien_Model->getDataPasienResult();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('surface/neo-station', $data);
        $this->load->view('templates/footer');
    }

    //------------------------------------------------------------------------------------------------------

    public function tambah_data_perawat($id)
    {
        $data['title'] = 'Neo Station';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['tambah'] = $this->Sf_Registrasi_Pasien_Model->getDataPasienById($id);


        $this->form_validation->set_rules('id', 'ID', 'required');
        $this->form_validation->set_rules('tensi', 'Tensi');
        $this->form_validation->set_rules('bb', 'Bb');
        $this->form_validation->set_rules('tb', 'Tb');
        $this->form_validation->set_rules('suhu_tubuh', 'Suhu_tubuh');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('surface/tambah/tambah_data_perawat', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id' => htmlentities($this->input->post('id')),
                'tensi' => htmlentities($this->input->post('tensi')),
                'bb' => htmlentities($this->input->post('bb')),
                'tb' => htmlentities($this->input->post('tb')),
                'suhu_tubuh' => htmlentities($this->input->post('suhu_tubuh'))
            ];


            $this->db->where('id', $this->input->post('id'));
            $this->db->update('sf_registrasi_pasien', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data Berhasil Ditambahkan</div>');
            redirect('surface/neo_station');
        }
    }

    //------------------------------------------------------------------------------------------------------

    public function preview_perawat($id)
    {
        $data['title'] = 'Neo Station';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['getDataPasienById'] = $this->Sf_Registrasi_Pasien_Model->getDataPasienById($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('surface/preview/preview_perawat', $data);
        $this->load->view('templates/footer');
    }

    //------------------------------------------------------------------------------------------------------

    public function hapus_data_registrasi_neo_station($id)
    {
        $this->Sf_Registrasi_Pasien_Model->hapus_data_registrasi($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
       Data Berhasil Dihapus</div>');
        redirect('surface/neo_station');
    }

    // -----------------------------------------------------------------------------------------------------

    public function Dokter()
    {
        $data['title'] = 'Dokter';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['hasil_registrasi'] = $this->Sf_Registrasi_Pasien_Model->getDataPasienResult();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('surface/dokter', $data);
        $this->load->view('templates/footer');
    }

    // -----------------------------------------------------------------------------------------------------

    public function tambah_data_dokter($id)
    {
        $data['title'] = 'Dokter';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['tambah'] = $this->Sf_Registrasi_Pasien_Model->getDataPasienById($id);

        $this->form_validation->set_rules('id', 'ID', 'required');
        $this->form_validation->set_rules('keluhan', 'Keluhan');
        $this->form_validation->set_rules('jenis_penyakit', 'Jenis_Penyakit');
        $this->form_validation->set_rules('obat', 'Obat');
        $this->form_validation->set_rules('penanganan', 'Penanganan');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('surface/tambah/tambah_data_dokter', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id' => htmlentities($this->input->post('id')),
                'keluhan' => htmlentities($this->input->post('keluhan')),
                'jenis_penyakit' => htmlentities($this->input->post('jenis_penyakit')),
                'obat' => htmlentities($this->input->post('obat')),
                'penanganan' => htmlentities($this->input->post('penanganan')),
            ];


            $this->db->where('id', $this->input->post('id'));
            $this->db->update('sf_registrasi_pasien', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data Berhasil Ditambahkan</div>');
            redirect('surface/dokter');
        }
    }

    // -----------------------------------------------------------------------------------------------------



    public function preview_dokter($id)
    {
        $data['title'] = 'Dokter';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['getDataPasienById'] = $this->Sf_Registrasi_Pasien_Model->getDataPasienById($id);


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('surface/preview/preview_dokter', $data);
        $this->load->view('templates/footer');
    }

    // -----------------------------------------------------------------------------------------------------

    public function hapus_data_registrasi_dokter($id)
    {
        $this->Sf_Registrasi_Pasien_Model->hapus_data_registrasi($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
       Data Berhasil Dihapus</div>');
        redirect('surface/dokter');
    }

    //-----------------------------------------------------------------------------------------------------


    public function Myprofile()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('profile/index', $data);
        $this->load->view('templates/footer');
    }
    public function edit_profile()

    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('profile/edit_profile', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');

            //cek jika ada gambar yang akan di upload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }



            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Your Profile has been updated!</div>');
            redirect('surface/myprofile');
        }
    }

    public function change_Password()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[5]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[5]|matches[new_password1]');



        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('profile/change_password', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');

            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Wrong Current Password</div>');
                redirect('user/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                     New Password cannot be the same as current password</div>');
                    redirect('user/changepassword');
                } else {
                    //password sudah ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');


                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Password Changed</div>');
                    redirect('surface/myprofile');
                }
            }
        }
    }
}
