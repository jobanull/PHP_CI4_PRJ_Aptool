       <!-- Begin Page Content -->
       <div class="container-fluid">

           <!-- <div class="col-sm-9"> -->
           <!-- DataTales Example -->
           <!-- Card Header - Dropdown -->
           <div class="card-header py-3 d-flex bg-gradient-primary flex-row align-items-center justify-content-between">
               <h6 class="m-0 font-weight-bold text-white"> UBAH DATA <b>BIDANG PEMERIKSAAN</b> </h6>
           </div>

           <div class="card shadow mb-4">
               <div class="col-sm-12 mb-10">
                   <form action="<?= base_url(); ?>/masterdata/ubah_alat_ukur/<?= $pemeriksaan['id']; ?>" method="post">

                       <div class="row">
                           <input type="hidden" name="id" id="id" value="<?= $pemeriksaan['id']; ?>">


                           <!-- Bidang -->
                           <div class="col-xl-5 col-md-6 mt-4 mb-4 ml-4 mr-2 ">
                               <div class="card border-left-primary shadow h-100 py-1">
                                   <div class="card-body">
                                       <div class="row no-gutters align-items-center">
                                           <div class="col">
                                               <label for="bidang" class="h5 mb-1 font-weight-bold text-gray-800">Bidang Pemeriksaan</label>
                                               <input type="text" class="form-control" id="bidang" name="bidang" value="<?= $pemeriksaan['bidang']; ?>">
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>

                           <!-- Data Pemeriksaan -->
                           <div class="col-xl-5 col-md-6 mt-4 mb-4 ml-4 mr-2 ">
                               <div class="card border-left-primary shadow h-100 py-1">
                                   <div class="card-body">
                                       <div class="row no-gutters align-items-center">
                                           <div class="col">
                                               <label for="data_pemeriksaan" class="h5 mb-1 font-weight-bold text-gray-800">Data Pemeriksaan</label>
                                               <input type="text" class="form-control" id="data_pemeriksaan" name="data_pemeriksaan" value="<?= $pemeriksaan['data_pemeriksaan']; ?>">
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>

                           <!-- Sub Pemeriksaan -->
                           <div class="col-xl-5 col-md-6 mt-4 mb-4 ml-4 mr-2 ">
                               <div class="card border-left-primary shadow h-100 py-1">
                                   <div class="card-body">
                                       <div class="row no-gutters align-items-center">
                                           <div class="col">
                                               <label for="sub_pemeriksaan" class="h5 mb-1 font-weight-bold text-gray-800">Sub Pemeriksaan</label>
                                               <input type="text" class="form-control" id="sub_pemeriksaan" name="sub_pemeriksaan" value="<?= $pemeriksaan['sub_pemeriksaan']; ?>">
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>

                           <!-- Nominal -->
                           <div class="col-xl-5 col-md-6 mt-4 mb-4 ml-4 mr-2 ">
                               <div class="card border-left-primary shadow h-100 py-1">
                                   <div class="card-body">
                                       <div class="row no-gutters align-items-center">
                                           <div class="col">
                                               <label for="nominal" class="h5 mb-1 font-weight-bold text-gray-800">Nominal</label>
                                               <input type="text" class="form-control" id="nominal" name="nominal" value="<?= $pemeriksaan['nominal']; ?>">
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>

                           <!-- Tarif -->
                           <div class="col-xl-5 col-md-6 mt-4 mb-4 ml-4 mr-2 ">
                               <div class="card border-left-primary shadow h-100 py-1">
                                   <div class="card-body">
                                       <div class="row no-gutters align-items-center">
                                           <div class="col">
                                               <label for="tarif" class="h5 mb-1 font-weight-bold text-gray-800">Tarif</label>
                                               <input type="text" class="form-control" id="tarif" name="tarif" value="<?= $pemeriksaan['tarif']; ?>">
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>

                           <!-- Satuan -->
                           <div class="col-xl-5 col-md-6 mt-4 mb-4 ml-4 mr-2 ">
                               <div class="card border-left-primary shadow h-100 py-1">
                                   <div class="card-body">
                                       <div class="row no-gutters align-items-center">
                                           <div class="col">
                                               <label for="satuan" class="h5 mb-1 font-weight-bold text-gray-800">Satuan</label>
                                               <input type="text" class="form-control" id="satuan" name="satuan" value="<?= $pemeriksaan['satuan']; ?>">
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <button type="submit" class="btn btn-primary" style="margin-bottom: 10px; margin-left: 30px;">Save changes</button>

                       <?php echo  form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash());  ?>
                   </form>
               </div>


               <!-- </div> -->
           </div>
       </div>



       <!-- /.container-fluid -->

       </div>
       <!-- End of Main Content -->