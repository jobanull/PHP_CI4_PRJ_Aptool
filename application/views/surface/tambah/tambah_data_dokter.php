<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 mt-4 text-gray-800"></h1>


    <div class="row ">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-header h2 text-gray-900 text-center">
                    <p>Tambah Data Form <?= $title; ?></p>
                </div>
                <div class="card-body mx-auto">
                    <div class="card" style="width: 30rem;">
                        <form action="<?= base_url(); ?>/surface/tambah_data_dokter/<?= $tambah['id']; ?>" method="post">
                            <input type="hidden" name="id" id="id" value="<?= $tambah['id']; ?>">
                            <div class="modal-body text-gray-900">
                                <div class="form-group">
                                    <label for="keluhan">Keluhan</label>
                                    <input type="text" class="form-control" id="keluhan" name="keluhan" value="<?= $tambah['keluhan']; ?>">
                                    <label for="jenis_penyakit">Jenis Penyakit</label>
                                    <input type="text" class="form-control" id="jenis_penyakit" name="jenis_penyakit" value="<?= $tambah['jenis_penyakit']; ?>">
                                    <label for="obat">obat / Rujukan</label>
                                    <input type="text" class="form-control" id="obat" name="obat" value="<?= $tambah['obat']; ?>">
                                    <label for="penanganan">Penanganan</label>
                                    <textarea type="text" class="form-control" id="penanganan" name="penanganan" value="<?= $tambah['penanganan']; ?>"></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Add Data</button>

                                </div>
                                <?php echo  form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash());  ?>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->