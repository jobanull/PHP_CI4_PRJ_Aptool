       <!-- Begin Page Content -->
       <div class="container-fluid">


           <!-- DataTales Example -->
           <div class="card shadow mb-4">
               <!-- Card Header - Dropdown -->
               <div class="card-header py-3 d-flex bg-gradient-primary flex-row align-items-center justify-content-between">
                   <h6 class="m-0 font-weight-bold text-white">FORM <b> DOKTER</b> </h6>
               </div>
               <div class="card-header py-3">
                   <?= $this->session->flashdata('message'); ?>
               </div>
               <div class="card-body">
                   <div class="">
                       <table class="table table-bordered text-center text-gray-900" id="dataTable" width="100%" cellspacing="">
                           <thead class="bg-gray-200">
                               <tr>
                                   <th>No</th>
                                   <th>No RM</th>
                                   <th>Pasien</th>
                                   <th>Keluhan</th>
                                   <th>Jenis Penyakit</th>
                                   <th>Obat / Rujukan</th>
                                   <th>Penanganan</th>
                                   <th>Aksi</th>
                               </tr>
                           </thead>
                           <tfoot class="bg-gray-200">
                               <tr>
                                   <th>No</th>
                                   <th>No RM</th>
                                   <th>Pasien</th>
                                   <th>Keluhan</th>
                                   <th>Jenis Penyakit</th>
                                   <th>Obat / Rujukan</th>
                                   <th>Penanganan</th>
                                   <th>Aksi</th>
                               </tr>
                           </tfoot>
                           <tbody>
                               <?php $query = "SELECT * FROM `sf_registrasi_pasien` ORDER BY id DESC ";
                                $hasil = $this->db->query($query)->result_array();
                                ?>

                               <?php $no = 1; ?>
                               <?php foreach ($hasil as $row) : ?>
                                   <?php if ($row['kategori_pasien'] == null) : ?>
                                   <?php else : ?>
                                       <tr>
                                           <td><?= $no++; ?></td>
                                           <td><?= $row['rm']; ?></td>
                                           <td><?= $row['nama_pasien']; ?></td>
                                           <td><?= $row['keluhan']; ?></td>
                                           <td><?= $row['jenis_penyakit']; ?></td>
                                           <td><?= $row['obat']; ?></td>
                                           <td><?= $row['penanganan']; ?></td>
                                           <td style="text-align:center;">
                                               <a href="<?= base_url(); ?>surface/preview_dokter/<?= $row['id']; ?>" style="color: light-blue;" data-toggle="tooltip" data-placement="top" title="Info"><i class="fas fa-fw fa-info" aria-hidden="true"></i>
                                               </a> &nbsp;
                                               <a href="<?= base_url(); ?>surface/tambah_data_dokter/<?= $row['id']; ?>" style="color: orange;" data-toggle="tooltip" data-placement="top" title="Tambah Data"><i class="fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                                               </a> &nbsp;
                                               <a href="<?= base_url(); ?>/surface/hapus_data_registrasi_dokter/<?= $row['id']; ?>" style="color: red;" onclick="return confirm('apakah anda yakin?');" data-toggle="tooltip" data-placement="top" title="Delete"> <i class="fas fa-trash"></i>
                                               </a>
                                           </td>
                                       </tr>
                                   <?php endif; ?>
                               <?php endforeach; ?>

                           </tbody>
                       </table>
                   </div>
               </div>
           </div>

           <!-- End of fluid -->
       </div>


       </div>
       <!-- End of Main Content -->