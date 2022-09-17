       <!-- Begin Page Content -->
       <div class="container-fluid">

           <!-- <div class="col-sm-9"> -->
           <!-- DataTales Example -->
           <div class="card shadow mb-4">
               <!-- Card Header - Dropdown -->
               <div class="card-header py-3 d-flex bg-gradient-primary flex-row align-items-center justify-content-between">
                   <h6 class="m-0 font-weight-bold text-white"> UBAH DATA <b>KATEGORI PASIEN</b> </h6>
               </div>

               <div class="col-sm-12">
                   <form action="<?= base_url(); ?>/masterdata/ubah_kategori_pasien/<?= $kategori['id']; ?>" method="post">

                       <input type="hidden" name="id" id="id" value="<?= $kategori['id']; ?>">
                       <div class="modal-body text-gray-900">
                           <div class="form-group">
                               <div class="col-xl-5 col-md-6 mt-4 mb-4  mr-2 ">
                                   <div class="card border-left-primary shadow h-100 py-1">
                                       <div class="card-body">
                                           <div class="row no-gutters align-items-center">
                                               <div class="col">
                                                   <label for="kategori" class="h5 mb-1 font-weight-bold text-gray-800">Kategori Pasien</label>
                                                   <input type="text" class="form-control" id="kategori" name="kategori" value="<?= $kategori['kategori']; ?>">
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

               <!-- Alamat  -->

               <!-- </div> -->
           </div>
       </div>

       </div>


       <!-- /.container-fluid -->

       </div>
       <!-- End of Main Content -->