       <!-- Begin Page Content -->
       <div class="container-fluid">

           <!-- <div class="col-sm-9"> -->
           <!-- DataTales Example -->
           <!-- <div class="card shadow mb-4">
               <!-- Card Header - Dropdown -->
           <div class="card-header py-3 d-flex bg-gradient-primary flex-row align-items-center justify-content-between">
               <h6 class="m-0 font-weight-bold text-white"> UBAH DATA <b>PENGIRIM PASIEN</b> </h6>
           </div>

           <div class="card shadow mb-4">
               <form action="<?= base_url(); ?>masterdata/ubah_pengirim_pasien/<?= $pengirim['id']; ?>" method="post">
                   <div class="row">
                       <input type="hidden" name="id" id="id" value="<?= $pengirim['id']; ?>">

                       <!-- Nama Dokter -->
                       <div class="col-xl-5 col-md-6 mt-4 mb-4 ml-4 mr-2 ">
                           <div class="card border-left-primary shadow h-100 py-1">
                               <div class="card-body">
                                   <div class="row no-gutters align-items-center">
                                       <div class="col">
                                           <label for="nama_dokter" class="h5 mb-1 font-weight-bold text-gray-800">Nama Dokter</label>
                                           <input type="text" class="form-control" id="nama_dokter" name="nama_dokter" value="<?= $pengirim['nama_dokter']; ?>">
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <!-- Email -->
                       <div class="col-xl-5 col-md-6 mt-4 mb-4 ml-4 mr-2 ">
                           <div class="card border-left-primary shadow h-100 py-1">
                               <div class="card-body">
                                   <div class="row no-gutters align-items-center">
                                       <div class="col">
                                           <label for="email" class="h5 mb-1 font-weight-bold text-gray-800">Email</label>
                                           <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="<?= $pengirim['email']; ?>">
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>

                       <!-- Spesialis -->
                       <div class="col-xl-5 col-md-6 mt-4 mb-4 ml-4 mr-2 ">
                           <div class="card border-left-primary shadow h-100 py-1">
                               <div class="card-body">
                                   <div class="row no-gutters align-items-center">
                                       <div class="col">
                                           <label for="spesialis" class="h5 mb-1 font-weight-bold text-gray-800">Spesialis</label>
                                           <input type="text" class="form-control" id="spesialis" name="spesialis" aria-describedby="emailHelp" value="<?= $pengirim['spesialis']; ?>">
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>

                       <!-- Telepon -->
                       <div class="col-xl-5 col-md-6 mt-4 mb-4 ml-4 mr-2 ">
                           <div class="card border-left-primary shadow h-100 py-1">
                               <div class="card-body">
                                   <div class="row no-gutters align-items-center">
                                       <div class="col">
                                           <label for="telepon" class="h5 mb-1 font-weight-bold text-gray-800">Telepon</label>
                                           <input type="number" class="form-control" id="telepon" name="telepon" aria-describedby="emailHelp" value="<?= $pengirim['telepon']; ?>">
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>

                       <!-- Tanggal Lahir -->
                       <div class="col-xl-5 col-md-6 mt-4 mb-4 ml-4 mr-2 ">
                           <div class="card border-left-primary shadow h-100 py-1">
                               <div class="card-body">
                                   <div class="row no-gutters align-items-center">
                                       <div class="col">
                                           <label for="tgl_lahir" class="h5 mb-1 font-weight-bold text-gray-800">Tanggal Lahir</label>
                                           <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" aria-describedby="emailHelp" value="<?= $pengirim['tgl_lahir']; ?>">
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>

                       <!-- Alamat  -->
                       <div class="col-xl-5 col-md-6 mt-4 mb-4 ml-4 mr-2 ">
                           <div class="card border-left-primary shadow h-100 py-1">
                               <div class="card-body">
                                   <div class="row no-gutters align-items-center">
                                       <div class="col">
                                           <label for="alamat" class="h5 mb-1 font-weight-bold text-gray-800">Alamat</label>
                                           <input type="text" class="form-control" id="alamat" name="alamat" aria-describedby="emailHelp" value="<?= $pengirim['alamat']; ?>">
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>



                   </div> -->




                   <div class="mb-5">

                       <button type="submit" class="btn btn-primary ml-3">Ubah Data</button>
                   </div>

           </div>
           <?php echo  form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash());  ?>
           </form>

       </div>
       </div>

       </div>


       <!-- /.container-fluid -->

       </div>
       <!-- End of Main Content -->