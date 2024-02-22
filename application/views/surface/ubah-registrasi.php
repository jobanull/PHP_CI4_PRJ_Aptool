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