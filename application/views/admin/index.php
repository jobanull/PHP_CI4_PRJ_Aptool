<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


 <!-- Content Row -->
 <div class="row">

<!-- Registrasi -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <a href="<?= base_url('surface/registrasi_pasien'); ?>" style="text-decoration: none;">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="font-weight-bold text-warning text-info text-uppercase mb-1">Registrasi</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-fw fa-receipt fa-2x text-gray-300"></i>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>


</div>
<!-- End Row -->

<!-- Start Row -->

<div class="row">
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <a href="<?= base_url('surface/neo_station'); ?>" style="text-decoration: none;">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="font-weight-bold text-success text-uppercase mb-1">Neo Station</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-fw fa-user-nurse fa-3x text-gray-300"></i>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <a href="" style="text-decoration: none;">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="font-weight-bold text-success text-uppercase mb-1">Dokter</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-fw fa-user-md fa-3x text-gray-300"></i>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>


<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <a href="" style="text-decoration: none;">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="font-weight-bold text-primary text-uppercase mb-1">Apoteker</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-fw fa-clipboard-list fa-3x text-gray-300"></i>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <a href="<?= base_url('surface/laboratorium'); ?>" style="text-decoration: none;">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="font-weight-bold text-primary text-uppercase mb-1">Laboratorium</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-fw fa-stethoscope fa-3x text-gray-300"></i>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>


</div>

<!-- Content Row -->
<div class="row">
        <!-- Pie Chart -->
        <div class="col-xl-9 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Laporan Data Pasien</h6>

                </div>
                <div id="myPieChart"></div>
                <div style="padding-left:25%;">
                    <span class="mr-2">
                        <i class="fas fa-circle text-success"></i> Total Pasien
                        <?php foreach ($total_pasien as $total) : ?>
                            <span><?= $total['total_pasien']; ?></span>
                        <?php endforeach; ?>
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-primary"></i> Sudah Bayar
                        <?php foreach ($sudah_bayar as $sdh_byr) : ?>
                            <span><?= $sdh_byr['sudah_bayar']; ?></span>
                        <?php endforeach; ?>
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-secondary"></i> Belum Bayar
                        <?php foreach ($belum_bayar as $blm_bayar) : ?>
                            <span><?= $blm_bayar['belum_bayar']; ?></span>
                        <?php endforeach; ?>
                    </span>
                </div>
            </div>
        </div>
    </div>

<!-- Content Row -->
<div class="row">

</div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->