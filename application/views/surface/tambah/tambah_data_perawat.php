<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 mt-4 text-gray-800"></h1>


    <div class="row">
        <div class="col-lg-6">

            <div class="card">
                <div class="card-header h2 text-gray-900">
                    <?= $title; ?>
                </div>
                <div class="card-body">
                    <p class="text-danger">satuan jangan di tulis</p>
                    <div class="card" style="width: 30rem;">
                        <form action="<?= base_url(); ?>surface/tambah_data_perawat/<?= $tambah['id']; ?>" method="post">
                            <input type="hidden" name="id" id="id" value="<?= $tambah['id']; ?>">
                            <div class="modal-body text-gray-900">
                                <div class="form-group">
                                    <label for="tensi">Tensi</label>
                                    <input type="text" class="form-control" id="tensi" name="tensi" value="<?= $tambah['tensi']; ?>">
                                    <label for="bb">Berat Badan </label>
                                    <input type="text" class="form-control" id="bb" name="bb" value="<?= $tambah['bb']; ?>">
                                    <label for="tb">Tinggi Badan</label>
                                    <input type="text" class="form-control" id="tb" name="tb" value="<?= $tambah['tb']; ?>">
                                    <label for="suhu_tubuh">Suhu Tubuh</label>
                                    <input type="text" class="form-control" id="suhu_tubuh" name="suhu_tubuh" value="<?= $tambah['suhu_tubuh']; ?>">
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Add Data</button>
                                </div>

                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->