     <!-- Main Content -->
     <div id="content">
         <!-- Begin Page Content -->
         <div class="container-fluid">

             <div class="row">

                 <!-- Area Chart -->
                 <div class="col-xl-12 col-lg-12">
                     <div class="card shadow mb-4 ">
                         <!-- Card Header - Dropdown -->
                         <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                             <h6 class="m-0 font-weight-bold text-primary">DATA REKAM MEDIS PASIEN : <?= $getDataPasienById['rm']; ?></h6>

                         </div>
                         <!-- Card Body -->
                         <div class="card-body">
                             <table class="table table-borderless text-gray-900">
                                 <thead>
                                     <tr>
                                         <td>Kode Registrasi</td>
                                         <td><?= $getDataPasienById['rm']; ?></td>
                                         <td>Tanggal Registrasi</td>
                                         <td><?= $getDataPasienById['tgl_registrasi']; ?></td>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <tr>
                                         <td>Nama Pasien</td>
                                         <td><?= $getDataPasienById['nama_pasien']; ?></td>
                                         <td>Dokter Pengirim</td>
                                         <td><?= $getDataPasienById['dokter_pengirim']; ?></td>
                                     </tr>
                                     <tr>
                                         <td>Kategori Pasien</td>
                                         <td><?= $getDataPasienById['kategori_pasien']; ?></td>
                                         <td>Alamat</td>
                                         <td><?= $getDataPasienById['alamat']; ?></td>
                                     </tr>
                                     <tr>
                                         <td>Jenis Kelamin</td>
                                         <td><?= $getDataPasienById['jenis_kelamin']; ?></td>
                                         <td>Golongan Darah</td>
                                         <td><?= $getDataPasienById['golongan_darah']; ?></td>
                                     </tr>
                                 </tbody>
                             </table>
                         </div>
                     </div>
                 </div>





                 <!-- ----------------------------------- FORM INPUT PEMERIKSAAN ------------------------------------------   -->

                 <div class="col-xl-12 col-lg-12">
                     <div class="card shadow mb-4">
                         <!-- Card Header - Dropdown -->
                         <div class="card-header py-3 d-flex bg-gradient-primary flex-row align-items-center justify-content-between">
                             <h6 class="m-0 font-weight-bold text-white">FORM INPUT PEMERIKSAAN</h6>
                         </div>
                         <!-- Card Body -->
                         <div class="card-body">
                             <?php if ($getDataPasienById['bayar'] == 'b') : ?>
                                 <div></div>
                             <?php else : ?>
                                 <form action="<?= base_url(''); ?>surface/preview_data/<?= $getDataPasienById['id']; ?>" method="post">
                                     <input type="hidden" name="id_registrasi" value="<?= $getDataPasienById['id']; ?>" id="">
                                     <table class="table table-borderless text-gray-900">
                                         <thead>
                                             <tr>
                                                 <td>Bidang Periksa</td>
                                                 <td><input type="text" class="form-control bg-grey border-1 small" name="progress_bidang" id="id_bidang" readonly></td>
                                                 <td><a href="" class="btn btn-primary tampilModalPilih" data-toggle="modal" data-target=".bd-example-modal-lg">Pilih <i class="fa fa-search" aria-hidden="true"></i>
                                                     </a></td>
                                                 <td>Tarif</td>
                                                 <td><input type="number" class="form-control bg-grey border-1 small" id="id_tarif" name="progress_tarif" readonly></td>
                                             </tr>
                                         </thead>
                                         <tbody>
                                             <tr>
                                                 <td>Pemeriksaan</td>
                                                 <td colspan="2"><input type="text" class="form-control bg-grey border-1 small" name="progress_pemeriksaan" id="id_pemeriksaan" readonly></td>
                                                 <td>Satuan</td>
                                                 <td><input type="text" class="form-control bg-grey border-1 small" name="progress_satuan" id="id_satuan" readonly></td>
                                             </tr>
                                             <tr>
                                                 <td>Sub Periksa</td>
                                                 <td colspan="2"><input type="text" class="form-control bg-grey border-1 small" name="progress_sub" id="id_sub" readonly></td>
                                                 <td>Nilai Nominal</td>
                                                 <td><input type="text" class="form-control bg-grey border-1 small" id="id_nominal" name="progress_nominal" readonly></td>
                                             </tr>
                                             <tr>
                                                 <td>Hasil pemeriksaan</td>
                                                 <td colspan="2"><input type="text" id="inputku" name="progress_hasil" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" class="form-control bg-grey border-1 small" autocomplete="off"></td>
                                                 <td><button class="btn btn-primary">Tambahkan</button></td>
                                                 <td></td>
                                             </tr>
                                         </tbody>
                                     </table>
                                 </form>
                             <?php endif; ?>
                             <!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

                             <!-- MODAL -->


                             <div class="modal fade bd-example-modal-lg " id="modal_item" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                 <div class="modal-dialog modal-lg">
                                     <div class="modal-content">

                                         <div class="modal-body">
                                             <table class="table table-hover text-gray-900" id="dataTable">
                                                 <thead>
                                                     <tr>
                                                         <th>Aksi</th>
                                                         <th>Bidang</th>
                                                         <th>Pemeriksaan</th>
                                                         <th>Sub</th>
                                                         <th>Nominal</th>
                                                     </tr>
                                                 </thead>
                                                 <tbody>
                                                     <?php foreach ($getDataPemeriksaanResult as $s) : ?>
                                                         <tr>
                                                             <td scope="row"><button type="" class="btn btn-primary" id="select" data-id="<?= $s['id']; ?>" data-bidang="<?= $s['bidang']; ?>" data-pemeriksaan='<?= $s['data_pemeriksaan']; ?>' data-sub='<?= $s['sub_pemeriksaan']; ?>' data-nominal='<?= $s['nominal']; ?>' data-satuan='<?= $s['satuan']; ?>' data-tarif='<?= $s['tarif']; ?>'> Pilih </b utton></td>
                                                             <td><?= $s['bidang']; ?></td>
                                                             <td><?= $s['data_pemeriksaan']; ?></td>
                                                             <td><?= $s['sub_pemeriksaan']; ?></td>
                                                             <td><?= $s['nominal']; ?><?= $s['satuan']; ?></td>
                                                         </tr>
                                                     <?php endforeach; ?>
                                                 </tbody>
                                             </table>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>

                 <br> <br> <br>
             </div>
             <!-- /.container-fluid -->
         </div>
         <!-- End of Main Content -->


         <!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->


         <!-- Begin Page Content -->
         <div class="container-fluid">

             <!-- Page Heading -->

             <?= $this->session->flashdata('message'); ?>
             <!-- DataTales Example -->
             <div class="card shadow mb-4">
                 <div class="card-header py-3 d-flex bg-gradient-primary flex-row align-items-center justify-content-between">
                     <h6 class="m-0 font-weight-bold text-white">DETAIL HASIL PEMERIKSAAN</h6>
                 </div>
                 <div class="card-body ">
                     <div class="row mb-2 ml-1">
                         <?php if ($getDataPasienById['bayar'] == 'a') : ?>
                             <form action="<?= base_url(); ?>surface/bayar/<?= $getDataPasienById['id']; ?>" method="POST">
                                 <input type="hidden" name="id" value="<?= $getDataPasienById['id']; ?>" id="">
                                 <button for="bayar" class="btn btn-danger mr-2" name="bayar" value="b">BAYAR<i class="fas fa-credit-card"></i></button>
                             </form>
                         <?php else : ?>

                             <a href="<?= base_url(''); ?>surface/pdf/<?= $getDataPasienById['id']; ?>" class="btn btn-primary mr-2" target="_blank"> <i class="fas fa-file-pdf"></i> Cetak Hasil Laboratorium</a>
                             <a href="https://wa.me/<?= $getDataPasienById['nomor_hp']; ?>?text=Isi Pesan" target="_blank" class="btn btn-success mr-2"> <i class="fab fa-whatsapp"></i> Share Wa Pasien</a>
                             <!-- <div><a href="https://wa.me/+6285735501035?text=Isi Pesan" target="_blank" class="btn btn-success mr-2"> <i class="fab fa-whatsapp"></i> Share Wa Dokter</a></div> -->
                             <a href="<?= base_url(''); ?>/surface/pdf_kwitansi/<?= $getDataPasienById['id']; ?>" class="btn btn-primary " target="_blank"> <i class="fas fa-file-pdf"></i> Cetak Kwitansi</a>
                             <!-- &nbsp;&nbsp; <a href="<?= base_url(''); ?>/surface/label/<?= $getDataPasienById['id']; ?>" class="btn btn-primary " target="_blank"> <i class="fas fa-file-pdf"></i> Req Pak Eko</a> -->
                             &nbsp;&nbsp; <a href="" class="btn btn-primary " target="_blank"> <i class="fas fa-file-pdf"></i> Req Pak Eko</a>

                         <?php endif; ?>
                     </div>
                     <div class="table-responsive">
                         <table class="table table-bordered text-gray-900" id="dataTable" width="100%" cellspacing="">
                             <thead>
                                 <tr>
                                     <th>No</th>
                                     <th>Bidang Periksa</th>
                                     <th>Pemeriksaan</th>
                                     <th>Sub Periksa</th>
                                     <th>Hasil Pemeriksaan</th>
                                     <th>Nilai Nominal</th>
                                     <th>Tarif</th>
                                 </tr>
                             </thead>
                             <tfoot>
                                 <tr>
                                     <th>No</th>
                                     <th>Bidang Periksa</th>
                                     <th>Pemeriksaan</th>
                                     <th>Sub Periksa</th>
                                     <th>Hasil Pemeriksaan</th>
                                     <th>Nilai Nominal</th>
                                     <th>Tarif</th>
                                 </tr>
                             </tfoot>
                             <tbody>
                                 <?php $i = 1; ?>
                                 <?php foreach ($getDataProgressResultWithID as $row) : ?>
                                     <tr>
                                         <td><?= $i++; ?></td>
                                         <td><?= $row['progress_bidang']; ?></td>
                                         <td><?= $row['progress_pemeriksaan']; ?></td>
                                         <td><?= $row['progress_sub']; ?></td>
                                         <td><?= $row['progress_hasil']; ?></td>
                                         <td><?= $row['progress_nominal']; ?></td>
                                         <td><?= $row['progress_tarif']; ?></td>
                                     </tr>
                                 <?php endforeach; ?>
                             </tbody>
                         </table>
                     </div>
                 </div>
             </div>

             <!-- End of fluid -->
         </div>
     </div>

     </div>
     <!-- End of Main Content -->