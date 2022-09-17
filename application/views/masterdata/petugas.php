<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('message'); ?>
    <div class="row">
        <div class="col-md-6 ">
            <table class="table table-hover text-center text-gray-900">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Petugas</th>
                        <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>#</td>
                        <td><?= $petugas['petugas']; ?></td>
                        <td><a href="" style="color: orange;" data-id="<?= $petugas['id']; ?>" data-toggle="modal" data-target="#TambahDataModal" data-placement="top" title="Ubah"> <i class="fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                            </a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>





    <!-- Modal -->
    <div class="modal fade" id="TambahDataModal" tabindex="-1" aria-labelledby="TambahDataModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="TambahDataModal">Ubah Petugas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="ubah_petugas/<?= $petugas['id']; ?>" method="post">
                    <input type="hidden" name="id" id="id" value="<?= $petugas['id']; ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="petugas">Petugas</label>
                            <input type="text" class="form-control" id="petugas" name="petugas" value="<?= $petugas['petugas']; ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Ubah</button>

                    </div>
                    <!-- <?php echo  form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash());  ?> -->
                </form>
            </div>

        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->