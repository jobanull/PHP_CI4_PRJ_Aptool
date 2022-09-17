<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 mt-4 text-gray-800"></h1>


    <div class="row">
        <div class="col-lg-8">

            <div class="card">
                <div class="card-header h2 text-gray-900">
                    Detail Pasien
                </div>
                <div class="card-body">
                    <div class="card" style="width: 35rem;">

                        <div class="row">
                            <div class="col-sm">
                                <ul class="list-group  text-gray-900">
                                    <li class="list-group-item h5 font-weight-bold">Nomor Rekam Medis</li>
                                    <li class="list-group-item h5 font-weight-bold">Nama Pasien</li>
                                    <li class="list-group-item h5 font-weight-bold">Kategori Pasien</li>
                                    <li class="list-group-item h5 font-weight-bold">Jenis Kelamin</li>
                                    <li class="list-group-item h5 font-weight-bold">Golongan Darah</li>
                                    <li class="list-group-item h5 font-weight-bold">Tanggal Lahir</li>
                                    <li class="list-group-item h5 font-weight-bold">Status</li>
                                    <li class="list-group-item h5 font-weight-bold">Nomor HP</li>
                                    <li class="list-group-item h5 font-weight-bold">Pekerjaan</li>
                                    <li class="list-group-item h5 font-weight-bold">Nomor Kartu Keluarga</li>
                                    <li class="list-group-item h5 font-weight-bold">Alamat</li>
                                </ul>
                            </div>
                            <div class="col-sm">
                                <ul class="list-group list-group-flush text-gray-900">
                                    <li class="list-group-item h5 font-weight-bold">: <?= $getDataPasienById['rm']; ?></li>
                                    <li class="list-group-item h5 font-weight-bold">: <?= $getDataPasienById['nama_pasien']; ?></li>
                                    <li class="list-group-item h5 font-weight-bold">: <?= $getDataPasienById['kategori_pasien']; ?></li>
                                    <li class="list-group-item h5 font-weight-bold">: <?= $getDataPasienById['jenis_kelamin']; ?></li>
                                    <li class="list-group-item h5 font-weight-bold">: <?= $getDataPasienById['golongan_darah'] ?></li>
                                    <li class="list-group-item h5 font-weight-bold">: <?= $getDataPasienById['tgl_lahir']; ?></li>
                                    <li class="list-group-item h5 font-weight-bold">: <?= $getDataPasienById['status']; ?></li>
                                    <li class="list-group-item h5 font-weight-bold">: <?= $getDataPasienById['nomor_hp']; ?></li>
                                    <li class="list-group-item h5 font-weight-bold">: <?= $getDataPasienById['pekerjaan']; ?></li>
                                    <li class="list-group-item h5 font-weight-bold">: <?= $getDataPasienById['no_kk']; ?></li>
                                    <li class="list-group-item h5 font-weight-bold">: <?= $getDataPasienById['alamat']; ?></li>
                                </ul>

                            </div>
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