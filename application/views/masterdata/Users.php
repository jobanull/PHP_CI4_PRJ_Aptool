       <!-- Begin Page Content -->
       <div class="container-fluid">

           <!-- DataTales Example -->
           <div class="card shadow mb-4">
               <!-- Card Header - Dropdown -->
               <div class="card-header py-3 d-flex bg-gradient-primary flex-row align-items-center justify-content-between">
                   <h6 class="m-0 font-weight-bold text-white">DATA <b> USERS </b> </h6>
               </div>
               <div class="card-header py-3">
                   <?= $this->session->flashdata('message'); ?>
                   <!-- <h6 class="text-gray-900">1 = Admin &nbsp; 2 = Member &nbsp; 3 = Author</h6> -->
               </div>
               <div class="card-body">
                   <div class="table-responsive">
                       <table class="table table-bordered text-center text-gray-900" id="dataTable" width="100%" cellspacing="">
                           <thead class="bg-gray-200">
                               <tr>
                                   <th>No</th>
                                   <th>Name User</th>
                                   <th>Email</th>
                                   <th>Akses</th>
                               </tr>
                           </thead>
                           <tfoot class="bg-gray-200">
                               <tr>
                                   <th>No</th>
                                   <th>Name User</th>
                                   <th>Email</th>
                                   <th>Akses</th>
                               </tr>
                           </tfoot>
                           <tbody>
                               <?php $no = 1; ?>
                               <?php foreach ($users as $row) :   ?>
                                   <tr>
                                       <td><?= $no++; ?></td>
                                       <td><?= $row['name']; ?></td>
                                       <td><?= $row['email']; ?></td>
                                       <td>User</td>
                                   </tr>
                               <?php endforeach; ?>
                           </tbody>
                       </table>
                   </div>
               </div>
           </div>
       </div>




       <!-- /.container-fluid -->

       </div>
       <!-- End of Main Content -->