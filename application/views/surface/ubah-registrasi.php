       <!-- Begin Page Content -->
       <div class="container-fluid">

           <!-- Page Heading -->
           <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
           <?= $this->session->flashdata('message'); ?>
           <!-- DataTales Example -->
           <div class="card shadow mb-4">
               <form action="surface/ubah_data/<?= $pasien['id']; ?>" method="post">
                   <div class="row">
                       <input type="hidden" name="id" id="id" value="<?= $pasien['id']; ?>">

                       <!-- KODE REGISTRASI -->
                       <div class="col-xl-5 col-md-6 mt-4 mb-4 ml-4 mr-2 ">
                           <div class="card border-left-primary shadow h-100 py-1">
                               <div class="card-body">
                                   <div class="row no-gutters align-items-center">
                                       <div class="col">
                                           <label for="rm" class="h5 mb-1 font-weight-bold text-gray-800">Kode Rekam Medis</label>
                                           <input type="text" name="rm" class="form-control datepicker bg-grey border-1 small" value="<?= $pasien['rm']; ?>">
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>

                       <!-- TGL REGISTRASI -->
                       <div class="col-xl-6 col-md-5 mt-4 mb-4 ml-2 mr-2">
                           <div class="card border-left-primary shadow h-100 py-1">
                               <div class="card-body">
                                   <div class="row no-gutters align-items-center">
                                       <div class="col">
                                           <label for="tgl_registrasi" class="h5 mb-1 font-weight-bold text-gray-800">Tanggal Registrasi</label>
                                           <input type="text" name="tgl_registrasi" class="form-control datepicker bg-grey border-1 small" value="<?= date('d F Y'); ?>" readonly>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>


                       <!-- NAMA PASIEN -->
                       <div class="col-xl-5 col-md-6 mt-4 mb-4 ml-4  ">
                           <div class="card border-left-primary shadow h-100 py-1">
                               <div class="card-body">
                                   <div class="row no-gutters align-items-center">
                                       <div class="col">
                                           <label for="nama_pasien" class="h5 mb-1 font-weight-bold text-gray-800">Nama Pasien</label>
                                           <input type="text" name="nama_pasien" class="form-control datepicker bg-grey border-1 small" value="<?= $pasien['nama_pasien']; ?>">
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>

                       <!-- KATEGORI PASIEN -->
                       <div class="col-xl-6 col-md-5 mt-4 mb-4 ml-3 mr-2">
                           <div class="card border-left-primary shadow h-100 py-1">
                               <div class="card-body">
                                   <div class="row no-gutters align-items-center">
                                       <div class="col">
                                           <div class="form-group">
                                               <label for="kategori_pasien" class="h5 mb-1 font-weight-bold text-gray-800">Kategori Pasien</label>
                                               <select id="kategori_pasien" name="kategori_pasien" class="form-control">
                                                   <option value="<?= $pasien['kategori_pasien']; ?>"><?= $pasien['kategori_pasien']; ?></option>
                                                   <?php foreach ($kategori as $k) : ?>
                                                       <option value="<?= $k['kategori']; ?>"><?= $k['kategori']; ?></option>
                                                   <?php endforeach; ?>
                                               </select>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>


                       <!-- DOKTER PENGIRIM -->
                       <div class="col-xl-5 col-md-5 mt-4 mb-4 ml-4 ">
                           <div class="card border-left-primary shadow h-100 py-1">
                               <div class="card-body">
                                   <div class="row no-gutters align-items-center">
                                       <div class="col">
                                           <div class="form-group">
                                               <label for="dokter_pengirim" class="h5 mb-1 font-weight-bold text-gray-800">Dokter Pengirim</label>
                                               <select id="dokter_pengirim" name="dokter_pengirim" class="form-control">
                                                   <option value="<?= $pasien['dokter_pengirim']; ?>"><?= $pasien['dokter_pengirim']; ?></option>
                                                   <?php foreach ($dokter as $d) : ?>
                                                       <option <?= $d['nama_dokter']; ?>><?= $d['nama_dokter']; ?></option>
                                                   <?php endforeach; ?>
                                               </select>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>

                       <!-- JENIS KELAMIN -->
                       <div class="col-xl-6 col-md-5 mt-4 mb-4 ml-3 mr-2">
                           <div class="card border-left-primary shadow h-100 py-1">
                               <div class="card-body">
                                   <div class="row no-gutters align-items-center">
                                       <div class="col">
                                           <div class="form-group">
                                               <label for="jenis_kelamin" class="h5 mb-1 font-weight-bold text-gray-800">Jenis Kelamin</label>
                                               <select id="jenis_kelamin" name="jenis_kelamin" class="form-control">
                                                   <option value="<?= $pasien['jenis_kelamin']; ?>"><?= $pasien['jenis_kelamin']; ?></option>
                                                   <option value="Laki-Laki">Laki-Laki</option>
                                                   <option value="Perempuan">Perempuan</option>
                                               </select>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>


                       <!-- GOLONGAN DARAH -->
                       <div class="col-xl-5 col-md-5 mt-4 mb-4 ml-4 ">
                           <div class="card border-left-primary shadow h-100 py-1">
                               <div class="card-body">
                                   <div class="row no-gutters align-items-center">
                                       <div class="col">
                                           <div class="form-group">
                                               <label for="golongan_darah" class="h5 mb-1 font-weight-bold text-gray-800">Golongan Darah</label>
                                               <select id="golongan_darah" name="golongan_darah" class="form-control">
                                                   <option value="<?= $pasien['golongan_darah']; ?>"><?= $pasien['golongan_darah']; ?></option>
                                                   <option value="O">O</option>
                                                   <option value="A">A</option>
                                                   <option value="B">B</option>
                                                   <option value="AB">AB</option>
                                               </select>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>

                       <!-- TANGGAL LAHIR -->
                       <div class="col-xl-6 col-md-5 mt-4 mb-4 ml-2 mr-2">
                           <div class="card border-left-primary shadow h-100 py-1">
                               <div class="card-body">
                                   <div class="row no-gutters align-items-center">
                                       <div class="col">
                                           <label for="tgl_lahir" class="h5 mb-1 font-weight-bold text-gray-800">Tanggal Lahir</label>
                                           <input type="date" id="tgl_lahir" name="tgl_lahir" class="form-control datepicker bg-grey border-1 small" value="<?= $pasien['tgl_lahir']; ?>">
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>


                       <!-- STATUS -->
                       <div class="col-xl-5 col-md-5 mt-4 mb-4 ml-4 ">
                           <div class="card border-left-primary shadow h-100 py-1">
                               <div class="card-body">
                                   <div class="row no-gutters align-items-center">
                                       <div class="col">
                                           <div class="form-group">
                                               <label for="status" class="h5 mb-1 font-weight-bold text-gray-800">Status</label>
                                               <select id="status" name="status" class="form-control">
                                                   <option value="<?= $pasien['status']; ?>"><?= $pasien['status']; ?></option>
                                                   <option value="Belum Menikah">Belum Menikah</option>
                                                   <option value="Sudah Menikah">Sudah Menikah</option>
                                               </select>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>

                       <!-- Nomor HP -->
                       <div class="col-xl-6 col-md-5 mt-4 mb-4 ml-2 mr-2">
                           <div class="card border-left-primary shadow h-100 py-1">
                               <div class="card-body">
                                   <div class="row no-gutters align-items-center">
                                       <div class="col">
                                           <label for="nomor_hp" class="h5 mb-1 font-weight-bold text-gray-800">Nomor HP / Telepon</label>
                                           <input type="text" id="nomor_hp" name="nomor_hp" class="form-control datepicker bg-grey border-1 small" value="<?= $pasien['nomor_hp']; ?>">
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>


                       <!-- Pekerjaan -->
                       <div class="col-xl-5 col-md-6 mt-4 mb-4 ml-4 mr-2 ">
                           <div class="card border-left-primary shadow h-100 py-1">
                               <div class="card-body">
                                   <div class="row no-gutters align-items-center">
                                       <div class="col">
                                           <label for="pekerjaan" class="h5 mb-1 font-weight-bold text-gray-800">Pekerjaan</label>
                                           <input type="text" id="pekerjaan" name="pekerjaan" class="form-control datepicker bg-grey border-1 small" value="<?= $pasien['pekerjaan']; ?>">
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>

                       <!-- No KK -->
                       <div class="col-xl-6 col-md-5 mt-4 mb-4 ml-2 mr-2">
                           <div class="card border-left-primary shadow h-100 py-1">
                               <div class="card-body">
                                   <div class="row no-gutters align-items-center">
                                       <div class="col">
                                           <label for="no_kk" class="h5 mb-1 font-weight-bold text-gray-800">Nomor Kartu Keluarga</label>
                                           <input type="text" id="no_kk" name="no_kk" class="form-control datepicker bg-grey border-1 small" value="<?= $pasien['no_kk']; ?>">
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>


                       <!-- NAMA AYAH -->
                       <div class="col-xl-5 col-md-6 mt-4 mb-4 ml-4 mr-2 ">
                           <div class="card border-left-primary shadow h-100 py-1">
                               <div class="card-body">
                                   <div class="row no-gutters align-items-center">
                                       <div class="col">
                                           <label for="nama_ayah" class="h5 mb-1 font-weight-bold text-gray-800">Nama Ayah</label>
                                           <input type="text" id="nama_ayah" name="nama_ayah" class="form-control datepicker bg-grey border-1 small" value="<?= $pasien['nama_ayah']; ?>">
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>

                       <!-- NAMA IBU -->
                       <div class="col-xl-6 col-md-5 mt-4 mb-4 ml-2 mr-2">
                           <div class="card border-left-primary shadow h-100 py-1">
                               <div class="card-body">
                                   <div class="row no-gutters align-items-center">
                                       <div class="col">
                                           <label for="nama_ibu" class="h5 mb-1 font-weight-bold text-gray-800">Nama Ibu</label>
                                           <input type="text" id="nama_ibu" name="nama_ibu" class="form-control datepicker bg-grey border-1 small" value="<?= $pasien['nama_ibu']; ?>">
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>


                       <!-- ALAMAT -->
                       <div class="col-xl-5 col-md-6 mt-4 mb-4 ml-4 mr-2 ">
                           <div class="card border-left-primary shadow h-100 py-1">
                               <div class="card-body">
                                   <div class="row no-gutters align-items-center">
                                       <div class="col">
                                           <label for="alamat" class="h5 mb-1 font-weight-bold text-gray-800">Alamat</label>
                                           <input type="text" id="alamat" name="alamat" class="form-control datepicker bg-grey border-1 small" value="<?= $pasien['alamat']; ?>">
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>

                       <!-- PETUGAS -->
                       <div class="col-xl-6 col-md-5 mt-4 mb-4 ml-2 mr-2">
                           <div class="card border-left-primary shadow h-100 py-1">
                               <div class="card-body">
                                   <div class="row no-gutters align-items-center">
                                       <div class="col">
                                           <label for="petugas" class="h5 mb-1 font-weight-bold text-gray-800">Petugas</label>
                                           <input type="text" id="petugas" name="petugas" class="form-control datepicker bg-grey border-1 small" value="<?= $petugas['petugas']; ?>" readonly>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>



                       <div class="mb-5">
                           <a href="<?= base_url('surface/laboratorium'); ?>" class="btn btn-light btn-icon-split ml-5">
                               <span class="icon text-gray-600">
                                   <i class="fas fa-arrow-left"></i>
                               </span>
                               <span class="text">Back</span>
                           </a>
                           <button type="submit" class="btn btn-primary ml-3">Ubah Data</button>
                       </div>

                   </div>

               </form>

           </div>












       </div>
       <!-- /.container-fluid -->

       </div>
       <!-- End of Main Content -->