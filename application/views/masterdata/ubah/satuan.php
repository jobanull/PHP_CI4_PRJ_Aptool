       <!-- Begin Page Content -->
       <div class="container-fluid">

           <!-- <div class="col-sm-9"> -->
           <!-- DataTales Example -->
           <div class="card shadow mb-4">
               <!-- Card Header - Dropdown -->
               <div class="card-header py-3 d-flex bg-gradient-primary flex-row align-items-center justify-content-between">
                   <h6 class="m-0 font-weight-bold text-white"> UBAH DATA <b>SATUAN PEMERIKSAAN</b> </h6>
               </div>

               <div class="col-sm-12">
                   <form action="<?= base_url(); ?>/masterdata/ubah_satuan/<?= $satuan['id']; ?>" method="post">

                       <input type="hidden" name="id" id="id" value="<?= $satuan['id']; ?>">
                       <div class="modal-body text-gray-900">
                           <div class="form-group">
                               <div class="col-xl-5 col-md-6 mt-4 mb-4  mr-2 ">
                                   <div class="card border-left-primary shadow h-100 py-1">
                                       <div class="card-body">
                                           <div class="row no-gutters align-items-center">
                                               <div class="col">
                                                   <label for="satuan" class="h5 mb-1 font-weight-bold text-gray-800">Satuan Pemeriksaan</label>
                                                   <input type="text" class="form-control" id="satuan" name="satuan" value="<?= $satuan['satuan']; ?>">
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                                   <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Save changes</button>
                               </div>
                           </div>


                           <?php echo  form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash());  ?>
                   </form>
               </div>
               <!-- </div> -->
           </div>
       </div>

       </div>


       <!-- /.container-fluid -->

       </div>
       <!-- End of Main Content -->