<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; CI3 <?= date('Y'); ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?> ">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/vendor/admin_role_edit.js"></script>
<script src="<?= base_url('assets/'); ?>js/vendor/submenu_edit.js"></script>
<script src="<?= base_url('assets/'); ?>js/vendor/menu_edit.js"></script>
<script src="<?= base_url('assets/'); ?>js/vendor/script-alat-ukur.js"></script>


<script>
    $('.custom-file-input').on('change', function() {
        let filename = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(filename);
    });
    
    $('.form-check-input').on('click', function() {
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');


        $.ajax({
            url: "<?= base_url('admin/changeaccess'); ?>",
            type: "post",
            data: {
                menuId: menuId,
                roleId: roleId
            },
            success: function() {
                document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
            }
        });
    });
</script>


<!-- Payment -->

<script>
    function myFunction() {
        var x = document.getElementsById("wa");
        var y = document.getElementById("bayar");
        y.style.display = "none";
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>

<!-- Script Load Modal -->
<script>
    $(document).ready(function() {

        $(document).on('click', '#select', function() {
            var id = $(this).data('id');
            var bidang = $(this).data('bidang');
            var sub = $(this).data('sub');
            var pemeriksaan = $(this).data('pemeriksaan');
            var nominal = $(this).data('nominal');
            var satuan = $(this).data('satuan');
            var tarif = $(this).data('tarif');
            $('#id').val(id);
            $('#id_bidang').val(bidang);
            $('#id_pemeriksaan').val(pemeriksaan);
            $('#id_sub').val(sub);
            $('#id_nominal').val(nominal);
            $('#id_satuan').val(satuan);
            $('#id_tarif').val(tarif);
            $('#modal_item').modal('hide');
        })
    })
</script>

<script>
    function myFunction() {
        var x = document.getElementById("tampilbayar");
        var y = document.getElementById("bayar");
        if (y.style.display === "block") {
            y.style.display = "none";
        } else {
            x.style.display = "block";
            y.style.display = "none";
        }


    }
</script>

<script>

// Temukan elemen input untuk alat ukur dan alat bantu
var alatUkurInput = document.getElementById('id_bidang');
var alatBantuInput = document.getElementById('id_bidang_bantu');

// Fungsi untuk menghapus atribut "name" dari input alat bantu
function hapusAtributName() {
    alatBantuInput.removeAttribute('name');
}

// Cek apakah input alat ukur memiliki nilai dari modal pilih
if (alatUkurInput.value !== '') {
    // Jika ya, panggil fungsi untuk menghapus atribut "name" dari input alat bantu
    hapusAtributName();
}

</script>



<script src="https://code.highcharts.com/highcharts.js"></script>
<!-- <script src="https://code.highcharts.com/modules/exporting.js"></script> -->
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>
    Highcharts.chart('myPieChart', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Diagram Data Pasien'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                }
            }
        },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: [

                <?php foreach ($sudah_bayar as $sudah) : ?> {
                        name: 'Sudah Bayar',
                        y: <?= $sudah['sudah_bayar']; ?>
                    },
                <?php endforeach; ?>

                <?php foreach ($belum_bayar as $belum) : ?> {
                        name: 'Belum Bayar',
                        y: <?= $belum['belum_bayar']; ?>
                    },
                <?php endforeach; ?>

                <?php foreach ($total_pasien as $total) : ?> {
                        name: 'Total Pasien',
                        y: <?= $total['total_pasien']; ?>
                    }
                <?php endforeach; ?>
                //     {
                //     name: 'Chrome',
                //     y: 61.41,
                //     sliced: true,
                //     selected: true
                // }, {
                //     name: 'Internet Explorer',
                //     y: 11.84
                // }, {
                //     name: 'Firefox',
                //     y: 10.85
                // }, {
                //     name: 'Edge',
                //     y: 4.67
                // }, {
                //     name: 'Safari',
                //     y: 4.18
                // }, {
                //     name: 'Sogou Explorer',
                //     y: 1.64
                // }, {
                //     name: 'Opera',
                //     y: 1.6
                // }, {
                //     name: 'QQ',
                //     y: 1.2
                // }, {
                //     name: 'Other',
                //     y: 2.61
                // }
            ]
        }]
    });
</script>   



</body>

</html>